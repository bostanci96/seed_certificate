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
					<h2 class="content-header-title float-left mb-0">İşletme İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=isletme_dogrulama">İşletme Doğrulama</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">İşletme Doğrulama </a>
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
				<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> adlı Kullanıcı İşletme Kontrol..</p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_isletme_onay">
						<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
						<input type="hidden" name="uye_eposta" value="<?php echo $uyeRow["uye_eposta"];?>"/>
						<input type="hidden" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>"/>
						<input type="hidden" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>"/>
						<input type="hidden" name="uye_sitedil" value="<?php echo $uyeRow["uye_sitedil"];?>"/>
						<div class="row">
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-2">
										<span>Üye E-Posta</span>
									</div>
									<div class="col-md-10">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="uye_eposta" value="<?php echo $uyeRow["uye_eposta"];?>" placeholder="Üye E-Posta" disabled>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Adı</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>" placeholder="Üye Adı" disabled>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Soyad</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>" placeholder="Üye Soyad" disabled>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Doğum Tarihi</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="uye_dtarih" value="<?php echo $uyeRow["uye_dtarih"];?>" placeholder="Üye Doğum Tarihi" disabled>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Cep Telefonu</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											<input type="text" class="form-control" name="uye_telefon" value="<?php echo $uyeRow["uye_telefon"];?>" placeholder="Üye Cep Telefonu" disabled>
											<div class="form-control-position">
												<i class="feather icon-type"></i>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Cinsiyet</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											
											<div class="vs-radio-con">
												<input disabled type="radio" name="uye_cinsiyet" <?php echo $uyeRow["uye_cinsiyet"]==1 ? 'checked' : null; ?>  value="1">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">Erkek</span>
											</div>
											<div class="vs-radio-con">
												<input disabled type="radio" name="uye_cinsiyet" <?php echo $uyeRow["uye_cinsiyet"]==2 ? 'checked' : null; ?>  value="2">
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
							
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Üye Dil</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											
											<div class="vs-radio-con">
												<input disabled type="radio" name="uye_sitedil" <?php echo $uyeRow["uye_sitedil"]==11 ? 'checked' : null; ?>  value="11">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">Türkçe</span>
											</div>
											<div class="vs-radio-con">
												<input disabled type="radio" name="uye_sitedil" <?php echo $uyeRow["uye_sitedil"]==22 ? 'checked' : null; ?>  value="22">
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
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaadresi">Firma Adresi</label>
                                                    <textarea disabled class="form-control" id="firmaadresi" rows="3" name="uye_firma_adresi" placeholder="Firma Adresi"><?php echo $uyeRow["uye_firma_adresi"];?></textarea>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmavergino">Firma Vergi No</label>
                                                    <input disabled type="text" id="firmavergino" class="form-control" name="uye_firma_vergino" value="<?php echo $uyeRow["uye_firma_vergino"];?>" placeholder="Firma Vergi No" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaunvan">Firma Ünvanı</label>
                                                    <input disabled type="text" id="firmaunvan" class="form-control" name="uye_firmaunvan" value="<?php echo $uyeRow["uye_firmaunvan"];?>" placeholder="Firma Ünvanı" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmatelefon">Firma Telefon</label>
                                                    <input disabled type="text" id="firmatelefon" class="form-control" name="uye_firma_telefon" value="<?php echo $uyeRow["uye_firma_telefon"];?>" placeholder="Firma Telefon" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmamailadresi">Firma Mail Adresi</label>
                                                    <input disabled type="text" id="firmamailadresi" class="form-control" name="uye_firma_email" value="<?php echo $uyeRow["uye_firma_email"];?>" placeholder="Firma Mail Adresi" />
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmaulkesi">Firma Ülkesi</label>
                                                    <input disabled type="text" id="firmaulkesi" class="form-control" name="uye_firma_ulke" value="<?php echo $uyeRow["uye_firma_ulke"];?>" placeholder="Firma Ülkesi" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="firmametemask">Firma Metemask Adresi</label>
                                                    <input disabled type="text" id="firmametemask" class="form-control" name="uye_firma_metemask" value="<?php echo $uyeRow["uye_firma_metemask"];?>" placeholder="Firma Metemask Adresi" />
                                                </div>
                                            </div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>İmza Sürküleri</span>
									</div>
									<div class="col-md-9">
  									<a href="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/imza_surkusu/big/<?php echo $uyeRow["uye_imza_surkusu"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Firma Faliyet Belgesi</span>
									</div>
									<div class="col-md-9">
  									<a href="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/faliyet_belgesi/big/<?php echo $uyeRow["uye_faliyet_belgesi"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Firma Vergi Levhası</span>
									</div>
									<div class="col-md-9">
  									<a href="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/vergi_levhasi/big/<?php echo $uyeRow["uye_vergi_levhasi"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Firma Adres İspatı</span>
									</div>
									<div class="col-md-9">
  									<a href="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/firma_adres_ispat/big/<?php echo $uyeRow["uye_firma_adres_ispat"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>


							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Belgeleri Tekrar İste</span>
									</div>
									<div class="col-md-9">
										<fieldset class="position-relative has-icon-left">
											
											<div class="vs-radio-con">
												<input <?php echo $uyeRow["uye_imza_surkusu_onay"]=="on" ? 'checked' : null; ?>   type="checkbox" name="uye_imza_surkusu_onay">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">İmza Sürküleri</span>
											</div>
											<div class="vs-radio-con">
												<input <?php echo $uyeRow["uye_faliyet_belgesi_onay"]=="on" ? 'checked' : null; ?>   type="checkbox" name="uye_faliyet_belgesi_onay">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">Firma Faliyet Belgesi</span>
											</div>
											<div class="vs-radio-con">
												<input <?php echo $uyeRow["uye_vergi_levhasi_onay"]=="on" ? 'checked' : null; ?>   type="checkbox" name="uye_vergi_levhasi_onay">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">Firma Vergi Levhası</span>
											</div>
											<div class="vs-radio-con">
												<input <?php echo $uyeRow["uye_firma_adres_ispat_onay"]=="on" ? 'checked' : null; ?>   type="checkbox" name="uye_firma_adres_ispat_onay">
												<span class="vs-radio">
													<span class="vs-radio--border"></span>
													<span class="vs-radio--circle"></span>
												</span>
												<span class="">Firma Adres İspatı</span>
											</div>
											
										</fieldset>
									</div>
								</div>
							</div>
						
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<div class="row">
						<div class="col-md-4">
							<div id="id_box"></div>
							<button type="submit" name="yenideniste" value="true" class="btn btn-primary btn-lg mr-1 mb-1"  <?php if($uyeRow["uye_kyc_mod"]==4){ echo "disabled"; }?>><?php if($uyeRow["uye_kyc_mod"]==4){ echo "Evrakları Yeniden İstendi"; }else{ echo "Evrakları Yeniden İste";} ?></button>
							
						</div>
						<div class="col-md-8">
							<div id="id_box"></div>
							<button type="submit" name="isletmeonay" value="true" class="btn btn-primary btn-lg mr-1 mb-1"  <?php if($uyeRow["uye_kayıt_rutbe"]==5){ echo "disabled"; }?>><?php if($uyeRow["uye_kayıt_rutbe"]==5){ echo "İşletme Onaylandı"; }else{ echo "İşletmeyi Onayla";} ?></button>

						</div>
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
								text 	: "İşletme Başarılı bir şekilde onaylandı !",
								type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarilinot"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "İşletme Başarılı bir şekilde onaylandı ! Mail Gönderilemedi !!",
								type	: "info"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});
	});
</script>