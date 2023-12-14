<?php
require_once('../admin/host/a.php');
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

#Logout 
if($_GET["p"]=="logout"){
	session_destroy();
	go(URL);
}
##Login
if($_GET["p"]=="login"){
	$eposta   = p("username");
	$md5    = md5(p("password"));
	if(!$eposta || $eposta=="username" || !$md5 || $md5=="password"){
		echo '<div role="alert" class="alert alert-danger"><div class="alert-body">'.$bloklar["login_verification_one"].'</div></div>';
	}else{
		$query = $db->prepare("SELECT * FROM uyeler WHERE uye_eposta=:eposta && uye_sifre=:sifre");
		$query -> execute(array(
			"eposta"      => $eposta,
			"sifre"     => $md5
		));
		$query->rowCount();
		$row = $query->fetch(PDO::FETCH_ASSOC);
		if($query->rowCount()){
			if($row["uye_onay"]==1){
			uye_lang_check($row["uye_sitedil"]);
			$session = array(
				"login"     => true,
				"uye_id"    => $row["uye_id"],
				"uye_lang"    => $row["uye_sitedil"],
				"uye_eposta"  => $row["uye_eposta"],
				"uye_rutbe"  => $row["uye_rutbe"],
				"uye_adsoyad"	=> $row["uye_ad"]." ".$row["uye_soyad"]
			);
			session_olustur($session);
			echo '<div role="alert" class="alert alert-success"><div class="alert-body">'.$bloklar["login_verification_two"].'</div></div>';
			echo '<script type="text/javascript">window.location.href = "'.URL.'"</script>';
		}else{
			echo '<div role="alert" class="alert alert-warning"><div class="alert-body">'.$bloklar["login_verification_onay"].'</div></div>';
		}
		}else{
			$query = $db->prepare("SELECT * FROM uyeler WHERE uye_eposta=:eposta ");
			$query -> execute(array(
				"eposta"      => $eposta
			));
			$query->rowCount();
			$row = $query->fetch(PDO::FETCH_ASSOC);
			if($query->rowCount()){

				echo '<div role="alert" class="alert alert-warning"><div class="alert-body">'.$bloklar["login_verification_tree"].'</div></div>';
			}else{
				echo '<div role="alert" class="alert alert-warning"><div class="alert-body">'.$bloklar["login_verification_four"].'</div></div>';
			}
			
		}
	}
}
if($_GET["p"]=="resetpassword"){

	$eposta = $_POST["username"];  
	$query = $db->query("SELECT * FROM uyeler WHERE uye_eposta = '$eposta'");

	if(empty($eposta) or !filter_var($eposta, FILTER_VALIDATE_EMAIL) ){
		echo '<div class="alert alert-warning">'.$bloklar["uye_sifremi_unuttum_bir"].'</div>';exit();
	}else{  
		$yeni_sifre     = rand(10000, 99999);
		$yeni_sifre_md5 = md5($yeni_sifre);
		$uyedilcheck = $db->query("SELECT * FROM uyeler WHERE uye_eposta = '$eposta'")->fetch(PDO::FETCH_ASSOC);
		$sitelang = $uyedilcheck["uye_sitedil"];
		uye_lang_check($sitelang);
		dilCek();
		$update = $db->query("UPDATE uyeler SET uye_sifre = '$yeni_sifre_md5' WHERE uye_eposta = '$eposta'");
		if($update){
					require '../admin/host/mail_sablon/uye_sifre_sifirla.php';
					$mailgonder = MailXM($eposta, $bloklar["uye_sifremi_unuttum_bes"], $uye_sifre_sifirla);
				if ($mailgonder) {
				echo '<div class="alert alert-success">
				<strong>'.$bloklar["uye_sifremi_unuttum_dort"].'</div>';
				echo '<script type="text/javascript">  setTimeout(function () {
					window.location.href = "'.URL.'"; 
				}, 4000); //will call the function after 2 secs.</script>';exit();

			}else{
				echo '<div class="alert alert-warning">'.$bloklar["uye_sifremi_unuttum_uc"].'</div>';exit();
			}
		}else{ echo '<div class="alert alert-warning">'.$bloklar["uye_sifremi_unuttum_iki"].'</div>';exit();
	}
}
}

