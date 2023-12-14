<?php

if($_GET["p"]=="menuSiraGuncelle"){
	$menu_id = p("menu_id");
	$sira_no = p("sira_no");
	$update = $db->prepare("UPDATE menuler SET menu_sira=:sira_no WHERE menu_id=:id");
	$update -> bindParam("sira_no",$sira_no,PDO::PARAM_INT);
	$update -> bindParam("id",$menu_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo $menu_id;
		echo 'basarisiz';
	}
}
	## Menü Düzenle
if($_GET["p"]=="menu_edit"){
	$menu_id 	= p("menu_id");
	$menu_ust 	= p("menu_ust");
	$menu_type 	= p("menu_type");
	$menu_baslik= p("menu_baslik");
	$menu_href 	= p("menu_href");

	$fa_menu_baslik= p("fa_menu_baslik");
	$fa_menu_href 	= p("fa_menu_href");

	$ar_menu_baslik= p("ar_menu_baslik");
	$ar_menu_href 	= p("ar_menu_href");

	$en_menu_baslik= p("en_menu_baslik");

	$en_menu_href 	= p("en_menu_href");



	@$dosya 	= $_FILES["dosya"]["tmp_name"][0];
	if(!$menu_id || !$menu_baslik){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE menuler SET
			menu_ust 	= '$menu_ust',
			menu_baslik = '$menu_baslik',
			menu_href 	= '$menu_href',

			en_menu_baslik = '$en_menu_baslik',
			en_menu_href 	= '$en_menu_href',
			ar_menu_baslik = '$ar_menu_baslik',
			ar_menu_href 	= '$ar_menu_href',
			fa_menu_baslik = '$fa_menu_baslik',
			fa_menu_href 	= '$fa_menu_href',
			menu_type 	= '$menu_type' WHERE menu_id='$menu_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/app.upload.php");
			require_once("app-upload/menu_resim_edit.php");
			if($updateSuccess){
				$menuResim = p("menu_resim");
				$file      = '../images/menuPhotos/'.$menuResim;
				if(is_file($file)){
					unlink($file);
				}
			}
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Menü Ekle
if($_GET["p"]=="menu_add"){
	$menu_ust 		= p("menu_ust");
	$menu_type 		= p("menu_type");
	$menu_baslik 	= p("menu_baslik");
	$menu_href 		= p("menu_href");
	@$dosya 	= $_FILES["dosya"]["tmp_name"][0];
	if(!$menu_baslik || !$menu_href){
		echo 'bos-deger';
	}elseif($menu_type=='mega-menu' and strlen($dosya)<3){
		echo 'mega-resim-yok';
	}else{

		$insert =$db->query("INSERT INTO menuler SET
			menu_ust 	= '$menu_ust',
			menu_baslik = '$menu_baslik',
			menu_href 	= '$menu_href',
			menu_type 	= '$menu_type',
			menu_durum 	= 1
			");
		if($insert->rowCount()){
			if(strlen($dosya)>3){
				$last_insert_id = $db->lastInsertId();
				if($last_insert_id){
					require_once("app-upload/app.upload.php");
					require_once("app-upload/menu_resim_add.php");
				}
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Menü Sil 

if($_GET["p"]=="tek_menu_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM menuler WHERE menu_id='$id'");
	if($kontrol->rowCount()){
		$delete = $db->query("DELETE FROM menuler WHERE menu_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Durum Değiştir

if($_GET["p"]=="menu_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM menuler WHERE menu_id='$id'");
	if($kontrol->rowCount()){
		$menuRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$menuDurum = $menuRow["menu_durum"];
		if($menuDurum==1){
			$update = $db->query("UPDATE menuler SET menu_durum=0 WHERE menu_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE menuler SET menu_durum=1 WHERE menu_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}
?>