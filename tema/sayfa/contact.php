<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["iletisim_title"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["iletisim_title"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    
</div>
<div class="content-body">
    <div class="row">
        <div class="col-12">
            <!-- current plan -->
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"><?php echo $bloklar["iletisim_title"]; ?></h4>
                </div>
                <div class="card-body my-2 py-25">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2 pb-50">
                                <h5><?php echo $bloklar["iletisim_title_bir"]; ?></h5>
                                <span><?php echo $ayar["adres"]; ?></span>
                            </div>
                            <div class="mb-2 pb-50">
                                <h5><?php echo $bloklar["iletisim_title_iki"]; ?></h5>
                                <span><?php echo $ayar["telefon"]; ?></span>
                            </div>
                            <div class="mb-2 pb-50">
                                <h5><?php echo $bloklar["iletisim_title_uc"]; ?></h5>
                                <span><?php echo $ayar["email"]; ?></span>
                            </div>
                            <a href="<?php echo $ayar["facebook_url"]; ?>" target="_blank"> <h2 class="h1" data-feather='facebook'></h2> </a>
                            <a href="<?php echo $ayar["instagram_url"]; ?>" target="_blank"> <h2 class="h1" data-feather='instagram'></h2> </a>
                            <a href="<?php echo $ayar["twitter_url"]; ?>" target="_blank"> <h2 class="h1" data-feather='twitter'></h2> </a>
                            <a href="<?php echo $ayar["google_url"]; ?>" target="_blank"> <h2  class="h1"data-feather='youtube'></h2> </a>
                            
                        </div>
                        <div class="col-md-6">
                            <iframe src="<?php echo $ayar["google_maps"]; ?>" height="230" style="border:0;width: 100%;"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title"><?php echo $bloklar["iletisim_form_baslik"]; ?></h4>
                </div>
                <div class="card-body my-2 py-25">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=contactform"  enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="uyeid" value="<?php echo $uyeRow["uye_id"]; ?>">
                                    <input type="hidden" name="name" value="<?php echo $uyeRow["uye_ad"]; ?>">
                                    <input type="hidden" name="surname" value="<?php echo $uyeRow["uye_soyad"]; ?>">
                                    <input type="hidden" name="date" value="<?php echo $uyeRow["uye_dtarih"]; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $uyeRow["uye_telefon"]; ?>">
                                    <input type="hidden" name="eposta" value="<?php echo $uyeRow["uye_eposta"]; ?>">
                                    <input type="hidden" name="uye_firma_adresi" value="<?php echo $uyeRow["uye_firma_adresi"]; ?>">
                                    <input type="hidden" name="uye_firma_vergino" value="<?php echo $uyeRow["uye_firma_vergino"]; ?>">
                                    <input type="hidden" name="uye_firmaunvan" value="<?php echo $uyeRow["uye_firmaunvan"]; ?>">
                                    <input type="hidden" name="uye_firma_telefon" value="<?php echo $uyeRow["uye_firma_telefon"]; ?>">
                                    <input type="hidden" name="uye_firma_email" value="<?php echo $uyeRow["uye_firma_email"]; ?>">
                                    <input type="hidden" name="uye_firma_ulke" value="<?php echo $uyeRow["uye_firma_ulke"]; ?>">
                                    <input type="hidden" name="uye_firma_metemask" value="<?php echo $uyeRow["uye_firma_metemask"]; ?>">
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="register_label_one"><?=$bloklar["iletisim_form_konu"]?></label>
                                            <input class="form-control" id="register_label_one" type="text" name="iletisim_baslik" placeholder="<?=$bloklar["iletisim_form_konu"]?>"  autofocus="" tabindex="1" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="firmaadresi"><?php echo $bloklar["iletisim_form_icerik"]; ?></label>
                                            <textarea class="form-control" id="firmaadresi" rows="3" name="iletisim_desc" placeholder="<?php echo $bloklar["iletisim_form_icerik"]; ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-12">
                                        <center>
                                        <button type="submit" class="btn btn-primary btn-lg me-1"><?php echo $bloklar["iletisim_form_gonder"]; ?></button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- / current plan -->
            
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
title: '<?php echo $bloklar["iletisim_form_bos_title"]; ?>',
text: '<?php echo $bloklar["iletisim_form_bos_desc"]; ?>',
icon: 'info',
customClass: {
confirmButton: 'btn btn-info'
},
buttonsStyling: false
});
return false;
} else if (data == "basarili") {
Swal.fire({
title: '<?php echo $bloklar["iletisim_form_bas_title"]; ?>',
text: '<?php echo $bloklar["iletisim_form_bas_desc"]; ?>',
icon: 'success',
customClass: {
confirmButton: 'btn btn-success'
},
buttonsStyling: false
}).then(function() {window.location.reload(true);});
return true;
} else if (data == "basarisiz") {
Swal.fire({
title: '<?php echo $bloklar["iletisim_form_basasiz_title"]; ?>',
text: '<?php echo $bloklar["iletisim_form_basasiz_desc"]; ?>',
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