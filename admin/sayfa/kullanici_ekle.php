<?php echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>


<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kullanıcı İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=kullanicilar">Kullanıcılar</a>
							</li>
							<li class="breadcrumb-item active"><a href="#">Yeni Kullanıcı Ekle </a>
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
							<h4 class="card-title">   <p><b>Yeni</b> Kullanıcı Ekle</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=uye_add"  enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Adınız</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı İsmi" name="uye_ad">
															<div class="form-control-position">
																<i class="feather icon-user"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Soyadınız</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı Soyismi" name="uye_soyad">
															<div class="form-control-position">
																<i class="feather icon-user"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>  

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Şifre</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="password" class="form-control" id="iconLeft1" placeholder="Şifre Girin" name="uye_sifre">
															<div class="form-control-position">
																<i class="feather icon-star"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>  

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Şifre Tekrar</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="password" class="form-control" id="iconLeft1" placeholder="Şifre Tekrar" name="uye_sifre_tekrar">
															<div class="form-control-position">
																<i class="feather icon-star"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>                                                


											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>E-Posta</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="email" id="email-id" class="form-control" name="uye_eposta" placeholder="E-Posta Adresi">
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
															<input type="text" class="form-control" id="iconLeft1" name="uye_telefon" placeholder="Cep Tel">
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
															<input type="text" class="form-control" id="iconLeft1" name="uye_sabit"  placeholder="Sabit Tel">
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
														<span>Kullanıcı Türü</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" name="uye_rutbe" id="basicSelect">
																<option value="0">Yönetici</option>
															</select>
														</fieldset>
													</div>
												</div>
											</div>


											<!--<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Kullanıcı Türü</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" name="uye_rutbe" id="basicSelect">
																<option value="0">Yönetici</option>
																<option value="1">Editör </option>
																<option value="2">Normal Üye</option>
															</select>
														</fieldset>
													</div>
												</div>
											</div>-->


											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<div id="id_box"></div>
												<button type="submit" class="btn btn-primary mr-1 mb-1">Kullanıcı Ekle</button>
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
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Üye Başarılı Bir Şekilde Eklendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="sifreler-uyusmuyor"){
					sweetAlert("Hata","Şifreler Uyuşmuyor","warning");
					return false;
				}else if(data=="kullanici-var"){
					sweetAlert("Hata","Bu Kullanıcı Adı Alınmış","warning");
					return false;
				}
				else if(data=="eposta-alinmis"){
					sweetAlert("Hata","Bu Mail Adresi Alınmış","warning");
					return false;
				}else if(data=="gecersiz-eposta"){
					sweetAlert("Hata","Geçerli Bir Eposta Girin","warning");
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



