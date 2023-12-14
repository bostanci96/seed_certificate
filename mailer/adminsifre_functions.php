<?php

  $mail->SMTPDebug = 1; 
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.yandex.com';
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->SetLanguage("tr", "phpmailer/language");
  $mail->CharSet ="utf-8";
  $mail->Username = "system@utkubostanci.com.tr"; 
  $mail->Password = "6303.Oub";
  $mail->SetFrom("system@utkubostanci.com.tr", "Bostanci96 System"); // Mail attigimizda yazacak isim

/* Mail Kime gönderilecekse onun bilgileri */
$mail->AddAddress($eposta,'Bostanci96 System');

/* Karakter Seti */
$mail->CharSet = 'UTF-8';

/* Mailin Konusu */
$mail->Subject = 'Bostanci96 System İle Şifreniz Sıfırlandı !';

/* Mailin İçeriği */
$mail->MsgHTML($ileti);
?>