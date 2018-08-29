<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"themes/admin_simpleboot3/admin\match_choice\index.html";i:1535437797;s:75:"E:\xampp\htdocs\thinkcmf\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/themes/admin_simpleboot3/public/assets/images/favicon.ico" type="image/x-icon">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo \think\Request::instance()->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a>竞猜列表</a></li>
        <li><a href="<?php echo url($controller.'/add'); ?>">添加竞猜</a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url($controller.'/index'); ?>">
        <!--参赛战队:
        <input type="text" class="form-control" name="name" style="width: 120px;" value="<?php echo input('request.name'); ?>" placeholder="请输入战队名称">-->
        <input type="submit" class="btn btn-primary" value="搜索" />
        <a class="btn btn-danger" href="<?php echo url($controller.'/index'); ?>">清空</a>
    </form>
    <form action="" method="post" class="margin-top-20">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th width="60">序号</th>
                <th width="10%">赛事编号</th>
                <th width="60">竞猜名称</th>
                <th width="60">局名称</th>
                <th width="60">竞选分组</th>
                <th width="60">竞选选项</th>
                <th width="60">赔率</th>
                <th width="60">结果</th>
                <th width="60">状态</th>
                <th width="150"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $vo['match_code']; ?></td>
                            <td><?php echo $vo['name']; ?></td>
                            <td><?php echo $vo['bureau_name']; ?></td>
                            <td><?php echo $vo['parent_name']; ?></td>
                            <td><?php echo $vo['choice_name']; ?></td>
                            <td><?php echo $vo['odds']; ?></td>
                            <td>
                                <?php switch($vo['choice']): case "1": ?>
                                        还未揭晓
                                        <span style="float: right">
                                             <a class="js-ajax-dialog-btn"
                                                data-msg="你确定中"
                                                href="<?php echo url($controller.'/update',array('id'=>$vo['id'],'choice'=>2)); ?>">中</a>
                                        <a class="js-ajax-dialog-btn"
                                           data-msg="你确定中"
                                           href="<?php echo url($controller.'/update',array('id'=>$vo['id'],'choice'=>3)); ?>">未中</a>
                                        </span>

                                    <?php break; case "2": ?>
                                        中
                                        <!--<span style="float: right">

                                        <a class="js-ajax-dialog-btn"
                                           data-msg="你确定中"
                                           href="<?php echo url($controller.'/choice',array('id'=>$vo['id'],'status'=>3)); ?>">未中</a>
                                        </span>-->

                                    <?php break; case "3": ?>
                                        未中
                                        <!--<span style="float: right">
                                             <a class="js-ajax-dialog-btn"
                                                data-msg="你确定中"
                                                href="<?php echo url($controller.'/choice',array('id'=>$vo['id'],'status'=>2)); ?>">中</a>

                                        </span>-->

                                    <?php break; default: ?>
                                    未知结果
                                <?php endswitch; ?>
                            </td>
                            <td>
                                <?php switch($vo['status']): case "1": ?>
                                        <?php echo lang('ENABLED'); break; case "2": ?>
                                        <?php echo lang('DISABLED'); break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                            </td>
                            <td>
                                <?php switch($vo['status']): case "1": ?>
                                        <a class="js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('DISABLED'); ?>"
                                           href="<?php echo url($controller.'/update',array('id'=>$vo['id'],'status'=>2)); ?>"><?php echo lang('DISABLED'); ?></a>
                                    <?php break; case "2": ?>
                                        <a class="js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('ENABLED'); ?>"
                                           href="<?php echo url($controller.'/update',array('id'=>$vo['id'],'status'=>1)); ?>"><?php echo lang('ENABLED'); ?></a>
                                    <?php break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                                <a href="<?php echo url($controller.'/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                                <a href="<?php echo url($controller.'/delete',array('id'=>$vo['id'])); ?>" class="js-ajax-delete">
                                    <?php echo lang('DELETE'); ?>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
    </form>
    <div class="pagination"><?php echo (isset($page) && ($page !== '')?$page:''); ?></div>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>