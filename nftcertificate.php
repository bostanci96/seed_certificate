<?php
require_once(__DIR__.'/vendor/autoload.php');
## Ayar dosyasını çekiyoruz.
require_once 'admin/host/a.php';
if (@$_GET['c'] || @$_GET['id']) {
$query = $db->prepare("SELECT * FROM qr_codes where qr_random=:c and qr_product=:id");
$query->execute(array('c' => $_GET['c'], 'id' => $_GET['id']));
$result = $query->fetch(PDO::FETCH_ASSOC);
$x = $db->prepare("SELECT * FROM urunler where urun_id=" . $_GET['id']);
$x->execute();
$product = $x->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
    <head>
        <title><?php echo $ayar['site_title']; ?></title>
        <?php include_once(TEMA_INC."inc/head.php"); ?>
        <style type="text/css">
        .horizontal-menu .navbar.header-navbar .navbar-container {height: 60px;}.horizontal-layout.navbar-floating:not(.blank-page) .app-content {padding: calc(0rem + 2.45rem* 2 + 1.3rem) 2rem 0 2rem;}
        
        </style>
    </head>
    <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col=""  style="background-attachment: fixed;background-image: url(<?php echo URL; ?>images/loginx.jpg); background-repeat: no-repeat; background-size: cover;">
        <!-- BEGIN: Header-->
        <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
            <?php include_once(TEMA_INC."inc/navx.php"); ?>
        </nav>
        <!-- END: Header-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                
                <div class="content-body">
                    <!-- Horizontal Wizard -->
                    <section id="basic-input">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        
                                        <div class="row">
                                            
                                            <div class="mb-1 col-md-12">
                                                <?php
                                                ob_start();
                                                $uretilen_tohumturu = $product["urun_tam_icerik"];
                                                $uretilen_tohumalttur = $product["urun_link"];
                                                $uretilen_tohumreferans = $product["en_urun_adi"];
                                                $uretilen_dateseating = $product["en_urun_icerik"];
                                                $sertifi_adet = $product["urun_icerik"];
                                                $uretilen_count = $product["ar_urun_icerik"];
                                                $randomcode = $result['partyseri'];
                                                $sertifi_tarih = $product["fa_urun_icerik"];
                                                $resim_onad = $product["en_urun_tam_icerik"]."_";
                                                $imgfff = URL.'images/urunler/big/'.$product["urun_resim"];
                                                $qrres = $result["qr_url"];
                                                $fontfile= __DIR__.'/verdana.ttf';
                                                $randNamex   = substr(base64_encode(uniqid(true)),0,20);
                                                $newName    = str_replace("=","",$randNamex);
                                                $newName    = $resim_onad.$newName;
                                                $resimadixyz = "sertifika/".$newName.".jpg";
                                                $im = imagecreatefrompng($imgfff);
                                                $imxxx = imagecreatefrompng($qrres);
                                                $beyaz=ImageColorAllocate($im,0,0,0);
                                                $one = mb_convert_encoding($uretilen_tohumturu, "UTF-8", "auto");
                                                $two = mb_convert_encoding($uretilen_tohumalttur, "UTF-8", "auto");
                                                $tree = mb_convert_encoding($uretilen_tohumreferans, "UTF-8", "auto");
                                                $four = mb_convert_encoding($uretilen_dateseating, "UTF-8", "auto");
                                                $five = mb_convert_encoding($sertifi_adet, "UTF-8", "auto");
                                                $six = mb_convert_encoding($uretilen_count, "UTF-8", "auto");
                                                $seven = mb_convert_encoding($randomcode, "UTF-8", "auto");
                                                $eitxs = mb_convert_encoding($sertifi_tarih, "UTF-8", "auto");
                                                imagettftext($im, 64, 0, 1750, 630, $beyaz, $fontfile, $one);
                                                imagettftext($im, 64, 0, 1750, 750, $beyaz, $fontfile, $two);
                                                imagettftext($im, 64, 0, 1750, 870, $beyaz, $fontfile, $tree);
                                                imagettftext($im, 64, 0, 1750, 990, $beyaz, $fontfile, $four);
                                                imagettftext($im, 64, 0, 1750, 1112, $beyaz, $fontfile, $five);
                                                imagettftext($im, 64, 0, 1750, 1230, $beyaz, $fontfile, $six);
                                                imagettftext($im, 64, 0, 1750, 1350, $beyaz, $fontfile, $seven);
                                                imagettftext($im, 64, 0, 1750, 1470, $beyaz, $fontfile, $eitxs);
                                                imagecopymerge($im, $imxxx, 2610, 1770, 0, 0, 530, 530, 100);
                                                imagejpeg($im, $resimadixyz);
                                                ?>
                                                <div class="offset-md-1 col-md-9 mb-1">
                                                    <img src="<?php echo URL.$resimadixyz; ?>" class="img-fluid">
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <div class=" col-md-12">
                                                <center>
                                                
                                                <a class="btn btn-primary btn-lg me-1 mt-2" href="<?php echo URL.$resimadixyz; ?>" download><i class="fas fa-share-alt"></i> Download My Certificate</a>
                                                </center>
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
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        <!-- BEGIN: Footer-->
     <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <center><span class=" d-block d-md-inline-block mt-25">
            Copyright &copy; 2022<a class="ms-25" href="https://www.qoomed.com" target="_blank">QOOMED</a>
            <span class="d-none d-sm-inline-block"> All rights Reserved</span>
        </span>
    </center>
    </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
        <!-- END: Footer-->
        <?php include_once(TEMA_INC."inc/sc.php");?>
    </body>
</html>
<?php } ?>