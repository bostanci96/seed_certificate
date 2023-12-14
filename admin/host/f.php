<?php 
require 'class.phpmailer.php';


function p($par,$st=false){
	return str_replace(array("'"), array("&#39;"), trim($_POST[$par]));
	if($st){
		return str_replace(array("'"), array("&#39;"), addslashes(htmlspecialchars($_POST[$par])));
	}else{
		return str_replace(array("'"), array("&#39;"), addslashes(trim($_POST[$par])));
	}
}
function classActive($par=null,$get=null){
	if($par==$get){
		echo 'active';
	}
}
function RandomString($length = 17) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
function etiket_url_donustur($post){
	$parcala = str_word_count($post,1," ıİüÜöÖğĞçÇşŞ1234567890");
	$dizi = '';
	foreach($parcala as $etiket){
		$etiket = sef_link($etiket);
		$dizi.=$etiket.",";
	}
	$dizi = rtrim($dizi,",");
	return $dizi;
}
function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		if (strstr($ip, ',')) {
			$tmp = explode (',', $ip);
			$ip = trim($tmp[0]);
		}
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}
function alert($string){
	echo '<h4 class="alert_error">'.$string.'</h4>';
}

function success($string){
	echo '<h4 class="alert_success">'.$string.'</h4>';
}
function g($par){
	return strip_tags(trim(addslashes($_GET[$par])));
}

function kisalt($par,$uzunluk=600){
	if(strlen($par)>$uzunluk){
		$par = mb_substr($par, 0 , $uzunluk,"UTF-8")."...";
	}
	return $par;
}

function go($par,$time=0){
	if($time==0){
		header("Location:{$par}");
	}else{
		header("Refresh:$time; url={$par}");
	}
}

function session($par){
	if($_SESSION[$par]){
		return $_SESSION[$par];
	}else{
		return false;
	}
}

function cookie($par)
{
	if(isset($_COOKIE[$par]))
	{
		return $_COOKIE[$par];
	}
	else
	{
		return false;
	}
}

function ss($par){
	return stripslashes($par);
}

function session_olustur($par){
	foreach($par as $anahtar => $deger){
		$_SESSION[$anahtar] = $deger;
	}
}


function sef_link($str, $options = array())
 {
     $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
     $defaults = array(
         'delimiter' => '-',
         'limit' => null,
         'lowercase' => true,
         'replacements' => array(),
         'transliterate' => true
     );
     $options = array_merge($defaults, $options);
     $char_map = array(
         // Latin
         'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
         'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
         'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
         'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
         'ß' => 'ss',
         'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
         'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
         'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
         'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
         'ÿ' => 'y',
         // Latin symbols
         '©' => '(c)',
         // Greek
         'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
         'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
         'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
         'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
         'Ϋ' => 'Y',
         'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
         'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
         'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
         'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
         'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
         // Turkish
         'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
         'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
         // Russian
         'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
         'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
         'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
         'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
         'Я' => 'Ya',
         'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
         'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
         'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
         'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
         'я' => 'ya',
         // Ukrainian
         'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
         'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
         // Czech
         'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
         'Ž' => 'Z',
         'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
         'ž' => 'z',
         // Polish
         'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
         'Ż' => 'Z',
         'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
         'ż' => 'z',
         // Latvian
         'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
         'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
         'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
         'š' => 's', 'ū' => 'u', 'ž' => 'z'
     );
     $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
     if ($options['transliterate']) {
         $str = str_replace(array_keys($char_map), $char_map, $str);
     }
     $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
     $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
     $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
     $str = trim($str, $options['delimiter']);
     return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
 }


  function removeFiles($dir)
    {
        // dizin kontrol
        if (is_dir($dir)) {
 
            // klasörü tara
            $objects = scandir($dir);
 
            // klasördeki nesneler için döngü
            foreach ($objects as $object) {
 
                if ($object != "." && $object != "..") {
 
                    if (filetype($dir . "/". $object) == "dir") {
 
                        // recursive işlev çağrımı
                        $this->removeFiles($dir . "/" . $object);
                    }
                    else {
 
                        // dosya adresini al
                        $file = $dir . "/" . $object;
 
                        if(is_file($file)) {
 
                            // dosyayı sil
                            unlink($file);
                        }
                    }
                }
            }
        }
    }
function tarih($par){
	$ay			= substr($par,5,2);
	$eski_ay  = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$yeni_ay  = array("January","February","March","April","May","June","July","August","September","October","November","December");
	return substr($par,8,2).' '.str_replace($eski_ay,$yeni_ay,$ay).' '.substr($par,0,4);
}

