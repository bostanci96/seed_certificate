<?php
#Tek Üye Sil
if ($_GET["p"] == "tek_uye_sil"){
    $id = p("id");
    $kontrol = $db->query("SELECT * FROM uyeler WHERE uye_id='$id'");
    if ($kontrol->rowCount()){
        $delete = $db->query("DELETE FROM uyeler WHERE uye_id='$id'");
        if ($delete->rowCount()){
            echo 'basarili';
        }
        else{
            echo 'basarisiz';
        }
    }
}
#Durum Değiştir
if ($_GET["p"] == "uye_durum_degis"){
    $id = p("id");
    $kontrol = $db->query("SELECT * FROM uyeler WHERE uye_id='$id'");
    if ($kontrol->rowCount()){
        $uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
        $uyeDurum = $uyeRow["uye_onay"];
        if ($uyeDurum == 1){
            $update = $db->query("UPDATE uyeler SET uye_onay=0 WHERE uye_id='$id'");
            if ($update->rowCount()){
                echo 'yasaklama-basarili';
            }
        }
        else{
            $update = $db->query("UPDATE uyeler SET uye_onay=1 WHERE uye_id='$id'");
            if ($update->rowCount()){
                echo 'yasak-kaldirildi';
            }
        }
    }
}
#Üye Ekle
if ($_GET["p"] == "uye_add"){
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_eposta = p("uye_eposta");
    $uye_telefon = p("uye_telefon");
    $uye_rutbe = p("uye_rutbe");
    $uye_sabit = p("uye_sabit");
    $uye_sifre = md5(p("uye_sifre"));
    $uye_sifre_2 = md5(p("uye_sifre_tekrar"));
    if (!$uye_ad || !$uye_soyad || !$uye_eposta || !$uye_sifre || !$uye_sifre_2 || !$uye_telefon || !$uye_sabit){
        echo 'bos-deger';
    }
    elseif ($uye_sifre != $uye_sifre_2){
        echo 'sifreler-uyusmuyor';
    }
    elseif (!filter_var($uye_eposta, FILTER_VALIDATE_EMAIL)){
        echo 'gecersiz-eposta';
    }
    else{
        $mailCheck = $db->query("SELECT * FROM uyeler WHERE uye_eposta='$uye_eposta'");
        if ($mailCheck->rowCount()){
            echo 'eposta-alinmis';
        }
        else{
            $insert = $db->query("INSERT into uyeler SET
				uye_ad 		= '$uye_ad',
				uye_soyad 	= '$uye_soyad',
				uye_eposta 	= '$uye_eposta',
				uye_sifre 	= '$uye_sifre',
                uye_telefon = '$uye_telefon',
				uye_rutbe = '$uye_rutbe',
				uye_sabit 	= '$uye_sabit',
				uye_onay 	= 1");
            if ($insert->rowCount()){
                echo 'basarili';
            }
            else{
                echo 'basarisiz';
            }
        }
    }
}
#Üye Güncelle
if ($_GET["p"] == "uye_edit"){
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_eposta = p("uye_eposta");
    $uye_telefon = p("uye_telefon");
    $uye_dtarih = p("uye_dtarih");
    $sex = p("sex");
    $sitedil = p("sitedil");
    $uye_firma_vergino = p("uye_firma_vergino");
    $uye_firmaunvan = p("uye_firmaunvan");
    $uye_firma_telefon = p("uye_firma_telefon");
    $uye_firma_email = p("uye_firma_email");
    $uye_firma_ulke = p("uye_firma_ulke");
    $uye_firma_metemask = p("uye_firma_metemask");
    $uye_firma_adresi = p("uye_firma_adresi");
if (!$uye_ad || !$uye_soyad || !$uye_eposta || !$uye_telefon || !$uye_dtarih || !$sex || !$sitedil || !$uye_firma_vergino || !$uye_firmaunvan || !$uye_firma_telefon || !$uye_firma_email || !$uye_firma_ulke || !$uye_firma_metemask || !$uye_firma_adresi){
        echo 'bos-deger';
    }
    else{
        $insert = $db->query("UPDATE uyeler SET 
            uye_ad      = '$uye_ad',
            uye_soyad      = '$uye_soyad',
            uye_eposta      = '$uye_eposta',
            uye_telefon      = '$uye_telefon',
            uye_dtarih      = '$uye_dtarih',
            uye_cinsiyet      = '$sex',
            uye_sitedil      = '$sitedil',
            uye_firma_vergino      = '$uye_firma_vergino',
            uye_firmaunvan      = '$uye_firmaunvan',
            uye_firma_telefon      = '$uye_firma_telefon',
            uye_firma_email      = '$uye_firma_email',
            uye_firma_ulke      = '$uye_firma_ulke',
            uye_firma_metemask      = '$uye_firma_metemask',
			uye_firma_adresi 		= '$uye_firma_adresi'
             WHERE uye_id='$uye_id'");
        if ($insert->rowCount()){
            echo 'basarili';
        }
        else{
            echo 'degisiklik-yok';
        }
    }
}
if ($_GET["p"] == "uye_edit_sifre"){
    $uye_id = p("uye_id");
    $uye_sifre = md5(p("uye_sifre"));
    $uye_sifre_2 = md5(p("uye_sifre_tekrar"));
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
            echo 'degisiklik-yok';
        }
    }
}



