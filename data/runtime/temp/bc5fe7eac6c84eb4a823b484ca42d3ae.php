<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"themes/simpleboot3/user\order\index.html";i:1535093875;s:67:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	

    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/market_list.css" >

</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        <a  href="javascript:void(0)" onclick="javascript:history.go(-1);return false;">
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png" ></a>
        兑换记录
    </div>
    <div class="title">
        <ul id="toggle">
            <li class="cur">全部</li>
            <li>已兑换</li>
            <li>审核中</li>
        </ul>
    </div>
    <div class="list">
        <ul>
            <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li v-for="x in body">
                        <p style="height: 30px;line-height: 30px;font-size: 12px;color: #999">
                            <span><?php echo $vo['id']; ?></span>
                            <span style="float: right"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                        </p>
                        <div style="height: 80px;padding: 10px 0; overflow: hidden;">
                            <div style="width: 17%;float: left">
                                <img src="<?php echo $vo['img']; ?>"  style="height: 60px;width: 100%; float: left">
                            </div>
                            <div style="width: 48%;float: left">
                                <p style="margin-bottom: 10px;color: #333;font-size: 14px;margin-left: 10px"><?php echo $vo['name']; ?></p>
                                <p style="color: #333;font-size: 14px;margin-left: 10px">x<?php echo $vo['number']; ?></p>
                            </div>
                            <div style="width: 35%;float: left;">
                                <p style="color: #333;margin-bottom: 20px;text-align: right;font-size: 14px">总计:<?php echo $vo['all_price']; ?></p>
                                <?php switch($vo['status']): case "0": ?>
                                        <p style="color: #333;text-align: right;font-size: 14px" >取消</p>
                                    <?php break; case "1": ?>
                                        <p style="color: #333;text-align: right;font-size: 14px" >审核中</p>
                                    <?php break; case "2": ?>
                                        <p style="color: #333;text-align: right;font-size: 14px" >已兑换</p>
                                    <?php break; default: ?>
                                    <p style="color: #333;text-align: right;font-size: 14px" >已兑换</p>
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
    </div>
    <div class="list" style="display: none">
        <ul>
            <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['status']): case "2": ?>
                            <li v-for="x in body" v-if="x.status==1" :data-status="x.status">
                                <p style="height: 30px;line-height: 30px;font-size: 12px;color: #999">
                                    <span><?php echo $vo['id']; ?></span>
                                    <span style="float: right"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                                </p>
                                <div style="height: 80px;padding: 10px 0; overflow: hidden;">
                                    <div style="width: 17%;float: left">
                                        <img src="<?php echo $vo['img']; ?>"  style="height: 60px;width: 100%; float: left">
                                    </div>
                                    <div style="width: 48%;float: left">
                                        <p style="margin-bottom: 20px;color: #333;font-size: 14px;margin-left: 10px"><?php echo $vo['name']; ?></p>
                                        <p style="color: #333;font-size: 14px;margin-left: 10px">x<?php echo $vo['number']; ?></p>
                                    </div>
                                    <div style="width: 35%;float: left;">
                                        <p style="color: #333;margin-bottom: 20px;text-align: right;font-size: 14px">总计:<?php echo $vo['all_price']; ?></p>
                                        <p style="color: #333;text-align: right;font-size: 14px">已兑换</p>
                                    </div>
                                </div>
                            </li>
                        <?php break; default: endswitch; endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
    </div>
    <div class="list" style="display: none">
        <ul>
            <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['status']): case "1": ?>
                            <li v-for="x in body" v-if="x.status==1" :data-status="x.status">
                                <p style="height: 30px;line-height: 30px;font-size: 12px;color: #999">
                                    <span><?php echo $vo['id']; ?></span>
                                    <span style="float: right"><?php echo date('Y-m-d H:i:s',$vo['time']); ?></span>
                                </p>
                                <div style="height: 80px;padding: 10px 0; overflow: hidden;">
                                    <div style="width: 17%;float: left">
                                        <img src="<?php echo $vo['img']; ?>"  style="height: 60px;width: 100%; float: left">
                                    </div>
                                    <div style="width: 48%;float: left">
                                        <p style="margin-bottom: 20px;color: #333;font-size: 14px;margin-left: 10px"><?php echo $vo['name']; ?></p>
                                        <p style="color: #333;font-size: 14px;margin-left: 10px">x<?php echo $vo['number']; ?></p>
                                    </div>
                                    <div style="width: 35%;float: left;">
                                        <p style="color: #333;margin-bottom: 20px;text-align: right;font-size: 14px">总计:<?php echo $vo['all_price']; ?></p>
                                        <p style="color: #333;text-align: right;font-size: 14px">已兑换</p>
                                    </div>
                                </div>
                            </li>
                        <?php break; default: endswitch; endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function () {
        var li   = $('#toggle').children();
        var list = $('.list');
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