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
<?php if ($sayfaRow["secenekHaber"]=1) { ?>
   
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
                     <li class="breadcrumb-item"><a href="<?=URL?>blog/"><?php echo $bloklar["sitemap_blog"]; ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $sayfaRow[$lehce."sayfa_adi"];?>
                    </li>
                </ol>
            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog Detail -->
                    <div class="blog-detail-wrapper">
                        <div class="row">
                            <!-- Blog -->
                            <div class="col-12">
                                <div class="card">
                                	<?php if ($sayfaRow["sayfa_resim"]) { ?>
                                		
                                <center>
                                    <img src="<?php echo URL.'images/sayfalar/big/'.$sayfaRow["sayfa_resim"];?>" class="img-fluid card-img-top" alt="<?php echo $sayfaRow[$lehce."sayfa_adi"];?>" style="    width: 50%;" />
                                    
                                    	</center>
                                            <?php } ?>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $sayfaRow[$lehce."sayfa_adi"];?></h4>
                                        <div class="d-flex">
                                            <div class="author-info">
                                                <small class="text-muted">	<?php echo tarih($sayfaRow["sayfa_tarih"]);?></small>
                                            </div>
                                        </div>
                                           <div class="my-1 py-25">
                                            <?php $testkat = $db->query("SELECT * FROM haberkategori WHERE kategori_id = '$kat_id' ")->fetch(PDO::FETCH_ASSOC); ?>
                                                <span class="badge rounded-pill badge-light-danger me-50"><?php echo $testkat[$lehce."kategori_adi"]; ?></span>
                                        </div>
                                        
                                        <p class="card-text mb-2">
                                           	<?php echo $sayfaRow[$lehce."sayfa_icerik"];?>
                                        </p>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <!--/ Blog -->

                          
                        </div>
                    </div>
                    <!--/ Blog Detail -->
</div>
</div>
</div>

<?php }else{ ?>
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
                    <li class="breadcrumb-item active"><?php echo $sayfaRow[$lehce."sayfa_adi"];?>
                    </li>
                </ol>
            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-detached content-left">
                <div class="content-body">
                    <!-- Blog Detail -->
                    <div class="blog-detail-wrapper">
                        <div class="row">
                            <!-- Blog -->
                            <div class="col-12">
                                <div class="card">
                                    <?php if ($sayfaRow["sayfa_resim"]) { ?>
                                        
                                <center>
                                    <img src="<?php echo URL.'images/sayfalar/big/'.$sayfaRow["sayfa_resim"];?>" class="img-fluid card-img-top" alt="<?php echo $sayfaRow[$lehce."sayfa_adi"];?>" style="    width: 50%;" />
                                       
                                        </center>
                                         <?php } ?>
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $sayfaRow[$lehce."sayfa_adi"];?></h4>
                                        
                                        <p class="card-text mb-2">
                                            <?php echo $sayfaRow[$lehce."sayfa_icerik"];?>
                                        </p>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <!--/ Blog -->

                          
                        </div>
                    </div>
                    <!--/ Blog Detail -->
</div>
</div>
</div>

<?php } ?>