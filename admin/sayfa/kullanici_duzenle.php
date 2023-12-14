<?php
echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id");
	$uyeControl->execute(array("id"=>$id));
	if($uyeControl->rowCount()){
		$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
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
					<h2 class="content-header-title float-left mb-0">Kullanıcı İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=kullanicilar">Kullanıcılar</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Kullanıcı Düzenleme </a>
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
							<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> Kullanıcı Düzenleniyor</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_edit">
									<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Profil Resmi</span>
													</div>
													<div class="col-md-10">
														 <img src="<?php if(!$uyeRow["uye_profil_img"]){ if($uyeRow["uye_cinsiyet"]==1){ ?><?php echo URL;?>images/erkek.png<?php }else{ ?><?php echo URL;?>images/kadin.png <?php } }else{ ?><?php echo URL;?>images/profile_img/big/<?php echo $uyeRow["uye_profil_img"]; ?><?php } ?>" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100" />
													</div>
												</div>
											</div>

											
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Adınız</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı İsmi" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>">
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
															<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı Soyismi" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>">
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
														<span>E-Posta</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="hidden" name="uyeid" value="<?php echo $id;?>"> 
															<input type="email" id="email-id" class="form-control" name="uye_eposta" placeholder="E-Posta Adresi" value="<?php echo $uyeRow["uye_eposta"];?>">
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
															<input type="text" class="form-control" id="iconLeft1" name="uye_telefon" placeholder="Cep Tel" value="<?php echo $uyeRow["uye_telefon"];?>">
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
														<span>Doğum Tarihi</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_dtarih" placeholder="Doğum Tarihi" value="<?php echo $uyeRow["uye_dtarih"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Cinsiyet</span>
													</div>
													<div class="col-md-10">
														<fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="sex" <?php echo $uyeRow["uye_cinsiyet"]==1 ? 'checked' : null; ?> value="1">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Erkek</span>
                                                    </div>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="sex" <?php echo $uyeRow["uye_cinsiyet"]==2 ? 'checked' : null; ?> value="2">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Kadın</span>
                                                    </div>
                                                </fieldset>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Dil Tercihi</span>
													</div>
													<div class="col-md-10">
														<fieldset>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="sitedil" <?php echo $uyeRow["uye_sitedil"]==11 ? 'checked' : null; ?> value="11">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Türkçe</span>
                                                    </div>
                                                    <div class="vs-radio-con">
                                                        <input type="radio" name="sitedil" <?php echo $uyeRow["uye_sitedil"]==22 ? 'checked' : null; ?> value="22">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">İngilizce</span>
                                                    </div>
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
														<fieldset class="position-relative has-icon-left">
														
															<textarea class="form-control" id="label-textarea" rows="3" placeholder="Firma Adres" name="uye_firma_adresi"><?php echo $uyeRow["uye_firma_adresi"];?></textarea>
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>

														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Vergi Numarası</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firma_vergino" placeholder="Firma Vergi Numarası" value="<?php echo $uyeRow["uye_firma_vergino"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Ünvan</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firmaunvan" placeholder="Firma Ünvan" value="<?php echo $uyeRow["uye_firmaunvan"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Telefon</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firma_telefon" placeholder="Firma Telefon" value="<?php echo $uyeRow["uye_firma_telefon"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Mail Adresi</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firma_email" placeholder="Firma Mail Adresi" value="<?php echo $uyeRow["uye_firma_email"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Ülkesi</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firma_ulke" placeholder="Firma Ülkesi" value="<?php echo $uyeRow["uye_firma_ulke"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Firma Metemask Cüzdan Adresi</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_firma_metemask" placeholder="Firma Metemask Cüzdan Adresi" value="<?php echo $uyeRow["uye_firma_metemask"];?>">
															<div class="form-control-position">
																<i class="feather icon-octagon"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
												<div class="col-6 mt-1">
													<div class="form-group row">
														<div class="col-md-3">
															<span>İmza Sürküleri</span>
														</div>
														<div class="col-md-9">
					  									<a href="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" class="img-fluid"></a>
														</div>
													</div>
												</div>
												<div class="col-6 mt-1">
													<div class="form-group row">
														<div class="col-md-3">
															<span>Firma Faliyet Belgesi</span>
														</div>
														<div class="col-md-9">
					  									<a href="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" class="img-fluid"></a>
														</div>
													</div>
												</div>
												<div class="col-6 mt-1">
													<div class="form-group row">
														<div class="col-md-3">
															<span>Firma Vergi Levhası</span>
														</div>
														<div class="col-md-9">
					  									<a href="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" class="img-fluid"></a>
														</div>
													</div>
												</div>
												<div class="col-6 mt-1">
													<div class="form-group row">
														<div class="col-md-3">
															<span>Firma Adres İspatı</span>
														</div>
														<div class="col-md-9">
					  									<a href="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" class="img-fluid"></a>
														</div>
													</div>
												</div>

											<!--	




												<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Sabit Tel</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_sabit"  placeholder="Sabit Tel" value="<?php echo $uyeRow["uye_sabit"];?>">
															<div class="form-control-position">
																<i class="feather icon-phone"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div><div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Şifre</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_sifre" placeholder="********" >
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
														<span>Şifre Tekrar</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1"  name="uye_sifre_tekrar" placeholder="********" >
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
														<span>Kullanıcı Türü</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" name="uye_rutbe" id="basicSelect">
																<option value="0" <?php if ($uyeRow["uye_rutbe"]==0){ echo "selected";} ?> >Yönetici</option>
																<option value="1" <?php if ($uyeRow["uye_rutbe"]==1){ echo "selected";} ?>>Editör </option>
																<option value="2" <?php if ($uyeRow["uye_rutbe"]==2){ echo "selected";} ?>>Normal Üye</option>
															</select>
														</fieldset>
													</div>
												</div>
											</div>-->


											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<div id="id_box"></div>
												<button type="submit" class="btn btn-primary mr-1 mb-1">Kullanıcı Düzenle</button>
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
				}else if(data=="degisiklik-yok"){
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



