<?php
$mail->IsSMTP();
$mail->SMTPDebug = 1; 

$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host		= 'mail.smartpompamotor.com.tr';
$mail->Port		= 465;
$mail->Username = 'send@smartpompamotor.com.tr';
$mail->Password = '-c5}9%V~[FpG';

$mail->SetFrom("send@smartpompamotor.com.tr","smartpompamotor.com.tr");


$mail->AddAddress('lisans@utkubostanci.com.tr','Smart Pompa Motor');


$mail->CharSet = 'UTF-8';


$mail->Subject = 'Smart Pompa Motor İletişim Formu';


$mail->MsgHTML($ileti);