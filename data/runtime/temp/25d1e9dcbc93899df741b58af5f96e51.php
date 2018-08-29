<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:46:"themes/simpleboot3/user\recharge\exchange.html";i:1535006872;s:67:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/recharge.css" >
    <style>
        li.select>label:nth-child(3){
            float: right;
            height: 30px;
            width: 80px;
            background:#e0e0e0;
            border-radius: 3px;
            margin-top: 10px;
            color: #333;
            line-height: 30px;
            text-align: center
        }
        li.select>label:nth-child(3).cur{
            background: #e0e000;
            color: #333;
        }
    </style>
</head>
<body>
<div id="body" v-cloak>
    <div class="header">
        <a  href="javascript:void(0)" onclick="javascript:history.go(-1);return false;" > 
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png" ></a>
        兑换
    </div>
    <div class="select" style="background: #ebebeb;margin-bottom: 0">
        <span style="margin-right: 10px">当前余额:</span>
        <img src="<?php echo $data['Bicon']; ?>"  ><span><?php echo empty($user['diamond']['number'])?'0.00':$user['diamond']['number']; ?></span>
        <img src="<?php echo $data['icon']; ?>"  ><span><?php echo empty($user['gold']['number'])?'0.00':$user['gold']['number']; ?></span>

    </div>
    <form action="<?php echo cmf_url('recharge/takePost'); ?>" method="post">
        <input type="hidden" name="type" value="2">
    <ul>
        <?php if(is_array($data['grade']) || $data['grade'] instanceof \think\Collection || $data['grade'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['grade'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="select">
                <img src="<?php echo $data['icon']; ?>" >
                <span style="margin-right: 10px;color: #333;">×<?php echo $vo*(100/$data['ratio']); ?></span>


                <label class="change" for="label<?php echo $vo; ?>">
                    <img src="<?php echo $data['Bicon']; ?>" style="margin-right: 5px;">
                    ×<span class="gold"><?php echo $vo; ?></span>
                    <input type="radio" name="number" id="label<?php echo $vo; ?>"
                           value="<?php echo $data['ratio']; ?>,<?php echo $vo; ?> " style="display: none;">
                </label>
            </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
        <p style="font-size: 16px;color: #333;text-align: center;margin-top: 25px;margin-bottom: 100px" id="recharge">钻石不足,前往购买>></p>
        
    <div class="pay" style=" width: 100%;position: fixed;bottom: 0">
        <button type="submit" style="background: #e0e000;text-align: center;line-height: 55px;height: 55px;width: 100%;color: #333;font-size: 16px">兑换</button>
    </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        var change = $('.change');
        change.eq(0).addClass('cur');
        $('[name="number"]').eq(0).prop('checked','checked');
        change.click(function (i) {
            change.removeClass('cur');
            $(this).addClass('cur');
        })
    })
    $('#recharge').click(function () {
        window.location.href="<?php echo cmf_url('Recharge/index'); ?>"
    })
</script>
</body>
</html>