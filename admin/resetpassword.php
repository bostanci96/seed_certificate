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
	<meta name="description" content="Administration | QOOMED Certificate Verification System">
	<meta name="keywords" content="QOOMED">
	<meta name="author" content="QOOMED">
	<title>Administration | <?php echo $ayar["site_title"]; ?> Certificate Verification System</title>
	<meta property="og:image" content="<?php echo ADMIN_URL;?>app-assets/images/ico/favicon.ico">
	<meta property="og:description" content="Administration | QOOMED Certificate Verification System">
	<link rel="apple-touch-icon" href="<?php echo ADMIN_URL;?>app-assets/images/ico/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo ADMIN_URL;?>app-assets/images/ico/android-icon-48x48.png">
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
</head>

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column container-login100  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">



    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center  js-tilt" data-tilt >
                                    <img src="<?php echo URL; ?>images/<?php echo $ayar["logo"]; ?>" style="filter: drop-shadow(0px 0px 5px #164921);" class="img-fluid" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Parola sıfırlama isteğinde bulun</h4>
                                            </div>
                                        </div>
                                        <p class="px-2 mb-0">Gireceğiniz E-posta Adresiniz Panel hesabıyla ilişkiliyse, size yeni şifrenizi içeren bir e-posta göndereceğiz.
                                        </p>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form role="form" action="ajax.php?p=sifremisifirla" id="LoginForm" method="post" onsubmit="return false;">
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="s_eposta">
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                </form>     <div id="login_status"></div>
                                                <div class="float-md-left d-block mb-1">
                                                    <a href="index.php" class="btn btn-outline-primary btn-block px-75">Geri Dön</a>
                                                </div>

                                                
                                                <div class="float-md-right d-block mb-1">
                                                    <button type="submit" onclick="AjaxFormS('LoginForm','login_status');" class="btn btn-primary float-right btn-inline">Şifremi Sıfırla</button>
                                                </div>
                                            </div>
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