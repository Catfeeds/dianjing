<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"themes/simpleboot3/user\goods\index.html";i:1535089882;s:67:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/market.css" >
</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        <a href="<?php echo cmf_url('personal/index'); ?>" ><img src="/themes/simpleboot3/public/assets/images/dianjing/back.png"></a>
        账户记录
        <span style="position: absolute; right: 0; color: #fff;margin-right: 10px;font-size: 16px" id="change">兑换记录</span>
    </div>
    <p class="money">
        <span style="float: left;line-height: 44px;margin:0 10px">当前余额:</span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/gold.png"  style="height: 20px;float: left;margin-top: 11px;margin-right: 5px">
        <?php echo empty($gold)?'0.00':$gold; ?>
    </p>
    <div class="change-box">
        <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <a class="commodity" href="<?php echo cmf_url('Goods/thisOne',array('id'=>$vo['id'])); ?>">
                    <div style="width: 100%;height: 110px;border-bottom: 1px solid #e0e0e0;">
                        <img src="<?php echo $vo['img']; ?>"  style="width: 100%;height: 100%;margin:0 auto;display: block;">
                    </div>
                    <div>
                        <p style="color: #333;margin: 10px 0 20px 0;line-height: 24px;padding-left: 10px"><?php echo $vo['name']; ?></p>
                        <p style="line-height: 20px;color: #333;padding-left: 10px">
                            <?php echo $vo['price']; ?> <?php echo $vo['title']; ?> <span style="float: right;margin-right: 10px;color: #999;"><?php echo $vo['convert']; ?>人兑换</span>
                        </p>
                    </div>
                </a>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div>
<script>
    $('#change').click(function () {
        window.location.href="<?php echo cmf_url('Order/index'); ?>"
    });
</script>
</body>
</html>