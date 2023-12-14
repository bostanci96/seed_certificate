<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0"> Çözüm Ortakları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=galeri2"> Çözüm Ortakları</a>
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
					<a href="<?php echo ADMIN_URL?>index.php?sayfa=galeri_ekle2" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr>
								<th></th>
								<th>ID</th>
									<th>Görsel</th>
									<th>Çözüm Ortağı Adı</th>
									<th>Kayıt Tarihi</th>
									<th>Durum</th>
									<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


						<?php
								$slideQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum=58");
								if($slideQuery->rowCount()){
									foreach($slideQuery as $slideRow){
										if(strlen($slideRow["fotograf_href"])>5){$slideButton = $slideRow["fotograf_href"];}else{$slideButton = "Link Belirtilmemiş";}
										?>
								<tr>
									<td></td>
									<td><?php echo $slideRow["fotograf_id"];?></td>

									
									<td>
										<img src="<?PHP echo URL;?>images/photos/thumb/<?php echo $slideRow["fotograf_src"];?>" style="width:50px">
											
											</td>
									<td><?php echo $slideRow["fotograf_shortDesc"];?></td>
											<td><?php echo tarih($slideRow["fotograf_tarih"]);?></td>
									
									<td>    <?php
									if($slideRow["fotograf_durum"]==1){ ?>
										<div class="chip chip-success">
											<div class="chip-body">
												<div class="chip-text">Yayında</div>
											</div>
											</div> <?php }else {?>
												<div class="chip chip-danger">
													<div class="chip-body">
														<div class="chip-text">Yayında Değil</div>
													</div>
												</div>
											<?php }?>
										</td>
										<td > <div class="dropdown dropright">

											<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												İşlemler
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="index.php?sayfa=galeri_duzenle2&id=<?php echo $slideRow["fotograf_id"];?>">Görüntüle / Düzenle</a>
												<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $slideRow["fotograf_id"];?>);">
													<?php if($slideRow["fotograf_durum"]==1){echo  "Pasifleştir";}else{echo "Aktifleştir";}?>
												</a>
												<a class="dropdown-item"  onclick="TekSil(<?php echo $slideRow["fotograf_id"];?>);" >Çözüm Ortağını Sil</a>
											</div>
										</div>   


									</td>
								</tr>

							<?php
									}
								}
								?>



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
function TekSil(slideId){
	$.post('ajax.php?p=tek_foto_sil', {id: slideId}, function (data) {
		if(data=="basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Çözüm Ortağı başarılı bir şekilde silindi.",
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
function durumDegis(slideId){
	$.post('ajax.php?p=foto_durum_degis', {id: slideId}, function (data) {
		if(data=="yasaklama-basarili"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Çözüm Ortağı başarılı bir şekilde yayından kaldırıldı.",
				type	: "success"
			},
			function(){
				window.location.reload(true);
			});
			return false;
		}else if(data=="yasak-kaldirildi"){
			sweetAlert({
				title	: "Başarılı",
				text 	: "Çözüm Ortağı başarılı bir şekilde yayınlandı.",
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
