<?php echo !defined("ADMIN") ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
$kategoriQuery = $db->query("SELECT * FROM kategoriler WHERE kategori_durum=1");
if($kategoriQuery->rowCount()){
	foreach($kategoriQuery as $kategoriRow){
		$kategori_id = $kategoriRow["kategori_id"];
		$urunSorgu = $db->query("SELECT * FROM urunler WHERE urun_kategori='$kategori_id'");
		if($urunSorgu->rowCount()){
			$sayac = 1;
			foreach($urunSorgu as $urunRow){
				$urun_id = $urunRow["urun_id"];
				$update  = $db->query("UPDATE urunler SET urun_sira_no='$sayac' WHERE urun_id='$urun_id'");
				$sayac++;
			}
		}else{
			//
		}
	}
}*/
?>



<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Sertifika Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="#">Tüm Sertifikalar</a>
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
				<div class="actions action-btns">
					<div class="dt-buttons btn-group">
					<!--<a href="<?php echo ADMIN_URL ?>index.php?sayfa=urun_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a>-->
					<a href="<?php echo ADMIN_URL ?>index.php?sayfa=urun_qrekleiki" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i>&nbspEski QR Sertifika Oluştur</span></a>&nbsp<a href="<?php echo ADMIN_URL ?>index.php?sayfa=urun_qrekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i>&nbspYeni QR Sertifika Oluştur</span></a>

					&nbsp<a onclick="dosyaSil()" class="btn btn-danger" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-trash-2"></i>&nbspSertifika Klasörünü Boşalt</span></a>
					</div>
				</div>
				<table class="table data-list-view">
					<thead>
						<tr>
							<th></th>
							<th>İD</th>
							<th>Sertifika Görseli</th>
						<!--	<th>Sıra No</th>-->
							<th>Ürün Adı</th>
							
							<th>Durum</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>


						<?php
						$catQuery = $db->query("SELECT * FROM urunler 
								GROUP BY(urun_id) ORDER BY urun_id DESC,urun_sira_no");
						if ($catQuery->rowCount()) {
							foreach ($catQuery as $catRow) {
								
						?>
								<tr>
									<td></td>
									<td><?php echo $catRow["urun_id"]; ?></td>
									<td class="product-img sorting_1"><img style="    height: 5rem;" src="<?php echo URL; ?>images/urunler/big/<?php echo $catRow["urun_resim"]; ?>" alt="Img placeholder">
									</td>
									<!--<td style="width:100px">
										<input type="text" value="<?php echo $catRow["urun_sira_no"]; ?>" name="sira_no<?php echo $catRow["urun_id"] ?>" style="margin-right:5px;width:30px;float:left" />
										<a href="javascript:;" id="updateSira" get-id="<?php echo $catRow["urun_id"]; ?>" style="float:left"> <i class="fa fa-pencil"></i></a>
									</td>-->

									<td><?php echo $catRow["urun_adi"]; ?></td>

									<td> <?php
											if ($catRow["urun_durum"] == 1) { ?>
											<div class="chip chip-danger">
												<div class="chip-body">
													<div class="chip-text">Talep Oluşturuldu</div>
												</div>
											</div> <?php }else if ($catRow["urun_durum"] == 3) { ?>
											<div class="chip chip-warning">
												<div class="chip-body">
													<div class="chip-text">Transfer Aşamasında</div>
												</div>
											</div> <?php }else if ($catRow["urun_durum"] == 5) { ?>
											<div class="chip chip-dark">
												<div class="chip-body">
													<div class="chip-text">Transfer Yapıldı</div>
												</div>
											</div> <?php } else { ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Sertifikalar Üretildi </div>
												</div>
											</div>
										<?php } ?>
									</td>


									<td>
										<div class="dropdown dropright">

											<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												İşlemler
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="index.php?sayfa=urun_qrkod&id=<?php echo $catRow["urun_id"]; ?>">Sertifikalar</a>
												<a class="dropdown-item" href="index.php?sayfa=urun_duzenle&id=<?php echo $catRow["urun_id"]; ?>">Görüntüle / Düzenle</a>
												<!--<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $catRow["urun_id"]; ?>);">
													<?php if ($catRow["urun_durum"] == 1) {
														echo  "Ürünü Gizle";
													} else {
														echo "Ürünü Aktif Et";
													} ?>
												</a>
												<a class="dropdown-item" onclick="TekSil(<?php echo $catRow["urun_id"]; ?>);">Talebi Sil</a>-->
											</div>
										</div>


									</td>
								</tr>

						<?php  }
						} ?>



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
		$("td #updateSira").click(function() {
			var id = $(this).attr("get-id");
			var inputValue = $("input[name=sira_no" + id + "]").val();
			$.post('ajax.php?p=urunSiraGuncelle', {
				sira_no: inputValue,
				urun_id: id
			}, function(data) {
				alert(data);
			});
		});
		$('.datatable').dataTable({
			"bSort": false
		});

	});

	function TekSil(catId) {
		$.post('ajax.php?p=tek_urun_sil', {
			id: catId
		}, function(data) {
			if (data == "basarili") {
				sweetAlert({
						title: "Başarılı",
						text: "Ürün başarılı bir şekilde silinmiştir.",
						type: "success"
					},
					function() {
						window.location.reload(true);
					});
				return false;
			} else if (data == "basarisiz") {
				swal("Başarısız", "Silinemedi", "error");
				return false;
			}
		});
	}

	function durumDegis(catId) {
		$.post('ajax.php?p=urun_durum_degis', {
			id: catId
		}, function(data) {
			if (data == "yasaklama-basarili") {
				sweetAlert({
						title: "Başarılı",
						text: "Ürün başarılı bir şekilde gizlendi.",
						type: "success"
					},
					function() {
						window.location.reload(true);
					});
				return false;
			} else if (data == "yasak-kaldirildi") {
				sweetAlert({
						title: "Başarılı",
						text: "Ürün başarılı bir şekilde aktifleştirildi.",
						type: "success"
					},
					function() {
						window.location.reload(true);
					});
				return false;
			} else if (data == "basarisiz") {
				swal("Başarısız", "Silinemedi", "error");
				return false;
			}
		});
	}
	function dosyaSil(catId) {
		$.post('ajax.php?p=dosyasil', {}, function(data) {
			if (data == "basarili") {
				sweetAlert({
						title: "Başarılı",
						text: "Klasör Başarılı Şekilde Boşaltıldı.",
						type: "success"
					},
					function() {
						window.location.reload(true);
					});
				return false;
			} else if (data == "basarisiz") {
				swal("Başarısız", "Silinemedi", "error");
				return false;
			}
		});
	}
</script>