function ckeditor($editorName="editor1"){
	
	echo "<script type='text/javascript' language='javascript'>
	CKEDITOR.replace('".$editorName."',{
		filebrowserWindowWidth : '900',
		filebrowserWindowHeight : '500',
		filebrowserBrowseUrl : '".ADMIN_URL."app-assets/libs/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '".ADMIN_URL."app-assets/libs/ckfinder/ckfinder.html?type=Images',
		filebrowserFlashBrowseUrl : '".ADMIN_URL."app-assets/libs/ckfinder/ckfinder.html?type=Flash',
		filebrowserUploadUrl : '".ADMIN_URL."app-assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl : '".ADMIN_URL."app-assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : '".ADMIN_URL."app-assets/libs/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',	
	});
</script>";
}


function rutbekont($uye_urt){
	if ($uye_urt==0) {
		$rut = "Admin";
	}else if($uye_urt==1){
		$rut = "Müşteri";
	}
	return $rut;
}



function imgAdd($fileName,$folderName,$tableName,$setName,$whereName,$last_insert_id,$resim_onad=null){
	global $db;
	require_once 'app.upload.php';
$toplam		= count($_FILES["{$fileName}"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif" , "image/webp" ,"image/svg+xml", "application/pdf", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.ms-excel");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["{$fileName}"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES["{$fileName}"] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}

		$sira_no	= 1;
		foreach($resimler as $resim){
			$handle = new Upload($resim);

			if($handle->uploaded){
				$resimGenislik = $handle->image_src_x;
				/*if($resimGenislik>1920){
					$handle->image_resize = true;
					$handle->image_x = 1920;
					$handle->image_ratio_y = true;
				}*/
				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= str_replace("=","",$randName);
				$newName 	= $resim_onad.$newName;
				$handle->file_new_name_body = $newName;
				$resim_adi = $handle->file_new_name_body;
				/* Resim Uzantısını Alma */
				$uzanti = $handle->file_src_name_ext;
				$resimAdi = $resim_adi.".".$uzanti;
				/* Resim yükleme izini */
				$handle->allowed = array('image/*','application/*');
				/* Büyük resmi yükle */
				$handle->Process("../images/{$folderName}/big/");
				if($handle->processed){
					$handle->image_resize = true;
					$handle->image_x = 275;
					$handle->image_y = 312;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/{$folderName}/thumb/");
					$imgInsert = $db->query("UPDATE {$tableName} SET {$setName} = '$resimAdi' WHERE {$whereName} ={$last_insert_id}");
					return true;
				}
			}
			$sira_no++;
		}
	}
}						
}	


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function MailXM($musteriMail, $musteriKonu1, $musteriMesaj1){
	global $ayar;
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; 
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = $ayar["gsmtp"];
$mail->Port = $ayar["gport"];
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet ="utf-8";
$mail->Username = $ayar["gmailkullanici"];
$mail->Password =  $ayar["gmailkullanicisifre"];

/* E-Postayı kim göndermiş ayarlıyoruz  */
$mail->SetFrom($ayar["gmailkullanici"],$ayar["site_title"]);

/* Mail Kime gönderilecekse onun bilgileri */
$mail->AddAddress($musteriMail,$musteriKonu1);

/* Karakter Seti */
$mail->CharSet = 'UTF-8';

/* Mailin Konusu */
$mail->Subject = $musteriKonu1." ".$ayar["site_title"]." ".date('d.m.Y H:i:s');

/* Mailin İçeriği */
$mail->MsgHTML($musteriMesaj1);
$send = $mail->Send();
if ($send) {
return true;
}else{
return false;
}

}
function uye_lang_check($par)
{
	if ($par == 11) {
		$_SESSION['dil'] = "tr";
	}else if ($par == 22) {
		$_SESSION['dil'] = "en";
	}else if ($par == 33) {
		$_SESSION['dil'] = "ar";
	}else if ($par == 44) {
		$_SESSION['dil'] = "fa";
	}
}

if (@$_GET['dil']) {
	@$dil = $_GET["dil"];
	if($dil=="en" || $dil=="fa" || $dil=="ar"){
		$_SESSION["dil"] = $dil;
	}else{
		$_SESSION["dil"] = "";
	}
}

function dilCek(){
		global $ayar,$bloklar,$lehce,$Blehce;
@$dil = substr(str_replace(array(""," ","-","/","\n","\r","\t"),"",trim(strtolower($_SESSION["dil"]))),0,2);
if(!$dil || $dil=="" || $dil==" " || !$_SESSION["dil"] || $_SESSION["dil"]=="" || $_SESSION["dil"]==" " || $dil=="tr"){
	$lehce= "";
	$Blehce='';
	
}else{ 

	$lehce= $dil."_";
	$Blehce='_'.$dil;
	
}
$bloklar = [];
$arr = json_decode($ayar[$lehce."site_bloklar"],true);
if(!empty($arr)){
	foreach($arr as $cek){
		$title = $cek["title"];
		$value = $cek["value"];
		$bloklar[$title] = $value;
	}
}
}
dilCek();



?>