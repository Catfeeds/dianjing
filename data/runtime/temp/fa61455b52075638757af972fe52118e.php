<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:45:"themes/simpleboot3/user\user_money\index.html";i:1535099055;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/user_list.css" >
</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        <a  href="javascript:void(0)" onclick="javascript:history.go(-1);return false;" >
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png" ></a>
        账户记录
    </div>
    <div class="tab">
        <ul  id="toggle">
            <li class="cur">钻石记录</li>
            <li>金币记录</li>
        </ul>
    </div>
    <div class="content dia">
        <p class="title">
            <span>编号</span>
            <span>时间</span>
            <span>摘要</span>
            <span>钻石交易</span>
            <span>钻石余额</span>
        </p>
        <ul>
            <?php if(empty($diamond) || (($diamond instanceof \think\Collection || $diamond instanceof \think\Paginator ) && $diamond->isEmpty())): ?>
                <li v-if="gold==''" style="text-align: center;color: #c4caff;line-height: 60px;font-size: 12px">暂无交易记录</li>
                <?php else: if(is_array($diamond) || $diamond instanceof \think\Collection || $diamond instanceof \think\Paginator): $i = 0; $__LIST__ = $diamond;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li v-for="x in diamond">
                        <span style="line-height: 16px;margin-top: 14px;word-break: break-all;overflow: hidden"><?php echo $vo['id']; ?></span>
                        <span style="line-height: 16px;margin-top: 14px;"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                        <span style="color: #333"><?php echo $vo['test']; ?></span>
                        <?php switch($vo['type']): case "1": ?>
                                <span style="color: red;" v-show="x.uin!='0.00'">+<?php echo $vo['number']; ?></span>
                            <?php break; case "2": ?>
                                <span style="color: green;" v-show="x.uout!='0.00'">-<?php echo $vo['number']; ?></span>
                            <?php break; default: endswitch; ?>


                        <span style="color: #333;"><?php echo $vo['balance']; ?></span>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
        <!--<p style="text-align: center;color: #333;line-height: 40px;font-size: 12px" @click="more" class="more" >加载更多</p>-->
    </div>
    <div class="content  gol" style="display: none">
        <p class="title">
            <span>编号</span>
            <span>时间</span>
            <span>摘要</span>
            <span>金币交易</span>
            <span>金币余额</span>
        </p>
        <ul>
            <?php if(empty($gold) || (($gold instanceof \think\Collection || $gold instanceof \think\Paginator ) && $gold->isEmpty())): ?>
                <li v-if="gold==''" style="text-align: center;color: #c4caff;line-height: 60px;font-size: 12px">暂无交易记录</li>
                <?php else: if(is_array($gold) || $gold instanceof \think\Collection || $gold instanceof \think\Paginator): $i = 0; $__LIST__ = $gold;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li v-for="x in gold">
                        <span style="line-height: 16px;margin-top: 14px;word-break: break-all;overflow: hidden"><?php echo $vo['id']; ?></span>
                        <span style="line-height: 16px;margin-top: 14px;"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                        <span style="color: #333"><?php echo $vo['test']; ?></span>
                        <?php switch($vo['type']): case "1": ?>
                                <span style="color: red;">+<?php echo $vo['number']; ?></span>
                            <?php break; case "2": ?>
                                <span style="color: green;">-<?php echo $vo['number']; ?></span>
                            <?php break; default: endswitch; ?>
                        <span style="color: #333;"><?php echo $vo['balance']; ?></span>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>

        </ul>
        <!--<p style="text-align: center;color: #333;line-height: 40px;font-size: 12px" @click="more1" class="more1">加载更多</p>-->
    </div>
</div>
<script>
    $(document).ready(function () {
        var li   = $('#toggle').children();
        var list = $('.content');
        li.click(function () {
            li.removeClass('cur');
            $(this).addClass('cur');
            var id = li.index(this);
            list.css('display','none');
            list.eq(id).css('display','block')
        })
    })
</script>
</body>
</html>