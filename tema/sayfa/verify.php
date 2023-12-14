<?php
if(isset($_SESSION["login"])){go(URL);die();}
$uye_id = $_GET['id'];
$uye_ver_code = $_GET['code'];
$uye_email = $_GET['email'];
if(!$uye_id OR !$uye_ver_code OR !$uye_email){go(URL);die();}
$mailkontrol = $db->query("SELECT * FROM uyeler WHERE uye_eposta='$uye_email' and  uye_key='$uye_ver_code' and  uye_id='$uye_id'");
$cekmailk = $mailkontrol->fetch(PDO::FETCH_ASSOC);
if($mailkontrol->rowCount()){
uye_lang_check($cekmailk["uye_sitedil"]);
dilCek();
$update = $db->query("UPDATE uyeler SET uye_onay=1, uye_key=''  WHERE uye_eposta='$uye_email' and  uye_id='$uye_id'");
if($update->rowCount()){
$resim = 'success.png';
$metinbir = $bloklar["verify_one"];
$metiniki = $bloklar["verify_two"];
}else{
$resim = 'indir.png';
$metinbir = $bloklar["verify_tree"];
$metiniki = $bloklar["verify_four"];
}
}else{
$resim = 'indir.png';
$metinbir = $bloklar["verify_five"];
$metiniki = $bloklar["verify_six"];
}
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
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <!-- verify email basic -->
                            <div class="card mb-0">
                                <div class="card-body text-center">
                                    <a href="<?php echo URL; ?>" class="brand-logo">
                                        <img class="img-fluid" width="120" src="<?php echo URL;?>images/<?php echo $resim;?>" alt="<?php echo $ayar[$lehce."site_title"];?>">
                                    </a>
                                    <center>
                                    <h2 class="card-title fw-bolder mb-1"><?php echo $metinbir; ?></h2>
                                    <p class="card-text mb-2">
                                        <?php echo $metiniki; ?>
                                    </p>
                                    </center>
                                    <a href="<?php echo URL; ?>login/" class="btn btn-primary w-100"><?php echo $bloklar["verify_seven"]; ?></a>
                                </div>
                            </div>
                            <!-- / verify email basic -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->
        <?php include_once(__DIR__ ."/../inc/sc.php");?>
    </body>
</html>