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
                                <h4 class="card-title"><?php echo $bloklar["profil_ayar_bir"]; ?></h4>
                            </div>
                            <div class="card-body py-2 my-25">
                                <!-- header section -->
                                <div class="d-flex">
                                    <a class="me-25">
                                        <img src="<?php if(!$uyeRow["uye_profil_img"]){ if($uyeRow["uye_cinsiyet"]==1){ ?><?php echo URL;?>images/erkek.png<?php }else{ ?><?php echo URL;?>images/kadin.png <?php } }else{ ?><?php echo URL;?>images/profile_img/big/<?php echo $uyeRow["uye_profil_img"]; ?><?php } ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
                                    </a>
                                    
                                </div>
                                <!--/ header section -->

                                <!-- form -->
                                <form class="validate-form mt-2 pt-50"  id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=profileupdate"  enctype="multipart/form-data">
                                    <div class="row">
                                       <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                                       <input type="hidden" name="name" value="<?php echo $uyeRow["uye_ad"]; ?>">
                                       <input type="hidden" name="surname" value="<?php echo $uyeRow["uye_soyad"]; ?>">
                                       <input type="hidden" name="date" value="<?php echo $uyeRow["uye_dtarih"]; ?>">
                                       <input type="hidden" name="phone" value="<?php echo $uyeRow["uye_telefon"]; ?>">
                                       <input type="hidden" name="eposta" value="<?php echo $uyeRow["uye_eposta"]; ?>">
                                       <input type="hidden" name="sex" value="<?php echo $uyeRow["uye_cinsiyet"]; ?>">
                                       <input type="hidden" name="sitelang" value="<?php echo $uyeRow["uye_sitedil"]; ?>">
                                         <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_one"><?=$bloklar["register_label_one"]?></label>
                                                    <input class="form-control" id="register_label_one" type="text" name="name" disabled placeholder="<?=$bloklar["register_input_one"]?>" value="<?php echo $uyeRow["uye_ad"];?>"  autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_two"><?=$bloklar["register_label_two"]?></label>
                                                    <input class="form-control" id="register_label_two" type="text" name="surname" disabled placeholder="<?=$bloklar["register_input_two"]?>" value="<?php echo $uyeRow["uye_soyad"];?>"  autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="date"><?=$bloklar["register_label_tree"]?></label>
                                                    <input type="text" id="date" class="form-control date-mask" name="date" disabled placeholder="DD-MM-YYYY" value="<?php echo $uyeRow["uye_dtarih"];?>"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_four"><?=$bloklar["register_label_four"]?></label>
                                                    <input class="form-control" id="register_label_four" type="text" name="phone" disabled placeholder="<?=$bloklar["register_input_four"]?>" value="<?php echo $uyeRow["uye_telefon"];?>"  autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="register_label_five"><?=$bloklar["register_label_five"]?></label>
                                                    <input class="form-control" id="register_label_five" type="email" name="eposta" disabled placeholder="<?=$bloklar["register_input_five"]?>"  value="<?php echo $uyeRow["uye_eposta"];?>" autofocus="" tabindex="1" />
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label for="formFile" class="form-label"><?php echo $bloklar["profil_ayar_yedi"]; ?></label>
                                                <input class="form-control"  name="profile_img[]" id="profile_img[]" type="file" id="formFile" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="register_label_six"><?=$bloklar["register_label_six"]?></label>
                                                    </div>
                                                    <input class="form-check-input" type="radio" disabled  name="sex" <?php echo $uyeRow["uye_cinsiyet"]==1 ? 'checked' : null; ?>  id="register_label_seven" value="1" />
                                                    <label class="form-check-label"for="register_label_seven"><?=$bloklar["register_label_seven"]?></label>
                                                    &ensp;
                                                    <input class="form-check-input" type="radio" disabled  name="sex" <?php echo $uyeRow["uye_cinsiyet"]==2 ? 'checked' : null; ?>   id="register_label_eight" value="2" />
                                                    <label class="form-check-label" for="register_label_eight"><?=$bloklar["register_label_eight"]?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="register_label_ten"><?=$bloklar["register_label_ten"]?></label>
                                                    </div>
                                                    <input class="form-check-input" type="radio"  name="sitelang" <?php echo $uyeRow["uye_sitedil"]==11 ? 'checked' : null; ?>  id="register_label_onbir" value="11" />
                                                    <label class="form-check-label"for="register_label_onbir"><?=$bloklar["register_label_onbir"]?></label>
                                                    &ensp;
                                                    <input class="form-check-input" type="radio"  name="sitelang" <?php echo $uyeRow["uye_sitedil"]==22 ? 'checked' : null; ?>  id="register_label_oniki" value="22" />
                                                    <label class="form-check-label" for="register_label_oniki"><?=$bloklar["register_label_oniki"]?></label>
                                                </div>
                                            </div>
                                     
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-1 me-1"><?=$bloklar["profil_ayar_alti"]?></button>
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


        <script>
 $(document).ready(function(event) {
    $('#forms').ajaxForm({
        success: function(data) {
            if (data == "bos-deger") {
                 Swal.fire({
                    title: '<?php echo $bloklar["ayar_bosdeger_title"]; ?>',
                    text: '<?php echo $bloklar["ayar_bosdeger_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["ayar_basarili_title"]; ?>',
                    text: '<?php echo $bloklar["ayar_basarili_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() {window.location.reload(true);});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["ayar_basarisiz_title"]; ?>',
                    text: '<?php echo $bloklar["ayar_basarisiz_desc"]; ?>',
                    icon: 'eror',
                    customClass: {
                      confirmButton: 'btn btn-warning'
                    },
                    buttonsStyling: false
                  });
                return false;
            }
        }
    });

});
</script>
