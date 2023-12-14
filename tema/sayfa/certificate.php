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
</div><div class="content-body">

    <section class="app-user-list">
        <div class="row">
            <?php
            $uyeQuery = $db->query("SELECT * FROM  sertifikalar WHERE sertifi_uye_id={$_SESSION['uye_id']} ");
            if($uyeQuery->rowCount()){
            foreach($uyeQuery as $uyeRow){
            ?>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                   <a href="<?php if ($uyeRow["sertifi_ornek_durum"]==1 AND $uyeRow["sertifi_onay"]==2) { echo URL.'certificate-tree/'.$uyeRow["sertifi_id"]."/";}else if ($uyeRow["sertifi_ornek_durum"]==2) {echo URL.'certificate-four/'.$uyeRow["sertifi_id"]."/";}else{ echo "javascript:void(0);"; } ?>">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75"><?php echo $uyeRow["sertifi_adet"];?> <small><?php echo $bloklar["homepage_sertifika_adet"]; ?></small></h3>
                                <span><?php echo $uyeRow["sertifi_baslik"];?></span>
                            </div>
                            <?php if ($uyeRow["sertifi_onay"]==2) { ?>
                            <div class="avatar bg-success p-50">
                                <span class="avatar-content">
                                    <i data-feather='check-circle' class="font-medium-4"></i>
                                </span>
                            </div>
                            <?php  }else{ ?>
                            <div class="avatar bg-warning p-50">
                                <span class="avatar-content">
                                    <i data-feather='loader' class="font-medium-4"></i>
                                </span>
                            </div>
                            
                            <?php }  ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php  }} ?>
        </div>
    </section>

    </div>