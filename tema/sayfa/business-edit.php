<?php
if(isset($_SESSION["uye_id"])){
$id =$_SESSION["uye_id"];
$uyeControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id");
$uyeControl->execute(array("id"=>$id));
if($uyeControl->rowCount()){
$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
}else{
go(URL);
}
}else{
go(URL);
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/plugins/forms/form-validation.css">
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/pages/authentication.css">
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["profil_setings_two"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["profil_setings_two"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-2">
            <!-- account -->
            <li class="nav-item">
                <a class="nav-link <?php classActive('profile',@$par[0]);?>" href="<?php echo URL; ?>profile/">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold"><?php echo $bloklar["profil_ayar_uc"]; ?></span>
                </a>
            </li>
            <!-- security -->
            <li class="nav-item">
                <a class="nav-link <?php classActive('business-edit',@$par[0]);?>" href="<?php echo URL; ?>business-edit/">
                    <i data-feather="briefcase" class="font-medium-3 me-50"></i>
                    <span class="fw-bold"><?php echo $bloklar["profil_ayar_dort"]; ?></span>
                </a>
            </li>
            <!-- security -->
            <li class="nav-item <?php classActive('password-edit',@$par[0]);?>">
                <a class="nav-link" href="<?php echo URL; ?>password-edit/">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold"><?php echo $bloklar["profil_ayar_bes"]; ?></span>
                </a>
            </li>
        </ul>
        <!-- profile -->
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title"><?php echo $bloklar["profil_ayar_iki"]; ?></h4>
            </div>
            <div class="card-body py-2 my-25">
                
                <!-- form -->
                <form class="validate-form pt-50">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="firmaadresi"><?php echo $bloklar["profile_isletme_dogrulama_input_one"]; ?></label>
                                <textarea class="form-control" id="firmaadresi" rows="3" name="uye_firma_adresi" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_one_desc"]; ?>"><?php echo $uyeRow["uye_firma_adresi"]; ?></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmavergino"><?php echo $bloklar["profile_isletme_dogrulama_input_two"]; ?></label>
                                <input type="text" id="firmavergino" class="form-control" name="uye_firma_vergino" value="<?php echo $uyeRow["uye_firma_vergino"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_two_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmaunvan"><?php echo $bloklar["profile_isletme_dogrulama_input_tree"]; ?></label>
                                <input type="text" id="firmaunvan" class="form-control" name="uye_firmaunvan" value="<?php echo $uyeRow["uye_firmaunvan"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_tree_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmatelefon"><?php echo $bloklar["profile_isletme_dogrulama_input_four"]; ?></label>
                                <input type="text" id="firmatelefon" class="form-control" name="uye_firma_telefon" value="<?php echo $uyeRow["uye_firma_telefon"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_four_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmamailadresi"><?php echo $bloklar["profile_isletme_dogrulama_input_five"]; ?></label>
                                <input type="text" id="firmamailadresi" class="form-control" name="uye_firma_email" value="<?php echo $uyeRow["uye_firma_email"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_five_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmaulkesi"><?php echo $bloklar["profile_isletme_dogrulama_input_six"]; ?></label>
                                <input type="text" id="firmaulkesi" class="form-control" name="uye_firma_ulke" value="<?php echo $uyeRow["uye_firma_ulke"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_six_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <label class="form-label" for="firmametemask"><?php echo $bloklar["profile_isletme_dogrulama_input_seven"]; ?></label>
                                <input type="text" id="firmametemask" class="form-control" name="uye_firma_metemask" value="<?php echo $uyeRow["uye_firma_metemask"]; ?>" disabled placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_seven_desc"]; ?>" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_one"]; ?></label>
                                <input class="form-control"  name="imza_surkusu[]" id="imza_surkusu[]" type="file" id="formFile" disabled />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_two"]; ?></label>
                                <input class="form-control"  name="faliyet_belgesi[]" id="faliyet_belgesi[]" type="file" id="formFile" disabled />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_tree"]; ?></label>
                                <input class="form-control"  name="vergi_levhasi[]" id="vergi_levhasi[]" type="file" id="formFile" disabled />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-1">
                                <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_four"]; ?></label>
                                <input class="form-control"  name="firma_adres_ispat[]" id="firma_adres_ispat[]" type="file" id="formFile" disabled />
                            </div>
                        </div>
                    </div>
                </form>
                <!--/ form -->
            </div>
        </div>
    </div>
</div>
</div>
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
