<?php
if(isset($_SESSION["login"])){go(URL);die();}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
   <title><?php echo $ayar[$lehce.'site_title']; ?></title>
    <?php include_once(__DIR__ ."/../inc/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/pages/authentication.css">
</head>
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <!--    <a href="?dil=ar">ar</a>
                <a href="?dil=tr">tr</a>
                <a href="?dil=en">en</a>
                <a href="?dil=ru">ru</a>-->
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                       <a class="brand-logo" href="<?php echo URL; ?>">
                          <img class="img-fluid" src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" alt="<?php echo $ayar[$lehce."site_title"];?>">
                        </a>
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5" style="background-image: url(<?php echo URL; ?>images/loginx.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"></div>
                        </div>
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1"><?=$bloklar["login_title"]?></h2>
                                <p class="card-text mb-2"><?=$bloklar["login_desc"]?></p>
                                <form class="auth-login-form mt-2" action="<?php echo TEMA_URL; ?>ajax.php?p=login" id="LoginForm" method="post" onsubmit="return false;">
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email"><?=$bloklar["login_label_one"]?></label>
                                        <input class="form-control" id="login-email" type="text" name="username" placeholder="<?=$bloklar["login_input_one"]?>" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password"><?=$bloklar["login_label_two"]?></label><a href="<?php echo URL; ?>resetpassword/"><small><?=$bloklar["login_password"]?></small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="<?=$bloklar["login_input_two"]?>" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                    </div>
                                      <div id="login_status"></div>
                                    <button class="btn btn-primary w-100" type="submit" onclick="AjaxFormS('LoginForm','login_status');" tabindex="4"><?=$bloklar["login_button"]?></button>
                                </form>
                               
                                <p class="text-center mt-2"><span><?=$bloklar["login_create_profil"]?></span><a href="<?php echo URL; ?>register/"><span>&nbsp;<?=$bloklar["login_create_profil_two"]?></span></a></p>
                                <div class="divider my-2">
                                    <div class="divider-text"></div>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php include_once(__DIR__ ."/../inc/sc.php");?>
    <script src="<?php echo TEMA_URL; ?>tema-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?php echo TEMA_URL; ?>tema-assets/js/scripts/pages/auth-login.js"></script>
   <script type="text/javascript" src="<?php echo TEMA_URL;?>tema-assets/js/login_main.js"></script>
</body>
</html>