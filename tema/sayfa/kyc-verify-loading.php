<style type="text/css">
.bg-text {position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 2;text-align: center;}
</style>
<div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_kyc"]; ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_kyc"]; ?>
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
                <div class="step active" data-target="#account-details" role="tab" id="account-details-trigger"  aria-selected="true">
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
                    </span>;
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="account-details" class="content active" role="tabpanel" aria-labelledby="account-details-trigger">
                    <div class="content-header">
                        <h5 class="mb-0"><?php echo $bloklar["profile_kimlik_dogrulama"]; ?></h5>
                        <small class="text-muted"><?php echo $bloklar["profile_kimlik_dogrulama_desc"]; ?></small>
                    </div>
                    <form role="form" class="form-horizontal" id="forms" style="filter: blur(12px);-webkit-filter: blur(12px);    pointer-events: -webkit-user-select: none;-ms-user-select: none;user-select: none;">
                        <div class="row">
                            <div class="mb-1 col-md-6">
                                 <div class="offset-md-2 col-md-8 mb-1">
                                    <img style="width:450px;height:350px;" src="<?php echo URL; ?>images/kimlik_pasaport/big/<?php echo $uyeRow["uye_kimlik_pasaport"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_kimlik_pasaportfile"]; ?></label>
                                <input class="form-control"  name="kimlikpasaport[]" id="kimlikpasaport[]" type="file" id="formFile" disabled />
                               
                            </div>
                            <div class="mb-1 col-md-6">
                                 <div class="offset-md-2 col-md-8 mb-1">
                                    <img style="width:450px;height:350px;" src="<?php echo URL; ?>images/kimlik_selfy/big/<?php echo $uyeRow["uye_kimlik_selfy"]; ?>" class="img-fluid">
                                </div>
                                <label for="formFile" class="form-label"><?php echo $bloklar["profile_kimlik_selfyfile"]; ?></label>
                                <input class="form-control"  name="kimlikselfy[]" id="kimlikselfy[]" type="file" id="formFile" disabled />
                               
                            </div>
                           
                        </div>
                    </form>
                    <div class="bg-text">
                        <div class="alert alert-success" role="alert">
                             <h2 class="alert-heading"><?php echo $bloklar["kyc_verify_loading_baslik"]; ?></h2>
                              <div class="alert-body">
                                   <?php echo $bloklar["kyc_verify_loading_desc"]; ?>
                              </div>
                         </div>
                    </div>
                </div>
                <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                    
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