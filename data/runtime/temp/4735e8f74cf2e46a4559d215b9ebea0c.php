<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"themes/simpleboot3/portal\details\index.html";i:1535511938;s:67:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\head.html";i:1534385458;s:71:"E:\xampp\htdocs\dianjing\public\themes\simpleboot3\public\function.html";i:1534385458;}*/ ?>
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
	
    <link rel="stylesheet" href="/themes/simpleboot3/public/assets/css/dianjing/JC_content.css">


</head>
<body>
<div id="body" v-cloak="">
    <div class="header">
        <a  href="<?php echo cmf_url('index/index'); ?>"  style="-webkit-tap-highlight-color:rgba(0,0,0,0);">
            <img src="/themes/simpleboot3/public/assets/images/dianjing/back.png"></a>
        <span style="margin-left:-10px; font-size: 14px"><?php echo $match['classify']; ?></span>
    </div>

    <div class="banner" style="border-bottom: 10px solid rgba(26,26,26,0.9);height: 200px;">
        <div id="banner-score" style="margin-top: 10px; height: 190px;">

            <div class="top">
                <div class="tour"><?php echo date('Y-m-d H:i:s',$match['startTime']); ?></div>
            </div>

            <div class="center">
                <?php switch($match['status']): case "1": ?>
                        <div style="color: #e0e000; font-size: 14px; height: 30px;width: 80px; margin: 0 auto;background: #1a1a1a;border-radius: 15px;border: 1px solid #4d4d4d;line-height: 27px;padding: 0 10px">
                            竞猜中
                        </div>
                    <?php break; case "3": ?>
                        <div style="color: #666; font-size: 14px; height: 30px;width: 80px; margin: 0 auto;background: #1a1a1a;border-radius: 15px;border: 1px solid #4d4d4d;line-height: 27px;padding: 0 10px">
                            已结束
                        </div>
                    <?php break; default: ?>
                    <div v-show="res.bet_num==0" style="color: #fff; font-size: 14px; height: 30px;width: 80px; margin: 0 auto;background: #1a1a1a;border-radius: 15px;border: 1px solid #4d4d4d;line-height: 27px;padding: 0 10px">
                        暂停
                    </div>
                <?php endswitch; ?>
            </div>

            <div class="bottom">
                <?php switch($match['url_status']): case "2": ?>
                        <div class="ani" v-if="res.url_status==1" @click="live">
                            <span class="play"><img src="/themes/simpleboot3/public/assets/images/dianjing/liveplay@.png" style="margin-top: 9px"></span>
                            <span>正在直播</span>
                        </div>
                    <?php break; default: ?>
                    <div class="ani" v-else="">
                        <span class="play"><img src="/themes/simpleboot3/public/assets/images/dianjing/liveplay.png"></span>
                        <span style="color: #999;">暂无直播</span>
                    </div>
                <?php endswitch; ?>
            </div>

            <div class="left">
                <div><img src="<?php echo $match['Aicon']; ?>" alt="" style="height: 60px"></div>
                <div style="margin-top: 5px;"><?php echo $match['Aname']; ?></div>
            </div>

            <div class="right">
                <div><img src="<?php echo $match['Bicon']; ?>" alt="" style="height: 60px;"></div>
                <div style="margin-top: 5px;"><?php echo $match['Bname']; ?></div>
            </div>

        </div>
        <!--todo 直播地址-->
        <iframe src="" frameborder="0" id="live" width="100%" height="100%" class="hidden"></iframe>

    </div>


    <div class="nav">
        <div class="swiper-container swiper-container-horizontal">
            <ul class="swiper-wrapper" id="wrapper">
                <?php if(!(empty($choice['bureau']) || (($choice['bureau'] instanceof \think\Collection || $choice['bureau'] instanceof \think\Paginator ) && $choice['bureau']->isEmpty()))): if(is_array($choice['bureau']) || $choice['bureau'] instanceof \think\Collection || $choice['bureau'] instanceof \think\Paginator): $i = 0; $__LIST__ = $choice['bureau'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="swiper-slide <?php echo $vo['bureau_id']==$choice['bureau_id']?'cur':''; ?> swiper-slide-active" style="width: 59.1667px; border-left: 1px solid rgb(235, 235, 235); border-radius: 2px 0px 0px 2px;" url="<?php echo cmf_url('Details/index',array('bureau_id'=>$vo['bureau_id'],'id'=>$match['id'])); ?>">
                            <?php echo $vo['name']; ?>
                        </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
    </div>


    <div class="bigbox">
        <div class="content all" v-if="all" style="display: block;min-height: 649px;">
            <?php if(empty($choice['choice']) || (($choice['choice'] instanceof \think\Collection || $choice['choice'] instanceof \think\Paginator ) && $choice['choice']->isEmpty())): ?>
                <div v-if="!(all)" style="text-align: center;color: #fff;margin-top: 70px">
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/nogame.png" style="height: 60px;margin-bottom: 20px">
                    <br>
                    暂无数据
                </div>
                <?php else: ?>

                <div class="c-num" v-for=" x in all">
                    <?php if(!(empty($choice['choice']) || (($choice['choice'] instanceof \think\Collection || $choice['choice'] instanceof \think\Paginator ) && $choice['choice']->isEmpty()))): if(is_array($choice['choice']) || $choice['choice'] instanceof \think\Collection || $choice['choice'] instanceof \think\Paginator): $i = 0; $__LIST__ = $choice['choice'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <p class="num" v-if="x.market_status==0||x.suspended !=1||x.visible==1||x.odds_visible==1">

				<span style="float: left;height: 20px;width: 3px;border-radius:2px;background: #e0e000;margin: 5px 10px 0 0">
				</span>
                                <?php echo $vo['parent_name']; ?>
                                <!--<span v-if="x[0].islive==1">(滚球盘)</span>-->
                            </p>


                            <?php if(is_array($vo['data']) || $vo['data'] instanceof \think\Collection || $vo['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mo): $mod = ($i % 2 );++$i;?>
                            <ul class="bf-pl" v-for="x in x" v-if="x.pause==0" selectid="<?php echo $mo['id']; ?>">
                                <li >
                                    <p style="color: #fff;width: 100%;height: 19px;overflow: hidden">
                                        <?php echo empty($mo['name'])?$mo['choice_name']:$mo['name']; ?>
                                    </p>
                                    <p style="font-size: 12px; color: #e0e000;">
                                        <?php echo $mo['odds']; ?>
                                    </p>
                                </li>
                            </ul>
                        <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        <!--不可用状态-->
                        <!--<p class="num" style="color: #666;" v-else="">
                                 <span style="float: left;height: 20px;width: 3px;border-radius:2px;background: #666;margin: 5px 10px 0 0">
                                 </span>
                                         {{x[0].name_zh}}
                                     </p>
                         <ul class="bf-pl" v-for="x in x" v-if="x.pause==1" style="background: #333;overflow: hidden">
                             <li :data-market_status="x.market_status" :data-market_id="x.market_id" :data-odds_id="x.odds_id" :data-id="x.pause" style="background: #333;height: 48px;">
                                 <p style=" color: #666;width: 100%;height: 19px;overflow: hidden" v-else="">{{x.odds_title}}</p>
                                 <p style="font-size: 12px; color: #666;" v-else="">{{x.odds_value_80}}</p>
                             </li>
                         </ul>-->
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <!--<div class="pop hidden" @click="new_close">
        <div class="pop-box">
            <div class="pop-h">
                <span>金币余额: {{gold}}</span>
                <span></span>
                <span><img src="/themes/simpleboot3/public/assets/images/dianjing/close@.png" alt="" class="close"></span>
            </div>
            <div class="pop-b">
                <div class="input">
                    <p>
                        <span>{{pop_name}}</span>
                        <span>@{{pop_odds}}</span>
                        <span class="gold-input">
                                <span class="gold-v">{{goldInput}}</span>
                                <span class="embed">请输入金币</span>
                            </span>
                    </p>
                    <p>
                        <span style="color: #fff;">全场胜平负(90分钟内,包含补时)</span>
                        <span>预计返还: <span>{{sub}}</span></span>
                    </p>
                </div>
                <div class="button">
                    <p>
                        <span @click="getNum">百</span>
                        <span @click="getNum">1</span>
                        <span @click="getNum">2</span>
                        <span @click="getNum">3</span>
                    </p>
                    <p>
                        <span @click="getNum">千</span>
                        <span @click="getNum">4</span>
                        <span @click="getNum">5</span>
                        <span @click="getNum">6</span>
                    </p>
                    <p>
                        <span @click="getNum">万</span>
                        <span @click="getNum">7</span>
                        <span @click="getNum">8</span>
                        <span @click="getNum">9</span>
                    </p>
                    <p>
                        <span @click="getNum">十万</span>
                        <span @click="getNum">最高投注</span>
                        <span @click="getNum">0</span>
                        <span @click="getNum">清除</span>
                    </p>
                    <div>
                        <div><img class="ok" src="/themes/simpleboot3/public/assets/images/dianjing/ok.png" alt="" @click="odds_change">投注时接受赔率变化</div>
                        <div @click="submit">投注</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tzcg hidden">
        <div class="tz-box">
            <div class="title">
                <p>投注成功</p>
                <p><span>{{res.home_name}} vs {{res.away_name}}</span><span>{{res.startdate.substring(5,19)}}</span></p>
            </div>
            <div class="info">
                <p><span>{{pop_name}}</span> <span>@{{pop_odds}}</span></p>
                <p>
                    <span>投注金额 {{goldInput}}</span>
                    <span> {{sub}}</span>
                    <span>预计返还</span>
                </p>
            </div>
            <div class="button">
                <p>
                    <span @click="guess_hist">投注历史</span>
                    <span @click="goOn">继续投注</span>
                </p>
            </div>
        </div>
    </div>
    <div class="tzsb1 hidden">
        <div class="tz-box">
            <div class="title">
                <p>投注失败</p>
                <p><span>{{res.home_name}} vs {{res.away_name}}</span><span>{{res.startdate.substring(5,19)}}</span></p>
            </div>
            <div class="info">
                赔率已发生变化, 已停盘
            </div>
            <div class="button">
                <p>
                    <span>投注历史</span>
                    <span @click="goOn">继续投注</span>
                </p>
            </div>
        </div>
    </div>
    <div class="tzsb2 hidden">
        <div class="tz-box">
            <div class="title">
                <p>投注失败</p>
                <p><span>{{res.home_name}} vs {{res.away_name}}</span><span>{{res.startdate.substring(5,19)}}</span></p>
            </div>
            <div class="info">
                赔率已发生变化, 请重新投注
            </div>
            <div class="button">
                <p>
                    <span>投注历史</span>
                    <span @click="goOn">继续投注</span>
                </p>
            </div>
        </div>
    </div>
    <div class="pay hidden">
        <div class="pay-box">
            <div class="title">
                <span>支付方式</span>
                <img src="/themes/simpleboot3/public/assets/images/dianjing/close@.png" alt="">
            </div>
            <div class="info">
                <p>
                    <span>道具矿泉水</span>
                    <span>10RMB</span>
                    <span>赠送1000金币</span>
                </p>
                <p>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/zfb.png" alt="">
                    <span>支付宝支付</span>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/go.png" alt="">
                </p>
                <p>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/wechat.png" alt="">
                    <span>微信支付</span>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/go.png" alt="">
                </p>
                <p>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/dsf.png" alt="">
                    <span>第三方支付</span>
                    <img src="/themes/simpleboot3/public/assets/images/dianjing/go.png" alt="">
                </p>
            </div>
        </div>
    </div>
    <div class="notEnough hidden">
        <div class="n-box">
            <div>
                <img src="/themes/simpleboot3/public/assets/images/dianjing/pig.png" alt="">
                <p>您的金币不足,本次竞猜可购买</p>
                <p>({{payTitle}})×{{number}}道具获取<span>{{gNumber}}</span>金币</p>
            </div>
            <div>
                <span @click="cancel">我再想想</span>
                <span @click="get">立即获取</span>
            </div>
        </div>
    </div>
    <div class="notEnough1 hidden">
        <div class="n-box">
            <div>
                <img src="/themes/simpleboot3/public/assets/images/dianjing/pig.png" alt="">
                <p>金币不足,将消耗<span style="color: green;">{{diamond}}</span>钻石购买</p>
                <p>({{payTitle}})等道具 获取<span>{{diamond*100}}</span>金币</p>
            </div>
            <div>
                <span @click="cancel">我再想想</span>
                <span @click="get1">立即获取</span>
            </div>
        </div>
    </div>
    <div class="alert hidden">
        <div class="alert-box">
            <p></p>
            <p @click="box_close">关闭</p>
        </div>
    </div>
    <div class="alert2 hidden">
        <div class="alert-box">
            <p></p>
            <p @click="box_close">
                <span @click="recharge">去兑换</span>
                <span @click="box_close">关闭</span>
            </p>
        </div>
    </div>-->
</div>
<link rel="stylesheet" href="/static/js/layer/mobile/need/layer.css">
<script src="/static/js/layer/mobile/layer.js"></script>
<script>
    $(document).ready(function () {
        $('#wrapper').children().click(function () {
           var url = $(this).attr('url');
            window.location.href = url;
        });


        $('.bf-pl').click(function () {
            var id    = $(this).attr('selectid');
            var url   = "<?php echo cmf_url('Details/save'); ?>";
            var title1 = $(this).children().children().eq(0).text();
            var title2 = $(this).children().children().eq(1).text();

            layer.open({
                title: [
                    title1 +'@'+title2 ,
                    'background-color: rgba(36,36,36,0.9); color:#fff;'
                ],
                style: 'background-color:rgba(36,36,36,0.9); color:#fff; border:none;', //自定风格

                content: '<form action="'+url+'" method="post" class="js-ajax-form">' +
                '<div class="modal-body">' +
                '  <div class="form-group">' +
                '<label for="name">数量：</label>' +
                '<input class="form-control"  type="number" name="number"/>' +
                '</div>' +
                '<input  type="hidden" name="choice_id" value="'+id+'">' +
                '<button type="submit" id="submit" class="btn btn-primary js-ajax-submit" >投注</button>' +
                '</form>',
            });

        });

    })
</script>
<script src="/static/js/admin.js"></script>
</body>
</html>