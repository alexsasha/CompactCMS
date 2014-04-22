<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/bootstrap/css/bootstrap.min.css">
	
	<script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<div class="container">
		
	<?php echo form_open('admin/install', array('class' => 'form')); ?>
		<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
		<h2 class="form-signin-heading">Добро пожаловать</h2>
		<h3>Требуется информация</h2>
		<p>Пожалуйста, укажите следующую информацию.</p>
		
		<div>
			<label>
				Название сайта
				<input type="text" class="form-control" name="sitename" value="" />
			</label>
		</div>

		<div>
			<label>
				Краткое описание сайта
				<input type="text" class="form-control" name="sitedesc" value=""/>
			</label>
		</div>

		<div>
			<label>
				Логин администратора
				<input type="text" class="form-control" name="login" value="">
			</label>
		</div>
		<div>
			<label>
				E-mail администратора
				<input type="text" class="form-control" name="email" value="">
			</label>
		</div>
		<div>
			<label>
				Пароль
				<input type="password" class="form-control" name="pass" value="">
			</label>
		</div>
		<div>
			<label>
				Подтвердите пароль
				<input type="password" class="form-control" name="pass2" value="">
			</label>
		</div>
		<button class="btn btn-md btn-primary btn-block" type="submit">Сохранить</button>
	</form>

	</div> <!-- /container -->

</body>
</html>