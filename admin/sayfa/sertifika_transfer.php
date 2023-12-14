<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Sertifika Transferleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="index.php?sayfa=isletme_dogrulama">Sertifika Transferleri</a>
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
					<a href="<?php echo ADMIN_URL?>index.php?sayfa=kullanici_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>İd</th>
								<th>Alan Kullancı Adı</th>
								<th>Satan Kullancı Adı</th>
								<th>Satın Alım Tarihi</th>
								<th>Talep Tarihi</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$uyeQuery = $db->query("SELECT * FROM sertifika_transfertalep ");
							if($uyeQuery->rowCount()){
								foreach($uyeQuery as $uyeRow){
									?>
									<tr>
										<td></td>
										<td><?php echo $uyeRow["transfer_id"];?></td>
										<td><?php echo $uyeRow["transfer_satinalim_kullanciadi"];?></td>
										<td><?php echo $uyeRow["transfer_satan_kullanciadi"];?></td>
										<td><?php echo $uyeRow["transfer_satinalim_tarih"];?></td>
										<td><?php echo tarih($uyeRow["transfer_tarih"]);?></td>
										<td>
										<?php
										if($uyeRow["transfer_durum"]==2){ ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text text-center font-weight-bold">Onaylandı</div>
												</div>
											</div>
										<?php }else if($uyeRow["transfer_durum"]==3){ ?>
											<div class="chip chip-danger">
												<div class="chip-body">
													<div class="chip-text text-center font-weight-bold">Red Edildi</div>
												</div>
											</div>
											<?php }else {?>
											<div class="chip chip-warning">
												<div class="chip-body">
													<div class="chip-text text-center font-weight-bold">Beklemede</div>
												</div>
											</div>
										<?php } ?>

										</td>
											

											<td>   
<div class="dropdown dropright">
<button onclick="location.href='index.php?sayfa=sertifikatransfer_duzenle&id=<?php echo $uyeRow["transfer_id"];?>'"  class="btn btn-danger " type="button" >
											 Transfer Bilgilerini<br> Kontrol Et 
												</button>
									
											
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
			function TekSil(uyeId){
				$.post('ajax.php?p=tek_uye_sil', {id: uyeId}, function (data) {
					if(data=="basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Kullanıcı başarılı bir şekilde silinmiştir.",
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
			function durumDegis(uyeId){
				$.post('ajax.php?p=uye_durum_degis', {id: uyeId}, function (data) {
					if(data=="yasaklama-basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Üye Başarılı bir şekilde yasaklandı.",
							type	: "success"
						},
						function(){
							window.location.reload(true);
						});
						return false;
					}else if(data=="yasak-kaldirildi"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Üyenin yasağı başarılı bir şekilde kaldırıldı.",
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
