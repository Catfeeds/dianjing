<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"themes/admin_simpleboot3/admin\goods\edit.html";i:1534415861;s:75:"E:\xampp\htdocs\thinkcmf\public\themes\admin_simpleboot3\public\header.html";i:1534389699;}*/ ?>
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
			<li><a href="<?php echo url('Goods/index'); ?>">商品列表</a></li>
			<li><a href="<?php echo url('Goods/add'); ?>">添加商品</a></li>
			<li class="active"><a>编辑商品</a></li>
		</ul>
		<form method="post" class="form-horizontal js-ajax-form margin-top-20" action="<?php echo url('Goods/editPost'); ?>">
			<div class="form-group">
				<label for="thumbnail" class="col-sm-2 control-label">图像<span class="form-required">*</span></label>
				<div class="col-md-6 col-sm-10">
					<input type="hidden" class="form-control" id="thumbnail" name="img" required value="<?php echo $data['img']; ?>">
					<a href="javascript:uploadOneImage('图片上传','#thumbnail');">
						<img src="<?php echo empty($data['img'])?'/themes/admin_simpleboot3/public/assets/images/default-thumbnail.png':$data['img']; ?>"
							 id="thumbnail-preview"
							 width="135" style="cursor: pointer"/>
					</a>
				</div>
			</div>
			<div class="form-group">
				<label for="input-title" class="col-sm-2 control-label">名称<span class="form-required">*</span></label>
				<div class="col-md-6 col-sm-10">
					<input type="text" class="form-control" id="input-title" name="name" required value="<?php echo $data['name']; ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="input-ratio" class="col-sm-2 control-label">价格<span class="form-required">*</span></label>
				<div class="col-md-6 col-sm-10">
					<input type="number" class="form-control" id="input-ratio" name="price"  required value="<?php echo $data['price']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-ratio_id" class="col-sm-2 control-label">币值<span class="form-required">*</span></label>
				<div class="col-md-6 col-sm-10">
					<select class="form-control" name="currency_id" id="input-ratio_id" required>
						<?php if(!(empty($ratio_id) || (($ratio_id instanceof \think\Collection || $ratio_id instanceof \think\Paginator ) && $ratio_id->isEmpty()))): if(is_array($ratio_id) || $ratio_id instanceof \think\Collection || $ratio_id instanceof \think\Paginator): $i = 0; $__LIST__ = $ratio_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $vo['id']; ?>" <?php echo $data['currency_id']==$vo['id']?'selected' : ''; ?>>
									<?php echo $vo['title']; ?>
								</option>
							<?php endforeach; endif; else: echo "" ;endif; else: ?>
							<option value="">你还未添加</option>
						<?php endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="input-stock" class="col-sm-2 control-label">库存<span class="form-required">*</span></label>
				<div class="col-md-6 col-sm-10">
					<input type="number" class="form-control" id="input-stock" name="stock" value="<?php echo $data['stock']; ?>"  required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
					<button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('SAVE'); ?></button>
					<a class="btn btn-default" href="<?php echo url('Goods/index'); ?>"><?php echo lang('BACK'); ?></a>
				</div>
			</div>
		</form>
	</div>
	<script src="/static/js/admin.js"></script>
</body>
</html>