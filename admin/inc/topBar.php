
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow ">
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav">
						<li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
					</ul>
					<ul class="nav navbar-nav bookmark-icons">

						<!--<li class="nav-item d-none d-lg-block"><a class="nav-link" href="index.php?sayfa=okunan" data-toggle="tooltip" data-placement="top" title="Okunan Mesajlarım"><i class="ficon feather icon-check-square"></i></a></li>



						<li class="nav-item d-none d-lg-block"><a class="nav-link" href="index.php?sayfa=bekleyen" data-toggle="tooltip" data-placement="top" title="Bekleyen Mesajlarım"><i class="ficon feather icon-mail"></i></a></li>
						<div class="hidden-xs hidden-sm"  style="float: right;padding-top: 15px;"><script type="text/javascript" src="<?php echo ADMIN_URL;?>app-assets/traslate.js"></script></div>
-->
					</ul>
				</div>
				<ul class="nav navbar-nav float-right">
					<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

						<div class="mx-50 semi-dark">
							<div class="custom-control custom-switch">
								<span class="">Karanlık Mod: </span>
								<input type="checkbox" class="custom-control-input" id="karanlikmod">
								<label class="custom-control-label layout-name"  for="karanlikmod"></label>
							</div>
						</div>

					</div>

					<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>


					<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
						<div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">
							<?php echo $_SESSION["uye_adsoyad"];?></span><span class="user-status">Müsait </span></div><span><img class="round" src="<?php echo ADMIN_URL?>app-assets/images/portrait/small/avatar-s-11.png" alt="avatar" height="40" width="40" /></span>
						</a>
							<div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo ADMIN_URL?>index.php?sayfa=kullanici_duzenle&id=<?php echo $_SESSION["uye_id"];?>"><i class="feather icon-user"></i> Profili Düzenle</a><a class="dropdown-item" href="<?php echo ADMIN_URL?>index.php?sayfa=kullanici_sifre_duzenle&id=<?php echo $_SESSION["uye_id"];?>"><i class="feather icon-maximize"></i> Şifre Düzenle</a>
							<div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo URL; ?>admin/ajax.php?p=logout"><i class="feather icon-power"></i> Çıkış Yap</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<script type="text/javascript">
	var  karanlikmod = $("#karanlikmod");

	/***** Collapse menu switch *****/
	karanlikmod.on("click", function () {

		$.post('ajax.php?p=karanlikmod', function (data) {
		alert();

		})
	})
  // connects toggle icon with collapse sidebar switch


  // checks if main menu is collapsed by default
  <?php if($ayar["site_tema"]==1){ ?>karanlikmod.prop("checked", true);<?php }else{ ?> karanlikmod.prop("checked", false);<?php } ?>


</script>

