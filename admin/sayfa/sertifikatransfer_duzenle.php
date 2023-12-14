<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
				echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM sertifika_transfertalep WHERE transfer_id=:id");
	$uyeControl->execute(array("id"=>$id));
	if($uyeControl->rowCount()){
		$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
		$trasferkod = $uyeRow["transfer_kod"];
		$uye_kimid = $uyeRow["transfer_uye_id"];
	}else{
				go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
			go(ADMIN_URL.'index.php?sayfa=404');
}
$sertifikabilgi = $db->query("SELECT * FROM sertifikalar WHERE sertifi_transferkod = '$trasferkod' ")->fetch(PDO::FETCH_ASSOC);
$sertifikasahip_uye_id = $sertifikabilgi["sertifi_uye_id"];
$sertifi_urun_id = $sertifikabilgi["sertifi_urun_id"];


$sertifikasahip = $db->query("SELECT * FROM uyeler WHERE uye_id = '$sertifikasahip_uye_id' ")->fetch(PDO::FETCH_ASSOC);
$sertifikatalep = $db->query("SELECT * FROM uyeler WHERE uye_id = '$uye_kimid' ")->fetch(PDO::FETCH_ASSOC);
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Sertifika Transfer İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=sertifika_transfer">Sertifika Transfer</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Sertifika Transfer Doğrulama </a>
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
				<h4 class="card-title">   <p><b><?php echo $sertifikabilgi["sertifi_baslik"];?></b> adlı  Sertifika Transfer Kontrol..</p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_sertifikatransfer_onay">

						<input type="hidden" name="uye_id" value="<?php echo $sertifikatalep["uye_id"];?>"/>
						<input type="hidden" name="uye_id_two" value="<?php echo $sertifikasahip["uye_id"];?>"/>
						<input type="hidden" name="uye_eposta" value="<?php echo $sertifikatalep["uye_eposta"];?>"/>
						<input type="hidden" name="uye_eposta_two" value="<?php echo $sertifikasahip["uye_eposta"];?>"/>
						<input type="hidden" name="uye_ad" value="<?php echo $sertifikatalep["uye_ad"];?>"/>
						<input type="hidden" name="uye_soyad" value="<?php echo $sertifikatalep["uye_soyad"];?>"/>
						<input type="hidden" name="uye_sitedil" value="<?php echo $sertifikatalep["uye_sitedil"];?>"/>
						<input type="hidden" name="transferid" value="<?php echo $uyeRow["transfer_id"];?>"/>
						<input type="hidden" name="sertifika_id" value="<?php echo $sertifikabilgi["sertifi_id"];?>"/>
						<input type="hidden" name="urun_id" value="<?php echo $sertifi_urun_id;?>"/>

						<!--SERTİFİKA BİLGİLERİ-->
						<div class="row">
							<div class="card-header mb-1">
								<h4 class="card-title">SERTİFİKA BİLGİLERİ</h4>
							</div>
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label">Satın Alma Linki</label>
											<input disabled type="text" class="form-control" value="<?php echo $uyeRow["transfer_nftlink"];?>" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-1">
											<label class="form-label">Sertifika Adı</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikabilgi["sertifi_baslik"];?>" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-1">
											<label class="form-label">Sertifika Adet</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikabilgi["sertifi_adet"];?>" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-1">
											<label class="form-label">Sertifika Oluşturma Tarihi</label>
											<input disabled type="text" class="form-control" value="<?php echo tarih($sertifikabilgi["sertifi_tarih"]);?>" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-1">
											<label class="form-label">Sertifika Onay Durumu</label>
											<input disabled type="text" class="form-control" value="<?php if($sertifikabilgi["sertifi_onay"]==2){ echo "Sertifika Onaylandı"; }else{ echo "Sertifikayı Onaylanmadı";} ?>" />
										</div>
									</div>


								</div>
							</div>
							
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<!--SERTİFİKA SAHİP BİLGİLERİ-->
						<div class="row">
							<div class="card-header mb-1">
								<h4 class="card-title"> SERTİFİKA SAHİP BİLGİLERİ </h4>
							</div>
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye  E-Posta</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikasahip["uye_eposta"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye İsim Soyisim</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikasahip["uye_ad"]." ".$sertifikasahip["uye_soyad"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye Cep Telefonu</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikasahip["uye_telefon"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="firmaadresi">Firma Adresi</label>
									<textarea disabled class="form-control" id="firmaadresi" rows="3" name="uye_firma_adresi" placeholder="Firma Adresi"><?php echo $sertifikasahip["uye_firma_adresi"];?></textarea>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmavergino">Firma Vergi No</label>
									<input disabled type="text" id="firmavergino" class="form-control" name="uye_firma_vergino" value="<?php echo $sertifikasahip["uye_firma_vergino"];?>" placeholder="Firma Vergi No" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmaunvan">Firma Ünvanı</label>
									<input disabled type="text" id="firmaunvan" class="form-control" name="uye_firmaunvan" value="<?php echo $sertifikasahip["uye_firmaunvan"];?>" placeholder="Firma Ünvanı" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmatelefon">Firma Telefon</label>
									<input disabled type="text" id="firmatelefon" class="form-control" name="uye_firma_telefon" value="<?php echo $sertifikasahip["uye_firma_telefon"];?>" placeholder="Firma Telefon" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmamailadresi">Firma Mail Adresi</label>
									<input disabled type="text" id="firmamailadresi" class="form-control" name="uye_firma_email" value="<?php echo $sertifikasahip["uye_firma_email"];?>" placeholder="Firma Mail Adresi" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmaulkesi">Firma Ülkesi</label>
									<input disabled type="text" id="firmaulkesi" class="form-control" name="uye_firma_ulke" value="<?php echo $sertifikasahip["uye_firma_ulke"];?>" placeholder="Firma Ülkesi" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmametemask">Firma Metemask Adresi</label>
									<input disabled type="text" id="firmametemask" class="form-control" name="uye_firma_metemask" value="<?php echo $sertifikasahip["uye_firma_metemask"];?>" placeholder="Firma Metemask Adresi" />
								</div>
							</div>
							
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<!--SERTİFİKA TALEP EDEN BİLGİLERİ-->
						<div class="row">
							<div class="card-header mb-1">
								<h4 class="card-title">  SERTİFİKA TALEP EDEN BİLGİLERİ </h4>
							</div>
							<div class="col-12">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye  E-Posta</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikatalep["uye_eposta"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye İsim Soyisim</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikatalep["uye_ad"]." ".$sertifikatalep["uye_soyad"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group row">
									<div class="col-md-12">
										<div class="mb-1">
											<label class="form-label" >Üye Cep Telefonu</label>
											<input disabled type="text" class="form-control" value="<?php echo $sertifikatalep["uye_telefon"];?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="mb-1">
									<label class="form-label" for="firmaadresi">Firma Adresi</label>
									<textarea disabled class="form-control" id="firmaadresi" rows="3" name="uye_firma_adresi" placeholder="Firma Adresi"><?php echo $sertifikatalep["uye_firma_adresi"];?></textarea>
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmavergino">Firma Vergi No</label>
									<input disabled type="text" id="firmavergino" class="form-control" name="uye_firma_vergino" value="<?php echo $sertifikatalep["uye_firma_vergino"];?>" placeholder="Firma Vergi No" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmaunvan">Firma Ünvanı</label>
									<input disabled type="text" id="firmaunvan" class="form-control" name="uye_firmaunvan" value="<?php echo $sertifikatalep["uye_firmaunvan"];?>" placeholder="Firma Ünvanı" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmatelefon">Firma Telefon</label>
									<input disabled type="text" id="firmatelefon" class="form-control" name="uye_firma_telefon" value="<?php echo $sertifikatalep["uye_firma_telefon"];?>" placeholder="Firma Telefon" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmamailadresi">Firma Mail Adresi</label>
									<input disabled type="text" id="firmamailadresi" class="form-control" name="uye_firma_email" value="<?php echo $sertifikatalep["uye_firma_email"];?>" placeholder="Firma Mail Adresi" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmaulkesi">Firma Ülkesi</label>
									<input disabled type="text" id="firmaulkesi" class="form-control" name="uye_firma_ulke" value="<?php echo $sertifikatalep["uye_firma_ulke"];?>" placeholder="Firma Ülkesi" />
								</div>
							</div>
							<div class="col-6">
								<div class="mb-1">
									<label class="form-label" for="firmametemask">Firma Metemask Adresi</label>
									<input disabled type="text" id="firmametemask" class="form-control" name="uye_firma_metemask" value="<?php echo $sertifikatalep["uye_firma_metemask"];?>" placeholder="Firma Metemask Adresi" />
								</div>
							</div>
							
							<div class="form-group col-md-8 offset-md-4">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div id="id_box"></div>
								<button type="submit" name="transferred" value="true" class="btn btn-danger mr-1 mb-1"  <?php if($uyeRow["transfer_durum"]==3){ echo "disabled"; }?>><?php if($uyeRow["transfer_durum"]==3){ echo "Transfer Red Edildi"; }else{ echo "Transferi Red Et";} ?></button>
								
							</div>
							<div class="col-md-8">
								<div id="id_box"></div>
								<button type="submit" name="transferonay" value="true" class="btn btn-primary mr-1 mb-1"  <?php if($uyeRow["transfer_durum"]==2){ echo "disabled"; }?>><?php if($uyeRow["transfer_durum"]==2){ echo "Transfer Onaylandı"; }else{ echo "Transferi Onayla";} ?></button>
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
				}else if(data=="basarilixxx"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Transfer Silinerek Tekrar Evrak Talep Edildi!",
								type	: "success"
					},
					function(){
						window.location.href = "<?php echo ADMIN_URL.'index.php?sayfa=sertifika_transfer'; ?>"
					});
					return false;
				}else if(data=="basarili"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Başarılı bir şekilde onaylandı !",
								type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarilinot"){
					sweetAlert({
								title	: "Başarılı",
								text 	: "Başarılı bir şekilde onaylandı ! Mail Gönderilemedi !!",
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