<?php 
if ($par[1]) {
    $sertifika_id = $par[1];
    $sertifika_uye_id = $_SESSION['uye_id'];
    $ayarControl = $db->query("SELECT * FROM sertifikalar WHERE sertifi_uye_id='$sertifika_uye_id' AND sertifi_id='$sertifika_id' AND sertifi_ornek_sab=''");
    if($ayarControl->rowCount()){
       $ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
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
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sertifika_two"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sertifika_two"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<!-- Horizontal Wizard -->
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $ayarRow["sertifi_baslik"];?></h4>
                   
                </div>
                <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=sertifika_olustur_twoone"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="sertifi_id" value="<?php echo $ayarRow["sertifi_id"]; ?>">
                            <input type="hidden" name="sertifi_adet" value="<?php echo $ayarRow["sertifi_adet"]; ?>">
                            <input type="hidden" name="uye_id" value="<?php echo $sertifika_uye_id; ?>">
                            <input type="hidden" name="sertifi_baslik" value="<?php echo $ayarRow["sertifi_baslik"]; ?>">
                            <input type="hidden" name="sertifi_tarih" value="<?php echo $ayarRow["sertifi_tarih"]; ?>">
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" disabled value="<?php echo $ayarRow["sertifi_baslik"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <input type="text" class="form-control" disabled   value="<?php echo $ayarRow["sertifi_adet"]; ?>" />
                                </div>
                            </div>


                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_input_bir"]; ?></label>
                                    <input type="text" class="form-control" name="uretilen_tohumturu" placeholder="<?php echo $bloklar["sertifika_olustur_label_bir"]; ?>" />
                                </div>
                            </div>
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_input_iki"]; ?></label>
                                    <input type="text" class="form-control" name="uretilen_tohumalttur" placeholder="<?php echo $bloklar["sertifika_olustur_label_iki"]; ?>" />
                                </div>
                            </div>
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_input_uc"]; ?></label>
                                    <input type="text" class="form-control" name="uretilen_tohumreferans" placeholder="<?php echo $bloklar["sertifika_olustur_label_uc"]; ?>" />
                                </div>
                            </div>
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_input_dort"]; ?></label>
                                    <input type="text" class="form-control" name="uretilen_dateseating" placeholder="<?php echo $bloklar["sertifika_olustur_label_dort"]; ?>" />
                                </div>
                            </div>
                              <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_input_bes"]; ?></label>
                                    <input type="text" class="form-control" name="uretilen_count" placeholder="<?php echo $bloklar["sertifika_olustur_label_bes"]; ?>" />
                                </div>
                            </div>
                           
                            <div class="col-xl-6 col-md-6 col-12">
                                <label for="formFile" class="form-label"><?php echo $bloklar["sertifika_olustur_input_alti"]; ?></label>
                                <input class="form-control" type="file" id="formFile" name="uretilensertifi_orn[]" id="uretilensertifi_orn[]" />
                            </div>
                            <div class=" col-md-12">
                            <center>
                            <button type="submit" class="btn btn-primary me-1 mt-2"><?php echo $bloklar["sertifika_olustur_buton"]; ?></button>
                            </center>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- /Horizontal Wizard -->
</div>
<script>
 $(document).ready(function(event) {
    $('#forms').ajaxForm({
        success: function(data) {
            if (data == "bos-deger") {
                 Swal.fire({
                    title: '<?php echo $bloklar["alert_creatit_bosdeger_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_creatit_bosdeger_sertifi_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_creatit_success_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_creatit_success_sertifi_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL.'certificate-four/'.$sertifika_id.'/'; ?>";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_creatit_eror_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_creatit_eror__sertifi_desc"]; ?>',
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
