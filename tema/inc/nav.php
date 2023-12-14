<div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" href="<?php echo URL; ?>">
                <span class="brand-logo">
                    <img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" class="img-fluid" alt="<?php echo $ayar[$lehce.'site_title']; ?>">
                </span>
            </a>
        </li>
    </ul>
</div>
<div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item">
                <a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
            </li>
        </ul>
        <ul class="nav navbar-nav bookmark-icons">
            <!--  <li class="nav-item d-none d-lg-block">
                <a class="nav-link" href="app-email.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a>
            </li>-->
            <li class="nav-item d-none d-lg-block">
        </li>
    </ul>
    
</div>
<ul class="nav navbar-nav align-items-center ms-auto">
    
 
    <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?php echo $uyeRow["uye_ad"].' '.$uyeRow["uye_soyad"]; ?></span><span class="user-status"><?php echo rutbekont($uyeRow["uye_rutbe"]); ?></span></div>
            <span class="avatar"><img class="round" src="<?php if(!$uyeRow["uye_profil_img"]){ if($uyeRow["uye_cinsiyet"]==1){ ?><?php echo URL;?>images/erkek.png<?php }else{ ?><?php echo URL;?>images/kadin.png <?php } }else{ ?><?php echo URL;?>images/profile_img/big/<?php echo $uyeRow["uye_profil_img"]; ?><?php } ?>" alt="avatar" height="40" width="40" /><span class="avatar-status-online"></span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="<?php echo URL; ?>profile/"><i class="me-50" data-feather="user"></i> <?php echo $bloklar["profil_setings_two"]; ?></a>
           <!-- <a class="dropdown-item" href="<?php echo URL; ?>settings/"><i class="me-50" data-feather="settings"></i> <?php echo $bloklar["profil_setings_tree"]; ?></a>-->
            <a class="dropdown-item" href="<?php echo TEMA_URL; ?>ajax.php?p=logout"><i class="me-50" data-feather="power"></i> <?php echo $bloklar["profil_setings_one"]; ?></a>
        </div>
    </li>
</ul>
</div>