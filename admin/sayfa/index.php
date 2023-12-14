<?php 
require_once('host/a.php');
if(empty($_SESSION["login"])){go(ADMIN_URL."login.php");die();}
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
</body>
</html>