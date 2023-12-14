<?php
$toplam		= count($_FILES["dosya"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["dosya"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['dosya'] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}

		foreach($resimler as $resim){
			$handle = new Upload($resim);
			if($handle->uploaded){
				/* Resim Genişliği 1920den büyükse 1920'ye eşitliyoruz.. */ 
				/* 1920'den büyük değilse olduğu gibi atılacaktır. */ 
				$resimGenislik = $handle->image_src_x;
				if($resimGenislik>1920){
					$handle->image_resize = true;
					$handle->image_x = 1920;
					$handle->image_ratio_y = true;
				}
				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= str_replace("=","",$randName);
				$handle->file_new_name_body = $newName;
				$resim_adi = $handle->file_new_name_body;

				/* Resim Uzantısını Alma */
				$uzanti = $handle->image_src_type;

				$resimAdi = $resim_adi.".".$uzanti;

				/* Resim yükleme izini */
				$handle->allowed = array('image/*');

				/* Büyük resmi yükle */
				$handle->Process("../images/photos/big/");
				if($handle->processed){
					$handle->image_resize = true;
					$handle->image_x = 275;
					$handle->image_y = 312;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/photos/thumb/");
					$imgupdate = $db->query("UPDATE fotograflar SET 
						fotograf_src = '$resimAdi' WHERE fotograf_id='$fotograf_id'");
					if($imgupdate->rowCount()){
						$bigImg = "../images/photos/big/".$fotograf_src;
						$thumbImg = "../images/photos/thumb/".$fotograf_src;
						if(is_file($bigImg)){unlink($bigImg);}
						if(is_file($thumbImg)){unlink($thumbImg);}
					}
					$updateSuccess = true;
				}
			}
		}
	}
}						
/* upload */

?>