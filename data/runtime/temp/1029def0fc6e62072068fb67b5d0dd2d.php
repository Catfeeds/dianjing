<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"themes/simpleboot3/portal\index\index.html";i:1535423984;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link href="/themes/simpleboot3/public/assets/css/dianjing/guess_list.css" rel="stylesheet">
</head>
<body>
<div id="body">
    <div class="header">
        <img src="/themes/simpleboot3/public/assets/images/dianjing/leidaegames.png"  style="height: 20px;margin-top: 15px;margin-left: 40px">
        <div style="height: 50px;width: 40px;float: right" id="select" >
            <img src="/themes/simpleboot3/public/assets/images/dianjing/tc.png" style="height: 20px;width: 20px;margin: 15px 0 0 ">
        </div>
    </div>
    <div class="slide_picker game-box"  style="overflow: hidden;">
        <div class="swiper-container">
            <ul class="swiper-wrapper game" >
                <li class="swiper-slide <?php echo $type==0?'cur':''; ?>"  url="<?php echo cmf_url('Index/index',array('type' => 0)); ?>">
                    <div></div>
                    <p>全部游戏</p>
                </li>
                <li class="swiper-slide <?php echo $type==1?'cur':''; ?>" url="<?php echo cmf_url('Index/index',array('type' => 1)); ?>">
                    <div></div>
                    <p>王者荣耀</p>
                </li>
                <li class="swiper-slide <?php echo $type==2?'cur':''; ?>" url="<?php echo cmf_url('Index/index',array('type' => 2)); ?>">
                    <div></div>
                    <p>英雄联盟</p>
                </li>
                <li class="swiper-slide <?php echo $type==3?'cur':''; ?>" url="<?php echo cmf_url('Index/index',array('type' => 3)); ?>">
                    <div></div>
                    <p>刀塔2</p>
                </li>
                <li class="swiper-slide <?php echo $type==4?'cur':''; ?>" url="<?php echo cmf_url('Index/index',array('type' => 4)); ?>">
                    <div></div>
                    <p>CS:GO</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="game" v-cloak>

        <div class="content-list all">
            <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="list" >

                        <div class="top">
                    <span style="float: left;margin-right: 10px">
                        <img src="<?php echo $vo['Cicon']; ?>" style="height: 20px;">
                    </span>
                            <span class="time"><?php echo $vo['classify']; ?></span>
                            <span class="tour"><?php echo date('Y-m-d H:i:s',$vo['startTime']); ?></span>
                        </div>

                        <div class="midden">
                    <span>
                        <div style="text-align: center">
                            <img src="<?php echo $vo['Aicon']; ?>"  style="height: 60px" >
                        </div>
                        <p style="text-align: center"><?php echo $vo['Aname']; ?></p>
                    </span>
                            <span class="num">
                        <div>
                            <?php switch($vo['is_live']): case "1": ?>
                                     <div v-else style="font-size: 14px;line-height: 30px; width: 80px;height: 30px;border: 1px solid #666;margin-top: 52px;border-radius: 15px;background: #1a1a1a; color: #e0e000; text-align: center">
                                赛前盘
                            </div>
                                <?php break; case "2": ?>
                                     <div  style="font-size: 14px;line-height: 30px; width: 80px;height: 30px;border: 1px solid #666;margin-top: 52px;border-radius: 15px;background: #1a1a1a; color: #e0e000; text-align: center">
                                滚球盘
                            </div>
                                <?php break; default: ?>
                                未知
                            <?php endswitch; ?>
                        </div>
                        <p style="font-size: 16px;font-weight: 700;margin-top: 2px; width: 120%;margin-left: -10%;"></p>
                    </span>
                            <span>
                        <div style="text-align: center">
                            <img src="<?php echo $vo['Bicon']; ?>"  style="height: 60px">
                        </div>
                    <p style="text-align: center"><?php echo $vo['Bname']; ?></p>
                    </span>
                        </div>

                        <div class="bottom">
                            <?php switch($vo['bet_num']): case "1": ?>
                                    <ul v-if="x.bet_num==0">
                                        <li style="margin-top: 0">
                                            <span style="background-image: url('/themes/simpleboot3/public/assets/images/dianjing/liveplay.png')"></span>
                                            <span style="color: #666;">直播</span>
                                        </li>
                                        <li style="margin-top: 0">
                                            <span style="background-image: url('/themes/simpleboot3/public/assets/images/dianjing/tz.png')"></span>
                                            <span style="color: #666;">竞猜</span>
                                        </li>
                                    </ul>
                                <?php break; case "2": ?>
                                    <ul v-else>
                                        <?php switch($vo['url_status']): case "1": ?>
                                                <li style="margin-top: 0" v-if="x.url_status==0">
                                                    <span></span>
                                                    <span>直播</span>
                                                </li>
                                            <?php break; case "2": ?>
                                                <li style="margin-top: 0" v-else class="competition">
                                                    <span style="background-image: url('/themes/simpleboot3/public/assets/images/dianjing/liveplay@.png'); background-position: 0 4px"></span>
                                                    <span style="color: #fff;">直播</span>
                                                </li>
                                            <?php break; ?>
                                            <defalut/>
                                            未知
                                        <?php endswitch; ?>

                                        <li style="margin-top: 0" class="competition">
                                            <span></span>
                                            <span>竞猜</span>
                                        </li>
                                    </ul>
                                    <input type="hidden" value="<?php echo cmf_url('Details/index',array('id'=>$vo['id'])); ?>">
                                <?php break; ?>
                                <defalut/>
                                未知
                            <?php endswitch; ?>



                        </div>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <p class="nogame" style="text-align: center; margin-top: 200px;color: #ccc;  border-radius: 2px" v-cloak><img
                        src="/themes/simpleboot3/public/assets/images/dianjing/nogame.png"  alt="">
                    <br>
                    暂无数据
                </p>
                <p class="load" style="text-align: center"><img src="/themes/simpleboot3/public/assets/images/dianjing/load.gif"  style="height: 15px;margin-top:200px; "></p>
            <?php endif; ?>


        </div>


        <div class="footer">
        <ul>
            <li class="cur" style="width: 50%">
                <span>
                     <span></span>
                    <p>竞猜</p>
                </span>
            </li>
            <li id="personal"  style="width: 50%">
                <span>
                     <span></span>
                    <p>个人</p>
                </span>
            </li>
        </ul>Splicing
    </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //初始
        var width = $(document.body).width();
        splicing(width);
        //调整
        $(window).resize(function() {
            var width = $(document.body).width();
            splicing(width);
        });
        //跳转
        $('#select').click(function () {
            window.location.href = "<?php echo cmf_url('Classify/index'); ?>"
        });

        $('#personal').click(function () {
            window.location.href = "<?php echo cmf_url('user/Personal/index'); ?>"
        });

        $('.swiper-slide').click(function () {
            var str =  $(this).attr('url');
            window.location.href = str;
        });

        $('.competition').click(function () {
            var string = $(this).parent().next().val();
            window.location.href = string;
        })

    });
    //修改宽度
    function splicing(width) {
        var number = 5;
        var str = width / number;
        $('.swiper-slide').each(function () {
            $(this).css('width', str);
        });
    }

</script>
</body>
</html>