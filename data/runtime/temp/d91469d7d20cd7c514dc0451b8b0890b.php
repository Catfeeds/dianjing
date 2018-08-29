<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"themes/simpleboot3/user\personal\index.html";i:1535530422;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link href="/themes/simpleboot3/public/assets/css/dianjing/personal.css" rel="stylesheet">
    <link href="/themes/simpleboot3/public/assets/css/dianjing/footer.css" rel="stylesheet">

</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        个人中心
    </div>
    <div class="banner">
        <div class="user">
            <img src="<?php echo empty($user['avatar'])?'/static/images/headicon.png':$user['avatar']; ?>"  >
        </div>
        <p><?php echo empty($user['user_nickname'])?$user['user_login']:$user['user_nickname']; ?></p>
    </div>
    <div class="select" id="recharge">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/diamond.png" >
        <span><?php echo empty($user['diamond']['number'])?'0.00':$user['diamond']['number']; ?></span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/smart-right.png"  style="height: 12px; margin-top: 20px; margin-right:0; float: right" alt="">
        <span style="font-size: 12px; float: right;color: #999; margin-right: 10px">去充值</span>
    </div>
    <div class="select" style="margin-bottom: 30px" id="change">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/gold.png"  >
        <span><?php echo empty($user['gold']['number'])?'0.00':$user['gold']['number']; ?></span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/smart-right.png"  style="height: 12px; margin-top: 20px; margin-right:0; float: right" alt="">
        <span style="float: right; color: #999; margin-right: 10px ;font-size: 12px;">去兑换</span>
    </div>
    <div class="select" id="market">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/mall.png"  >
        <span>商城中心</span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/smart-right.png"  style="height: 10px; margin-top: 20px; margin-right:0; float: right" alt="">
    </div>
    <div class="select" id="my_guess">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/star.png"  >
        <span>我的竞猜</span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/smart-right.png"  style="height: 10px; margin-top: 20px; margin-right:0; float: right" alt="">
    </div>
    <div class="select" id="user_list">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/pen.png"  >
        <span>账户记录</span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/smart-right.png"  style="height: 10px; margin-top: 20px; margin-right:0; float: right" alt="">
    </div>
    <div class="select" id="login_out" style="margin-top: 20px; text-align: center;color: #d4171d;">
        退出登录
    </div>
    <div class="footer">
        <ul>
            <li id="guessing" style="width: 50%">
                <span>
                     <span></span>
                    <p>竞猜</p>
                </span>
            </li>
            <li class="cur" style="width: 50%">
                <span>
                     <span></span>
                    <p>个人</p>
                </span>
            </li>
        </ul>
    </div>
</div>
<script>
    $('#guessing').click(function () {
        window.location.href="<?php echo cmf_url('portal/Index/index'); ?>"
    });
    $('#recharge').click(function () {
        window.location.href="<?php echo cmf_url('Recharge/index'); ?>"
    });
    $('#change').click(function () {
        window.location.href="<?php echo cmf_url('Recharge/index',array('id' => 2)); ?>"
    });
    $('#market').click(function () {
        window.location.href="<?php echo cmf_url('Goods/index'); ?>"
    });
    $('#my_guess').click(function () {
        window.location.href="<?php echo cmf_url('MyGuess/index'); ?>"
    });
    $('#user_list').click(function () {
        window.location.href="<?php echo cmf_url('UserMoney/index'); ?>"
    });
    $('#login_out').click(function () {
        window.location.href="<?php echo cmf_url('index/logout'); ?>"
    });
</script>
</body>
</html>