if ($_GET["p"] == "uye_kyc_onay"){
    $kycred = p("kycred");
    $kyconay = p("kyconay");
    $uye_id = p("uye_id");
    $uye_eposta = p("uye_eposta");
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_dtarih = p("uye_dtarih");
    $uye_telefon = p("uye_telefon");
    $uye_cinsiyet = p("uye_cinsiyet");
    $uye_sitedil = p("uye_sitedil");
    uye_lang_check($uye_sitedil);
    dilCek();
    if (!$uye_id || !$uye_eposta){
        echo 'bos-deger';
    }
    else{

if ($kycred) {
    $kontrol = $db->query("SELECT * FROM uyeler WHERE uye_id='$uye_id'");
    if ($kontrol->rowCount()){
        require 'host/mail_sablon/uye_kyc_red.php';
       $mailgonder = MailXM($uye_eposta, $bloklar["uye_kyc_red_baslik"], $uye_kyc_red);
       if ($mailgonder){
        $delete = $db->query("DELETE FROM uyeler WHERE uye_id='$uye_id'");
        if ($delete->rowCount()){
            echo 'basarilixxx';
        }
        else{
            echo 'basarisiz';
        }

        }else{
             echo 'basarisiz';
        }
    }

}if ($kyconay) {
        $insert = $db->query("UPDATE uyeler SET 
			uye_kayıt_rutbe	= 2,
			uye_kyc_mod	= 3  WHERE uye_id='$uye_id'");
        if ($insert->rowCount()){
            require 'host/mail_sablon/uyekyc_user_onay.php';
            $mailgonder = MailXM($uye_eposta, $bloklar["kyc_verify_user_add"], $uyekyc_user_onay);
            if ($mailgonder){
                echo 'basarili';
            }
            else{
                echo 'basarilinot';
            }
        }
        else{
            echo 'basarisiz';
        }


 }


    }
}
if ($_GET["p"] == "uye_isletme_onay"){
    $yenideniste = p("yenideniste");
    $isletmeonay = p("isletmeonay");

    $uye_id = p("uye_id");
    $uye_eposta = p("uye_eposta");
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_imza_surkusu_onay = p("uye_imza_surkusu_onay");
    $uye_faliyet_belgesi_onay = p("uye_faliyet_belgesi_onay");
    $uye_vergi_levhasi_onay = p("uye_vergi_levhasi_onay");
    $uye_firma_adres_ispat_onay = p("uye_firma_adres_ispat_onay");
    $uye_sitedil = p("uye_sitedil");
    uye_lang_check($uye_sitedil);
    dilCek();
    if (!$uye_id || !$uye_eposta){
        echo 'bos-deger';

    }
    else{
        if ($yenideniste == "true"){
            $insert = $db->query("UPDATE uyeler SET
			uye_imza_surkusu_onay = '$uye_imza_surkusu_onay',
			uye_faliyet_belgesi_onay = '$uye_faliyet_belgesi_onay',
			uye_vergi_levhasi_onay = '$uye_vergi_levhasi_onay',
			uye_firma_adres_ispat_onay = '$uye_firma_adres_ispat_onay',
			uye_kayıt_rutbe	= 3,
			uye_kyc_mod	= 4  WHERE uye_id='$uye_id'");
            if ($insert->rowCount()){
                $imza = "";
                $faliyet = "";
                $vergilevha = "";
                $adres_ispat = "";
                if ($uye_imza_surkusu_onay == "on"){
                    $imza = $bloklar["profile_isletme_evrak_one"] . '<br>';
                }
                if ($uye_faliyet_belgesi_onay == "on"){
                    $faliyet = $bloklar["profile_isletme_evrak_two"] . '<br>';
                }
                if ($uye_vergi_levhasi_onay == "on"){
                    $vergilevha = $bloklar["profile_isletme_evrak_tree"] . '<br>';
                }
                if ($uye_firma_adres_ispat_onay == "on"){
                    $adres_ispat = $bloklar["profile_isletme_evrak_four"];
                }
                require 'host/mail_sablon/uyeisletme_user_red.php';

                $mailgonder = MailXM($uye_eposta, $bloklar["business_verify_user_red_add"], $uyeisletme_user_red);
                if ($mailgonder){
                    echo 'basarili';
                }
                else{
                    echo 'basarilinot';
                }

            }
            else{
                echo 'basarisiz';
            }
        }
        else if ($isletmeonay == "true"){
            $insert = $db->query("UPDATE uyeler SET 
			uye_kayıt_rutbe	= 5,
			uye_kyc_mod	= 3  WHERE uye_id='$uye_id'");
            if ($insert->rowCount()){
                require 'host/mail_sablon/uyeisletme_user_onay.php';
                $mailgonder = MailXM($uye_eposta, $bloklar["business_verify_user_add"], $uyeisletme_user_onay);
                if ($mailgonder){
                    echo 'basarili';
                }
                else{
                    echo 'basarilinot';
                }

            }
            else{
                echo 'basarisiz';
            }
        }
    }
}
if ($_GET["p"] == "uye_sertifika_onay"){
        $setifikared = p("setifikared");
    $setifikaonay = p("setifikaonay");
    $uye_id = p("uye_id");
    $sertifi_id = p("sertifi_id");
    $uye_eposta = p("uye_eposta");
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_sitedil = p("uye_sitedil");
    $sertifi_baslik = p("sertifi_baslik");
    $sertifi_adet = p("sertifi_adet");
    $sertifi_transferkod = p("sertifi_transferkod");
	uye_lang_check($uye_sitedil);
    dilCek();
    if (!$uye_id || !$uye_eposta || !$sertifi_baslik || !$sertifi_adet || !$sertifi_transferkod){
        echo 'bos-deger';
    }
    else{



if ($setifikared) {
    $kontrol = $db->query("SELECT * FROM sertifikalar WHERE sertifi_id='$sertifi_id'");
    if ($kontrol->rowCount()){
        require 'host/mail_sablon/uye_sertifika_red.php';
       $mailgonder = MailXM($uye_eposta, $bloklar["uye_sertifika_red_baslik"], $uye_sertifika_red);
       if ($mailgonder){
        $delete = $db->query("DELETE FROM sertifikalar WHERE sertifi_id='$sertifi_id'");
        if ($delete->rowCount()){
            echo 'basarilixxx';
        }
        else{
            echo 'basarisiz';
        }

        }else{
             echo 'basarisiz';
        }
    }

}if ($setifikaonay) {


        $insert = $db->query("UPDATE sertifikalar SET
        	sertifi_baslik = '$sertifi_baslik',
			sertifi_adet = '$sertifi_adet',
			sertifi_transferkod = '$sertifi_transferkod',
			sertifi_onay	= 2 WHERE sertifi_id='$sertifi_id'");
        if ($insert->rowCount()){
            require 'host/mail_sablon/uye_sertifika_onay.php';
            $mailgonder = MailXM($uye_eposta, $bloklar["sertifika_verify_user_add"], $uye_sertifika_onay);
            if ($mailgonder){
                echo 'basarili';
            }
            else{
                echo 'basarilinot';
            }
        }
        else{
            echo 'basarisiz';
        }


 
    }


    }
}


if ($_GET["p"] == "uye_sertifikatransfer_onay"){
    $uye_id = p("uye_id");
    $urun_id = p("urun_id");
    $uye_id_two = p("uye_id_two");
    $uye_eposta = p("uye_eposta");
    $uye_eposta_two = p("uye_eposta_two");
    $uye_ad = p("uye_ad");
    $uye_soyad = p("uye_soyad");
    $uye_sitedil = p("uye_sitedil");
    $transferid = p("transferid");
    $sertifika_id = p("sertifika_id");
    $transferred = p("transferred");
    $transferonay = p("transferonay");
    uye_lang_check($uye_sitedil);
    dilCek();
    if (!$uye_id || !$uye_id_two || !$uye_eposta || !$uye_eposta_two  || !$uye_ad  || !$uye_soyad  || !$uye_sitedil  || !$transferid  || !$sertifika_id   ){
        echo 'bos-deger';
    }
    else{
   if ($transferred == "true"){
            $insert = $db->query("UPDATE sertifika_transfertalep SET
            transfer_durum = 3 WHERE transfer_id='$transferid'");
            if ($insert->rowCount()){
                require 'host/mail_sablon/user_transfer_red_add.php';
                $mailgonder = MailXM($uye_eposta, $bloklar["user_transfer_red_add"], $user_transfer_red_add);
                if ($mailgonder){
                     $delete = $db->query("DELETE FROM sertifika_transfertalep WHERE transfer_id='$transferid'");
                    echo 'basarilixxx';
                }
                else{
                    echo 'basarilinot';
                }

            }
            else{
                echo 'basarisiz';
            }
        }
        else if ($transferonay == "true"){
             $xxxx = $db->query("UPDATE urunler SET
            en_urun_tam_icerik = '$uye_id', urun_durum=5 WHERE urun_id='$urun_id'");
            if ($xxxx->rowCount()){
            $insert = $db->query("UPDATE sertifika_transfertalep SET
            transfer_durum = 2 WHERE transfer_id='$transferid'");
            if ($insert->rowCount()){
            $inserttwo = $db->query("UPDATE sertifikalar SET 
            sertifi_uye_id = '$uye_id',
            sertifi_transfer_durum = 2 WHERE sertifi_id='$sertifika_id'");
            if ($inserttwo->rowCount()){
                require 'host/mail_sablon/user_transfer_onay_add.php';
                $mailgonder = MailXM($uye_eposta, $bloklar["user_transfer_onay_add"], $user_transfer_onay_add);
                if ($mailgonder){
                    echo 'basarili';
                }
                else{
                    echo 'basarilinot';
                }

            }






}
}
            else{
                echo 'basarisiz';
            }
        }
    }
}
?>