<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sertifika_transfer"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sertifika_transfer"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
<div class="content-body">
<!-- Horizontal Wizard -->
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/pages/authentication.css">
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $bloklar["sertifika_transfer_two"]; ?></h4>
                </div>
                <div class="card-body">
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=sertifika_transfer_talebi"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_transfer_tarih"]; ?></label>
                                    <input type="text" id="date" class="form-control date-mask" name="sertifi_date" placeholder="DD-MM-YYYY" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_transfer_satiskodu"]; ?></label>
                                    <input type="text" class="form-control" name="sertifi_trans" placeholder="<?php echo RandomString(); ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_transfer_nft_kul_adi"]; ?></label>
                                    <input type="text" class="form-control" name="sertifi_nft_kuladi" placeholder="" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_transfer_nft_satin_kul_adi"]; ?></label>
                                    <input type="text" class="form-control" name="sertifi_nft_satin_kuladi" placeholder="" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_transfer_link"]; ?></label>
                                    <input type="text" class="form-control" name="transfer_nftlink" placeholder="" />
                                </div>
                            </div>
                            <div class="col-md-6"> <div class="mb-1">
                                <div class="form-check">
                                    <input class="form-check-input" name="privacypolicy" id="privacy-policy" type="checkbox" tabindex="4" />
                                    <label class="form-check-label" for="privacy-policy"><?php echo $bloklar["sertifika_transfer_privacypolicy"]; ?></label>
                                </div>
                            </div></div>
                            <div class=" col-md-12">
                                <center>
                                <button type="submit" class="btn btn-primary me-1 mt-2"><?php echo $bloklar["sertifika_transfer_talep_buton"]; ?></button>
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
                    title: '<?php echo $bloklar["alert_transfer_bosdeger_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_transfer_bosdeger_sertifi_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_transfer_success_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_transfer_success_sertifi_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() { window.location.href = "<?php echo URL; ?>create-certificate-transfer-two/";});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_transfer_eror_sertifi_title"]; ?>',
                    text: '<?php echo $bloklar["alert_transfer_eror__sertifi_desc"]; ?>',
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