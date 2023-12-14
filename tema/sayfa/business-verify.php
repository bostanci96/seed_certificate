<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_isletme"]; ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_isletme"]; ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Horizontal Wizard -->
    <section class="horizontal-wizard">
        <div class="bs-stepper horizontal-wizard-example">
            <div class="bs-stepper-header" role="tablist">
                <div class="step" data-target="#account-details" role="tab" id="account-details-trigger" aria-selected="false">
                    <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title"><?php echo $bloklar["profile_step_one"]; ?></span>
                        <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_one_desc"]; ?></span>
                    </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step active" data-target="#personal-info" role="tab" id="personal-info-trigger" aria-selected="true">
                    <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title"><?php echo $bloklar["profile_step_two"]; ?></span>
                        <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_two_desc"]; ?></span>
                    </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#address-step" role="tab" id="address-step-trigger">
                    <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title"><?php echo $bloklar["profile_step_tree"]; ?></span>
                        <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_tree_desc"]; ?></span>
                    </span>
                    </button>
                </div>
                <div class="line">
                    <i data-feather="chevron-right" class="font-medium-2"></i>
                </div>
                <div class="step" data-target="#social-links" role="tab" id="social-links-trigger">
                    <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">4</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title"><?php echo $bloklar["profile_step_four"]; ?></span>
                        <span class="bs-stepper-subtitle"><?php echo $bloklar["profile_step_four_desc"]; ?></span>
                    </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="account-details" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
               
                </div>
                <div id="personal-info" class="content active" role="tabpanel" aria-labelledby="personal-info-trigger">
                         <div class="content-header">
                        <h5 class="mb-0"><?php echo $bloklar["profile_isletme_dogrulama"]; ?></h5>
                        <small class="text-muted"><?php echo $bloklar["profile_isletme_dogrulama_desc"]; ?></small>
                    </div>
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=businesverify_one"  enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
               
                                        <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaadresi"><?php echo $bloklar["profile_isletme_dogrulama_input_one"]; ?></label>
                                                    <textarea class="form-control" id="firmaadresi" rows="3" name="uye_firma_adresi" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_one_desc"]; ?>"></textarea>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmavergino"><?php echo $bloklar["profile_isletme_dogrulama_input_two"]; ?></label>
                                                    <input type="text" id="firmavergino" class="form-control" name="uye_firma_vergino" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_two_desc"]; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaunvan"><?php echo $bloklar["profile_isletme_dogrulama_input_tree"]; ?></label>
                                                    <input type="text" id="firmaunvan" class="form-control" name="uye_firmaunvan" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_tree_desc"]; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmatelefon"><?php echo $bloklar["profile_isletme_dogrulama_input_four"]; ?></label>
                                                    <input type="text" id="firmatelefon" class="form-control" name="uye_firma_telefon" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_four_desc"]; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmamailadresi"><?php echo $bloklar["profile_isletme_dogrulama_input_five"]; ?></label>
                                                    <input type="text" id="firmamailadresi" class="form-control" name="uye_firma_email" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_five_desc"]; ?>" />
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaulkesi"><?php echo $bloklar["profile_isletme_dogrulama_input_six"]; ?></label>
                                                    <input type="text" id="firmaulkesi" class="form-control" name="uye_firma_ulke" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_six_desc"]; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmametemask"><?php echo $bloklar["profile_isletme_dogrulama_input_seven"]; ?></label>
                                                    <input type="text" id="firmametemask" class="form-control" name="uye_firma_metemask" placeholder="<?php echo $bloklar["profile_isletme_dogrulama_input_seven_desc"]; ?>" />
                                                </div>
                                            </div>

                            <div class=" col-md-12">
                                <center>
                                  <button type="submit" class="btn btn-primary btn-lg me-1 mt-2"><?php echo $bloklar["profile_isletme_dogrulama_buton"]; ?></button>
                                 </center>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="address-step" class="content" role="tabpanel" aria-labelledby="address-step-trigger">
                    
                </div>
                <div id="social-links" class="content" role="tabpanel" aria-labelledby="social-links-trigger">
                    
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
                    title: '<?php echo $bloklar["alert_bosdeger_business_title"]; ?>',
                    text: '<?php echo $bloklar["alert_bosdeger_business_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_success_business_title"]; ?>',
                    text: '<?php echo $bloklar["alert_success_business_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() {window.location.reload(true);});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_eror_business_title"]; ?>',
                    text: '<?php echo $bloklar["alert_eror_business_desc"]; ?>',
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
