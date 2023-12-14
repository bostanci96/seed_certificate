<?php
## Kategori Düzenle
if($_GET["p"]=="kategori_edit"){
	$cat_id 			= p("kategori_id");
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p("kategori_desc");
	$en_kategori_adi		= p("en_kategori_adi");
	$en_kategori_url		= sef_link($en_kategori_adi);
	$en_kategori_desc 		= p("en_kategori_desc");

	$fa_kategori_adi		= p("fa_kategori_adi");
	$fa_kategori_url		= $kategori_url;
	$fa_kategori_desc 		= p("fa_kategori_desc");
	$ar_kategori_adi		= p("ar_kategori_adi");
	$ar_kategori_url		= $kategori_url;
	$ar_kategori_desc 		= p("ar_kategori_desc");
	$ust_kategori			= p("ust_kategori");
	@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$kategori_adi || !$kategori_desc){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE kategoriler SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
			kategori_desc 		= '$kategori_desc',
			kategori_url		= '$kategori_url',
			en_kategori_adi 	= '$en_kategori_adi',
			en_kategori_desc 	= '$en_kategori_desc',
			en_kategori_url		= '$en_kategori_url',
			fa_kategori_adi 	= '$fa_kategori_adi',
			fa_kategori_desc 	= '$fa_kategori_desc',
			fa_kategori_url		= '$fa_kategori_url',
			ar_kategori_adi 	= '$ar_kategori_adi',
			ar_kategori_desc 	= '$ar_kategori_desc',
			ar_kategori_url		= '$ar_kategori_url',
			kategori_durum 		= 1 WHERE kategori_id='$cat_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/kategori_resim_edit.php");
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Kategori Ekle
if($_GET["p"]=="kategori_add"){
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p('kategori_desc');
	$ust_kategori		= p("ust_kategori");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$kategori_adi || !$kategori_desc){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO kategoriler SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
			kategori_url		= '$kategori_url',
			kategori_desc 		= '$kategori_desc',
			kategori_durum 		= 1");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/kategori_resim_add.php");
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Kategori Sil 

if($_GET["p"]=="tek_cat_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM kategoriler WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$kategori = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/kategoriler/big/".$kategori["kategori_resim"];
		$kucukResim = "../images/kategoriler/thumb/".$kategori["kategori_resim"];
		if(isset($buyukResim)){unlink($buyukResim);}
		if(isset($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM kategoriler WHERE kategori_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="cat_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM kategoriler WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["kategori_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE kategoriler SET kategori_durum=0 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE kategoriler SET kategori_durum=1 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}

## Kategori Düzenle
if($_GET["p"]=="haberkategori_edit"){
	$cat_id 			= p("kategori_id");
		$kat_secenek 			= p("kat_secenek");
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p("kategori_desc");
	$en_kategori_adi		= p("en_kategori_adi");
	$en_kategori_url		= sef_link($en_kategori_adi);
	$en_kategori_desc 		= p("en_kategori_desc");
	$resim_baslik = p("resim_baslik");
	$en_resim_baslik = p("en_resim_baslik");
	$ar_resim_baslik = p("ar_resim_baslik");
	$fa_resim_baslik = p("fa_resim_baslik");
		$kategori_aciklama		= p("kategori_aciklama");
	$fa_kategori_adi		= p("fa_kategori_adi");
	$fa_kategori_url		= $kategori_url;
	$fa_kategori_desc 		= p("fa_kategori_desc");
	$ar_kategori_adi		= p("ar_kategori_adi");
	$ar_kategori_url		= $kategori_url;
	$ar_kategori_desc 		= p("ar_kategori_desc");
	$ust_kategori			= p("ust_kategori");
	@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$kategori_adi || !$kategori_desc ){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE haberkategori SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
				kat_secenek 		= '$kat_secenek',
			kategori_desc 		= '$kategori_desc',
			kategori_url		= '$kategori_url',
			kategori_aciklama		= '$kategori_aciklama',
			en_kategori_adi 	= '$en_kategori_adi',
			en_kategori_desc 	= '$en_kategori_desc',
			en_kategori_url		= '$en_kategori_url',
			fa_kategori_adi 	= '$fa_kategori_adi',
			fa_kategori_desc 	= '$fa_kategori_desc',
			fa_kategori_url		= '$fa_kategori_url',
			ar_kategori_adi 	= '$ar_kategori_adi',
			ar_kategori_desc 	= '$ar_kategori_desc',
			ar_kategori_url		= '$ar_kategori_url',resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik',
			kategori_durum 		= 1 WHERE kategori_id='$cat_id'");
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Kategori Ekle
if($_GET["p"]=="haberkategori_add"){
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p('kategori_desc');
	$kat_secenek 			= p("kat_secenek");
	$ust_kategori		= p("ust_kategori");
		$kategori_aciklama		= p("kategori_aciklama");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	$resim_baslik		= p("resim_baslik");
	if(!$kategori_adi || !$kategori_desc ){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO haberkategori SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
			kategori_url		= '$kategori_url',
			kat_secenek 		= '$kat_secenek',
			resim_baslik		= '$resim_baslik',
			kategori_aciklama		= '$kategori_aciklama',
			kategori_desc 		= '$kategori_desc',
			kategori_durum 		= 1");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Kategori Sil 

if($_GET["p"]=="tek_habercat_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM haberkategori WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$kategori = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/kategoriler/big/".$kategori["kategori_resim"];
		$kucukResim = "../images/kategoriler/thumb/".$kategori["kategori_resim"];
		if(isset($buyukResim)){unlink($buyukResim);}
		if(isset($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM haberkategori WHERE kategori_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="cat_haberdurum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM haberkategori WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["kategori_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE haberkategori SET kategori_durum=0 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE haberkategori SET kategori_durum=1 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}






## Kategori Düzenle
if($_GET["p"]=="databasekategori_edit"){
	$cat_id 			= p("kategori_id");
		$kat_secenek 			= p("kat_secenek");
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p("kategori_desc");
	$en_kategori_adi		= p("en_kategori_adi");
	$en_kategori_url		= sef_link($en_kategori_adi);
	$en_kategori_desc 		= p("en_kategori_desc");
	$resim_baslik = p("resim_baslik");
	$en_resim_baslik = p("en_resim_baslik");
	$ar_resim_baslik = p("ar_resim_baslik");
	$fa_resim_baslik = p("fa_resim_baslik");
		$kategori_aciklama		= p("kategori_aciklama");
	$fa_kategori_adi		= p("fa_kategori_adi");
	$fa_kategori_url		= $kategori_url;
	$fa_kategori_desc 		= p("fa_kategori_desc");
	$ar_kategori_adi		= p("ar_kategori_adi");
	$ar_kategori_url		= $kategori_url;
	$ar_kategori_desc 		= p("ar_kategori_desc");
	$ust_kategori			= p("ust_kategori");
	@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$kategori_adi || !$kategori_desc ){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE databasekategori SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
				kat_secenek 		= '$kat_secenek',
			kategori_desc 		= '$kategori_desc',
			kategori_url		= '$kategori_url',
			kategori_aciklama		= '$kategori_aciklama',
			en_kategori_adi 	= '$en_kategori_adi',
			en_kategori_desc 	= '$en_kategori_desc',
			en_kategori_url		= '$en_kategori_url',
			fa_kategori_adi 	= '$fa_kategori_adi',
			fa_kategori_desc 	= '$fa_kategori_desc',
			fa_kategori_url		= '$fa_kategori_url',
			ar_kategori_adi 	= '$ar_kategori_adi',
			ar_kategori_desc 	= '$ar_kategori_desc',
			ar_kategori_url		= '$ar_kategori_url',resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik',
			kategori_durum 		= 1 WHERE kategori_id='$cat_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/databasekategori_resim_edit.php");
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Kategori Ekle
if($_GET["p"]=="databasekategori_add"){
	$kategori_adi		= p("kategori_adi");
	$kategori_url		= sef_link($kategori_adi);
	$kategori_desc 		= p('kategori_desc');
	$kat_secenek 			= p("kat_secenek");
	$ust_kategori		= p("ust_kategori");
		$kategori_aciklama		= p("kategori_aciklama");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	$resim_baslik		= p("resim_baslik");
	if(!$kategori_adi || !$kategori_desc ){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO databasekategori SET
			kategori_ust_id 	= '$ust_kategori',
			kategori_adi 		= '$kategori_adi',
			kategori_url		= '$kategori_url',
			kat_secenek 		= '$kat_secenek',
			resim_baslik		= '$resim_baslik',
			kategori_aciklama		= '$kategori_aciklama',
			kategori_desc 		= '$kategori_desc',
			kategori_durum 		= 1");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/databasekategori_resim_add.php");
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Kategori Sil 

if($_GET["p"]=="tek_databasecat_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM databasekategori WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$kategori = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/kategoriler/big/".$kategori["kategori_resim"];
		$kucukResim = "../images/kategoriler/thumb/".$kategori["kategori_resim"];
		if(isset($buyukResim)){unlink($buyukResim);}
		if(isset($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM databasekategori WHERE kategori_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="cat_databasedurum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM databasekategori WHERE kategori_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["kategori_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE databasekategori SET kategori_durum=0 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE databasekategori SET kategori_durum=1 WHERE kategori_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}


?>