Vue.config.productionTip = false;
var mySwiper='';
var ws='';
var host="http://egame.leidata.com/wechat/Public/Esports/js/47.95.28.113";
var host="http://egame.leidata.com/wechat/Public/Esports/js/egame.leidata.com";
var index='';
var myDate = new Date();
var y1 = myDate.getFullYear();
var m1 = myDate.getMonth()+1;
var d1 = myDate.getDate();
var a =myDate.toLocaleDateString();
var y ='';
var m ='';
var curdays='';
var tardays='';
var vm = new Vue({
    el:'#body',
    data:{
        all:'',
        xzz:'',
        wzry:'',
        hon:'',
        smash:'',
        smite:'',
        wow:'',
        hearthstone:'',
        sc:'',
        sc2:'',
        cod:'',
        ow:'',
        hots:'',
        dota2:'',
        lol:'',
        csgo:'',
        away:'',
        away_id:'',
        away_logo:'',
        home:'',
        home_id:'',
        home_logo:'',
        score1:'',
        score2:'',
        series_id:'',
        short_title:'',
        start:'',
        status:'',
        tour_id:'',
        cj:'',
        info:'',
        msg:'',
        url:'',
        score_times:[]
    },
    created:function(){
        mySwiper = new Swiper('.swiper-container',{
            touchMoveStopPropagation : false,
            spaceBetween: 0,
            slidesPerView: 5
        });
        this.$nextTick(function () {
            $.ajax({
                type:"get",
                dataType:"json",
                url:"http://"+host+"/show/index.php/Eodds/Apiodds/getScheduleNew",
                success:function(data){
                    $(".all .load").hide();
                    if(data!=''){
                        vm.all=data;
                    }else {
                        vm.all=false;
                        $(".wzry .nogame").show()
                    }
                    vm.$nextTick(function () {
                        ws = new WebSocket("ws://47.95.28.113:8282");
                        ws.onopen = function(){
                            console.log("login.....");
                            ws.send('matchlist');
                        };
                        ws.onmessage = function(e){
                            if(e.data=='matchlist') {
                                console.log('On');
                            }
                            if(e.data!="matchlist"&&e.data.indexOf("login")==-1){
                                var ws=JSON.parse(e.data);
                                vm.all=ws.match;
                                vm.xzz=ws.num;
                            }
                        }
                    })
                }
            });
            $.ajax({
                type:"get",
                dataType:"json",
                url:"http://"+host+"/show/index.php/Eodds/Apiodds/getGameNum",
                success:function(data){
                    if(data!=''){
                        vm.xzz=data;
                        for(var x in vm.xzz){
                            vm.length++
                        }
                    }else {
                        vm.xzz=false;
                    }
                }
            });
        })
    },
    methods:{
        toggle:function (e) {
            index = $(e.target).parent("li").index()+1;
            // console.log(index);
            $(e.target).parent("li").addClass("cur").siblings("li").removeClass("cur");
            $("div.content-list:nth-child("+index+")").show().siblings(".content-list").hide();
            if(index==2){
                $(".header>div:nth-child(3)").hide();
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"http://"+host+"/show/index.php/Eodds/Apiodds/getScheduleNew?game_id=3319",
                    success:function(data){
                        $(".wzry .load").hide();
                        if(data!=""){
                            vm.wzry=data;
                            if(data == ''){
                                $(".wzry .nogame").show()
                            }
                        }else {
                            vm.wzry=false;
                            $(".wzry .nogame").show()
                        }
                    }
                })
            }else if(index==3){
                $(".header>div:nth-child(3)").hide();
                $.ajax({
                    type:"get",
                    url:"http://"+host+"/show/index.php/Eodds/Apiodds/getScheduleNew?game_id=3280",
                    dataType:"json",
                    success:function(data){
                        $(".lol .load").hide();
                        if(data){
                            vm.lol=data;
                            if(data == ''){
                                $(".lol .nogame").show()
                            }
                        }else {
                            vm.lol=false;
                        }
                    }
                });
            }else if(index==5){
                $(".header>div:nth-child(3)").hide();
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"http://"+host+"/show/index.php/Eodds/Apiodds/getScheduleNew?game_id=3286",
                    success:function(data){
                        $(".csgo .load").hide();
                        if (data!=""){
                            vm.csgo=data;
                            if(vm.csgo==''){
                                $(".csgo .nogame").show()
                            }
                        }else {
                            vm.csgo=false;
                        }
                    }
                })
            }
            else if(index==4){
                $(".header>div:nth-child(3)").hide();
                $.ajax({
                    type:"get",
                    dataType:"json",
                    url:"http://"+host+"/show/index.php/Eodds/Apiodds/getScheduleNew?game_id=3296",
                    success:function(data){
                        $(".dota2 .load").hide();
                        if(data!=''){
                            vm.dota2=data;
                            if(data==''){
                                $(".dota2 .nogame").show()
                            }
                        }else {
                            vm.dota2=false;
                        }
                    }
                })
            }else if(index==1){
                $(".all .load").hide();
                $(".header>div:nth-child(3)").show();
            }
        },
        select:function (e) {
            $(".pop").show();
            $(".game").hide();
            $(".pop").height($(window).height());
        },
        toggle_game:function (e) {
            if($(e.target).parent("li").hasClass("cur")){
                $(e.target).parent("li").removeClass("cur")
            }else {
                $(e.target).parent("li").addClass("cur")
            }
        },
        select_all:function () {
            $(".toggle li").addClass("cur");
            $(".select_all").addClass("cur");
            $(".not_select_all").removeClass("cur");
        },
        hide:function (e) {
            if($(e.target).attr('id')=="pop"){
                $(".pop").hide();
            }
        },
        not_select_all:function () {
            $(".toggle li").toggleClass("cur");
            $(".not_select_all").addClass("cur");
            $(".select_all").removeClass("cur");
        },
        sub:function () {
            $(".pop").hide();
            $(".game").show();
            $(".content-list .list").removeClass("hidden");
            $(".toggle li:not(.cur)").each(function(i,dom){
                var num=$(dom).attr("data-game-id");
                $(".content-list .list[data-game-id="+num+"]").addClass("hidden");
            });
        },
        jump:function (e,id) {
            window.location.href="http:///"+host+"/wechat/index.php/esports/listblack/gue_content_black?="+id
        },
        xj:function () {
            window.location.href="http://egame.leidata.com/show/index.php/home/Detail/showList"
        },
        close:function (e) {
            $(".gold").hide();
        },
        get:function (e) {
            $.ajax({
                type:"get",
                dataType:"JSON",
                url:"http://egame.leidata.com/show/index.php/Eodds/Give/giveMoney",
                success:function (data) {
                    if(data.code==1){
                        $(".g-bg").css("background","url('get@.png'/*tpa=http://egame.leidata.com/show/Public/img/get@.png*/)");
                        $(".g-bg").css("background-size","100% 100%");
                        $(".g-bg .get").hide()
                    }else if(data.code==0){
                        alert("领取失败")
                    }
                }
            })
        }
    },
    filters:{

    }
});