if($_GET["p"]=="register"){
	
	$name		= p("name");
	$surname		= p("surname");
	$date		= p("date");
	$phone		= p("phone");
	$eposta		= p("eposta");
	$password		= p("password");
	@$sex		= p("sex");
	@$sitelang		= p("sitelang");
	@$privacypolicy		= p("privacypolicy");
	if ($sitelang==11) {
		$lang ="tr";
	}else{
		$lang ="en";
	}
	$random_code = RandomString();
	uye_lang_check($sitelang);
	dilCek();
	if(!$name || !$surname || !$date || !$phone || !$eposta || !$password || !$sex || !$sitelang || !$privacypolicy){
		echo '<div role="alert" class="alert alert-danger"><div class="alert-body">'.$bloklar["login_verification_one"].'</div></div>';
	}elseif (!filter_var($eposta, FILTER_VALIDATE_EMAIL)) {
		echo '<div role="alert" class="alert alert-danger"><div class="alert-body">'.$bloklar["register_eror_one"].'</div></div>';
	}else{
		$mailCheck = $db->query("SELECT * FROM uyeler WHERE uye_eposta='$eposta'");
		if($mailCheck->rowCount()){
		echo '<div role="alert" class="alert alert-danger"><div class="alert-body">'.$bloklar["register_eror_two"].'</div></div>';
		}else{

			$password		= md5($password);
			$insert = $db->query("INSERT into uyeler SET
				uye_ad	= '$name',
				uye_soyad	= '$surname',
				uye_dtarih	= '$date',
				uye_telefon	= '$phone',
				uye_eposta	= '$eposta',
				uye_sifre	= '$password',
				uye_cinsiyet	= '$sex',
				uye_sitedil	= '$sitelang',
				uye_key	= '$random_code',
				uye_rutbe	= 1,
				uye_kayıt_rutbe	= 1,
				uye_kyc_mod	= 1,
				uye_onay 	= 0");
			if($insert->rowCount()){
				$last_insert_id = $db->lastInsertId();
				require '../admin/host/mail_sablon/uyeonay_ileti.php';
				if ($last_insert_id) {
					$mailgonder = MailXM($eposta, $bloklar["register_mail_subject"], $uyeonay_ileti);
				if ($mailgonder) {
					echo '<div role="alert" class="alert alert-success"><div class="alert-body">'.$bloklar["register_succsess"].'</div></div>';
					echo '<script type="text/javascript">setTimeout(function () {window.location.href = "'.URL.'"; }, 6000);</script>';
				}else{
					echo '<div role="alert" class="alert alert-danger"><div class="alert-body">'.$bloklar["register_eror_tree"].'</div></div>';	
				}
				}
			}else{
				echo '<div role="alert" class="alert alert-warning"><div class="alert-body">'.$bloklar["register_eror"].'</div></div>';			
			}
		}
	}
}





##KYC Doğrulama 
if($_GET["p"]=="kycverify"){
	$uye_id		= p("uyeid");
	@$kimlikpasaport 				= $_FILES["kimlikpasaport"]["tmp_name"][0];
	@$kimlikselfy 				= $_FILES["kimlikselfy"]["tmp_name"][0];
	if(!$kimlikpasaport || !$kimlikselfy){
		echo 'bos-deger';
	}else{
		$resim_onad = $uye_id."_";
		$kimlik_selfy = imgAdd("kimlikselfy","kimlik_selfy","uyeler","uye_kimlik_selfy","uye_id",$uye_id,$resim_onad);
		$kimlik_pasaport = imgAdd("kimlikpasaport","kimlik_pasaport","uyeler","uye_kimlik_pasaport","uye_id",$uye_id,$resim_onad);
		
			if ($kimlik_pasaport AND $kimlik_selfy) {
					$insert = $db->query("UPDATE uyeler SET
						uye_kayıt_rutbe	= 1,
						uye_kyc_mod	= 2 WHERE uye_id='$uye_id'");
					if($insert->rowCount()){
						require '../admin/host/mail_sablon/uyekyc_admin.php';
						$mailgonder = MailXM($ayar["gemail"], "Yeni Kyc Doğrulaması Mevcut !", $uyekyc_admin);
						echo 'basarili';
					}else{
						echo 'basarisiz';
					}
			}else{
				echo 'basarisiz';
			}
		
	}
}




#Business Doğrulama
if($_GET["p"]=="businesverify_one"){
	$uye_id		= p("uyeid");
	$uye_firma_adresi		= p("uye_firma_adresi");
	$uye_firma_vergino		= p("uye_firma_vergino");
	$uye_firmaunvan		= p("uye_firmaunvan");
	$uye_firma_telefon		= p("uye_firma_telefon");
	$uye_firma_email		= p("uye_firma_email");
	$uye_firma_ulke		= p("uye_firma_ulke");
	$uye_firma_metemask		= p("uye_firma_metemask");
	if(!$uye_id || !$uye_firma_adresi || !$uye_firma_vergino || !$uye_firmaunvan || !$uye_firma_telefon || !$uye_firma_email || !$uye_firma_ulke || !$uye_firma_metemask){
		echo 'bos-deger';
	}else{

					$insert = $db->query("UPDATE uyeler SET
						uye_firma_adresi	= '$uye_firma_adresi', 
						uye_firma_vergino	= '$uye_firma_vergino', 
						uye_firmaunvan	= '$uye_firmaunvan', 
						uye_firma_telefon	= '$uye_firma_telefon', 
						uye_firma_email	= '$uye_firma_email', 
						uye_firma_ulke	= '$uye_firma_ulke', 
						uye_firma_metemask	= '$uye_firma_metemask', 
						uye_kayıt_rutbe	= 3
						WHERE uye_id='$uye_id'");
					if($insert->rowCount()){
						echo 'basarili';
					}else{
						echo 'basarisiz';
					}
		
		
	}
}

if($_GET["p"]=="businesverify_two"){
	$uye_id		= p("uyeid");
	@$imza_surkusu 				= $_FILES["imza_surkusu"]["tmp_name"][0];
	@$faliyet_belgesi 				= $_FILES["faliyet_belgesi"]["tmp_name"][0];
	@$vergi_levhasi 				= $_FILES["vergi_levhasi"]["tmp_name"][0];
	@$firma_adres_ispat 				= $_FILES["firma_adres_ispat"]["tmp_name"][0];
	if(!$uye_id || !$imza_surkusu || !$faliyet_belgesi || !$vergi_levhasi || !$firma_adres_ispat){
		echo 'bos-deger';
	}else{
		$resim_onad = $uye_id."_";
		$imza_surkusu = imgAdd("imza_surkusu","imza_surkusu","uyeler","uye_imza_surkusu","uye_id",$uye_id,$resim_onad);
		$faliyet_belgesi = imgAdd("faliyet_belgesi","faliyet_belgesi","uyeler","uye_faliyet_belgesi","uye_id",$uye_id,$resim_onad);
		$vergi_levhasi = imgAdd("vergi_levhasi","vergi_levhasi","uyeler","uye_vergi_levhasi","uye_id",$uye_id,$resim_onad);
		$firma_adres_ispat = imgAdd("firma_adres_ispat","firma_adres_ispat","uyeler","uye_firma_adres_ispat","uye_id",$uye_id,$resim_onad);
			 if ($imza_surkusu AND $faliyet_belgesi  AND $vergi_levhasi  AND $firma_adres_ispat) {
					$insert = $db->query("UPDATE uyeler SET
						uye_kayıt_rutbe	= 4 WHERE uye_id='$uye_id'");
					if($insert->rowCount()){
						require '../admin/host/mail_sablon/uyebusiness_admin.php';
						$mailgonder = MailXM($ayar["gemail"], "Yeni İşletme Doğrulaması Mevcut !", $uyebusiness_admin);
						echo 'basarili';
					}else{
						echo 'basarisiz';
					}
		}else{
				echo 'basarisiz';
			}
		
		
	}
}

if($_GET["p"]=="businesverify_two_again"){
	$uye_id		= p("uyeid");
	@$imza_surkusu 				= $_FILES["imza_surkusu"]["tmp_name"][0];
	@$faliyet_belgesi 				= $_FILES["faliyet_belgesi"]["tmp_name"][0];
	@$vergi_levhasi 				= $_FILES["vergi_levhasi"]["tmp_name"][0];
	@$firma_adres_ispat 				= $_FILES["firma_adres_ispat"]["tmp_name"][0];
	if(!$uye_id){
		echo 'bos-deger';
	}else{
		$resim_onad = $uye_id."_";
		$imza_surkusu = imgAdd("imza_surkusu","imza_surkusu","uyeler","uye_imza_surkusu","uye_id",$uye_id,$resim_onad);
		$faliyet_belgesi = imgAdd("faliyet_belgesi","faliyet_belgesi","uyeler","uye_faliyet_belgesi","uye_id",$uye_id,$resim_onad);
		$vergi_levhasi = imgAdd("vergi_levhasi","vergi_levhasi","uyeler","uye_vergi_levhasi","uye_id",$uye_id,$resim_onad);
		$firma_adres_ispat = imgAdd("firma_adres_ispat","firma_adres_ispat","uyeler","uye_firma_adres_ispat","uye_id",$uye_id,$resim_onad);
			 if ($imza_surkusu OR $faliyet_belgesi  OR $vergi_levhasi  OR $firma_adres_ispat) {
					$insert = $db->query("UPDATE uyeler SET
						uye_kayıt_rutbe	= 4,
						uye_kyc_mod	= 3 WHERE uye_id='$uye_id'");
					if($insert->rowCount()){
						require '../admin/host/mail_sablon/uyebusiness_admin.php';
						$mailgonder = MailXM($ayar["gemail"], "Yeni İşletme Doğrulaması Mevcut !", $uyebusiness_admin);
						echo 'basarili';
					}else{
						echo 'basarisiz';
					}
		}else{
				echo 'basarisiz';
			}
		
		
	}
}

##Sertifika Doğrulama 
if($_GET["p"]=="sertifika_olustur"){
	$uye_id		= p("uyeid");
	$sertifika_adet		= p("sertifika_adet");
	$sertifika_baslik		= p("sertifika_baslik");
	@$sertifika_belge 				= $_FILES["sertifika_belge"]["tmp_name"][0];
		$random_code = RandomString();
	if(!$sertifika_adet || !$sertifika_belge  || !$sertifika_baslik){
		echo 'bos-deger';
	}else{
					$resim_onad = $uye_id."_";
				
					$insert = $db->query("INSERT into sertifikalar SET
						sertifi_adet	= '$sertifika_adet',
						sertifi_uye_id = '$uye_id',
						sertifi_baslik	= '$sertifika_baslik', 
						sertifi_transferkod	= '$random_code',
						sertifi_transfer_durum = 1, 
						sertifi_ornek_durum = 1,
						sertifi_onay = 1");
					if($insert->rowCount()){
						$last_insert_id = $db->lastInsertId();
						$sertifika_belge = imgAdd("sertifika_belge","sertifika_onaybelgeleri","sertifikalar","sertifi_belge","sertifi_id",$last_insert_id,$resim_onad);
						if ($sertifika_belge) {
							require '../admin/host/mail_sablon/uyesertifika_admin.php';
							$mailgonder = MailXM($ayar["gemail"], "Yeni Sertifika Doğrulaması Mevcut !", $uyesertifika_admin);
							if ($mailgonder) {
								echo 'basarili';
							}else{
								echo 'basarilimail';
							}
						}else{
							echo 'basarisiz';
						}
					}
					
		
	}
		
}


if($_GET["p"]=="sertifika_transfer_talebi"){

	$uye_id		= p("uyeid");
	$sertifi_date		= p("sertifi_date");
	$sertifi_trans		= p("sertifi_trans");
	$transfer_nftlink		= p("transfer_nftlink");
	$sertifi_nft_kuladi		= p("sertifi_nft_kuladi");
	$sertifi_nft_satin_kuladi		= p("sertifi_nft_satin_kuladi");
	$privacypolicy		= p("privacypolicy");
$transferkont = $db->query("SELECT * FROM sertifikalar WHERE sertifi_transferkod='$sertifi_trans' ")->fetch(PDO::FETCH_ASSOC);
$uyetransfer = $transferkont["sertifi_uye_id"];
if ($uyetransfer!=$uye_id) {
	if(!$sertifi_date || !$sertifi_trans  || !$sertifi_nft_kuladi  || !$sertifi_nft_satin_kuladi  || !$privacypolicy || !$transfer_nftlink){
		echo 'bos-deger';
	}else{
				
					$insert = $db->query("INSERT into sertifika_transfertalep SET
						transfer_kod	= '$sertifi_trans',
						transfer_uye_id	= '$uye_id',
						transfer_satinalim_tarih	= '$sertifi_date',
						transfer_nftlink	= '$transfer_nftlink',
						transfer_satinalim_kullanciadi	= '$sertifi_nft_kuladi',
						transfer_satan_kullanciadi	= '$sertifi_nft_satin_kuladi',
						transfer_durum = 1");
					if($insert->rowCount()){
							require '../admin/host/mail_sablon/uyesertifikatrasfer_admin.php';
							$mailgonder = MailXM($ayar["gemail"], "Yeni Sertifika Transfer Talebi Mevcut !", $uyesertifikatrasfer_admin);
							if ($mailgonder) {
								echo 'basarili';
							}else{
								echo 'basarilimail';
							}
					}else{
						echo 'basarisiz';
					}
					
		
	}
		
}else{
	echo "basarisiz";
}
}
if($_GET["p"]=="sertifika_olustur_twoone"){
	$sertifi_id		= p("sertifi_id");
	$sertifi_adet		= p("sertifi_adet");
	$sertifi_tarih		= tarih(p("sertifi_tarih"));
	$uye_id		= p("uye_id");
	$sertifi_baslik		= p("sertifi_baslik");
	$uretilen_tohumturu		= p("uretilen_tohumturu");
	$uretilen_tohumalttur		= p("uretilen_tohumalttur");
	$uretilen_tohumreferans		= p("uretilen_tohumreferans");
	$uretilen_dateseating		= p("uretilen_dateseating");
	$uretilen_count		= p("uretilen_count");
	$urun_durum = 3;
	$randomcode = generateRandomString();
	@$uretilensertifi_orn 				= $_FILES["uretilensertifi_orn"]["tmp_name"][0];
	if(!$sertifi_id || !$sertifi_adet || !$uye_id || !$sertifi_baslik || !$uretilen_tohumturu || !$uretilen_tohumalttur || !$uretilen_tohumreferans || !$uretilen_dateseating || !$uretilen_count || !$uretilensertifi_orn ){
		echo 'bos-deger';
	}else{
					$resim_onad = $uye_id."_";
					$insert = $db->prepare("INSERT INTO urunler SET 
					urun_adi=:sertifi_baslik,
					urun_icerik=:sertifi_adet,
					urun_tam_icerik=:uretilen_tohumturu,
					urun_link=:uretilen_tohumalttur,
					en_urun_adi=:uretilen_tohumreferans,
					en_urun_icerik=:uretilen_dateseating,
					ar_urun_icerik=:uretilen_count,
					en_urun_tam_icerik=:uye_id,
					fa_urun_icerik=:sertifitarih,
					ar_urun_adi=:sertifi_id,
					urun_durum=:urun_durum");
					$insert->bindParam("sertifi_baslik",$sertifi_baslik,PDO::PARAM_STR);
					$insert->bindParam("sertifi_adet",$sertifi_adet,PDO::PARAM_INT);
					$insert->bindParam("uretilen_tohumturu",$uretilen_tohumturu,PDO::PARAM_STR);
					$insert->bindParam("uretilen_tohumalttur",$uretilen_tohumalttur,PDO::PARAM_STR);
					$insert->bindParam("uretilen_tohumreferans",$uretilen_tohumreferans,PDO::PARAM_STR);
					$insert->bindParam("uretilen_dateseating",$uretilen_dateseating,PDO::PARAM_STR);
					$insert->bindParam("uretilen_count",$uretilen_count,PDO::PARAM_STR);
					$insert->bindParam("uye_id",$uye_id,PDO::PARAM_INT);
					$insert->bindParam("sertifitarih",$sertifi_tarih,PDO::PARAM_STR);
					$insert->bindParam("sertifi_id",$sertifi_id,PDO::PARAM_INT);
					$insert->bindParam("urun_durum",$urun_durum,PDO::PARAM_INT);
					$insert->execute();
					if($insert->rowCount()){
						$last_insert_id = $db->lastInsertId();
						if($last_insert_id){
							$sertifika_resimimg = imgAdd("uretilensertifi_orn","urunler","urunler","urun_resim","urun_id",$last_insert_id,$resim_onad);
							if ($sertifika_resimimg) {
								ob_start();
								$sonresimkont = $db->query("SELECT * FROM urunler WHERE urun_id='$last_insert_id' ")->fetch(PDO::FETCH_ASSOC);
								$resimAdi = $sonresimkont["urun_resim"];
									$imgfff = URL.'images/urunler/big/'.$resimAdi;

									$qrres = __DIR__."/qrkod.png";
									$fontfile= __DIR__.'/verdana.ttf';
									$randNamex   = substr(base64_encode(uniqid(true)),0,20);
									$newName    = str_replace("=","",$randNamex);
									$newName 	= $resim_onad.$newName;
									$resimadixyz = __DIR__."/sertifika/".$newName.".jpg";
									$im = imagecreatefrompng($imgfff);
									$imxxx = imagecreatefrompng($qrres);
									$beyaz=ImageColorAllocate($im,0,0,0);
									$one = mb_convert_encoding($uretilen_tohumturu, "UTF-8", "auto");
									$two = mb_convert_encoding($uretilen_tohumalttur, "UTF-8", "auto");
									$tree = mb_convert_encoding($uretilen_tohumreferans, "UTF-8", "auto");
									$four = mb_convert_encoding($uretilen_dateseating, "UTF-8", "auto");
									$five = mb_convert_encoding($sertifi_adet, "UTF-8", "auto");
									$six = mb_convert_encoding($uretilen_count, "UTF-8", "auto");
									$seven = mb_convert_encoding($randomcode, "UTF-8", "auto");
									$eitxs = mb_convert_encoding($sertifi_tarih, "UTF-8", "auto");
									imagettftext($im, 64, 0, 1750, 630, $beyaz, $fontfile, $one);
									imagettftext($im, 64, 0, 1750, 750, $beyaz, $fontfile, $two);
									imagettftext($im, 64, 0, 1750, 870, $beyaz, $fontfile, $tree);
									imagettftext($im, 64, 0, 1750, 990, $beyaz, $fontfile, $four);
									imagettftext($im, 64, 0, 1750, 1112, $beyaz, $fontfile, $five);
									imagettftext($im, 64, 0, 1750, 1230, $beyaz, $fontfile, $six);
									imagettftext($im, 64, 0, 1750, 1350, $beyaz, $fontfile, $seven);
									imagettftext($im, 64, 0, 1750, 1470, $beyaz, $fontfile, $eitxs);
									imagecopymerge($im, $imxxx, 2610, 1770, 0, 0, 530, 530, 100);
									$resim_sertifika_onay = imagejpeg($im, $resimadixyz);
									if ($resim_sertifika_onay) {
											##RESİM yuklendi URUNLER OK sertifika ok
											$insertxxyz = $db->query("UPDATE sertifikalar SET
											sertifi_ornek_sab = '$resimadixyz',
											sertifi_urun_id = '$last_insert_id',
											sertifi_ornek_durum = 2 WHERE sertifi_id = '$sertifi_id' ");
										if($insertxxyz->rowCount()){
												require '../admin/host/mail_sablon/uyesertifiokey_admin.php';
												$mailgonder = MailXM($ayar["gemail"], "Yeni Sertifika Oluşturuldu !", $uyesertifiokey_admin);
												if ($mailgonder) {
													echo 'basarili';
												}else{
													echo 'basarilimail';
												}
										}else{
											echo 'basarisiz';
										}


									}else{
										##RESİM yuklendi URUNLER OK sertifika none
										echo "resimokurunleroksertifikanone";

									}	
							}else{
								##RESİM YÜKLENEMEDİ URUNLER OK
								echo "resimnoneurunlerok";
							}
						}
 					}else{
							##RESİM YÜKLENEMEDİ URUNLER EKLENEMEDİ
 						echo "resimnoneurunlernone";
					}


}
}
if ($_GET["p"] == "profileupdate"){
	$uye_id = p("uyeid");
    $name = p("name");
    $surname = p("surname");
    $date = p("date");
    $phone = p("phone");
    $eposta = p("eposta");
    $sex = p("sex");
    $sitelang = p("sitelang");
	@$profile_img 				= $_FILES["profile_img"]["tmp_name"][0];
	$resim_onad = $uye_id."_";
    if (!$uye_id || !$name || !$surname || !$date || !$phone || !$eposta || !$sex || !$sitelang ){
        echo 'bos-deger';
    }   	if ($profile_img) {
    			$profile_imgyuk = imgAdd("profile_img","profile_img","uyeler","uye_profil_img","uye_id",$uye_id,$resim_onad);
    			if ($profile_imgyuk) {
    				echo 'basarili';
    			}
    	}else{

    	
    	    $insert = $db->query("UPDATE uyeler SET 
			uye_ad 		= '$name',
			uye_soyad 		= '$surname',
			uye_dtarih 		= '$date',
			uye_telefon 		= '$phone',
			uye_eposta 		= '$eposta',
			uye_cinsiyet 		= '$sex',
			uye_sitedil 		= '$sitelang' WHERE uye_id='$uye_id'");
        if ($insert->rowCount()){
        
    		echo 'basarili';
        }
        else{
            echo 'basarisiz';
        }
    }
}
if ($_GET["p"] == "passwordupdate"){
    $uye_id = p("uyeid");
    $uye_sifre = md5(p("password"));
    $uye_sifre_2 = md5(p("password_two"));
    if (!$uye_id || !$uye_sifre || !$uye_sifre_2){
        echo 'bos-deger';
    }
    elseif ($uye_sifre != $uye_sifre_2){
        echo 'sifreler-uyusmuyor';
    }
    else{
        $insert = $db->query("UPDATE uyeler SET 
		uye_sifre =	'$uye_sifre' 
		 WHERE uye_id='$uye_id'");
        if ($insert->rowCount()){
            echo 'basarili';
        }
        else{
            echo 'basarisiz';
        }
    }
}

if($_GET["p"]=="sertifikauret_talep"){

	$sertifi_id		= p("sertifi_id");
	$uye_id		= p("uye_id");
	$tarih = date("F j, Y, g:i a"); ;
	$drum = 1;
	$sertifikont = $db->query("SELECT * FROM sertifikalar WHERE sertifi_id='$sertifi_id' ")->fetch(PDO::FETCH_ASSOC);
	$sertifiurun = $sertifikont["sertifi_urun_id"];
if ($sertifiurun) {
	if(!$sertifi_id || !$uye_id ){
		echo 'bos-deger';
	}else{
	$insertxxyz = $db->query("UPDATE sertifikalar SET
								sertifi_transferkod = '' WHERE sertifi_id = '$sertifi_id' ");
								if($insertxxyz->rowCount()){
					$insert = $db->prepare("UPDATE urunler SET 
					fa_urun_tam_icerik =:tarih,	
					urun_durum =:durum	
					 WHERE urun_id=:sertifiurun ");
					$insert ->bindParam("tarih",$tarih,PDO::PARAM_STR);
					$insert ->bindParam("durum",$drum,PDO::PARAM_INT);
					$insert ->bindParam("sertifiurun",$sertifiurun,PDO::PARAM_INT);
					$insert ->execute();
					if($insert->rowCount()){
							require '../admin/host/mail_sablon/sertifikauretme_talep_admin.php';
							$mailgonder = MailXM($ayar["gemail"], "Yeni Sertifika Üretme Talebi Mevcut !", $sertifikauretme_talep_admin);
							if ($mailgonder) {
								echo 'basarili';
								$_SESSION['sertifika_talepvar'.$sertifi_id] = true;
							}else{
								echo 'basarilimail';
							}
					}else{
						echo 'basarisiz';
					}
				}
					
		
	}
	}	
}




if($_GET["p"]=="contactform"){
	$uyeid		= p("uyeid");
	$name		= p("name");
	$surname		= p("surname");
	$date		= p("date");
	$phone		= p("phone");
	$eposta		= p("eposta");
	$uye_firma_adresi		= p("uye_firma_adresi");
	$uye_firma_vergino		= p("uye_firma_vergino");
	$uye_firmaunvan		= p("uye_firmaunvan");
	$uye_firma_telefon		= p("uye_firma_telefon");
	$uye_firma_email		= p("uye_firma_email");
	$uye_firma_ulke		= p("uye_firma_ulke");
	$uye_firma_metemask		= p("uye_firma_metemask");
	$iletisim_baslik		= p("iletisim_baslik");
	$iletisim_desc		= p("iletisim_desc");
	$gelen_ip = GetIP();
	if(!$iletisim_baslik || !$iletisim_desc ){
		echo 'bos-deger';
	}else{
		$ileti ="Merhaba Yönetici; <br>İletişim Formundan Bir Yeni Mesaj Alıdın. Detaylar aşağıdaki gibidir;";
		$ileti .=  "<br><p><strong><h4><u>Gönderilen Mesaj Detayları</u></h4></strong></p>";
		$ileti .= "<b>Ad Soyad :</b> ".$name." ".$surname."<br>";
		$ileti .= "<b>Doğum Tarihi :</b> ".$date."<br>";
		$ileti .= "<b>Telefon Numarası :</b> ".$phone."<br>";
		$ileti .= "<b>E-Posta :</b> ".$eposta."<br>";
		$ileti .= "<b>Firma Adresi :</b> ".$uye_firma_adresi."<br>";
		$ileti .= "<b>Firma Vergi No :</b> ".$uye_firma_vergino."<br>";
		$ileti .= "<b>Firma Ünvan :</b> ".$uye_firmaunvan."<br>";
		$ileti .= "<b>Firma Telefon No :</b> ".$uye_firma_telefon."<br>";
		$ileti .= "<b>Firma E-Posta :</b> ".$uye_firma_email."<br>";
		$ileti .= "<b>Firma Ülke :</b> ".$uye_firma_ulke."<br>";
		$ileti .= "<b>Firma Metemask Adresi :</b> ".$uye_firma_metemask."<br>";
		$ileti .= "<b>İletişim Konusu :</b> ".$iletisim_baslik."<br>";
		$ileti .= "<b>Mesaj Detayları :</b> ".$iletisim_desc."<br>";
		$ileti .= "<h5><u>Bu mesaj <b>".$gelen_ip."</b> numaralı ip adresinden gönderildi !</u></h5>";
		$mailgonder = MailXM($ayar["gemail"], "Yeni İletişim Formu Talebi Mevcut !", $ileti);
		if ($mailgonder) {
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
	
}
