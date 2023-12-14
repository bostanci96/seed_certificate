<?php 
require_once('host/a.php');

if(isset($_SESSION["login"])){go(ADMIN_URL);die();}
?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Administration | <?php echo $ayar["site_title"]; ?>">
	<meta name="keywords" content="<?php echo $ayar["site_title"]; ?>">
	<meta name="author" content="<?php echo $ayar["site_title"]; ?>">
	<title>Administration | <?php echo $ayar["site_title"]; ?></title>
	<meta property="og:image" content="<?php echo URL;?>images/<?php echo $ayar["favicon"];?>">
	<meta property="og:description" content="Administration | <?php echo $ayar["site_title"]; ?>">
	<link rel="apple-touch-icon" href="<?php echo URL;?>images/<?php echo $ayar["favicon"];?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo URL;?>images/<?php echo $ayar["favicon"];?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/vendors/css/vendors.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/bootstrap-extended.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/colors.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/components.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/themes/dark-layout.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/themes/semi-dark-layout.css">

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/core/colors/palette-gradient.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL;?>app-assets/css/pages/authentication.css">
	<script type="text/javascript" src="<?php echo ADMIN_URL;?>app-assets/js/login_main.js"></script>
	<!-- END: Page CSS-->
	<style type="text/css">

		.container-login100 {

			background: #9053c7!important;
			background: -webkit-linear-gradient(-135deg, #031b0e, #164921)!important;
			background: -o-linear-gradient(-135deg, #031b0e, #164921)!important;
			background: -moz-linear-gradient(-135deg, #031b0e, #164921)!important;
			background: linear-gradient(-135deg, #031b0e, #164921)!important;

		}
		.card{
			box-shadow: 0 4px 25px 0 rgb(0, 0, 0)!important;
		}
	</style>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131921318-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131921318-7');
</script>
</head>

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column container-login100  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">




	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="row flexbox-container">
					<div class="col-xl-8 col-11 d-flex justify-content-center">
						<div class="card bg-authentication rounded-0 mb-0">
							<div class="row m-0">
								<div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0 login100-pic js-tilt" data-tilt style="padding: 3rem !important;"> 
									<img src="<?php echo URL; ?>images/<?php echo $ayar["logo"]; ?>" alt="branding logo" class="img-fluid" style="margin-right: 4rem;filter: drop-shadow(0px 0px 5px #164921);">
								</div>
								<div class="col-lg-6 col-12 p-0" style="    background-color: #FFFFFF; padding-top: 2rem!important;">
									<div class="card rounded-0 mb-0 px-2">
										<div class="card-header pb-1">
											<div class="card-title">
												<h4 class="mb-0"><?php echo $ayar["site_title"]; ?> Yönetim Paneli</h4>
											</div>
										</div>
										<p class="px-2">Lütfen hesabınıza giriş yapın.</p>
										<div class="card-content">
											<div class="card-body pt-1">
												<form role="form"  action="ajax.php?p=login" id="LoginForm" method="post" onsubmit="return false;">
													<fieldset class="form-label-group form-group position-relative has-icon-left">
														<input type="text" class="form-control" id="user-name" name="username" placeholder="E-posta Adresiniz" required>
														<div class="form-control-position">
															<i class="feather icon-user"></i>
														</div>
														<label for="user-name">E-posta Adresiniz</label>
													</fieldset>

													<fieldset class="form-label-group position-relative has-icon-left">
														<input type="password" name="password" class="form-control" id="user-password" placeholder="Şifreniz" required>
														<div class="form-control-position">
															<i class="feather icon-lock"></i>
														</div>
														<label for="user-password">Şifreniz</label>
													</fieldset>   <div id="login_status"></div>
													<div class="form-group d-flex justify-content-between align-items-center">

														<div class="text-left">

														</div>
														<div class="text-right"><a href="resetpassword.php" class="card-link">Parolanızı mı unuttunuz ?</a></div>
													</div>

													<button type="submit" onclick="AjaxFormS('LoginForm','login_status');" class="btn btn-primary float-right btn-inline">Giriş Yap</button>
												</form>
											</div>
										</div>
										<div class="login-footer">
											<div class="divider">

											</div>
											<div class="footer-btn d-inline">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
	<!-- End of eoverlay modal -->
	<!-- BEGIN: Vendor JS-->
	<script src="<?php echo ADMIN_URL;?>app-assets/vendors/js/vendors.min.js"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<!-- END: Page Vendor JS-->

	<script src="<?php echo ADMIN_URL;?>app-assets/js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- BEGIN: Theme JS-->
	<script src="<?php echo ADMIN_URL;?>app-assets/js/core/app-menu.js"></script>
	<script src="<?php echo ADMIN_URL;?>app-assets/js/core/app.js"></script>
	<script src="<?php echo ADMIN_URL;?>app-assets/js/scripts/components.js"></script>
</body>
</html>
