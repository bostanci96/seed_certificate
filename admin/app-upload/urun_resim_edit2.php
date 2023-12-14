<?php
$toplam		= count($_FILES["dosya22"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["dosya22"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['dosya22'] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}

		foreach($resimler as $resim){
			$handle = new Upload($resim);
			if($handle->uploaded){
				$handle->file_overwrite = true;
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
				$handle->Process("../images/urunler/big/");
				if($handle->processed){
					$handle->file_overwrite = true;
					$handle->image_resize = true;
					$handle->image_x = 418;
					$handle->image_y = 224;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/urunler/thumb/");
					$imgupdate = $db->query("UPDATE urunler SET 
						urun_resim = '$resimAdi' WHERE urun_id='$urun_id'");
					$updateSuccess = true;
				}
			}
		}
	}
}						
/* upload */

?>