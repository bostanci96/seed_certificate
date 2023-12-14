<?php if($_SESSION["uye_rutbe"]==0){go(URL."admin/index.php");die();} ?>
<?php 
if(empty($_SESSION["login"])){
require_once('../admin/host/a.php');
go(URL."login/");die();
}
        if(isset($_SESSION["uye_id"])){
            $id = $_SESSION["uye_id"];
            $uyeControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id");
            $uyeControl->execute(array("id"=>$id));
            if($uyeControl->rowCount()){
                $uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
                if(isset($par[0])){
                    if($par[0]!= "kyc-verify"){
                     if ($uyeRow["uye_kyc_mod"]==1 AND $uyeRow["uye_kayıt_rutbe"]==1) {
                        go(URL.'kyc-verify/');   
                     }
                    }else{
                      if ($uyeRow["uye_kyc_mod"]!=1 AND $uyeRow["uye_kayıt_rutbe"]!=1) {
                        go(URL);   
                      }
                    }
                    if ($par[0]!= "kyc-verify-loading") {
                       if ($uyeRow["uye_kyc_mod"]==2 AND $uyeRow["uye_kayıt_rutbe"]==1) {
                        go(URL.'kyc-verify-loading/');   
                       }
                    }else{
                      if ($uyeRow["uye_kyc_mod"]!=2 AND $uyeRow["uye_kayıt_rutbe"]!=1) {
                        go(URL);   
                      }
                    }
                    if ($par[0]!= "business-verify") {
                       if ($uyeRow["uye_kyc_mod"]==3 AND $uyeRow["uye_kayıt_rutbe"]==2) {
                        go(URL.'business-verify/');   
                       }
                    }else{
                      if ($uyeRow["uye_kayıt_rutbe"]!=2) {
                        go(URL); 
                      }
                    }
                    if ($par[0]!= "business-verify-two") {
                       if ($uyeRow["uye_kyc_mod"]==3 AND $uyeRow["uye_kayıt_rutbe"]==3) {
                        go(URL.'business-verify-two/');   
                    }
                    }else{
                      if ($uyeRow["uye_kayıt_rutbe"]!=3) {
                        go(URL);   
                      }
                    }if ($par[0]!= "business-verify-loading") {
                       if ($uyeRow["uye_kyc_mod"]==3 AND $uyeRow["uye_kayıt_rutbe"]==4) {
                        go(URL.'business-verify-loading/');   
                    }
                    }else{
                      if ($uyeRow["uye_kayıt_rutbe"]!=4) {
                        go(URL);   
                      }
                    }if ($par[0]!= "business-verify-two-again") {
                       if ($uyeRow["uye_kyc_mod"]==4 AND $uyeRow["uye_kayıt_rutbe"]==3) {
                        go(URL.'business-verify-two-again/');   
                    }
                    }else{
                      if ($uyeRow["uye_kyc_mod"]!=4 AND $uyeRow["uye_kayıt_rutbe"]!=3) {
                        go(URL);   
                      }
                    }
                }
            }else{
               go(URL.'login/');   
            }
        }else{
          go(URL.'login/');
        }
?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
    <head>
        <title><?php echo $ayar['site_title']; ?></title>
        <?php include_once("inc/head.php"); ?>
     
    </head>
    <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col=""  style="background-attachment: fixed;background-image: url(<?php echo URL; ?>images/loginx.jpg); background-repeat: no-repeat; background-size: cover;">
        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
            <?php include_once("inc/nav.php"); ?>
        </nav>
        <!-- END: Header-->
        <!-- BEGIN: Main Menu-->
        <?php include_once("inc/menuler.php"); ?>
        <!-- END: Main Menu-->
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
              <?php
                    if (isset($par[0])){
                        $sayfa = @$par[0];
                        if ($uyeRow["uye_kyc_mod"] == 1 and $uyeRow["uye_kayıt_rutbe"] == 1){
                            require_once ("sayfa/kyc-verify.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 2 and $uyeRow["uye_kayıt_rutbe"] == 1){
                            require_once ("sayfa/kyc-verify-loading.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 2){
                            require_once ("sayfa/business-verify.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 3){
                            require_once ("sayfa/business-verify-two.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 4){
                            require_once ("sayfa/business-verify-loading.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 4 and $uyeRow["uye_kayıt_rutbe"] == 3){
                            require_once ("sayfa/business-verify-two-again.php");
                        }else{
                            $file = "sayfa/".$sayfa.".php";
                            if ($file){
                                require_once ($file);
                            }else{
                                require_once ("sayfa/default.php");
                            }
                        }
                    }else{
                        if ($uyeRow["uye_kyc_mod"] == 1 and $uyeRow["uye_kayıt_rutbe"] == 1){
                            require_once ("sayfa/kyc-verify.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 2 and $uyeRow["uye_kayıt_rutbe"] == 1){
                            require_once ("sayfa/kyc-verify-loading.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 2){
                            require_once ("sayfa/business-verify.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 3){
                            require_once ("sayfa/business-verify-two.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 3 and $uyeRow["uye_kayıt_rutbe"] == 4){
                            require_once ("sayfa/business-verify-loading.php");
                        }else if ($uyeRow["uye_kyc_mod"] == 4 and $uyeRow["uye_kayıt_rutbe"] == 3){
                            require_once ("sayfa/business-verify-two-again.php");
                        }else{
                            require_once ("sayfa/default.php");
                        }
                    }
            ?>

            </div>
        </div>
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <!-- BEGIN: Footer-->
        <?php include_once("inc/footer.php");?>
        <!-- END: Footer-->
        <?php include_once("inc/sc.php");?>
    </body>
</html>