<?php extract($data);?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=website_name?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
</head>

<body class="login-container">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<!-- <form action="<?=site_url('account/secureLogin')?>" method="POST"> -->
					<form action="<?=site_url('dashboard')?>" method="POST">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" class="form-control" placeholder="Email Address">
								<div class="form-control-feedback">
									<i class="icon-envelope text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" autocomplete="new-password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group login-options">
								<div class="row">
									<div class="col-sm-6">
										<label class="checkbox-inline">
											<input type="checkbox" class="styled" checked="checked">
											Remember
										</label>
									</div>

									<div class="col-sm-6 text-right">
										<a href="login_password_recover.html">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" style="border-radius:0px" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
							<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
							<a href="<?=site_url('register')?>" style="border-radius:0px" class="btn btn-default btn-block content-group">Sign up</a>
						</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
					&copy; <?=date('Y')?>. <a href="<?=site_url('login')?>"><?=website_name?></a> 
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<script src="<?=base_url()?>assets/js/plugins/loaders/pace.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/libraries/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?=base_url()?>assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?=base_url()?>assets/js/app.js"></script>
	<script src="<?=base_url()?>assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->
</body>
</html>
