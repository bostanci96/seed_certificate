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
					<h2 class="content-header-title float-left mb-0">KYC İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=kyc_dogrulama">KYC Doğrulama</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">KYC Doğrulama </a>
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
				<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> adlı Kullanıcı KYC Kontrol..</p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_kyc_onay">
						<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
						<input type="hidden" name="uye_eposta" value="<?php echo $uyeRow["uye_eposta"];?>"/>
						<input type="hidden" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>"/>
						<input type="hidden" name="uye_sitedil" value="<?php echo $uyeRow["uye_sitedil"];?>"/>
						<input type="hidden" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>"/>
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
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Kullanıcı Kimlik / Pasaport</span>
									</div>
									<div class="col-md-9">
  									<a href="<?php echo URL; ?>images/kimlik_pasaport/big/<?php echo $uyeRow["uye_kimlik_pasaport"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/kimlik_pasaport/big/<?php echo $uyeRow["uye_kimlik_pasaport"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-3">
										<span>Kullanıcı Kimlik Selfy</span>
									</div>
									<div class="col-md-9">
                                    <a href="<?php echo URL; ?>images/kimlik_selfy/big/<?php echo $uyeRow["uye_kimlik_selfy"]; ?>" target="_blank"><img  src="<?php echo URL; ?>images/kimlik_selfy/big/<?php echo $uyeRow["uye_kimlik_selfy"]; ?>" class="img-fluid"></a>
									</div>
								</div>
							</div>
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<div class="col-md-8">
							<div id="id_box"></div>
							<button type="submit" name="kycred" value="false" class="btn btn-danger btn-lg mr-1 mb-1" <?php if($uyeRow["uye_kyc_mod"]==3){ echo "disabled"; }?>><?php if($uyeRow["uye_kyc_mod"]==3){ echo "Kullanıcıyı Onaylandı"; }else{ echo "Kullanıcıyı Red Et";} ?></button>
							<button type="submit" name="kyconay" value="true" class="btn btn-primary btn-lg mr-1 mb-1" <?php if($uyeRow["uye_kyc_mod"]==3){ echo "disabled"; }?>><?php if($uyeRow["uye_kyc_mod"]==3){ echo "Kullanıcıyı Onaylandı"; }else{ echo "Kullanıcıyı Onayla";} ?></button>
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
				}else if(data=="basarilixxx"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Kullanıcı Silinerek Tekrar Evrak Talep Edildi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=kyc_dogrulama'; ?>"
					});
					return false;
				}else if(data=="basarili"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "KYC Başarılı bir şekilde onaylandı !",
								type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarilinot"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "KYC Başarılı bir şekilde onaylandı ! Mail Gönderilemedi !!",
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