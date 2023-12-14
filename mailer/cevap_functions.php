<?php
  $mail->SMTPDebug = 1; 
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls';
  $mail->Host = 'smtp.yandex.com';
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->SetLanguage("tr", "phpmailer/language");
  $mail->CharSet ="utf-8";
  $mail->Username = "omer@utkubostanci.com.tr"; 
  $mail->Password = "6303.Utku";
  $mail->SetFrom("omer@utkubostanci.com.tr", "utkubostanci.com.tr'daki Mesajınız Cevaplandı ! "); // Mail attigimizda yazacak isim
/* Mail Kime gönderilecekse onun bilgileri */
$mail->AddAddress($to,$isim);

/* Karakter Seti */
$mail->CharSet = 'UTF-8';

/* Mailin Konusu */
$mail->Subject = 'utkubostanci.com.tr daki Mesajınız Cevaplandı ! ';

/* Mailin İçeriği */
$mail->MsgHTML($ileti);
?>