<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sertifika"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sertifika"]; ?>
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
            <div class="step " data-target="#address-step" role="tab" id="address-step-trigger"  >
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
            <div class="step active" data-target="#social-links" role="tab" id="social-links-trigger" aria-selected="true">
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
            <div id="account-details" class="content " role="tabpanel" aria-labelledby="account-details-trigger">
                
            </div>
            <div id="personal-info" class="content" role="tabpanel" aria-labelledby="personal-info-trigger">
                
            </div>
            <div id="address-step" class="content " role="tabpanel" aria-labelledby="address-step-trigger">
                
                
            </div>
            <div id="social-links" class="content active" role="tabpanel" aria-labelledby="social-links-trigger">
                <div class="content-header">
                    <h5 class="mb-0"><?php echo $bloklar["profile_isletme_sertifika"]; ?></h5>
                    <small class="text-muted"><?php echo $bloklar["profile_isletme_sertifika_desc"]; ?></small>
                </div>
         
                    <div class="row">
                    
                        <div class="mb-5 mt-5 col-md-12">
                            <center>
                            <button onclick="location.href='<?php echo URL;?>create-certificate-two/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button"]; ?></button>

                            <button onclick="location.href='<?php echo URL;?>create-certificate-transfer/'" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["profile_sertifika_button_two"]; ?></button>
                            </center>
                        </div>
                       
                        
                    </div>
           
            </div>
        </div>
    </div>
</section>
<!-- /Horizontal Wizard -->
</div>