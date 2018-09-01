<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"themes/admin_simpleboot3/admin\main\index.html";i:1535785022;s:75:"E:\xampp\htdocs\dianjing\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
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
<link rel="stylesheet" href="/themes/admin_simpleboot3/public/assets/morris/morris-0.4.3.min.css">
<link rel="stylesheet" href="/themes/admin_simpleboot3/public/assets/css/custom-styles.css">
</head>
<?php 
    \think\Hook::listen('admin_before_head_end',$temp5b8a3840a09cb,null,false);
 ?>
</head>
<body style="background-color: #E5EBF2">
<div class="wrap">
    <?php if(empty($has_smtp_setting) || (($has_smtp_setting instanceof \think\Collection || $has_smtp_setting instanceof \think\Paginator ) && $has_smtp_setting->isEmpty())): ?>
        <div class="grid-item col-md-12">
            <div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>提示!</strong> 邮箱配置未完成,无法进行邮件发送!
                <a href="#" data-dismiss="alert" aria-label="Close"
                   onclick="parent.openapp('<?php echo cmf_url('Mailer/index'); ?>','admin_mailer_index','邮箱配置');">现在设置</a>
            </div>
        </div>
    <?php endif; ?>

    <div id="page-inner">



        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <h3>8,457</h3>
                    </div>
                    <div class="panel-footer back-footer-green">
                        日常访问

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                    <div class="panel-body">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <h3>52,160 </h3>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        销售额

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-red">
                    <div class="panel-body">
                        <i class="fa fa fa-comments fa-5x"></i>
                        <h3>15,823 </h3>
                    </div>
                    <div class="panel-footer back-footer-red">
                        评论

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-body">
                        <i class="fa fa-users fa-5x"></i>
                        <h3><?php echo $data['user']; ?> </h3>
                    </div>
                    <div class="panel-footer back-footer-brown">
                        会员

                    </div>
                </div>
            </div>
        </div>


        <div class="row">


            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        条形图示例
                    </div>
                    <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        甜甜圈图表示例
                    </div>
                    <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        任务面板
                    </div>
                    <div class="panel-body">
                        <div class="list-group">

                            <a href="#" class="list-group-item">
                                <span class="badge">7 minutes ago</span>
                                <i class="fa fa-fw fa-comment"></i> Commented on a post
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">16 minutes ago</span>
                                <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">36 minutes ago</span>
                                <i class="fa fa-fw fa-globe"></i> Invoice 653 has paid
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">1 hour ago</span>
                                <i class="fa fa-fw fa-user"></i> A new user has been added
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">1.23 hour ago</span>
                                <i class="fa fa-fw fa-user"></i> A new user has added
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">yesterday</span>
                                <i class="fa fa-fw fa-globe"></i> Saved the world
                            </a>
                        </div>
                        <div class="text-right">
                            <a href="#">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        响应表示例
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email ID.</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>John15482</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kimsila</td>
                                    <td>Marriye</td>
                                    <td>Kim1425</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rossye</td>
                                    <td>Nermal</td>
                                    <td>Rossy1245</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Richard</td>
                                    <td>Orieal</td>
                                    <td>Rich5685</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Jacob</td>
                                    <td>Hielsar</td>
                                    <td>Jac4587</td>
                                    <td>name@site.com</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Wrapel</td>
                                    <td>Dere</td>
                                    <td>Wrap4585</td>
                                    <td>name@site.com</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
        <footer>
            <p>

            </p>
        </footer>
    </div>



</div>
<script src="/static/js/admin.js"></script>
<script src="/themes/admin_simpleboot3/public/assets/js/jquery.metisMenu.js"></script>
<script src="/themes/admin_simpleboot3/public/assets/morris/morris.js"></script>
<script src="/themes/admin_simpleboot3/public/assets/morris/raphael-2.1.0.min.js"></script>
<script src="/themes/admin_simpleboot3/public/assets/js/custom-scripts.js"></script>
<?php 
    \think\Hook::listen('admin_before_body_end',$temp5b8a3840a09cb,null,false);
 ?>
</body>
