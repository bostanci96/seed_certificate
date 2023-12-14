<?php
	## Ürün Düzenle
if($_GET["p"]=="urun_edit"){
	$urun_id 		= p("urun_id");
	$urun_adi 		= p("urun_adi");
	$urun_url 		= sef_link($urun_adi);
	$urun_icerik 	= p("urun_icerik");
	$urun_desc 		= p("urun_desc");
	$urun_link 		= p("urun_link");

	$en_urun_adi 		= p("en_urun_adi");
	$en_urun_url 		= sef_link($en_urun_adi);
	$en_urun_icerik 	= p("en_urun_icerik");
	$en_urun_desc 		= p("en_urun_desc");

	$ar_urun_adi 		= p("ar_urun_adi");
	$ar_urun_url 		= $urun_url;
	$ar_urun_icerik 	= p("ar_urun_icerik");
	$ar_urun_desc 		= p("ar_urun_desc");

	$fa_urun_adi 		= p("fa_urun_adi");
	$fa_urun_url 		= $urun_url;
	$fa_urun_icerik 	= p("fa_urun_icerik");
	$fa_urun_desc 		= p("fa_urun_desc");
	$urun_kategori 	= p("urun_kategori");
	$urun_populer 	= p("urun_populer");
		$dosya22 				= $_FILES["dosya22"]["tmp_name"][0];
	@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$urun_adi || !$urun_id){
		echo 'bos-deger';
	}else{

		$update =$db->query("UPDATE urunler SET
			urun_adi 		= '$urun_adi',
			urun_url 		= '$urun_url',
			urun_kategori 	= '$urun_kategori',
			urun_icerik 	= '$urun_desc',
			urun_link 	= '$urun_link',
			urun_tam_icerik 	= '$urun_icerik',

			en_urun_icerik 		= '$en_urun_desc',
			en_urun_adi 		= '$en_urun_adi',
			en_urun_url 		= '$en_urun_url',
			en_urun_tam_icerik 	= '$en_urun_icerik',

			fa_urun_icerik 		= '$fa_urun_desc',
			fa_urun_adi 		= '$fa_urun_adi',
			fa_urun_url 		= '$fa_urun_url',
			fa_urun_tam_icerik 	= '$fa_urun_icerik',
			ar_urun_icerik 		= '$ar_urun_desc',
			ar_urun_adi 		= '$ar_urun_adi',
			ar_urun_url 		= '$ar_urun_url',
			ar_urun_tam_icerik 	= '$ar_urun_icerik',
			urun_populer 	= '$urun_populer' WHERE urun_id='$urun_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/urun_resim_edit.php");
			
		}
		if(strlen($dosya22)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/urun_resim_edit2.php");
			
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Ürün Ekle
if($_GET["p"]=="urun_add"){
	$urun_adi 		= p("urun_adi");
	$urun_url 		= sef_link($urun_adi);
	$urun_desc 		= p("urun_desc");
	$urun_kategori 	= p("urun_kategori");
	$urun_populer 	= p("urun_populer");
	$urun_icerik 	= p("urun_icerik");
	$urun_link 	= p("urun_link");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	$dosya22 				= $_FILES["dosya22"]["tmp_name"][0];
	if(!$urun_adi || !$dosya || !$dosya22){
		echo 'bos-deger';
	}else{

		$siraQuery = $db->query("SELECT urun_sira_no FROM urunler WHERE urun_kategori='$urun_kategori' ORDER BY urun_sira_no DESC LIMIT 0,1")->fetch(PDO::FETCH_ASSOC);
		$newSira 	= $siraQuery["urun_sira_no"]+1;
		$insert = $db->prepare("INSERT INTO urunler SET 
			urun_adi=:urun_adi,
			urun_sira_no=:sira_no,
			urun_url=:url,
			urun_icerik=:icerik,
			urun_kategori=:kategori,
			urun_link=:link,
			urun_populer=:populer,
			urun_tam_icerik =:tam_icerik,
			urun_durum 		=:durum");
		$insert->bindParam("urun_adi",$urun_adi,PDO::PARAM_STR);
		$insert->bindParam("sira_no",$newSira,PDO::PARAM_INT);
		$insert->bindParam("url",$urun_url,PDO::PARAM_STR);
		$insert->bindParam("icerik",$urun_desc,PDO::PARAM_STR);
		$insert->bindParam("kategori",$urun_kategori,PDO::PARAM_INT);
		$insert->bindParam("link",$urun_link,PDO::PARAM_STR);
		$insert->bindParam("populer",$urun_populer,PDO::PARAM_INT);
		$insert->bindParam("tam_icerik",$urun_icerik,PDO::PARAM_STR);
		$insert->bindValue("durum",1,PDO::PARAM_INT);
		$insert->execute();
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
			$asdasl = imgAdd("dosya22","urunler","urunler","urun_resim","urun_id",$last_insert_id);
			}
			if ($asdasl) {
				echo 'basarili';
			}else{
				echo 'basarisiz';
			}
			
		}else{
			
		}
	}
}
#Tek Ürün Sil 
if($_GET["p"]=="tek_urun_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM urunler WHERE urun_id='$id'");
	if($kontrol->rowCount()){
		$urun = $kontrol->fetch(PDO::FETCH_ASSOC);
		$imgKontrol = $db->query("SELECT * FROM urunresim WHERE resim_urun_id='$id'");
		if($imgKontrol->rowCount()){
			foreach($imgKontrol as $imgRow){
				$imgId = $imgRow["resim_id"];
				$buyukResim = "../images/urunler/big/".$imgRow["urun_img"];
				$kucukResim = "../images/urunler/thumb/".$imgRow["urun_img"];
				if(isset($buyukResim)){unlink($buyukResim);}
				if(isset($kucukResim)){unlink($kucukResim);}
				$deleteImg = $db->query("DELETE FROM urunresim WHERE resim_id='$imgId'");
			}
		}
		$delete = $db->query("DELETE FROM urunler WHERE urun_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Reism Sil
if($_GET["p"]=="tek_urunresim_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM urunresim WHERE resim_id='$id'");
	if($kontrol->rowCount()){
		$urun = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/urunler/big/".$urun["urun_img"];
		$kucukResim = "../images/urunler/thumb/".$urun["urun_img"];
		if(isset($buyukResim)){unlink($buyukResim);}
		if(isset($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM urunresim WHERE resim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="urun_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM urunler WHERE urun_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$urunDurum = $uyeRow["urun_durum"];
		if($urunDurum==1){
			$update = $db->query("UPDATE urunler SET urun_durum=0 WHERE urun_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE urunler SET urun_durum=1 WHERE urun_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}
?>