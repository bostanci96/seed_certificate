<?php
    if (isset($par[1])) {
    @$urlSef = $par[1];

@$kategori = explode ("_",$urlSef);
@$kategoriid=$kategori[0];
@$kategoriurl=$kategori[1];

    $sayfaControl = $db->prepare("SELECT * FROM haberkategori WHERE kategori_id=:id AND kategori_url=:url AND kategori_durum=:durum");
$sayfaControl ->bindParam("id",$kategoriid,PDO::PARAM_INT);
$sayfaControl ->bindParam("url",$kategoriurl,PDO::PARAM_STR);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
    $sayfaControl -> execute();
    if($sayfaControl->rowCount()){
        $sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
    $katid = $sayfaRow["kategori_id"];
} ?>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $sayfaRow[$lehce."kategori_adi"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item "><a href="<?=URL?>blog/"><?php echo $bloklar["sitemap_blog"]; ?></a>
                    </li>
                     <li class="breadcrumb-item active"><?php echo $sayfaRow[$lehce."kategori_adi"]; ?>
                    </li>

                </ol>
            </div>
        </div>
    </div>
</div>

</div>
<style type="text/css">
    .badge.badge-light-danger {
    background-color: rgb(42 133 61 / 23%);
    color: #164921 !important;
}
</style>
<div class="content-detached">
<div class="content-body">
    <!-- Blog List -->
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row">
            <?php
            $haberQuery = $db->query("SELECT * FROM sayfalar INNER JOIN haberkategori ON kategori_id=portkat  WHERE secenekHaber=1 AND sayfa_durum=1 AND portkat = '$katid' ");
            if($haberQuery->rowCount()){
            foreach($haberQuery as $haberRow){
            ?>
            
            
            <div class="col-md-3 col-12">
                <div class="card">
                    <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>">
                        <img class="card-img-top img-fluid" src="<?php echo URL.'images/sayfalar/big/'.$haberRow["sayfa_resim"];?>" alt="<?php echo $haberRow[$lehce."sayfa_adi"];?>" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>" class="blog-title-truncate text-body-heading"><?php echo $haberRow[$lehce."sayfa_adi"];?></a>
                        </h4>
                        <div class="d-flex">
                            <div class="author-info">
                                <small class="text-muted"><?php echo tarih($haberRow["sayfa_tarih"]);?></small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                             <span class="badge rounded-pill badge-light-danger me-50"><?php echo $haberRow["kategori_adi"];?></span>
                        </div>
                        <p class="card-text blog-content-truncate">
                            <?php echo $haberRow[$lehce."sayfa_desc"];?>
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>" class="fw-bold"><?php echo $bloklar["devamini_oku"]; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Blog List Items -->
        <?php
        }
        }
        ?>
        
    </div>
    <!--/ Blog List -->
</div>
</div>
</div>



  <?php   }else{ ?>
  <div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0"><?php echo $bloklar["sitemap_blog"]; ?></h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=URL?>"><?php echo $bloklar["site_link_map_home"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $bloklar["sitemap_blog"]; ?>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

</div>
<style type="text/css">
    .badge.badge-light-danger {
    background-color: rgb(42 133 61 / 23%);
    color: #164921 !important;
}
</style>
<div class="content-detached">
<div class="content-body">
    <!-- Blog List -->
    <div class="blog-list-wrapper">
        <!-- Blog List Items -->
        <div class="row">
            <?php
            $haberQuery = $db->query("SELECT * FROM sayfalar INNER JOIN haberkategori ON kategori_id=portkat  WHERE secenekHaber=1 AND sayfa_durum=1");
            if($haberQuery->rowCount()){
            foreach($haberQuery as $haberRow){
            ?>
            
            
            <div class="col-md-3 col-12">
                <div class="card">
                    <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>">
                        <img class="card-img-top img-fluid" src="<?php echo URL.'images/sayfalar/big/'.$haberRow["sayfa_resim"];?>" alt="<?php echo $haberRow[$lehce."sayfa_adi"];?>" />
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>" class="blog-title-truncate text-body-heading"><?php echo $haberRow[$lehce."sayfa_adi"];?></a>
                        </h4>
                        <div class="d-flex">
                            <div class="author-info">
                                <small class="text-muted"><?php echo tarih($haberRow["sayfa_tarih"]);?></small>
                            </div>
                        </div>
                        <div class="my-1 py-25">
                             <span class="badge rounded-pill badge-light-danger me-50"><?php echo $haberRow["kategori_adi"];?></span>
                        </div>
                        <p class="card-text blog-content-truncate">
                            <?php echo $haberRow[$lehce."sayfa_desc"];?>
                        </p>
                        <hr />
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?php echo URL.'page/'.$haberRow["sayfa_url"].'/';?>" class="fw-bold"><?php echo $bloklar["devamini_oku"]; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Blog List Items -->
        <?php
        }
        }
        ?>
        
    </div>
    <!--/ Blog List -->
</div>
</div>
</div>
<?php } ?>