<?php 
require_once('host/a.php');
if(empty($_SESSION["login"])){go(ADMIN_URL."login.php");die();}
if($_SESSION["uye_rutbe"]!=0){
if ($_SESSION["uye_rutbe"]!=2){
	go(URL);die();
}
}
define("ADMIN",true);
?>

<!DOCTYPE html>
<html class="loading" lang="tr" data-textdirection="ltr">
<head>
	<?php require_once('inc/head.php');?>
</head>
<body class="vertical-layout vertical-menu-modern <?php if($ayar["site_tema"]==1){ ?>dark-layout<?php }else{ ?>semi-dark-layout<?php } ?>  2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="<?php if($ayar["site_tema"]==1){ ?>dark-layout<?php }else{ ?>semi-dark-layout<?php } ?>">


	<?php require_once('inc/solMenu.php');?>

	<!-- BEGIN: Content-->
	<div class="app-content content">

		<!-- BEGIN: Header-->
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>

		<?php require_once('inc/topBar.php');?>

		<?php
		if(isset($_GET["sayfa"])){
			$sayfa = $_GET["sayfa"];
			$file = "sayfa/".$sayfa.".php";
			
			if(file_exists($file)){
				require_once($file);
			}else{
				
				require_once("sayfa/default.php");
			}
		}else{
			
			require_once("sayfa/default.php");
		}

		?>






	</div>
	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>
	<?php require_once('inc/footer.php');?>

	<!-- End of eoverlay modal -->
	<?php require_once('inc/scripts.php');?>
	<script type="text/javascript">
		$("img").each(function() { // for each img found
    var src = $(this).attr("src"); // get the src
    var fileName = src.substring(src.lastIndexOf('.')); // and filename
    console.log(fileName)
    if(fileName=='.pdf' ){
         $(this).replaceWith( "<iframe style='width: 100%;height: 450px;'  src='"+src+"' />" );
          $(this).remove();
    }
  });
	</script>
</body>
</html>