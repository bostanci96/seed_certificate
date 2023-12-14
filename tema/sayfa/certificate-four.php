<?php
if ($par[1]) {
$sertifika_id = $par[1];
$sertifika_uye_id = $_SESSION['uye_id'];
$ayarControl = $db->query("SELECT * FROM sertifikalar WHERE sertifi_uye_id='$sertifika_uye_id' AND sertifi_id='$sertifika_id' ");
if($ayarControl->rowCount()){
$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
$urunid = $ayarRow["sertifi_urun_id"];
}else{
go(URL);
}
}else{
go(URL);
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/jquery.dataTables.css">
<style type="text/css">
.dt-buttons{
display: inline-block;
}
.dt-button{
border-color: #164921 !important;
background-color: #164921 !important;
color: #fff !important;font-size: 16px;
}
</style>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["site_link_map_sertifika_two_olusturma"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["site_link_map_sertifika_two_olusturma"]; ?>
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
                    <form role="form" class="form-horizontal" id="forms" method="POST" action="<?php echo TEMA_URL; ?>ajax.php?p=sertifikauret_talep"  enctype="multipart/form-data">
                        <div class="row">
                            <?php if ($ayarRow["sertifi_transfer_durum"]==1) { ?> <h1 style="color: #164921;"><?php echo $bloklar["transfer_onay_mesaj"]; ?></h1>  <?php } ?>
                            <input type="hidden" name="sertifi_id" value="<?php echo $ayarRow["sertifi_id"]; ?>">
                            <input type="hidden" name="sertifi_adet" value="<?php echo $ayarRow["sertifi_adet"]; ?>">
                            <input type="hidden" name="uye_id" value="<?php echo $sertifika_uye_id; ?>">
                            <input type="hidden" name="sertifi_baslik" value="<?php echo $ayarRow["sertifi_baslik"]; ?>">
                            <input type="hidden" name="sertifi_tarih" value="<?php echo $ayarRow["sertifi_tarih"]; ?>">
                            
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_two_baslikx"]; ?></label>
                                    <input type="text" class="form-control" disabled value="<?php echo $ayarRow["sertifi_baslik"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olustur_two_label"]; ?></label>
                                    <input type="text" class="form-control" disabled   value="<?php echo $ayarRow["sertifi_adet"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olus_trasferkod"]; ?></label>
                                    <input type="text" class="form-control" disabled   value="<?php echo $ayarRow["sertifi_transferkod"]; ?>" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"><?php echo $bloklar["sertifika_olus_tarih"]; ?></label>
                                    <input type="text" class="form-control" disabled   value="<?php echo tarih($ayarRow["sertifi_tarih"]); ?>" />
                                </div>
                            </div>
                            <div class="mb-1 col-md-12">
                                <div class="offset-md-1 col-md-9 mb-1">
                                    <?php
                                    $str = $ayarRow["sertifi_ornek_sab"];
                                    $str =  explode("tema/sertifika",$str);
                                    ?>
                                    <img src="<?php echo TEMA_URL."sertifika".$str[1]; ?>" class="img-fluid">
                                </div>
                                
                                
                            </div>
                            <?php if ($ayarRow["sertifi_transfer_durum"]==2) { ?>
                            <div class=" col-md-12">
                                <center>
                                <button type="submit" class="btn btn-primary btn-lg me-1 mt-2" <?php if (!$ayarRow["sertifi_transferkod"]) { echo "disabled";  } ?>><?php echo $bloklar["sertifika_olustur_buton"]; ?></button>
                                </center>
                            </div>
                            <?php } ?>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<?php $sertifikont = $db->query("SELECT * FROM urunler WHERE urun_id = '$urunid' ")->fetch(PDO::FETCH_ASSOC);

if ($sertifikont["urun_durum"]==8888) { ?>
     
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $ayarRow["sertifi_baslik"];?> <?php echo $bloklar["uretilen_sertifikalar"]; ?></h4>
                    
                </div>
                <div class="card-body">
                    <table id="example" class="dt-responsive table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo $bloklar["table_one"]; ?></th>
                                <th><?php echo $bloklar["table_two"]; ?></th>
                                <th><?php echo $bloklar["table_tree"]; ?></th>
                                <th><?php echo $bloklar["table_five"]; ?></th>
                                <th><?php echo $bloklar["table_six"]; ?></th>
                                <th><?php echo $bloklar["table_seven"]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $catQuery = $db->query("SELECT * FROM urunler INNER JOIN qr_codes ON urun_id=qr_product WHERE urun_id = '$urunid '");
                            if ($catQuery->rowCount()) {
                            foreach ($catQuery as $catRow) {
                            
                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $catRow["urun_tam_icerik"];  ;?></td>
                                <td><?php echo $catRow["partyseri"];  ;?></td>
                                <td><?php echo $catRow["urun_icerik"];  ;?></td>
                                <td><?php echo $catRow["ar_urun_icerik"];  ;?></td>
                                <td><button onclick="window.open('<?php echo $catRow["qr_url"];  ;?>')" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_six"]; ?></button></td>
                                <td>
                                    <button onclick="window.open('<?php echo URL."nftcertificate/".$catRow['qr_random']."/".$catRow['qr_product'] ?>')" class="btn btn-primary  me-1 mt-2"><?php echo $bloklar["table_seven"]; ?></button>
                                    </center>
                                    
                                </td>
                            </tr>
                            <?php }  } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
 <?php } ?>

</div>
<!-- /Horizontal Wizard -->
</div>
<script>
$(document).ready(function(event) {
$('#forms').ajaxForm({
success: function(data) {
if (data == "bos-deger") {
Swal.fire({
title: '<?php echo $bloklar["sertifikaolusturma_alert_bir_title"]; ?>',
text: '<?php echo $bloklar["sertifikaolusturma_alert_bir_desc"]; ?>',
icon: 'info',
customClass: {
confirmButton: 'btn btn-info'
},
buttonsStyling: false
});
return false;
} else if (data == "basarili") {
Swal.fire({
title: '<?php echo $bloklar["sertifikaolusturma_alert_iki_title"]; ?>',
text: '<?php echo $bloklar["sertifikaolusturma_alert_iki_desc"]; ?>',
icon: 'success',
customClass: {
confirmButton: 'btn btn-success'
},
buttonsStyling: false
}).then(function() { window.location.href = "<?php echo URL.'certificate-four/'.$sertifika_id.'/'; ?>";});
return true;
} else if (data == "basarisiz") {
Swal.fire({
title: '<?php echo $bloklar["sertifikaolusturma_alert_uc_title"]; ?>',
text: '<?php echo $bloklar["sertifikaolusturma_alert_uc_desc"]; ?>',
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
$(document).ready(function() {
$('#example').DataTable( {
"aLengthMenu": [[40, 100, 150, 200], [40, 100, 150, 200]],
"pageLength": 40,
 order: [[2, 'asc']],
/*dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]*/
} );
} );
</script>