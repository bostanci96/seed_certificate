<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;



if(isset($_GET["party"])){
	$id = g("party");
	$catControl = $db->prepare("SELECT * FROM qr_parties WHERE party_title=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
	}else{
		go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
	go(ADMIN_URL.'index.php?sayfa=404');
}















?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
          <h2 class="content-header-title float-left mb-0"><?php echo $catRow["party_title"]; ?> Adlı Sertifika Yönetimi</h2>
          <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a>
                  </li>
                  <li class="breadcrumb-item"><a href="index.php?sayfa=urunler">Sertifikalar</a>
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
					<!--<a href="index.php?sayfa=urun_qrpdf&id=<?= $_GET['id']."&party=".$_GET['party'] ?>" class="btn btn-outline-primary float-right" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> PDF Oluştur</span></a>--> </div>
					<a href="index.php?sayfa=urun_qrekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div>
					<table class="table data-list-view">
						<thead>
							<tr>
                <th> </th>
                <th>#</th>
                <th>QR Resim</th>
                <th>QR Link</th>
                <th>QR Random</th>
                <th>QR Seri No</th>
               <!-- <th>Satın Alma Tarihi</th>
                <td>Tarihi Düzenle</td>-->
							</tr>
						</thead>
            <tbody>
              <?php
              $q = $db->prepare("SELECT * FROM qr_codes where qr_party=?");
              $q->execute([$_GET['party']]);
              $parties = $q->fetchAll();
              foreach ($parties as $item) { ?>
                  <tr>
                     <td> </td>
                      <td><?= $item['qr_id'] ?></td>
                      <td><a href="<?= $item['qr_url'] ?>" target="_blank">Tıkla</a></td>
                      <td><a href="<?= $ayar['site_url'] . "nftcertificate/" . $item['qr_random'] ."/" . $item['qr_product'] ?>" target="_blank">Tıkla</a></td>
                      <td><?= $item['qr_random'] ?></td>
                         <td><?= $item['partyseri'] ?></td>
                          <!-- <td><?= @$item['qr_musteri_name'] ?></td>
                      <td><?php if (!$item['qr_musteri_name'] || !$item['qr_musteri_telno']) { ?>
                              <a href="<?= ADMIN_URL . "index.php?sayfa=urun_qrmusteriekle&id=" . $item['qr_id'] ?>"><button class="btn btn-warning">Tarih Ekle</button></a>
                          <?php } else { ?>
                              <a href="<?= ADMIN_URL . "index.php?sayfa=urun_qrmusteriekle&id=" . $item['qr_id'] ?>"><button class="btn btn-warning">Tarih Düzenle</button></a>
                          <?php } ?>
                      </td>-->
                    
                  </tr>
              <?php } ?>
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
			$.post('ajax.php?p=tek_cat_sil', {id: catId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde silinmiştir.",
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
						text 	: "Kategori başarılı bir şekilde gizlendi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="yasak-kaldirildi"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde aktifleştirildi.",
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
