<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>



<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Mesaj İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Okunan Mesajlarım</a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="content-body">
		<!-- Data list view starts -->
		<section id="data-list-view" class="data-list-view-header">


			<!-- DataTable starts -->
			<div class="table-responsive">
				<div class="actions action-btns"><div class="dt-buttons btn-group">
					<a href="index.php?sayfa=bekleyen" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i>Bekleyenler</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>İD</th>

								<th>Gönderen</th>
								<th>E-posta</th>
								<th>Telefon</th>
								<th>Mesajın Konusu</th>
								<th>Gönderim Tarihi</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$kquery = $db->query("SELECT * FROM iletisim WHERE iletisim_durum=1  ORDER BY iletisim_id DESC ");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){          

									?>
									<tr>
										<td></td>
										<td><?php echo $kRow["iletisim_id"];?></td>


										<td><?php echo $kRow["iletisim_isim"];?></td>
										<td><?php echo $kRow["iletisim_eposta"];?></td>
										<td><?php echo $kRow["iletisim_tel"];?></td>
										<td><?php echo $kRow["iletisim_konu"];?></td>
										<td><?php echo tarih($kRow["iletisim_tarih"]);?></td>

										<td>    <?php
										if($kRow["iletisim_durum"]==1){ ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Okundu</div>
												</div>
												</div> <?php }else {?>
													<div class="chip chip-danger">
														<div class="chip-body">
															<div class="chip-text">Okunmadı</div>
														</div>
													</div>
												<?php }?>
											</td>
											<td > <div class="dropdown dropright">

												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=mesaj_oku&id=<?php echo $kRow["iletisim_id"];?>">Görüntüle / Oku</a>
                                               <!-- <a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $kRow["iletisim_id"];?>);">
                                                    <?php if($kRow["iletisim_durum"]==1){echo  "Okunmadı Yap";}else{echo "Okundu Yap";}?>
                                                </a>-->
                                                <a class="dropdown-item"  onclick="TekSil(<?php echo $kRow["iletisim_id"];?>);" >Mesajı Sil</a>
                                            </div>
                                        </div>   


                                    </td>
                                </tr>

                            <?php  }} ?>



                        </tbody>
                    </table>
                </div>
                <!-- DataTable ends -->

                <!-- add new sidebar ends -->
            </section>
            <!-- Data list view end -->

        </div>
    </div>

    <script>
    	$(document).ready(function() {
    		$('.datatable').dataTable({
    			"bSort":false
    		});
    	});
    	function TekSil(catId){
    		$.post('ajax.php?p=mesajsil', {id: catId}, function (data) {
    			if(data=="basarili"){
    				sweetAlert({
    					title	: "Başarılı",
    					text 	: "Mesaj başarılı bir şekilde silinmiştir.",
    					type	: "success"
    				},
    				function(){
    					window.location.reload(true);
    				});
    				return false;
    			}else if(data=="basarisiz"){
    				swal("Başarısız","Silinemedi","error");
    				return false;
    			}
    		});
    	}
    	function durumDegis(catId){
    		$.post('ajax.php?p=cat_durum_degis', {id: catId}, function (data) {
    			if(data=="yasaklama-basarili"){
    				sweetAlert({
    					title	: "Başarılı",
    					text 	: "Mesaj başarılı bir şekilde gizlendi.",
    					type	: "success"
    				},
    				function(){
    					window.location.reload(true);
    				});
    				return false;
    			}else if(data=="yasak-kaldirildi"){
    				sweetAlert({
    					title	: "Başarılı",
    					text 	: "Mesaj başarılı bir şekilde aktifleştirildi.",
    					type	: "success"
    				},
    				function(){
    					window.location.reload(true);
    				});
    				return false;
    			}else if(data=="basarisiz"){
    				swal("Başarısız","Silinemedi","error");
    				return false;
    			}
    		});
    	}

    </script>
