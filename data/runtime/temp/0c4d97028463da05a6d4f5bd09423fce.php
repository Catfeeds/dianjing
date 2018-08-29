<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"themes/admin_simpleboot3/admin\match\index.html";i:1535531485;s:75:"E:\xampp\htdocs\dianjing\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
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
        <li class="active"><a>比赛列表</a></li>
        <li><a href="<?php echo url('Match/add'); ?>">添加比赛</a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url('Match/index'); ?>">
        参赛战队:
        <input type="text" class="form-control" name="name" style="width: 120px;" value="<?php echo input('request.name'); ?>" placeholder="请输入战队名称">
        <input type="submit" class="btn btn-primary" value="搜索" />
        <a class="btn btn-danger" href="<?php echo url('Match/index'); ?>">清空</a>
    </form>
    <form action="" method="post" class="margin-top-20">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th width="15%">编号</th>
                <th width="15%">赛事类型</th>
                <th width="15%">甲方</th>
                <th width="5%">盘类型</th>
                <th width="15%">乙方</th>
                <th width="10%">开赛时间</th>
                <th width="5%">是否开赛</th>
                <th width="5%">是否直播</th>
                <th width="5%">是否开放</th>
                <th width="5%">状态</th>
                <th width="15%"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $vo['match_code']; ?></td>
                            <td><?php echo $vo['classify']; ?></td>
                            <td><img src="<?php echo $vo['Aicon']; ?>" alt="" width="50"><?php echo $vo['Aname']; ?></td>
                            <td><?php echo $vo['disc']; ?></td>
                            <td><img src="<?php echo $vo['Bicon']; ?>" alt="" width="50"><?php echo $vo['Bname']; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$vo['startTime']); ?></td>
                            <td>
                                <?php switch($vo['is_live']): case "1": ?>
                                        <a class="btn btn-danger js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('ENABLED'); ?>"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'is_live'=>2)); ?>">关闭</a>
                                    <?php break; case "2": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要关闭"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'is_live'=>1)); ?>"><?php echo lang('ENABLED'); ?></a>
                                    <?php break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                            </td>
                            <td>
                                <?php switch($vo['url_status']): case "1": ?>
                                        <a class="btn btn-danger js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('ENABLED'); ?>"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'url_status'=>2)); ?>">关闭</a>
                                    <?php break; case "2": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要关闭"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'url_status'=>1)); ?>"><?php echo lang('ENABLED'); ?></a>
                                    <?php break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                            </td>
                            <td>
                                <?php switch($vo['bet_num']): case "1": ?>
                                        <a class="btn btn-danger js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('ENABLED'); ?>"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'bet_num'=>2)); ?>"><?php echo lang('DISABLED'); ?></a>
                                    <?php break; case "2": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要<?php echo lang('DISABLED'); ?>"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'bet_num'=>1)); ?>"><?php echo lang('ENABLED'); ?></a>
                                    <?php break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                            </td>
                            <td>
                                <?php switch($vo['status']): case "0": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要进入下一阶段"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'status'=>1)); ?>">不可竞猜</a>
                                    <?php break; case "1": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要进入下一阶段"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'status'=>2)); ?>">可竞猜</a>
                                    <?php break; case "2": ?>
                                        <a class="btn btn-success js-ajax-dialog-btn"
                                           data-msg="你确定要进入下一阶段"
                                           href="<?php echo url('Match/update',array('id'=>$vo['id'],'status'=>3)); ?>">停止竞猜</a>
                                    <?php break; case "3": ?>
                                        已经结束
                                    <?php break; default: ?>
                                    未知状态
                                <?php endswitch; ?>
                            </td>

                            <td>
                                <a href="<?php echo url('Match/edit',array('id'=>$vo['id'])); ?>"><?php echo lang('EDIT'); ?></a>
                                <a href="<?php echo url('Match/delete',array('id'=>$vo['id'])); ?>" class="js-ajax-delete">
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