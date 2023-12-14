<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;

if(isset($_GET["id"])){
    $id = g("id");
    $catControl = $db->prepare("SELECT * FROM qr_codes WHERE qr_id=:id");
    $catControl->execute(array("id"=>$id));
    if($catControl->rowCount()){
        $catRow = $catControl->fetch(PDO::FETCH_ASSOC);
    }else{
        go(ADMIN_URL.'index.php?sayfa=404');
    }
}else{
    go(ADMIN_URL.'index.php?sayfa=404');
}


function urunler()
{
    global $db;
    $sorgula = $db->query("SELECT * FROM urunler WHERE urun_durum=1");
    foreach ($sorgula as $item) {
        echo '<option value="' . $item["urun_id"] . '">' . $item['urun_adi'] . '</option>';
    }
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if ($_POST) {


    @$name = $_POST['name'];
    @$phone = $_POST['phone'];
    @$email = $_POST['email'];
    @$tc = $_POST['tc'];
   
    $olustur = $db->prepare('UPDATE qr_codes set qr_musteri_name=?,qr_musteri_telno=?, qr_musteri_email=?, qr_musteri_tc=? where qr_id=?');
    $insert = $olustur->execute([$name, $phone, $email,$tc,$_GET['id']]);


    if ($insert) {
        echo "başarılı";
        header("Refresh: 0; url=https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

    } else {
        echo "başarısız";
    }
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
                    <h2 class="content-header-title float-left mb-0"><?php echo $catRow["qr_random"]; ?> QR Kod Yönetimi</h2>
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
                                <p>Satın Alma İşlemleri</p>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label>Satın Alma Tarihi</label>
                                                    <input type="text" name="name" class="form-control" value="<?php echo @$catRow["qr_musteri_name"]; ?>" placeholder="" id="">
                                                </div> 
                                                <div class="form-group">
                                                    <label>Satın Alma Saati</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo @$catRow["qr_musteri_telno"]; ?>" placeholder="" id="">
                                                </div> 
                                                <!--<div class="form-group">
                                                    <label>E-Posta</label>
                                                    <input type="text" name="email" class="form-control" placeholder="" id="">
                                                </div>  
                                                <div class="form-group">
                                                    <label>TC Kimlik No</label>
                                                    <input type="text" name="tc" class="form-control" placeholder="" id="">
                                                </div> -->
                                                <button type="submit" class="btn btn-primary mb-3 mt-1">Kaydet</button>
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