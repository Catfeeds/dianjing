<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"themes/admin_simpleboot3/admin\game\index.html";i:1534587783;s:75:"E:\xampp\htdocs\thinkcmf\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
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
        <li class="active"><a><?php echo $title; ?></a></li>
    </ul>
    <form class="well form-inline margin-top-20" method="post" action="<?php echo url($controller.'/index'); ?>">
        名称:
        <input type="text" class="form-control" name="name" style="width: 120px;" value="<?php echo input('request.name'); ?>" placeholder="请输入名称">
        <input type="submit" class="btn btn-primary" value="搜索" />
        <a class="btn btn-danger" href="<?php echo url($controller.'/index'); ?>">清空</a>
        <span style="float:right">
               <a class="btn btn-success"  href='javaScript:' id="add">
                   添加<?php echo $title; ?>
               </a>
        </span>
    </form>
    <form action="" method="post" class="margin-top-20">
        <table class="table table-hover table-bordered">
            <thead>
            <tr class="success">
                <th width="10%">序号</th>
                <th width="15%">名称</th>
                <th width="15%">图标</th>
                <th width="15%">创建时间</th>
                <th width="15%">状态</th>
                <th width="15%"><?php echo lang('ACTIONS'); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr class="danger">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $vo['name']; ?></td>
                            <td><img src="<?php echo $vo['icon']; ?>" alt="" width="70" height="70"></td>
                            <td><?php echo date('Y-m-d H:i:s',$vo['time']); ?></td>
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
                                <a href="javaScript:"  name="change"><?php echo lang('EDIT'); ?></a>
                                <a href="<?php echo url($controller.'/delete',array('id'=>$vo['id'])); ?>" class="js-ajax-delete">
                                    <?php echo lang('DELETE'); ?>
                                </a>
                            </td>
                            <input type="hidden" value="<?php echo $vo['id']; ?>">
                        </tr>

                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
    </form>
    <div class="pagination"><?php echo (isset($page) && ($page !== '')?$page:''); ?></div>
</div>


<!--添加弹窗-->
<div class="modal fade"  id="myModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel">

    <div class="modal-dialog"
         role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                        aria-hidden="true">×</span></button>

                <h4 class="modal-title">添加<?php echo $title; ?></h4>

            </div>

            <form action="<?php echo url($controller.'/addPost'); ?>" method="post" class="js-ajax-form">

                <div class="modal-body">

                    <div class="form-group">

                        <label for="name">名称</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               id="name"
                               placeholder="名称" required>

                    </div>
                    <div class="form-group danger">

                        <label for="icon">图标</label>

                        <input type="hidden" class="form-control" id="icon" name="icon" required>
                        <a href="javascript:uploadOneImage('图片上传','#icon');">
                            <img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
                                 id="icon-preview"
                                 width="70" style="cursor: pointer;background-color: yellow"/>
                        </a>

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-default"  data-dismiss="modal">
                        <!--<span
                            class="glyphicon glyphicon-remove"  aria-hidden="true"></span>-->
                        关闭</button>
                    <button type="submit"
                            class="btn btn-primary  js-ajax-submit" >
							<span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true">

							</span>
                        添加
                    </button>

                </div>

            </form>


        </div>

    </div>

</div>
<!--添加弹窗-->


<!--修改弹窗-->
<div class="modal fade"  id="myModal2"
     tabindex="-1"
     role="dialog"
     aria-labelledby="myModalLabel">

    <div class="modal-dialog"
         role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                        aria-hidden="true">×</span></button>

                <h4 class="modal-title">修改<?php echo $title; ?></h4>

            </div>

            <form action="<?php echo url($controller.'/editPost'); ?>" method="post" class="js-ajax-form">
                <input type="hidden" name="id" id="payment_id">
                <div class="modal-body">

                    <div class="form-group">

                        <label for="payment_name">名称</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               id="payment_name"
                               placeholder="名称">

                    </div>
                    <div class="form-group">

                        <label for="icon">图标</label>

                        <input type="hidden" class="form-control" id="change" name="icon" required>
                        <a href="javascript:uploadOneImage('图片上传','#change');">
                            <img src="/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png"
                                 id="change-preview"
                                 width="70" style="cursor: pointer;background-color: yellow"/>
                        </a>

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-default"  data-dismiss="modal">
                        <!--<span
                            class="glyphicon glyphicon-remove"  aria-hidden="true"></span>-->
                        关闭</button>
                    <button type="submit"
                            class="btn btn-primary  js-ajax-submit" >
							<span class="glyphicon glyphicon-floppy-disk"  aria-hidden="true">

							</span>
                        修改
                    </button>

                </div>

            </form>


        </div>

    </div>

</div>
<!--修改弹窗-->
<script src="/static/js/admin.js"></script>

<script>
    $("#add").click(function () {
        $('#myModal').modal();
    });

    $('[name="change"]').click(function () {
        var thisTd =  $(this).parent();
        $('#payment_id').val(thisTd.next().val());
        $('#payment_name').val(thisTd.parent().children().eq(1).text());
        var img = thisTd.parent().children().eq(2).children().eq(0).prop('src');
        $('#change').val(img);
        $('#change-preview').prop('src',img);
        $('#myModal2').modal();
    });
</script>
</body>
</html>