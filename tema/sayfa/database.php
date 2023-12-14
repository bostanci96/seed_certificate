<link rel="stylesheet" type="text/css" href="<?php echo TEMA_URL; ?>tema-assets/css/pages/page-knowledge-base.css">
<?php
if (isset($par[1])) {
@$urlSef = $par[1];
@$kategori = explode ("_",$urlSef);
@$kategoriid=$kategori[0];
@$kategoriurl=$kategori[1];
$sayfaControl = $db->prepare("SELECT * FROM databasekategori WHERE kategori_id=:id AND kategori_url=:url AND kategori_durum=:durum");
$sayfaControl ->bindParam("id",$kategoriid,PDO::PARAM_INT);
$sayfaControl ->bindParam("url",$kategoriurl,PDO::PARAM_STR);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
$sayfaControl -> execute();
if($sayfaControl->rowCount()){
$sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
$katid = $sayfaRow["kategori_id"];
$kategori_id = $sayfaRow["kategori_id"];
$kategori_ust_id = $sayfaRow["kategori_ust_id"];
$checked   = true;
}
}
?>
<!-- BEGIN: Content-->
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["sitmap_database"]; ?></h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $bloklar["sitmap_database"]; ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Knowledge base Jumbotron -->
    <section id="knowledge-base-search">
        <div class="row">
            <div class="col-12">
                <div class="card knowledge-base-bg text-center" style="background-image: url('<?php echo TEMA_URL; ?>tema-assets/images/banner/banner.png')">
                    <div class="card-body">
                        <h2 class="text-primary"><?php echo $bloklar["database_one"]; ?></h2>
                        <p class="card-text mb-2">
                            <span><?php echo $bloklar["database_two"]; ?></span>
                        </p>
                        <form class="kb-search-input">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i data-feather="search"></i></span>
                                <input type="text" class="form-control" id="searchbar" placeholder="<?php echo $bloklar["database_tree"]; ?>" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Knowledge base Jumbotron -->
    <!-- Knowledge base -->
    <section id="knowledge-base-content">
        <div class="row kb-search-content-info match-height">
            <!-- sales card -->
            <?php
            if(isset($checked)){
            
            $altCatQuery = $db->prepare("SELECT * FROM databasekategori
            WHERE kategori_ust_id=:ust_kategori AND kategori_durum=:durum AND kat_secenek=:secenek");
            $altCatQuery -> bindParam("ust_kategori",$kategori_id,PDO::PARAM_INT);
            $altCatQuery -> bindValue("durum",1,PDO::PARAM_INT);
            $altCatQuery -> bindValue("secenek",1,PDO::PARAM_INT);
            $altCatQuery -> execute();
            if($altCatQuery->rowCount()){
            $sayac=0;
            foreach($altCatQuery as $altCatRow){
            $sayac++;
            $katid = $altCatRow["kategori_id"];
            $link = URL."database/".$altCatRow["kategori_id"]."_".$altCatRow["kategori_url"]."/";
            require(TEMA_INC.'database/urunlerKategoriSinglex.php');
            }
            }else{
            echo "asd";
            }
            
            }else{
            $altCatQuery = $db->prepare("SELECT * FROM databasekategori
            WHERE kategori_ust_id=:ust_kategori AND kategori_durum=:durum AND kat_secenek=:secenek");
            $altCatQuery -> bindValue("ust_kategori",0,PDO::PARAM_INT);
            $altCatQuery -> bindValue("durum",1,PDO::PARAM_INT);
            $altCatQuery -> bindValue("secenek",1,PDO::PARAM_INT);
            $altCatQuery -> execute();
            if($altCatQuery->rowCount()){
            $sayac=0;
            foreach($altCatQuery as $altCatRow){
            $sayac++;
            $link = URL."database/".$altCatRow["kategori_id"]."_".$altCatRow["kategori_url"]."/";
            require(TEMA_INC.'database/urunlerKategoriSingle.php');
            }
            }
            }
            ?>
            
            <!-- no result -->
            <div class="col-12 text-center no-result no-items">
                <h4 class="mt-4"><?php echo $bloklar["database_fiva"]; ?></h4>
            </div>
        </div>
    </section>
    <!-- Knowledge base ends -->
</div>
</div>
<script src="<?php echo TEMA_URL; ?>tema-assets/js/scripts/pages/page-knowledge-base.js"></script>