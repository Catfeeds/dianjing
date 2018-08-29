<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"themes/simpleboot3/user\register\index.html";i:1535513842;s:67:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>首页 <?php echo (isset($site_info['site_name']) && ($site_info['site_name'] !== '')?$site_info['site_name']:''); ?></title>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/common_black.css">
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/register_black.css">
</head>
<body>
<div id="body">
    <div class="header">
        <a href="<?php echo url('login/index'); ?>" style="-webkit-tap-highlight-color:rgba(0,0,0,0);"><img src="/themes/simpleboot3/public/assets/images/dianjing/back.png" alt=""></a>
        <p>注册</p>
    </div>
    <div class="logo">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/leida_logo.png" alt="">
    </div>
    <div class="login">
        <div class="phone">
            <span><img src="/themes/simpleboot3/public/assets/images/dianjing/iphone.png" alt=""></span>
            <span><input class="num" type="text" placeholder="请输入手机号"></span>
        </div>
        <div class="code">
            <input class="code_input" type="text" placeholder="请输入验证码">
            <span class="get">获取验证码</span>
            <span class="hidden">获取验证码(60)</span>
        </div>
        <div class="flag"></div>
        <div class="pass hidden">下一步</div>
        <div class="pass2">下一步</div>
    </div>
</div>
</body>
</html>