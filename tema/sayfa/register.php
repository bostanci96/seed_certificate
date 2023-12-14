<?php
if(isset($_SESSION["login"])){go(URL);die();}
unset($_SESSION["dil"]);
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
                <div class="content-body">
                    <div class="auth-wrapper auth-cover">
                        <div class="auth-inner row m-0">
                            <a class="brand-logo" href="<?php echo URL; ?>">
                                <img class="img-fluid" src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" alt="<?php echo $ayar[$lehce."site_title"];?>">
                            </a>
                            <div class="d-none d-lg-flex col-lg-5 align-items-center p-5" style="background-image: url(<?php echo URL; ?>images/registerx.jpg); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"></div>
                            </div>
                            <div class="d-flex col-lg-7 align-items-center auth-bg px-2 p-lg-5">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                    <h2 class="card-title fw-bold mb-1"><?=$bloklar["register_title"]?></h2>
                                    <p class="card-text mb-2"><?=$bloklar["register_desc"]?></p>
                                    <form class="auth-login-form mt-2" action="<?php echo TEMA_URL; ?>ajax.php?p=register" id="LoginForm" method="post" onsubmit="return false;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_one"><?=$bloklar["register_label_one"]?></label>
                                                    <input class="form-control" id="register_label_one" type="text" name="name" placeholder="<?=$bloklar["register_input_one"]?>" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_two"><?=$bloklar["register_label_two"]?></label>
                                                    <input class="form-control" id="register_label_two" type="text" name="surname" placeholder="<?=$bloklar["register_input_two"]?>" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="date"><?=$bloklar["register_label_tree"]?></label>
                                                    <input type="text" id="date" class="form-control date-mask" name="date" placeholder="DD-MM-YYYY" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_four"><?=$bloklar["register_label_four"]?></label>
                                                    <input class="form-control" id="register_label_four" type="text" name="phone" placeholder="<?=$bloklar["register_input_four"]?>" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_five"><?=$bloklar["register_label_five"]?></label>
                                                    <input class="form-control" id="register_label_five" type="email" name="eposta" placeholder="<?=$bloklar["register_input_five"]?>" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="register-password"><?=$bloklar["register_label_nine"]?></label>
                                                    </div>
                                                    <div class="input-group input-group-merge form-password-toggle">
                                                        <input class="form-control form-control-merge" id="register-password" type="password" name="password" placeholder="<?=$bloklar["register_input_nine"]?>" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="register_label_six"><?=$bloklar["register_label_six"]?></label>
                                                    </div>
                                                    <input class="form-check-input" type="radio"  name="sex"  id="register_label_seven" value="1" />
                                                    <label class="form-check-label"for="register_label_seven"><?=$bloklar["register_label_seven"]?></label>
                                                    &ensp;
                                                    <input class="form-check-input" type="radio"  name="sex"  id="register_label_eight" value="2" />
                                                    <label class="form-check-label" for="register_label_eight"><?=$bloklar["register_label_eight"]?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="register_label_ten"><?=$bloklar["register_label_ten"]?></label>
                                                    </div>
                                                    <input class="form-check-input" type="radio"  name="sitelang"  id="register_label_onbir" value="11" />
                                                    <label class="form-check-label"for="register_label_onbir"><?=$bloklar["register_label_onbir"]?></label>
                                                    &ensp;
                                                    <input class="form-check-input" type="radio"  name="sitelang"  id="register_label_oniki" value="22" />
                                                    <label class="form-check-label" for="register_label_oniki"><?=$bloklar["register_label_oniki"]?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> &ensp;</div>
                                            <div class="col-md-6"> &ensp;
                                                <div id="login_status"></div>
                                            </div>
                                            <div class="col-md-6"> <div class="mb-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="privacypolicy" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                                    <label class="form-check-label" for="register-privacy-policy"><?=$bloklar["register_label_privacypolicy"]?></label>
                                                </div>
                                            </div></div> 
                                            <div class="col-md-6">
                                                <button class="btn btn-primary w-100" type="submit" onclick="AjaxFormS('LoginForm','login_status');" tabindex="4"><?=$bloklar["register_button"]?></button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                    
                                    <p class="text-center mt-2"><span><?=$bloklar["register_login_profil"]?></span><a href="<?php echo URL; ?>login/"><span>&nbsp;<?=$bloklar["register_login_profil_two"]?></span></a></p>
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
        <script src="<?php echo TEMA_URL;?>tema-assets/vendors/js/forms/cleave/cleave.min.js"></script>
        <script>
        $(function () {
        'use strict';
        var dateMask = $('.date-mask');
        
        // Date
        if (dateMask.length) {
        new Cleave(dateMask, {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
        });
        }
        });
        </script>
        <script type="text/javascript" src="<?php echo TEMA_URL;?>tema-assets/js/login_main.js"></script>
    </body>
</html>