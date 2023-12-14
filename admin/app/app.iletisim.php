<?php 
if($_GET["p"]=="mesaj_cevap"){
	$mesajcevap 		= p("cevap");
	$mid 			= p("mid");
	
	$elcevap 			= p("elcevap");
	$kisiad 			= p("kisiad");
	if(!$mid || !$mesajcevap ){
		echo 'bos-deger';
	}else{
		$onay 			= 1;
		$update =$db->query("UPDATE iletisim SET
			iletisim_cevap 		= '$mesajcevap' ,  
			iletisim_durum 		= '$onay'		
			WHERE iletisim_id='$mid'");
		if($update->rowCount() ){

			$to = $elcevap;
			$isim=$kisiad;

			$ileti=$mesajcevap;

			require 'mailer/class.phpmailer.php';
			$mail = new PHPMailer();
			$mail->IsSMTP();        
			require 'mailer/cevap_functions.php';

			if($mail->Send()){   
				echo 'basarili';exit();
			}else{
				echo "basarisiz";exit();
			}
		}else{
			echo 'bos-deger';
		}



	}

}


if($_GET["p"]=="mesajsil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM iletisim WHERE iletisim_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$delete = $db->query("DELETE FROM iletisim WHERE iletisim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';exit();
		}else{
			echo 'basarisiz';exit();
		}
	}
}


if($_GET["p"]=="mesajsil2"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM iletisim WHERE iletisim_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$delete = $db->query("DELETE FROM iletisim WHERE iletisim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';exit();
		}else{
			echo 'basarisiz';exit();
		}
	}
}




if($_GET["p"]=="mesajonay"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM iletisim WHERE iletisim_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["iletisim_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE iletisim SET iletisim_durum=0 WHERE iletisim_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE iletisim SET iletisim_durum=1 WHERE iletisim_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';exit();
			}
		}
	}
}

?>