<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM urunler WHERE urun_id=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
		$uye_id = $catRow["en_urun_tam_icerik"];
		$sonresimkont = $db->query("SELECT * FROM uyeler WHERE uye_id='$uye_id' ")->fetch(PDO::FETCH_ASSOC);
		$uyebilgi = $sonresimkont["uye_ad"].' '.$sonresimkont["uye_soyad"];
	}else{
		go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
	go(ADMIN_URL.'index.php?sayfa=404');
}


?>



<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Sertifika Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=urunler">Sertifikalar</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Sertifika Düzenle</a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content-body">
		<section id="multiple-column-form">
			<div class="row match-height">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">   <p><b><?php echo $catRow["urun_adi"];?> </b> Adlı sertifika Düzenleniyor</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms"class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=urun_edit"  enctype="multipart/form-data">
									<input type="hidden" name="urun_id" value="<?php echo $catRow["urun_id"];?>" />
									<div class="form-body">
										<div class="row">

											<!-- Nav tabs -->
											<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
										
											<li class="nav-link active">
													<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> TÜRKÇE </a>
												</li>
											
											</ul>


											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Sertifika Başlığı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_adi" value="<?php echo $catRow["urun_adi"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
												<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Sertifika Adet</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_icerik" value="<?php echo $catRow["urun_icerik"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Üretilecek Tohum Türü</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_tam_icerik" value="<?php echo $catRow["urun_tam_icerik"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Üretilecek Tohum Alt Türü</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="urun_link" value="<?php echo $catRow["urun_link"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
														<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Referans No: </span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="en_urun_adi" value="<?php echo $catRow["en_urun_adi"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Üretim Tarihi: </span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="en_urun_icerik" value="<?php echo $catRow["en_urun_icerik"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
														<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Ülke: </span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" class="form-control" name="ar_urun_icerik" value="<?php echo $catRow["ar_urun_icerik"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Üye Adı Soyadı: </span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">

																	<input type="text" id="first-name" disabled class="form-control" value="<?php echo $uyebilgi;?>">
																	<input type="hidden" id="first-name" class="form-control" name="en_urun_tam_icerik" value="<?php echo $catRow["uye_id"];?>">

																	<div class="form-control-position">
																		<i class="feather icon-tag"></i>
																	</div>
																</fieldset>

															</div>
														</div>
													</div>


													<!-- Türkçe bitiş -->
								
												

										</div>
									</div>
									
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Sertifika Belgesi <br><small>(3508x2480)</small></span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">                                                    
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile022" title="Resim seç !" name="dosya22[]" id="dosya22[]" multiple>
															<label class="custom-file-label" for="inputGroupFile022">Ürün Sertifikasını Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>

										<div class="col-md-5"><img src="<?php echo URL;?>images/urunler/big/<?php echo $catRow["urun_resim"];?>" style="width: 150px;"></div>


									<div class="col-md-7 offset-md-4 ressss mt-1"  >
										<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Güncelle</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>




</div>

<script>
	function TekSil(catId){
		$.post('ajax.php?p=tek_urunresim_sil', {id: catId}, function (data) {
			if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Resim başarılı bir şekilde silinmiştir.",
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
	$(document).ready(function(event) {

		$('#forms').ajaxForm({
			beforeSerialize: function(form, options) { 
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Ürün Güncelleniyor. Lütfen Bekleyiniz",
					type : "info",
					closeOnConfirm : false,
					showLoaderOnConfirm:true,
				});
			},
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Ürün Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir hata oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



