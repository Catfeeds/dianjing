<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"themes/admin_simpleboot3/admin\match_choice\edit.html";i:1535437743;s:75:"E:\xampp\htdocs\thinkcmf\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
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
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo url($controller.'/index'); ?>">竞猜列表</a></li>
			<li><a  href="<?php echo url($controller.'/add'); ?>">添加竞猜</a></li>
			<li class="active"><a>编辑竞猜</a></li>
		</ul>
		<form method="post" class="form-horizontal js-ajax-form margin-top-20" action="<?php echo url($controller.'/editPost'); ?>">
			<input type="hidden" name="id" value="<?php echo $choice['id']; ?>">

			<div class="form-group">
				<label class="col-sm-2 control-label">
					名称
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" name="name" class="form-control" value="<?php echo $choice['name']; ?>" placeholder="请输入名称" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">
					赛事
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<select name="match_id" class="form-control" >
						<option value="">请选择</option>
						<?php if(!(empty($data) || (($data instanceof \think\Collection || $data instanceof \think\Paginator ) && $data->isEmpty()))): if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $vo['id']; ?>" <?php echo $vo['id']==$choice['match_id']?'selected':''; ?>>
								<?php echo $vo['match_code']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">
					分组
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<select name="choice_id" class="form-control" >
						<option value="">请选择</option>
						<?php echo $selectCategory; ?>
					</select>
				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-2 control-label">
					局
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<select name="bureau_id" class="form-control" >
						<option value="">请选择</option>
						<?php if(!(empty($bureau) || (($bureau instanceof \think\Collection || $bureau instanceof \think\Paginator ) && $bureau->isEmpty()))): if(is_array($bureau) || $bureau instanceof \think\Collection || $bureau instanceof \think\Paginator): $i = 0; $__LIST__ = $bureau;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $vo['id']; ?>" <?php echo $vo['id']==$choice['bureau_id']?'selected':''; ?>>
								<?php echo $vo['name']; ?>
								</option>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">
					赔率
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<input type="text" name="odds" class="form-control" placeholder="请输入赔率" value="<?php echo $choice['odds']; ?>" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">
					结果
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<select name="choice" class="form-control" >
						<option value="1" <?php echo $choice['choice']==1?'selected':''; ?>>未知</option>
						<option value="2" <?php echo $choice['choice']==2?'selected':''; ?>>中</option>
						<option value="3" <?php echo $choice['choice']==3?'selected':''; ?>>未中</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">
					状态
					<span class="form-required">*</span>
				</label>
				<div class="col-md-6 col-sm-10">
					<select name="status" class="form-control" >
						<option value="1" <?php echo $choice['status']==1?'selected':''; ?>><?php echo lang('ENABLED'); ?></option>
						<option value="2" <?php echo $choice['status']==2?'selected':''; ?>><?php echo lang('DISABLED'); ?></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('SAVE'); ?></button>
					<a class="btn btn-default" href="javascript:history.back(-1);"><?php echo lang('BACK'); ?></a>
				</div>
			</div>
		</form>
	</div>
	<script src="/static/js/admin.js"></script>
</body>

</html>