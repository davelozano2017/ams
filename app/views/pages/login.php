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
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
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
					<form action="<?=site_url('accounts/secureLogin')?>" data-parsley-validate method="POST">
						<input type="hidden" name="token" value="<?=$token?>">
						<div class="panel panel-body login-form">
						<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left ">'.$_SESSION['message'].'</div>'; ?>  
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Email Address" required>
								<div class="form-control-feedback">
									<i class="icon-envelope text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" name="password" autocomplete="new-password" class="form-control" placeholder="Password" required>
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
										<a href="<?=site_url('recover')?>">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" style="border-radius:0px" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
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
	<script src="<?=base_url()?>assets/parsley/parsley.min.js"></script>
	<!-- /theme JS files -->
</body>
</html>
