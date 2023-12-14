<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Yazı İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Tüm Yazılar </a>
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
					<a href="index.php?sayfa=sayfa_ekle3" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>ID</th>
								<th>Yazı İmg</th>
								<th>Yazı Adı</th>
								<th>Yazı URL</th>
								<th>Yazı Tarihi</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$uyeQuery = $db->query("SELECT * FROM sayfalar WHERE secenekHaber=1");
							if($uyeQuery->rowCount()){
								foreach($uyeQuery as $uyeRow){
									?>
									<tr>
										<td></td>
										<td><?php echo $uyeRow["sayfa_id"];?></td>
										<td><img src="<?PHP echo URL;?>images/sayfalar/thumb/<?php echo $uyeRow["sayfa_resim"];?>" style="width:50px"></td>
										<td><?php echo $uyeRow["sayfa_adi"];?></td>
										<td><a target="_blank" href="<?php echo URL."page/". $uyeRow["sayfa_url"];?>">Yazıya Git </a></td>
										<td><?php echo tarih($uyeRow["sayfa_tarih"]);?></td>
										<td>    <?php
										if($uyeRow["sayfa_durum"]==1){ ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Yayında ...</div>
												</div>
												</div> <?php }else {?>
													<div class="chip chip-danger">
														<div class="chip-body">
															<div class="chip-text">Yayında Değil ...</div>
														</div>
													</div>
												<?php }?>
											</td>
											<td > <div class="dropdown dropright">

												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=sayfa_edit&id=<?php echo $uyeRow["sayfa_id"];?>">Görüntüle / Düzenle</a>
													<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $uyeRow["sayfa_id"];?>);">
														<?php if($uyeRow["sayfa_durum"]==1){echo 'Yazıyı Gizle';}else{echo 'Yazıyı Yayına Al';}?>
													</a>
													<a class="dropdown-item"  onclick="TekSil(<?php echo $uyeRow["sayfa_id"];?>);" >Yazıyı Sil</a>
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
			function TekSil(sayfaId){
				$.post('ajax.php?p=tek_sayfa_sil', {id: sayfaId}, function (data) {
					if(data=="basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Yazı başarılı bir şekilde silinmiştir.",
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
			function durumDegis(sayfaid){
				$.post('ajax.php?p=sayfaonay', {id: sayfaid}, function (data) {
					if(data=="yasaklama-basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Yazı başarılı bir şekilde gizlendi.",
							type	: "success"
						},
						function(){
							window.location.reload(true);
						});
						return false;
					}else if(data=="yasak-kaldirildi"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Yazı başarılı bir şekilde aktifleştirildi.",
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
