<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:45:"themes/simpleboot3/portal\classify\index.html";i:1535357025;s:67:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\thinkcmf\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
<!DOCTYPE html>
<html>
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
	
    <style>
        body,h1,h2,h3,h4,p,div,li,ul,table,td,tr,span,a,dl,dt,dd,input,thead,tbody,footer,aside,header{
            margin:0;
            padding:0;
            box-sizing: border-box;
            outline: none;
            border: none;
            list-style: none;
            font-family: "Microsoft Yahei", "微软雅黑", "宋体", Tahoma, Arial, Helvetica, STHeiti;
        }
        body{
            background-image: url("/themes/simpleboot3/public/assets/images/dianjing/bgpic.jpg");
            background-attachment: fixed;
            background-size: 100%;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }
        .header{
            height: 50px;
            width: 100%;
            background: #1a1a1a;
            text-align: center;
            line-height: 44px;
            color: #fff;
            font-weight: 700;
            position: fixed;
            top:0;
            z-index: 9999;
        }
        .header a img{
            margin-top: 16px;
            margin-left: 10px;
            width: 10px;
            float: left;
        }
        .pop{
            width: 100%;
            top: 50px;
            display: none;
            position: absolute;
            z-index: 999;
        }
        .pop .s-box{
            width: 100%;
            background: #ebebeb;
            padding:0 10px 0 10px;
            margin-bottom: 50px;
        }
        .pop .s-box p{
            width: 100%;
            height: 10px;
        }
        .pop .s-box ul{
            overflow: hidden;
        }
        .pop .s-box li{
            width: 48.5%;
            height: 44px;
            border-radius: 2px;
            border: 1px solid #ccc;
            padding: 10px;
            float: left;
            margin-bottom: 10px;
            position: relative;
        }
        .pop .s-box li span{
            width: 55%;
            height: 22px;
        }
        .pop .s-box li.cur span{
            color: #333;
            width: 55%;
        }
        .pop .s-box li:first-child,
        .pop .s-box li:nth-child(7),
        .pop .s-box li:nth-child(9),
        .pop .s-box li:nth-child(11),
        .pop .s-box li:nth-child(13),
        .pop .s-box li:nth-child(15),
        .pop .s-box li:nth-child(17),
        .pop .s-box li:nth-child(19),
        .pop .s-box li:nth-child(21),
        .pop .s-box li:nth-child(23),
        .pop .s-box li:nth-child(25),
        .pop .s-box li:nth-child(27),
        .pop .s-box li:nth-child(29),
        .pop .s-box li:nth-child(5),
        .pop .s-box li:nth-child(3){
            margin-right: 3%
        }
        .pop .s-box li img{
            height: 20px;
            float: left;
            margin-right: 10px;
        }
        .pop .s-box li:first-child.cur img{

        }
        .pop .s-box li span:last-child{
            float: right;
            height: 20px;
            width: 20px;
            margin-right: 0;
            background-image: url("/themes/simpleboot3/public/assets/images/dianjing/no-select.png");
            background-size: 20px 20px;
        }
        .pop .s-box li.cur>span:last-child{
            background-image: url("/themes/simpleboot3/public/assets/images/dianjing/select.png");
            background-size: 20px 20px;
        }
        .pop .s-box li span{
            float: left;
            color: #ccc;
            font-size: 12px;
            line-height: 22px;
        }
        .pop .s-box .fitter{
            height: 50px;
            width: 100%;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            background: #fff;
            margin-left: -10px;
            padding-left: 10px;
        }
        .pop .s-box .fitter>span{
            float: left;
            margin:0 30px 0 0 ;
            line-height: 30px;
            font-size: 12px;
        }
        .pop .s-box .fitter .select_all .img{
            float: left;
            margin-top: 5px;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            background:url("/themes/simpleboot3/public/assets/images/dianjing/no-select.png") ;
            background-size: 20px 20px;
        }
        .pop .s-box .fitter .select_all.cur .img{
            background:url("/themes/simpleboot3/public/assets/images/dianjing/select.png") ;
            background-size: 20px 20px;
        }
        .pop .s-box .fitter .select_all.cur span{
            color: #333;
        }
        .pop .s-box .fitter .not_select_all .img{
            float: left;
            margin-top: 5px;
            margin-right: 10px;
            width: 20px;
            height: 20px;
            background:url("/themes/simpleboot3/public/assets/images/dianjing/no-select.png") ;
            background-size: 20px 20px;
        }
        .pop .s-box .fitter .not_select_all.cur .img{
            background:url("/themes/simpleboot3/public/assets/images/dianjing/select.png") ;
            background-size: 20px 20px;
        }
        .pop .s-box .fitter .not_select_all.cur span{
            color: #333;
        }
        #submit{
            float: right;
            width: 80px;
            margin-right: 10px;
            height: 30px;
            text-align: center;
            background: #333;
            border-radius: 3px;
            color: #fff;
            margin-left: 0;
        }
    </style>
</head>
<body>
<div id="body">
    <div class="header">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/leidaegames.png"  style="height: 20px;margin-top: 15px;margin-left: 40px">
        <div style="height: 50px;width: 40px;float: right" >
            <img src="/themes/simpleboot3/public/assets/images/dianjing/tc.png" style="height: 20px;width: 20px;margin: 15px 0 0 ">
        </div>
    </div>
    <form action="<?php echo cmf_url('Classify/save'); ?>" method="post" class="js-ajax-form">
    <div class="pop" id="pop" style="background: rgb(235, 235, 235); display: block; height: 943px;">
        <div class="s-box">
            <p></p>
            <ul @click="toggle_game" class="toggle">
                <?php if(!(empty($classify) || (($classify instanceof \think\Collection || $classify instanceof \think\Paginator ) && $classify->isEmpty()))): if(is_array($classify) || $classify instanceof \think\Collection || $classify instanceof \think\Paginator): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <input type="number" name="classify_id[<?php echo $vo['id']; ?>]"  value="<?php echo empty($vo['status'])?1:$vo['status'];; ?>" style="display: none">
                        <?php if(empty($vo['status']) || (($vo['status'] instanceof \think\Collection || $vo['status'] instanceof \think\Paginator ) && $vo['status']->isEmpty())): $class = 'cur'; else: switch($vo['status']): case "1": $class = 'cur'; break; default: $class = ''; endswitch; endif; ?>
                        <li class="<?php echo $class; ?> classify_id"  data-game-id="<?php echo $vo['id']; ?>">
                            <img src="<?php echo $vo['icon']; ?>" style="margin: 2px 10px 0 0; width: 20px;height: auto;">
                            <span style="overflow: hidden"><?php echo $vo['name']; ?> <!--(0)--></span>
                            <span></span>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
            <div class="fitter">
            <!--<span @click="select_all" class="select_all">
                <span class="img"></span>
                <span>全选</span>
            </span>
                <span @click="not_select_all" class="not_select_all">
                <span class="img">
                </span>
                <span>反选</span>
            </span>-->
                <button type="submit" id="submit" class="js-ajax-submit" >确定</button>
            </div>
        </div>
    </div>
    </form>
</div>
<script src="/static/js/admin.js"></script>
<script>
    $('.classify_id').click(function () {
        var prev = $(this).prev();
        if (prev.val() == 1)
        {
            $(this).removeClass('cur');
            prev.val(2)
        }
        else
        {
            $(this).addClass('cur');
            prev.val(1)
        }


    })
</script>
</body>
</html>