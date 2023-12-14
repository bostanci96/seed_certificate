<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kullanıcı Şifre İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="index.php?sayfa=kullanicilar">Tüm Kullanıcılar</a>
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
								<th>Ad Soyad</th>
								<th>E-Posta</th>
								<th>Üye Türü</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$uyeQuery = $db->query("SELECT * FROM  uyeler  WHERE uye_id!=1 AND uye_id!=5");
							if($uyeQuery->rowCount()){
								foreach($uyeQuery as $uyeRow){
									?>
									<tr>
										<td></td>
										<td><?php echo $uyeRow["uye_id"];?></td>
										<td><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></td>
										<td><?php echo $uyeRow["uye_eposta"];?></td>
										<td><?php echo rutbekont($uyeRow["uye_rutbe"]); ?></td>
										<td>    <?php
										if($uyeRow["uye_onay"]==1){ ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Onaylı Üye</div>
												</div>
												</div> <?php }else {?>
													<div class="chip chip-danger">
														<div class="chip-body">
															<div class="chip-text">Onaylanmadı</div>
														</div>
													</div>
												<?php }?>
											</td>
											<td > <div class="dropdown dropright">
<button onclick="location.href='index.php?sayfa=kullanici_sifre_duzenle&id=<?php echo $uyeRow["uye_id"];?>'"  class="btn btn-danger " type="button" >
												Şifre Güncelle
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
