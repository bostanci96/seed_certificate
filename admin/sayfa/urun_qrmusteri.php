<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;

if (isset($_GET["id"])) {
    $id = g("id");
    $catControl = $db->prepare("SELECT * FROM qr_codes WHERE qr_id=:id");
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
                                <p> QR Kod Ekle</p>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label>Adı Soyadı</label>
                                                    <input type="text" name="name" class="form-control" value="<?= $catRow['qr_musteri_name'] ?>" disabled id="">
                                                </div> 
                                                <div class="form-group">
                                                    <label>Telefon Numarası</label>
                                                    <input type="text" name="phone" class="form-control" value="<?= $catRow['qr_musteri_telno'] ?>" disabled id="">
                                                </div> 
                                                <div class="form-group">
                                                    <label>E-Posta</label>
                                                    <input type="text" name="email" class="form-control" value="<?= $catRow['qr_musteri_email'] ?>" disabled id="">
                                                </div>  
                                                <div class="form-group">
                                                    <label>TC Kimlik No</label>
                                                    <input type="text" name="tc" class="form-control" value="<?= $catRow['qr_musteri_tc'] ?>" disabled id="">
                                                </div> 
                                             </form>
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