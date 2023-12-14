<?php
if($_GET["p"]=="fotograf_edit"){
	$fotograf_id 			= p("fotograf_id");
	$fotograf_src 			= p("fotograf_src");
	$fotograf_shortDesc 	= p("fotograf_shortDesc");
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=p("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= p("fotograf_longDesc");
	$fotograf_href 			= p("fotograf_href");

	$en_fotograf_shortDesc 	= p("en_fotograf_shortDesc");
	if(isset($_POST["en_fotograf_shortDesc2"])){$en_fotograf_shortDesc2=p("en_fotograf_shortDesc2");}else{$en_fotograf_shortDesc2="";}
	$en_fotograf_longDesc		= p("en_fotograf_longDesc");
	$en_fotograf_href 			= p("en_fotograf_href");

	$ar_fotograf_shortDesc 	= p("ar_fotograf_shortDesc");
	if(isset($_POST["ar_fotograf_shortDesc2"])){$ar_fotograf_shortDesc2=p("ar_fotograf_shortDesc2");}else{$ar_fotograf_shortDesc2="";}
	$ar_fotograf_longDesc		= p("ar_fotograf_longDesc");
	$ar_fotograf_href 			= p("ar_fotograf_href");

	$fa_fotograf_shortDesc 	= p("fa_fotograf_shortDesc");
	if(isset($_POST["fa_fotograf_shortDesc2"])){$fa_fotograf_shortDesc2=p("fa_fotograf_shortDesc2");}else{$fa_fotograf_shortDesc2="";}
	$fa_fotograf_longDesc		= p("fa_fotograf_longDesc");
	$fa_fotograf_href 			= p("fa_fotograf_href");

	$fotograf_bolum 		= p("fotograf_bolum");
	$fotograf_bolum2 		= p("fotograf_bolum2");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_id || !$fotograf_bolum || !$fotograf_shortDesc){
		echo 'bos-deger';
	}else{
		require_once("app-upload/app.upload.php");
		$update =$db->query("UPDATE fotograflar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 = '$fotograf_shortDesc2',
			fotograf_href 		= '$fotograf_href',
			en_fotograf_longDesc 	= '$en_fotograf_longDesc',
			en_fotograf_shortDesc 	= '$en_fotograf_shortDesc',
			en_fotograf_shortDesc2 	= '$en_fotograf_shortDesc2',
			en_fotograf_href 		= '$en_fotograf_href',

			fa_fotograf_longDesc 	= '$fa_fotograf_longDesc',
			fa_fotograf_shortDesc 	= '$fa_fotograf_shortDesc',
			fa_fotograf_shortDesc2 	= '$fa_fotograf_shortDesc2',
			fa_fotograf_href 		= '$fa_fotograf_href',
			ar_fotograf_longDesc 	= '$ar_fotograf_longDesc',
			ar_fotograf_shortDesc 	= '$ar_fotograf_shortDesc',
			ar_fotograf_shortDesc2 	= '$ar_fotograf_shortDesc2',
			ar_fotograf_href 		= '$ar_fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',
			fotograf_durum 		= 1 WHERE fotograf_id='$fotograf_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/fotograf_resim_edit.php");
		}
		if(strlen($refgaleri)>3){
			$last_insert_id = $fotograf_id;
			require_once("app-upload/referans_galeri_add.php");
		}
		if($update->rowCount() || $updateSuccess || $galeriSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Fotoğraf Ekle
if($_GET["p"]=="fotograf_add"){
	$fotograf_shortDesc 	= p("fotograf_shortDesc");
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=p("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= p("fotograf_longDesc");
	$fotograf_href 			= p("fotograf_href");
	$fotograf_bolum 		= p("fotograf_bolum");
	$fotograf_bolum2 		= p("fotograf_bolum2");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$dosya2 				= $_FILES["dosya2"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_shortDesc || !$fotograf_bolum){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO fotograflar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 	= '$fotograf_shortDesc2',

			fotograf_href 		= '$fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',
			fotograf_durum 		= 1
			");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/fotograf_resim_add.php");
				if(strlen($dosya2)>3){
					require_once("app-upload/katalog_pdf_add.php");
				}
				if(strlen($refgaleri)>3){
					require_once("app-upload/referans_galeri_add.php");
				}
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Fotoğraf Sil 
if($_GET["p"]=="tek_foto_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM fotograflar WHERE fotograf_id='$id'");
	if($kontrol->rowCount()){
		$fotograf = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/photos/big/".$fotograf["fotograf_src"];
		$kucukResim = "../images/photos/thumb/".$fotograf["fotograf_src"];
		$pdf 		= "../images/katalog/".$fotograf["fotograf_href"];
		if(is_file($pdf)){unlink($pdf);}
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}

		$fotograf_bolum = $fotograf["fotograf_bolum"];
		if($fotograf_bolum==2){
			$refControl = $db->query("SELECT * FROM referansresim WHERE resim_fotograf_id='$id'");
			if($refControl->rowCount()){
				foreach($refControl as $refRow){
					$refResimID = $refRow["resim_id"];
					$buyukResim = "../images/photos/big/".$refRow["resim_src"];
					$kucukResim = "../images/photos/thumb/".$refRow["resim_src"];
					if(is_file($buyukResim)){unlink($buyukResim);}
					if(is_file($kucukResim)){unlink($kucukResim);}
					$deleteRef = $db->query("DELETE FROM referansresim WHERE resim_id='$refResimID'");
				}
			}
		}


		$delete = $db->query("DELETE FROM fotograflar WHERE fotograf_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="foto_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM fotograflar WHERE fotograf_id='$id'");
	if($kontrol->rowCount()){
		$fotoRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$fotoDurum = $fotoRow["fotograf_durum"];
		if($fotoDurum==1){
			$update = $db->query("UPDATE fotograflar SET fotograf_durum=0 WHERE fotograf_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE fotograflar SET fotograf_durum=1 WHERE fotograf_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}

#Tek Fotoğraf Sil 
if($_GET["p"]=="tek_refresim_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM referansresim WHERE resim_id='$id'");
	if($kontrol->rowCount()){
		$fotograf = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/photos/big/".$fotograf["resim_src"];
		$kucukResim = "../images/photos/thumb/".$fotograf["resim_src"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM referansresim WHERE resim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
?>