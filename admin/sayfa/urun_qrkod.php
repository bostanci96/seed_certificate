<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;
if (isset($_GET["id"])) {
    $id = g("id");
    $catControl = $db->prepare("SELECT * FROM urunler WHERE urun_id=:id");
    $catControl->execute(array("id" => $id));
    if ($catControl->rowCount()) {
        $catRow = $catControl->fetch(PDO::FETCH_ASSOC);
    } else {
        go(ADMIN_URL . 'index.php?sayfa=404');
    }
} else {
    go(ADMIN_URL . 'index.php?sayfa=404');
}

?>



<style type="text/css">
    .card-body {
        padding: 0pc 1.5pc;
    }
    .text-light {
    color: #ffffff !important;
}
   .text-light:hover {
    color: #ffffff !important;
}
a.text-light:hover, a.text-light:focus {
    color: #ffffff !important;
}
</style>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0"> QR Sertifika Yönetimi</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a>
                            </li>
                            <li class="breadcrumb-item"><a href="index.php?sayfa=urunler">Sertifikalar</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">QR Sertifika İşlemi</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <p><b><?php echo $catRow["urun_adi"]; ?> </b> Adlı QR Sertifika İşlemi</p>
                            </h4>
                        </div>
                      <!--  <div class="actions action-btns mx-2"> 
                            <div class="dt-buttons btn-group">
                                <a href="<?= ADMIN_URL . "index.php?sayfa=urun_pdf&id=" . $catRow['urun_id'] ?>" class="btn btn-outline-danger"><span><i class="feather icon-plus"></i> PDF Listesi</span></a>
                            </div>
                        </div>-->
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" ">
                                            <h3 class="p-0 mb-2 mt-4">QR Sertifika Listesi</h3>
                                            <div class="row mb-3">
                                                <?php
                                                $catQuery = $db->query("SELECT * FROM qr_parties where party_product=" . $catRow['urun_id']);
            
                                                foreach ($catQuery as $item) { ?>
                                                    <div class="col-md-2 mb-2 mt-2">
                                                        <a href="<?= $ayar['site_url']."admin/index.php?sayfa=urun_party&id=".$item['party_product']."&party=".$item['party_title'] ?>" class="btn btn-primary p-2 text-light"><?= $item['party_title'] ?></a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>




</div>