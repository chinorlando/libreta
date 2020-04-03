<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Búsqueda de libretas</p>

			<!-- <form action="../../index2.html" method="post"> -->
				<form action="#" id="form">
					<div class="form-group has-feedback">
						<label>Fecha de nacimiento</label>
						<input type="text" class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" value="2008-12-03" required>
						<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label>Código de libreta</label>
						<input type="text" class="form-control" placeholder="Codigo de libreta" name="codigo_libreta" id="codigo_libreta" value="254564" required>
						<span class="glyphicon glyphicon-barcode form-control-feedback"></span>
					</div>
					
				</form>
				<div class="row">
						<!-- <div class="col-xs-8">
							<div class="checkbox icheck">
								<label>
									<input type="checkbox"> Remember Me
								</label>
							</div>
						</div> -->
						<!-- /.col -->
						<div class="col-xs-12">
							<button type="submit" id="btn_mostrar" class="btn btn-primary btn-block btn-flat" onclick="buscar()">Buscar</button>
						</div>
						<!-- /.col -->
				</div>
				

			</div>
			<br>
			<div id="opciones"></div>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->

		<!-- jQuery 3 -->
		<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/mask/mask.js"></script>
		<!-- iCheck -->
		
		<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
		<script>
			// $(function () {

			// });

			// jQuery(function($){
			// $(function () {
			$(document).ready(function() {
				$('#fecha_nacimiento').mask('9999-99-99',{placeholder:"aaaa-mm-dd"});
			});

			function buscar() {
				// alert('message?: DOMString');
				$.ajax({
					url: '<?php echo base_url();?>'+'welcome/libreta',
					type: "POST",
					cache: true,
					data: $("#form").serialize(),
					success: function(data) {
						var datos = $.parseJSON(data);
						$('#opciones').html('');
						if (datos.status) {
							$('#opciones').html('');
						} else {
							$('#opciones').html(datos.div);
						}
					},
					error: function (jqXHR, textStatus, errorThrown){
						// alert('Error al obtener datos.');
						$('#opciones').html('');
					}
				});
			}



</script>
</body>
</html>
