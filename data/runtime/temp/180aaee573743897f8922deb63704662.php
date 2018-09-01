<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:43:"themes/simpleboot3/user\goods\this_one.html";i:1535595603;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/market_change.css" >
</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        <a  href="javascript:void(0)" onclick="javascript:history.go(-1);return false;">
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png"></a>
        兑换
    </div>
    <div class="banner">
        <div class="pic">
            <img src="<?php echo $data['img']; ?>" >
            <p style="color: #333;"><?php echo $data['name']; ?></p>
            <p style="color: #d4171d;font-size: 14px"><span><?php echo $data['price']; ?> 金币</span><span style="float: right;color: #999;padding-right: 10px"><?php echo $data['convert']; ?>人兑换</span></p>
        </div>
    </div>

    <p class="num">
        &ensp;数量
        <img src="/themes/simpleboot3/public/assets/images/dianjing/max.png"  style="float: right;height: 30px;margin-top: 15px;margin-right: 10px" id="max">
        <span style="float: right;width: 60px;text-align: center;font-size: 12px;color: #333;margin-left: 0" id="number">1</span>
        <img src="/themes/simpleboot3/public/assets/images/dianjing/min.png" style="float: right;height: 30px;margin-top: 15px;" id="min">
    </p>
    <form action="<?php echo cmf_url('Goods/order'); ?>" method="post" class="js-ajax-form">
        <input type="hidden" name="price" value="<?php echo $data['price']; ?>">
    <p class="phone">
        &ensp;手机号
        <input type="number" required placeholder="请输入手机号" name="phone" id='phone_num' style="color: #333;font-size: 14px"></p>
    <p class="qq">
        &ensp;QQ
        <input type="number" required name="qq" placeholder="请输入QQ号" id="qq_num" style="color: #333;font-size: 14px"></p>
    <button type="submit" class="sub js-ajax-submit" style="outline:none;background-color: #e0e000;">
        <div  id="sub">提交</div>
    </button>
        <input type="hidden" name="goods_id" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="number" value="1">
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>

    //加
    $('#max').click(function () {
        var number = parseInt($('#number').text());
        ++number;
        $('#number').text(number);
        $('[name="number"]').val(number)
    });
    //减
    $('#min').click(function () {
        var number = parseInt($('#number').text());
        if (number <= 1)
        {
        }
        else
        {
           --number;
            $('#number').text(number);
            $('[name="number"]').val(number)
        }
    });

</script>
</body>
</html>