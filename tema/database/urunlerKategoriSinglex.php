
         <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                            <!-- account setting card -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- account setting header -->
                                    <h6 class="kb-title">
                                       <?php echo $altCatRow[$lehce."kategori_desc"];?>
                                        <span><?php echo $altCatRow[$lehce."kategori_adi"];?></span>
                                    </h6>

                                    <div class="list-group list-group-circle mt-2">

<?php   
 $urunSorgu = $db->prepare("SELECT * FROM sayfalar 
              INNER JOIN databasekategori ON portkat=kategori_id
              WHERE kategori_id=:id AND sayfa_durum=:durum AND secenekHaber=:haber
              GROUP BY (sayfa_id) ORDER BY sayfa_id");
            $urunSorgu -> bindParam("id",$katid,PDO::PARAM_STR);
            $urunSorgu -> bindValue("durum",1,PDO::PARAM_INT);
            $urunSorgu -> bindValue("haber",88,PDO::PARAM_INT);
            $urunSorgu -> execute();
            if($urunSorgu->rowCount()){
              $sayac=0;
              foreach($urunSorgu as $urunRow){
$link = URL."database_page/".$urunRow["sayfa_url"]."/";
               ?>

                                        <a href="<?php echo $link; ?>" class="list-group-item text-body"><?php echo $urunRow["sayfa_adi"]; ?></a>
                                       

<?php }
 } ?>
                                       
                                    </div>
                                </div>
                            </div>
        </div>




