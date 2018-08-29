<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"themes/simpleboot3/user\my_guess\index.html";i:1535450266;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>个人中心 <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
    <meta name="keywords" content="<?php echo (isset($site_info['site_seo_keywords']) && ($site_info['site_seo_keywords'] !== '')?$site_info['site_seo_keywords']:''); ?>"/>
    <meta name="description" content="<?php echo (isset($site_info['site_seo_description']) && ($site_info['site_seo_description'] !== '')?$site_info['site_seo_description']:''); ?>">
    
<?php 
/*可以加多个方法哟！*/
function _sp_helloworld(){
	echo "hello ThinkCMF!";
}

function _sp_helloworld2(){
	echo "hello ThinkCMF2!";
}


function _sp_helloworld3(){
	echo "hello ThinkCMF3!";
}

 ?>
<meta name="author" content="ThinkCMF">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">

<!-- No Baidu Siteapp-->
<meta http-equiv="Cache-Control" content="no-siteapp"/>

<!-- HTML5 shim for IE8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<link rel="icon" href="/themes/simpleboot3/public/assets/images/favicon.png" type="image/png">
<link rel="shortcut icon" href="/themes/simpleboot3/public/assets/images/favicon.png" type="image/png">
<link href="/themes/simpleboot3/public/assets/simpleboot3/themes/simpleboot3/bootstrap.min.css" rel="stylesheet">
<link href="/themes/simpleboot3/public/assets/simpleboot3/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
      type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" href="/themes/simpleboot3/public/assets/simpleboot3/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="/themes/simpleboot3/public/assets/css/style.css" rel="stylesheet">
<style>
    /*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
    #backtotop {
        position: fixed;
        bottom: 50px;
        right: 20px;
        display: none;
        cursor: pointer;
        font-size: 50px;
        z-index: 9999;
    }

    #backtotop:hover {
        color: #333
    }

    #main-menu-user li.user {
        display: none
    }
</style>
<script type="text/javascript">
    //全局变量
    var GV = {
        ROOT: "/",
        WEB_ROOT: "/",
        JS_ROOT: "static/js/"
    };
</script>
<script src="/themes/simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
<script src="/themes/simpleboot3/public/assets/js/jquery-migrate-1.2.1.js"></script>
<script src="/static/js/wind.js"></script>
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/my_guess.css" >
</head>
<body>
<div id="body">
    <div class="header">
        <a href="<?php echo cmf_url('personal/index'); ?>" >
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png"></a>
        我的竞猜
    </div>
    <div class="tab">
        <ul  id="toggle">
            <li class="<?php echo $id==0?'cur':''; ?>" url="<?php echo cmf_url('MyGuess/index',array('id'=>0)); ?>">全部</li>
            <li class="<?php echo $id==1?'cur':''; ?>" url="<?php echo cmf_url('MyGuess/index',array('id'=>1)); ?>">待开奖</li>
            <li class="<?php echo $id==2?'cur':''; ?>" url="<?php echo cmf_url('MyGuess/index',array('id'=>2)); ?>">已中奖</li>
            <li class="<?php echo $id==3?'cur':''; ?>" url="<?php echo cmf_url('MyGuess/index',array('id'=>3)); ?>">未中奖</li>
        </ul>
    </div>
    <div class="content" v-cloak>
        <ul>
            <?php if(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty())): ?>

                <li class=" all" style="text-align: center;line-height: 50px;margin-top: 100px;background: #ebebeb">
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/no_list.png" style="height: 100px;color: #333;">
                    <br>暂无记录
                    <p style=" width: 80px;height: 30px;line-height: 30px;text-align: center;margin: 0 auto;background: #333;color: #fff; border-radius: 2px;margin-top: 30px" id="jump">去竞猜</p>
                </li>

                <?php else: if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li v-for="x in all">
                        <p class="c-h">
                            <span style="font-size: 12px"><?php echo $i; ?></span>
                            <span><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                        </p>

                        <p class="c-r">
                            <span><?php echo $vo['bureau_name']; ?> <br> <?php echo $vo['choice_parent_name']; ?> @ <?php echo empty($vo['choice_a'])?$vo['choice_name']:$vo['choice_a']; ?></span>
                            <?php switch($vo['status']): case "1": ?>
                                    <span style="color: #999;">待开奖</span>
                                <?php break; case "2": ?>
                                    <span style="color: #d41714;">中奖</span>
                                <?php break; case "3": ?>
                                    <span style="color: #1aad13;">未中奖</span>
                                <?php break; default: ?>
                                <span  style="color: #999;">取消</span>
                            <?php endswitch; ?>
                        </p>

                        <p class="c-p">
                            <span>投注金币 <?php echo $vo['number']; ?></span>
                            <span style="float: right">
                        <span style="font-weight: 700">返还金币</span>
                               <?php switch($vo['status']): case "1": ?>
                                    <span style="color: #999;"><?php echo $vo['odds']*$vo['number']; ?></span>
                                <?php break; case "2": ?>
                                    <span style="color: #d41714;font-weight: 700"><?php echo $vo['odds']*$vo['number']; ?></span>
                                <?php break; case "3": ?>
                                    <span style="color: #1aad13;font-weight: 700">0</span>
                                <?php break; default: ?>
                                <span  style="color: #999;"><?php echo $vo['number']; ?></span>
                            <?php endswitch; ?>
                       <!-- <span v-if="x.order_status_text=='中奖'" style="color: #d41714;font-weight: 700">{{x.order_result}}</span>
                        <span v-if="x.order_status_text=='未中奖'" style="color: #1aad13;font-weight: 700">{{x.order_result}}</span>
                        <span v-if="x.order_status_text=='待开奖'" style="color: #999;">{{x.order_result}}</span>
                        <span v-if="x.order_status_text=='取消'" style="color: #999;">{{x.order_result}}</span>-->
                    </span>
                        </p>

                        <p style="line-height: 30px;font-size: 12px;color: #999;padding-left: 10px;overflow: hidden;height: 30px;">
                            <?php echo $vo['Aname']; ?> vs <?php echo $vo['Bname']; ?> | <?php echo $vo['classify_name']; ?> | <?php echo date('Y-m-d H:i:s',$vo['startTime']); ?>
                        </p>

                    </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>


            <!--<div v-show="all.length==10" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>
            <div v-show="all.length==20" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>
            <div v-show="all.length==30" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>
            <div v-show="all.length==40" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>
            <div v-show="all.length==50" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>
            <div v-show="all.length==60" style="height: 50px;width: 100%;line-height: 50px;font-size: 12px;color: #333;text-align: center" @click="more1">加载更多</div>-->

        </ul>
        <div class="pagination"><?php echo (isset($page) && ($page !== '')?$page:''); ?></div>
    </div>
</div>
<script>
    $('#jump').click(function () {
        window.location.href="<?php echo cmf_url('portal/Index/index'); ?>"
    });
    $('#toggle').children().click(function () {
        var url  = $(this).attr('url');
        window.location.href = url;
    })

</script>
</body>
</html>