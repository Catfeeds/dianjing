Vue.config.productionTip = false;
var host="egame.leidata.com";
var str=window.location.href;
var minH =$(window).height()-294;
var id =str.split('?')[1].substring(1);
var index =str.split('?index=')[1];
// console.log(index);
var pl ='';
var num = 0;
var title='';
$("#input").focus(function(){
    $(".touz li").removeClass('cur')
});
var vm = new Vue({
    el:'#body',
    data:{
        all:"",
        map1:"",
        map2:"",
        map3:"",
        map4:"",
        map5:"",
        map6:"",
        map7:"",
        res:'',
        monny:'',
        value:'',
        odds_title:'',
        market_status:'',
        market_id:'',
        umonny:'',
        title:'',
        income:'',
        pause:'',
        change:'',
        index:'',
        gold:'',
        user_diamond:'',
        pop_odds:'',
        pop_name:'',
        betid:'',
        goldInput:'',
        accept:'2',
        sub:''

    },
    created:function () {
        $.ajax({
            type:"get",
            dataType:"json",
            url:"http://"+host+"/show/index.php/Eodds/Apiodds/getMarketRound?event_id="+id,
            success:function (data) {
                if(data){
                    vm.index=index;
                    vm.all=data[id].mapall;
                    vm.map1=data[id].map1;
                    vm.map2=data[id].map2;
                    vm.map3=data[id].map3;
                    vm.map4=data[id].map4;
                    vm.map5=data[id].map5;
                    vm.map6=data[id].map6;
                    vm.map7=data[id].map7;
                    vm.res = data.res;
                }else {
                    vm.all=false;
                }
                vm.$nextTick(function () {
                        title=vm.res.home_name+" vs "+vm.res.away_name+" "+vm.res.tour_name;
                        $("title").text(title);
                        mySwiper = new Swiper('.swiper-container',{
                            touchMoveStopPropagation : false,
                            spaceBetween: 0,
                            slidesPerView: 6,
                            observer:true,
                            observeParents:true
                        });

                        if($(".swiper-slide").length==1){
                            $(".swiper-slide:first-child").css("border-radius","2px 2px 2px 2px");
                            $(".swiper-slide:first-child").addClass("cur");
                        }else {
                            $(".swiper-slide:first-child").addClass("cur");
                            $(".swiper-slide").css("border-left","none");
                            $(".swiper-slide:first-child").css("border-left","1px solid #ebebeb");
                            $(".swiper-slide:first-child").css("border-radius","2px 0 0 2px");
                            $(".swiper-slide:last-child").css("border-radius","0 2px 2px 0");
                        }
                        $(".content").hide();
                        $(".content:first-child").show();
                        $(".content").css("min-height",$(window).height()-294);

                        ws = new WebSocket("ws://47.95.28.113:8282");
                        ws.onopen = function(){
                            console.log("login.....");
                            // ws.send('live_'+id);
                            ws.send('live_'+id);
                        };
                        ws.onmessage = function(e){
                            if(e.data=='live_'+id)
                            {
                                console.log('On');
                            }
                            if(e.data!="live_"+id&&e.data.indexOf("login")==-1){
                                var ws=JSON.parse(e.data);
                                vm.res=ws.res;
                                vm.all=ws[id].mapall;
                                vm.map1=ws[id].map1;
                                vm.map2=ws[id].map2;
                                vm.map3=ws[id].map3;
                                vm.map4=ws[id].map4;
                                vm.map5=ws[id].map5;
                                vm.map6=ws[id].map6;
                                vm.map7=ws[id].map7;
                                vm.change=ws.change;
                                // console.log(vm.change);
                                if(!(vm.all)){
                                    $(".all").hide();
                                }else{
                                    $(".all").show();
                                }
                                if(!(vm.map1)){
                                    $(".map1").hide();
                                }else{
                                    $(".map1").show();
                                }
                                if(!(vm.map2)){
                                    $(".map2").hide();
                                }else{
                                    $(".map2").show();
                                }
                                if(!(vm.map3)){
                                    $(".map3").hide();
                                }else{
                                    $(".map3").show();
                                }
                                if(!(vm.map4)){
                                    $(".map4").hide();
                                }else{
                                    $(".map4").show();
                                }
                                if(!(vm.map5)){
                                    $(".map5").hide();
                                }else{
                                    $(".map5").show();
                                }
                                if(!(vm.map6)){
                                    $(".map6").hide();
                                }else{
                                    $(".map6").show();
                                }
                                if(!(vm.map7)){
                                    $(".map7").hide();
                                }else {
                                    $(".map7").show();
                                }
                                $(vm.change).each(function (i,x) {
                                    // $("li[data-odds_id=" + x.odds_id + "]").attr("data-id",x.pause);
                                    // var pause = $("li[data-odds_id=" + x.odds_id + "]").attr("data-id");
                                    if(x.pause==0){
                                        // $("#fling[data-odds_id="+x.odds_id+"] .f-f .touz").show();
                                        // $("#fling[data-odds_id="+x.odds_id+"] .f-f .copy").hide();
                                        // var num = $("#fling[data-odds_id="+x.odds_id+"] #form input").text();//鑾峰彇value鍊�
                                        // console.log(num);
                                        // $("#fling[data-odds_id="+x.odds_id+"] .f-b .right p").html(num*x.odds_value_80);
                                        // console.log(x.odds_value_80);
                                        $("#fling[data-odds_id="+x.odds_id+"] #form p").css("background","#e0e000");
                                        $("#fling[data-odds_id="+x.odds_id+"] #form p").css("color","#333");
                                        $("#fling[data-odds_id="+x.odds_id+"] #form p").text(x.odds_value_80);

                                        $("#fling[data-odds_id="+x.odds_id+"] .cue").show();
                                        $("#fling[data-odds_id="+x.odds_id+"] .cue span").text("鎮ㄦ墍閫夌殑鎶曟敞璧旂巼鎴栨湁鏁堟€у凡缁忎骇鐢熶簡鍙樺寲");
                                        $("#fling[data-odds_id="+x.odds_id+"] .cue span").css("color","#fff");
                                        $("#fling[data-odds_id="+x.odds_id+"] .cue img").show();
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-h p").css("color","#fff");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-b .left p").css("color","#fff");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-b .right>p").css("color","#fff");
                                        $("#fling[data-odds_id="+x.odds_id+"] .touz li").css("color","#fff");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f .sub1").show();
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f .sub2").hide();
                                    }else if(x.pause==1){
                                        $("#fling[data-odds_id="+x.odds_id+"] #form p").css("background","#474747");
                                        $("#fling[data-odds_id="+x.odds_id+"] #form p").text(x.odds_value_80);
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-h p").css("color","#666");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-b span p").css("color","#666");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f p").css("color","#666");
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f ul li").css("color","#666");
                                        // $("#fling[data-odds_id="+x.odds_id+"] .f-f .touz").hide();
                                        // $("#fling[data-odds_id="+x.odds_id+"] .f-f .copy").show();
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f .sub1").hide();
                                        $("#fling[data-odds_id="+x.odds_id+"] .f-f .sub2").show();
                                    }
                                });

                            }
                        }
                    }
                )
            }
        })
    },
    methods:{
        toggle:function (e) {
            if($(e.target).is("li")){
                var text = $(e.target).text();
                $(e.target).addClass("cur").siblings("li").removeClass("cur");
                if(text=="鍏ㄥ満"){
                    $(".content").hide();
                    $(".all").show();
                }else if(text=="绗竴灞€"){
                    $(".content").hide();
                    $(".map1").show();
                }else if(text=="绗簩灞€"){
                    $(".content").hide();
                    $(".map2").show();
                }else if(text=="绗笁灞€"){
                    $(".content").hide();
                    $(".map3").show();
                }else if(text=="绗洓灞€"){
                    $(".content").hide();
                    $(".map4").show();
                }else if(text=="绗簲灞€"){
                    $(".content").hide();
                    $(".map5").show();
                }else if(text=="绗叚灞€"){
                    $(".content").hide();
                    $(".map6").show();
                }else if(text=="绗竷灞€"){
                    $(".content").hide();
                    $(".map7").show();
                }
            }
        },
        toggle_num:function (e) {
            var cur = $(e.target).index()+1;
            $(e.target).addClass("cur").siblings("li").removeClass("cur");
            if(cur==1){
                num+=1000;
                vm.monny=num;
                $("#input").val(vm.monny);
            }else if(cur==2){
                num+=10000;
                vm.monny=num;
                $("#input").val(vm.monny);
            }else if(cur==3){
                num+=100000;
                vm.monny=num;
                $("#input").val(vm.monny);
            }else if(cur==4){
                num=0;
                vm.monny=0;
                $("#input").val("");
            }
            vm.income=parseInt($(".right form p").text()*vm.monny);
            // vm.monny =$(e.target).text();
            // vm.income=parseInt($(".right form p").text()*vm.monny);
            // $("#input").val(vm.monny);
            // $("#input").css("color","#fff")
            // $(".content:nth-child("+cur+")").show().siblings("li").hide();
        },
        fling:function (e) {
            $.ajax({
                type:"get",
                dataType:"JSON",
                url:"http://egame.leidata.com/leidaesports/index.php/User/Index",
                success:function (data) {
                    var info=data.info;
                    var msg=data.msg;
                    var url=data.url;
                    if(info=="needpay"){
                        window.location.href="http://egame.leidata.com/show/index.php/home/listblack/login_black"
                    }else {
                        $(".touz").find("li").removeClass("cur");
                        $("#input").val(" ");
                        $("#fling #form p").css("background","#333");
                        $(".f-f>p:last-child").hide();
                        num=0;
                        vm.monny=0;
                        vm.income="0";
                        // $("#input").keyup(function () {
                        //     vm.income=parseInt($("#input").val()*$("#form p").text());
                        // })
                        $.ajax({
                            type:"get",
                            dataType:"json",
                            url:"http://egame.leidata.com/show/index.php/Eodds/Apiodds/getAmount",
                            success:function (data) {
                                if(data){
                                    vm.umonny=data.amount;
                                    // console.log(vm.umonny);
                                }else {
                                    vm.umonny=false;
                                }
                            }
                        });
                        vm.market_status =$(e.target).parent().attr("data-market_status");
                        vm.market_id = $(e.target).parent().attr("data-market_id");
                        vm.odds_id = $(e.target).parent().attr("data-odds_id");
                        var text = $(e.target).parent().parent().parent().find(".num").text();
                        $(".fling .f-h p").text(text);
                        $(".fling").attr("data-odds_id",vm.odds_id); //缁欐姇娉ㄥ脊绐楀姞id
                        vm.value =$(e.target).parent().children("p:last-child").text(); //鑾峰彇鎶曟敞璧旂巼;
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-h p").css("color","#fff");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-b .right form p").text(vm.value); //娓叉煋绐楀彛璧旂巼
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-b .right form p").css("color","#e0e000");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-b .left p").css("color","#fff");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-b .right>p").css("color","#fff");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-f ul li").css("color","#fff");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-f p").css("color","#fff");
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-f .sub1").show();
                        $("#fling[data-odds_id="+vm.odds_id+"] .f-f .sub2").hide();
                        vm.odds_title =$(e.target).parent().children("p:first-child").text();
                        // vm.title = $(e.currentTarget).parent().siblings(".num").text();
                        // $(".fling .f-h p").text(vm.title);
                        vm.pause = $(e.currentTarget).attr("data-id");
                        $(".fling").fadeIn("fast");
                        $(".fling").height($(window).height());
                    }
                }
            })
        },
        //鏂板脊绐�
        pop:function (e,id) {
            //閫変腑棰滆壊
            if($(e.target).is("li")){
                $(e.target).addClass("cur").siblings("li").removeClass("cur");
            }else if($(e.target).parent().is("li")){
                // console.log(1);
                // $(e.target).parent().parent().addClass('cur').siblings('li').removeClass('cur');
                vm.pop_odds=$(e.target).parent().children("p:last").text();
                vm.pop_name=$(e.target).parent().children("p:first").text();
                vm.betid=id;
                console.log(vm.betid);
            }else if($(e.target).is("li")){
                // $(e.target).parent().addClass('cur').siblings('li').removeClass('cur');
                vm.pop_odds=$(e.target).children("span:last").text();
                vm.pop_name=$(e.target).children("span:first").text();
                vm.betid=id;
            }
            $.ajax({
                type:"get",
                dataType:"json",
                url:"http://egame.leidata.com/leidaesports/index.php/User/Index",
                success:function (data) {
                    var info=data.info;
                    var msg=data.msg;
                    var url=data.url;
                    // console.log(info);
                    if(info=="needpay"){
                        window.location.href="http://egame.leidata.com/show/index.php/home/listblack/login_black"
                    }else {
                        vm.gold=data.data.gold;
                        vm.user_diamond=data.data.diamond;
                        $(".pop").fadeIn(300);
                    }
                }
            })
        },
        // 鏂伴敭鐩�
        getNum:function (e) {
            var all='';
            var num='';
            all = $(".gold-v").text();
            if($(e.target).text()=="鐧�"){
                if(all==''){
                }else {
                    num ="00";
                    vm.goldInput = all+num;
                }
            }else if($(e.target).text()=="鍗�"){
                if(all==''){
                }else {
                    num ="000";
                    vm.goldInput = all+num;
                }
            }else if($(e.target).text()=="涓�"){
                if(all==''){
                }else {
                    num ="0000";
                    vm.goldInput = all+num;
                }
            }else if($(e.target).text()=="鍗佷竾"){
                if(all==''){
                }else {
                    num ="00000";
                    vm.goldInput = all+num;
                }
            } else if($(e.target).text()==0){
                if(all==''){
                }else {
                    num ="0";
                    vm.goldInput = all+num;
                }
            }else if($(e.target).text()=="鏈€楂樻姇娉�"){
                // console.log(vm.gold);
                $(".embed").hide();
                vm.goldInput=vm.gold;
            }else if($(e.target).text()=="娓呴櫎"){
                vm.goldInput ="";
                $(".embed").show();
            }else if($(e.target).text()==1||2||3||4||5||6||7||8||9||0){
                num = $(e.target).text();
                vm.goldInput = all+num;
                $(".embed").hide();
            }
            var num=vm.pop_odds * vm.goldInput;
            vm.sub=(num*100).toFixed(2)/100;
        },
        //鏂版彁浜�
        submit:function () {
            console.log(vm.accept);
            console.log(vm.goldInput);
            console.log(vm.pop_odds);
            console.log(vm.betid);
            $.ajax({
                type:'post',
                dataType:"json",
                url:"http://egame.leidata.com/show/index.php/Eodds/Apiodds/getpay",
                data:{"accept":vm.accept,"money":vm.goldInput,"odds":vm.pop_odds,"odds_id":vm.betid},
                success:function (data) {
                    if(vm.goldInput==''){
                        alert("璇疯緭鍏ラ噾甯�")
                    }else{
                        if(data.code==0){
                            // $(".tzsb1").fadeIn()
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data.info);
                        }else if(data.code==1){
                            // $(".tzcg").fadeIn()
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data.msg);
                        }else if(data.code==2){
                            // $(".tzsb2").fadeIn()
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data.msg);
                        }else if(data.code==3){
                            $(".alert2").show();
                            // console.log(data.msg);
                            $(".alert2 .alert-box p:first-child").text(data.msg);
                            // var cost = vm.goldInput - vm.gold;
                            // vm.diamond=Math.ceil(cost/100);//灏嗘秷鑰楃殑閽荤煶
                            // if(vm.user_diamond>vm.diamond){
                            //     // 娑堣€楅捇鐭冲脊绐�
                            //     $.ajax({
                            //         type: "get",
                            //         dataType: "json",
                            //         url: "http://soccer.leidata.com/h5/index.php/Pay/order/instant_order?cost=" + vm.diamond,
                            //         success: function (data) {
                            //             vm.payTitle=data.title;
                            //             vm.number = Math.ceil(vm.diamond / data.pay_zs);
                            //             vm.pay_rmb = vm.number*data.pay_zs;
                            //             vm.gNumber = vm.pay_rmb* data.get; //閲戝竵鏁伴噺
                            //             $(".notEnough1").fadeIn();
                            //         }
                            //     });
                            // }else{
                            //     $.ajax({
                            //         type:"get",
                            //         dataType:"json",
                            //         url:"http://soccer.leidata.com/h5/index.php/Pay/order/instant_order?cost="+cost,
                            //         success:function (data) {
                            //             vm.payTitle=data.title;
                            //             vm.popid= data.id;
                            //             vm.number = Math.ceil(cost / data.get); //閬撳叿鏁伴噺;
                            //             vm.gNumber = vm.number* data.get; //閲戝竵鏁伴噺
                            //             vm.pay_rmb = vm.number* data.pay_rmb; //rmb
                            //             vm.good = data.title; //鍟嗗搧
                            //             vm.desc = data.desc; //鍟嗗搧淇℃伅
                            //             $(".n-box>div:first-child>p:first-child").text("鎮ㄧ殑閲戝竵涓嶈冻,鏈绔炵寽鍙喘涔�");
                            //             $(".notEnough").fadeIn();
                            //         }
                            //     });
                            // }
                        }else if(data.code==9){
                            // alert(data.msg)
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data.msg);
                        }else if(data.code==8){
                            alert("璇疯緭鍏ユ姇娉ㄩ噺")
                        }
                    }
                }
            })
        },
        //缁х画
        goOn:function () {
            $(".pop").fadeOut();
            $(".tzcg").fadeOut();
            $(".tzsb1").fadeOut();
            $(".tzsb2").fadeOut();
            $(".odds>ul>li").removeClass("cur");
            $(".embed").show();
            vm.goldInput='';
            vm.sub=''
        },
        //鍘嗗彶
        guess_hist:function () {
            window.location.href="http://egame.leidata.com/show/index.php/home/listblack/my_guess_black"
        },
        odds_change:function (e) {
            if($(e.target).attr("class")=="ok"){
                $(e.target).attr("src","/show/Public/img/ok@.png");
                $(e.target).attr("class","ok@");
                vm.accept=1;
            }else{
                $(e.target).attr("src","/show/Public/img/ok.png");
                $(e.target).attr("class","ok");
                vm.accept=2;
            }
        },
        box_close:function () {
            $.ajax({
                type:"get",
                dataType:"json",
                url:"http://egame.leidata.com/leidaesports/index.php/User/Index",
                success:function (data) {
                    vm.gold=data.data.gold;
                    $(".alert").hide();
                    $(".alert2").hide();
                    vm.goldInput ="";
                    $(".embed").show();
                    $(".pop").hide();
                }
            })
        },
        close:function () {
            $(".fling").hide()
        },
        new_close:function (e) {
            if($(e.target).attr("class")=="pop hidden"){
                $(".pop").fadeOut();
                $(".odds>ul>li").removeClass("cur");
                vm.goldInput='';
                vm.sub=''
            }else if($(e.target).attr("class")=="close"){
                $(".pop").fadeOut();
                $(".odds>ul>li").removeClass("cur");
                vm.goldInput='';
                vm.sub='';
                $(".embed").show();
            }
        },
        hide:function (e) {
            if($(e.target).attr('id')=="fling"){
                $("#fling").hide();
            }
        },
        sub1:function () {
            if(vm.income==0){
                $(".alert").show();
                $(".alert .alert-box p:first-child").text("璇疯緭鍏ユ姇娉ㄩ噾棰�");
            }else {
                console.log(vm.monny);
                if(parseFloat(vm.monny)<=parseFloat(vm.umonny)){
                    $.ajax({
                        url : "http://egame.leidata.com/show/index.php/Eodds/Apiodds/getPay",
                        type : "POST",
                        data :{
                            "odds_value":vm.value,"market_status":vm.market_status,"market_id":vm.market_id,"monny":vm.monny,"odds_id":vm.odds_id
                        },
                        success : function(data) {
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data);
                        }
                    });
                }else{
                    $(".alert2").show();
                    $(".alert2 .alert-box p:first-child").text("閲戝竵涓嶈冻璇峰厬鎹�");
                }
            }
            $(".fling").hide()
        },
        sub2:function () {
            console.log(1);
            console.log(vm.goldInput);
            if(vm.goldInput==''){
                $(".alert").show();
                $(".alert .alert-box p:first-child").text("璇疯緭鍏ユ姇娉ㄩ噾棰�");
            }else {
                var cost = vm.goldInput - vm.gold;
                vm.diamond=Math.ceil(cost/100);//灏嗘秷鑰楃殑閽荤煶
                if(vm.goldInput<vm.gold){
                    $.ajax({
                        url : "http://egame.leidata.com/show/index.php/Eodds/Apiodds/getPay",
                        type : "POST",
                        data :{
                            "odds_value":vm.pop_odds,"market_status":vm.accept,"market_id":vm.market_id,"monny":vm.goldInput,"odds_id":vm.betid
                        },
                        success : function(data) {
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data);
                        }
                    });
                }else{
                    $(".alert2").show();
                    $(".alert2 .alert-box p:first-child").text("閲戝竵涓嶈冻璇峰厬鎹�");
                }
            }
            $(".fling").hide()
        },
        sub:function () {
            if(vm.income==0){
                $(".alert").show();
                $(".alert .alert-box p:first-child").text("璇疯緭鍏ユ姇娉ㄩ噾棰�");
            }else {
                console.log(vm.monny);
                if(parseFloat(vm.monny)<=parseFloat(vm.umonny)){
                    $.ajax({
                        url : "http://egame.leidata.com/show/index.php/Eodds/Apiodds/getPay",
                        type : "POST",
                        data :{
                            "odds_value":vm.value,"market_status":vm.market_status,"market_id":vm.market_id,"monny":vm.monny,"odds_id":vm.odds_id
                        },
                        success : function(data) {
                            $(".alert").show();
                            $(".alert .alert-box p:first-child").text(data);
                        }
                    });
                }else{
                    $(".alert2").show();
                    $(".alert2 .alert-box p:first-child").text("閲戝竵涓嶈冻璇峰厬鎹�");
                }
            }
            $(".fling").hide()
        },
        live:function () {
            $("#banner-score").hide();
            $("#live").show();
        },
        recharge:function () {
            window.location.href="http://egame.leidata.com/wechat/index.php/esports/listblack/change_black";
        },
        cz:function () {
            window.location.href="https://egame.leidata.com/leidaesports/mppay.php";
        }
    },
    filters:{}
});