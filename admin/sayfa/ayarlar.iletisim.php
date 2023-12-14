<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	  	go(ADMIN_URL.'index.php?sayfa=404');
}
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">İletişim Bilgileri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">İletişim Bilgileri Güncelle </a>
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
							<h4 class="card-title">   <p><b>İletişim</b> Bilgilerini Güncelleyin</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=iletisim_bilgileri"  enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
											<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>E-Posta</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="email" id="email-id" class="form-control" name="email" placeholder="E-Posta Adresi"  value="<?php echo $ayarRow["email"];?>">
															<div class="form-control-position">
																<i class="feather icon-mail"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>  

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Cep Tel</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="gsm" value="<?php echo $ayarRow["gsm"];?>" placeholder="Cep Tel">
															<div class="form-control-position">
																<i class="feather icon-smartphone"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Sabit Tel</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="telefon" value="<?php echo $ayarRow["telefon"];?>"  placeholder="Sabit Tel">
															<div class="form-control-position">
																<i class="feather icon-phone"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Fax No</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="faks" value="<?php echo $ayarRow["faks"];?>" placeholder="Fax No">
															<div class="form-control-position">
																<i class="feather icon-phone-forwarded"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Harita</span>
													</div>
													<div class="col-md-10">
														
														<fieldset class="form-group">
															<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Firma Harita" name="google_maps" ><?php echo $ayarRow["google_maps"];?></textarea>
														</fieldset>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Adres</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Firma adres" name="adres" ><?php echo $ayarRow["adres"];?></textarea>
														</fieldset>
													</div>
												</div>
											</div>

<!--<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 1 Adres</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="adres2" ><?php// echo $ayarRow["adres2"];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 1 Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="telefon2" value="<?php //echo $ayarRow["telefon2"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 2 E-Posta Adresi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email2" value="<?php// echo $ayarRow["email2"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 2 Adres</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="adres3" ><?php// echo $ayarRow["adres3"];?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 3 Telefon No</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="telefon3" value="<?php// echo $ayarRow["telefon3"];?>">
				</div>
			</div>
			<div class="form-group">
				<label for="input-text" class="col-sm-2 control-label">Fabrika 3 E-Posta Adresi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="email3" value="<?php// echo $ayarRow["email3"];?>">
				</div>
			</div>-->

											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary mr-1 mb-1">İletişim Bilgilerini Kaydet</button>
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

			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","warning");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "İletişim Bilgileriniz Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="degisiklik-yok"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else if(data=="gecersiz-eposta"){
					sweetAlert("Uyarı","Geçerli bir e-Posta adresi giriniz !","warning");
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



