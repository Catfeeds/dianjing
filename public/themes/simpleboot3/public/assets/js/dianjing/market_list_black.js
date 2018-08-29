Vue.config.productionTip = false;

var minH =$(window).height()-294;
var vm = new Vue({
    el:'#body',
    data:{
        body:''
    },
    created:function () {

    },
    methods:{
        toggle:function (e) {
            $(e.target).addClass("cur").siblings(".cur").removeClass("cur");
            var index=$(e.target).index();
            $("div.list:nth("+index+")").show().siblings(".list").hide();
        }
    },
    filters:{}
});