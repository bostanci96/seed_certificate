<?php
    if (isset($par[1])) {
$urlSef = $par[1];
    $sayfaControl = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_url=:url AND sayfa_durum=:durum");
    $sayfaControl ->bindParam("url",$urlSef,PDO::PARAM_STR,50);
    $sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
    $sayfaControl -> execute();
    if($sayfaControl->rowCount()){
        $sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
          $kat_id =   $sayfaRow["portkat"];
    }else{
        go(URL);
    }
}else{
    go(URL);
}
?>

<style type="text/css">
.badge.badge-light-danger {
background-color: rgb(42 133 61 / 23%);
color: #164921 !important;
}
</style>
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    
                    <h2 class="content-header-title float-start mb-0"><?php echo $sayfaRow[$lehce."sayfa_adi"];?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                        </li>
                        <li class="breadcrumb-item"><a href="<?=URL?>database/"><?php echo $bloklar["sitmap_database"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $sayfaRow[$lehce."sayfa_adi"];?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>


</div>
<div class="content-body">
<!-- Knowledge base question Content  -->
<section id="knowledge-base-question">
    <div class="row">
        <div class="col-lg-3 col-md-5 col-12 order-2 order-md-1">
            <div class="card">
                <div class="card-body">
                    <h6 class="kb-title">
                           <?php $testkat = $db->query("SELECT * FROM databasekategori WHERE kategori_id = '$kat_id' ")->fetch(PDO::FETCH_ASSOC); $kat =  $testkat["kategori_id"]; ?>
                    <?php echo $testkat["kategori_desc"]; ?><span><?php echo $testkat[$lehce."kategori_adi"]; ?></span>
                    </h6>
                    <div class="list-group list-group-circle mt-1">
 <?php
            $haberQuery = $db->query("SELECT * FROM sayfalar INNER JOIN databasekategori ON kategori_id=portkat  WHERE secenekHaber=88 AND sayfa_durum=1 AND portkat = '$kat' ");
            if($haberQuery->rowCount()){
            foreach($haberQuery as $haberRow){
            ?>
            



                        <a href="<?php echo URL.'database_page/'.$haberRow["sayfa_url"].'/';?>" class="list-group-item text-body"><?php echo $haberRow[$lehce."sayfa_adi"];?></a>

 <?php
        }
        }
        ?>
        

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-7 col-12 order-1 order-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-1">
                    <i data-feather="smartphone" class="font-medium-5 me-25"></i>
                    <span><?php echo $sayfaRow[$lehce."sayfa_adi"];?></span>
                    </h4>
                    <p class="mb-2"><?php echo tarih($sayfaRow["sayfa_tarih"]);?></p>
                    <p>
                        <?php echo $sayfaRow[$lehce."sayfa_icerik"];?>
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Knowledge base question Content ends -->
</div>
</div>