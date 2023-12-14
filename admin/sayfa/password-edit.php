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
                                <h4 class="card-title"><?php echo $bloklar["sifre_resetleme"]; ?></h4>
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
                                <form class="validate-form mt-2 pt-50"  id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=passwordupdate"  enctype="multipart/form-data">
                                    <div class="row">
                                       <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
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
