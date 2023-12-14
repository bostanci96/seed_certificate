<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;
$id = 0;
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
</style>
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Ürün QR Kod Yönetimi</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a>
                            </li>
                            <li class="breadcrumb-item"><a href="index.php?sayfa=urunler">Ürünler</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">QR Kod İşlemi</a>
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
                                <p><b><?php echo $catRow["urun_adi"]; ?> </b> Adlı Ürün QR Kod İşlemi</p>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class=" ">
                                            <h3 class="p-0 mb-2 mt-4">PDF Listesi</h3>
                                            <table class="table">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Ürün</th>
                                                    <th>Party</th>
                                                    <th>İndir</th>
                                                    <th>Tarih</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = $db->prepare("SELECT * FROM qr_pdf where pdf_product=?");
                                                    $query->execute([$id]);
                                                    $result = $query->fetchAll(); 
                                                    foreach ($result as $item) { ?>
                                                        <tr>
                                                            <td><?= $item['pdf_id'] ?></td>
                                                            <td><a href=""><?= $item['pdf_product'] ?></td>
                                                            <td><?= $item['pdf_party'] ?></td>
                                                            <td><a href="save/<?= $item['pdf_path'] ?>" download>Tıkla</a></td>
                                                            <td><?= $item['pdf_createdAt'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
