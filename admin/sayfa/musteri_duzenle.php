<?php 
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$slideControl = $db->prepare("SELECT * FROM fotograflar WHERE fotograf_id=:id && fotograf_bolum=:bolum");
	$slideControl->execute(array(
		"id"	=> $id,
		"bolum"	=>6
	));
	if($slideControl->rowCount()){
		$slideRow = $slideControl->fetch(PDO::FETCH_ASSOC);
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
					<h2 class="content-header-title float-left mb-0">Müşteri Yorumu Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Müşteri Yorumu Düzenle </a>
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
							<h4 class="card-title">   <p><b><?php echo $slideRow["fotograf_shortDesc"];?></b> yorumu düzenleniyor.. </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=fotograf_edit"  enctype="multipart/form-data">
									<input type="hidden" name="fotograf_bolum" value="6" />
									<input type="hidden" name="fotograf_id" value="<?php echo $slideRow["fotograf_id"];?>" />
									<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_src"];?>" />
									<div class="form-body">
										<div class="row">

											<!-- Nav tabs -->
											<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
												<li class="nav-link active">
													<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> TÜRKÇE </a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false"><i class="feather icon-file-text"></i> İNGİZLİCE </a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false"><i class="feather icon-file-text"></i> ARAPÇA</a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false"><i class="feather icon-file-text"></i> RUSÇA </a>
												</li>
											</ul>


											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->



													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Müşteri Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fotograf_shortDesc" value="<?php echo $slideRow["fotograf_shortDesc"];?>" placeholder="Ahmet X">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Müşteri Yorumu</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Hizmetinizden memnun kaldım vb" name="fotograf_longDesc"><?php echo $slideRow["fotograf_longDesc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>



													<!-- Türkçe bitiş -->
												</div>
												<div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

													<!-- İngilizce başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Müşteri Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="en_fotograf_shortDesc" value="<?php echo $slideRow["en_fotograf_shortDesc"];?>" placeholder="Ahmet X">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Müşteri Yorumu</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Hizmetinizden memnun kaldım vb" name="en_fotograf_longDesc"><?php echo $slideRow["en_fotograf_longDesc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<!-- İngilizce bitiş -->

												</div>
												<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
													<!-- Arapça başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Müşteri Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="ar_fotograf_shortDesc" value="<?php echo $slideRow["ar_fotograf_shortDesc"];?>" placeholder="Ahmet X">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Müşteri Yorumu</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Hizmetinizden memnun kaldım vb" name="ar_fotograf_longDesc"><?php echo $slideRow["ar_fotograf_longDesc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<!-- Arapça bitiş -->    
												</div>
												<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

													<!-- RUSÇA başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Müşteri Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fa_fotograf_shortDesc" value="<?php echo $slideRow["fa_fotograf_shortDesc"];?>" placeholder="Ahmet X">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Müşteri Yorumu</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Hizmetinizden memnun kaldım vb" name="fa_fotograf_longDesc"><?php echo $slideRow["fa_fotograf_longDesc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<!-- RUSÇA bitiş -->   
												</div>
											</div>



											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Fotoğraf ( 100x100 )</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="dosya[]" id="dosya[]">
																<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-md-5"><img src="<?php echo URL;?>images/photos/big/<?php echo $slideRow["fotograf_src"];?>" style="width: 150px;"></div>

											<div class="col-md-7 offset-md-4 ressss">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
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
	$(document).ready(function(event) {
		$('#forms').ajaxForm({
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Fotoğraf Güncelleniyor. Lütfen Bekleyiniz",
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
						text 	: "Başarılı Bir Şekilde Güncellendi",
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



