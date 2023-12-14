<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_isletme_two"]; ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_isletme_two"]; ?>
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
                <div class="step " data-target="#account-details" role="tab" id="account-details-trigger" >
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
                <div class="step" data-target="#personal-info" role="tab" id="personal-info-trigger">
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
                <div class="step active" data-target="#address-step" role="tab" id="address-step-trigger"  aria-selected="true">
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
                    </span>;
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="account-details" class="content active" role="tabpanel" aria-labelledby="account-details-trigger">
                 
                </div>
                <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                    
                </div>
                <div id="address-step" class="content active" role="tabpanel" aria-labelledby="address-step-trigger">
                       <div class="content-header">
                        <h5 class="mb-0"><?php echo $bloklar["profile_isletme_evrak"]; ?></h5>
                        <small class="text-muted"><?php echo $bloklar["profile_isletme_evrak_desc"]; ?></small>
                    </div>
               <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=businesverify_two_again"  enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                        
                          
<?php if ($uyeRow["uye_imza_surkusu_onay"]=="on") { ?>

                        <div class="col-6">
                            <div class="mb-1">
                                  <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_one"]; ?></label>
                                <input class="form-control"  name="imza_surkusu[]" id="imza_surkusu[]" type="file" id="formFile" />
                            </div>
                        </div>

<?php }if ($uyeRow["uye_faliyet_belgesi_onay"]=="on") { ?>

                        <div class="col-6">
                            <div class="mb-1">
                                  <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_two"]; ?></label>
                                <input class="form-control"  name="faliyet_belgesi[]" id="faliyet_belgesi[]" type="file" id="formFile" />
                            </div>
                        </div>

<?php } if ($uyeRow["uye_vergi_levhasi_onay"]=="on") { ?>

                        <div class="col-6">
                            <div class="mb-1">
                                  <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_tree"]; ?></label>
                                <input class="form-control"  name="vergi_levhasi[]" id="vergi_levhasi[]" type="file" id="formFile" />
                            </div>
                        </div>

<?php } if ($uyeRow["uye_firma_adres_ispat_onay"]=="on") { ?>

                        <div class="col-6">
                            <div class="mb-1">
                                  <div class="offset-md-3 col-md-5 mb-1">
                                    <img style="width:100%;height:150px;"  src="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_isletme_evrak_four"]; ?></label>
                                <input class="form-control"  name="firma_adres_ispat[]" id="firma_adres_ispat[]" type="file" id="formFile" />
                            </div>
                        </div>
                      
<?php } ?>
                             <div class=" col-md-12">
                            <center>
                            <button type="submit" class="btn btn-primary btn-lg me-1 mt-2"><?php echo $bloklar["profile_isletme_evrak_yeniden_buton"]; ?></button>
                            </center>
                        </div>
                           
                        </div>
                    </form>
                
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
         uploadProgress: function(event, position, total, percentComplete) {
            let timerInterval
            Swal.fire({
                icon: 'info',
                title: '<?php echo $bloklar["alert_info_title"]; ?>',
                html: '<?php echo $bloklar["alert_info_desc"]; ?> <b></b> ',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            });
        },
        success: function(data) {
            if (data == "bos-deger") {
                 Swal.fire({
                    title: '<?php echo $bloklar["alert_bosdeger_businesstwo_title"]; ?>',
                    text: '<?php echo $bloklar["alert_bosdeger_businesstwo_desc"]; ?>',
                    icon: 'info',
                    customClass: {
                      confirmButton: 'btn btn-info'
                    },
                    buttonsStyling: false
                  });
                return false;
            } else if (data == "basarili") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_success_businesstwo_title"]; ?>',
                    text: '<?php echo $bloklar["alert_success_businesstwo_desc"]; ?>',
                    icon: 'success',
                    customClass: {
                      confirmButton: 'btn btn-success'
                    },
                    buttonsStyling: false
                  }).then(function() {window.location.reload(true);});
                return true;
            } else if (data == "basarisiz") {
                  Swal.fire({
                    title: '<?php echo $bloklar["alert_eror_businesstwo_title"]; ?>',
                    text: '<?php echo $bloklar["alert_eror_businestwo_desc"]; ?>',
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
