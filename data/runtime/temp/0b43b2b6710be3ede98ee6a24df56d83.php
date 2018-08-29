<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"themes/simpleboot3/user\login\index.html";i:1535513923;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/login_black.css">
</head>
<body>
<div id="body" style="padding-top: 50px">
    <div class="header">
        <a href="<?php echo cmf_url('portal/index/index'); ?>" style="-webkit-tap-highlight-color:rgba(0,0,0,0);"><img src="/themes/simpleboot3/public/assets/images/dianjing/back.png" alt=""></a>
        <p>登陆</p>
    </div>
    <div class="logo">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/leida_logo_white.png" alt="">
    </div>
    <form action="<?php echo cmf_url('login/doLogin'); ?>" method="post" class="js-ajax-form">


    <div class="login">
        <div class="phone">
            <span><img src="/themes/simpleboot3/public/assets/images/dianjing/iphoney.png" alt=""></span>
            <span><input type="text" placeholder="请输入手机号" name="username"></span>
        </div>
        <div class="password">
            <span><img src="/themes/simpleboot3/public/assets/images/dianjing/passy.png" alt=""></span>
            <span><input class="setPW" name="password" type="password" placeholder="请输入密码"></span>
            <span class="off_on"><img src="/themes/simpleboot3/public/assets/images/dianjing/off_white.png" alt=""></span>
        </div>
        <div class="phone">
            <span></span>
            <span><input type="text" name="captcha" placeholder="请输入验证码" ></span>

        </div>
        <div class="phone">
            <span></span>
            <span><?php $__CAPTCHA_SRC=url('/captcha/new').'?height=38&width=160&font_size=20'; ?>
<img src="<?php echo $__CAPTCHA_SRC; ?>" onclick="this.src='<?php echo $__CAPTCHA_SRC; ?>&time='+Math.random();" title="换一张" class="captcha captcha-img verify_img" style="cursor: pointer;"/>
<input type="hidden" name="_captcha_id" value=""></span>
        </div>
        <div class="flag"></div>
        <div class="pass hidden">登录</div>
        <button type="submit" class="pass1 js-ajax-submit">登录</button>
    </div>

    </form>
    <p class="forget">
        <span><a style="color: #fff;text-decoration: none" href="<?php echo cmf_url('user/Login/findPassword'); ?>">忘记密码</a></span>
        <span></span>
        <span><a style="color: #fff;text-decoration: none" href="<?php echo cmf_url('user/Register/index'); ?>">点击注册</a></span>
    </p>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>