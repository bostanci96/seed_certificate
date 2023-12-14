<?php echo !defined("ADMIN") ? die('error: 404 !') : null; ?>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto"><a class="navbar-brand" target="_blank" href="<?php echo URL; ?>"><img style="width: 100%; height: 25px;" src="<?php echo URL; ?>images/<?php echo $ayar["logo"]; ?>" alt="<?php echo $ayar["site_title"]; ?>"></a></li>
			<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
		</ul>
	</div>
	<div class="shadow-bottom"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



			<li class=" nav-item"><a href="<?php ADMIN_URL;?>index.php"><i class="feather icon-home"></i><span class="menu-title" data-i18n="menu levels">Admin Panel</span></a>
				
			</li>






		<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Sayfalar</span></a>
				<ul class="menu-content">
					<li  class='<?php classActive('sayfalar',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=sayfalar"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sayfalar</span></a>
					</li>
					<li   class='<?php classActive('sayfa_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=sayfa_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>
				<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Blog</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('kategoriler3',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=kategoriler3"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span></a>
					</li>

					<li  class='<?php classActive('kategori_ekle3',@$_GET['sayfa']);?>'><a href="index.php?sayfa=kategori_ekle3"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span></a>
					</li>
					<li  class='<?php classActive('sayfalar2',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=sayfalar2"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Blog Yazıları</span></a>
					<li   class='<?php classActive('sayfa_ekle3',@$_GET['sayfa']);?>'><a href="index.php?sayfa=sayfa_ekle3"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>
<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Database</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('kategoriler4',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=kategoriler4"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span></a>
					</li>

					<li  class='<?php classActive('kategori_ekle4',@$_GET['sayfa']);?>'><a href="index.php?sayfa=kategori_ekle4"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span></a>
					</li>
					<li  class='<?php classActive('sayfalar4',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=sayfalar4"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Database Yazıları</span></a>
					<li   class='<?php classActive('sayfa_ekle4',@$_GET['sayfa']);?>'><a href="index.php?sayfa=sayfa_ekle4"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>


			<!--
<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-layout"></i><span class="menu-title" data-i18n="Menu Levels">Kategoriler</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('kategoriler',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=kategoriler"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Kategoriler</span></a>
					</li>

					<li  class='<?php classActive('kategori_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=kategori_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span></a>
					</li>
				</ul>
			</li>-->
			<li class='<?php classActive('urunler',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=urunler"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sertifikalar</span></a>
					</li>
		<!--	<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-clipboard"></i><span class="menu-title" data-i18n="Menu Levels">Sertifikalar</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('urunler',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=urunler"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sertifikalar</span></a>
					</li>

					<li  class='<?php classActive('urun_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=urun_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ürün Ekle</span></a>
					</li>
				</ul>
			</li> -->



					<li class='<?php classActive('kyc_dogrulama',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=kyc_dogrulama"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">KYC Doğrulama</span></a>
					</li>
					<li class='<?php classActive('isletme_dogrulama',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=isletme_dogrulama"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">İşletme Doğrulama</span></a>
					</li>

					<li class='<?php classActive('sertifika_dogrulama',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=sertifika_dogrulama"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Sertifika Doğrulama</span></a>
					</li>
<li class='<?php classActive('sertifika_transfer',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=sertifika_transfer"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Sertifika Transfer</span></a>
					</li>


			<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Menu Levels">Kullanıcılar</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('kullanicilar',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=kullanicilar"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Kullanıcılar</span></a>
					</li>
	<li class='<?php classActive('kullanicisifre', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=kullanicisifre">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Şifre İşlemleri</span>
						</a>
					</li>
					<li  class='<?php classActive('kullanici_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=kullanici_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>
	<!--	
		<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-image"></i><span class="menu-title" data-i18n="Menu Levels">Slayt Gösterisi</span></a>
			<ul class="menu-content">
				<li class='<?php classActive('slider',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=slider"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sliderlar</span></a>
				</li>

				<li  class='<?php classActive('slider_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=slider_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Slider Ekle</span></a>
				</li>
			</ul>
		</li>
		
			<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">PDFler</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('katalog',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=katalog"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm PDFler</span></a>
					</li>

					<li  class='<?php classActive('katalog_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=katalog_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>
		
		<li class=" nav-item"><a href="javascript:void(0);"><i class="fa fa-camera-retro"></i><span class="menu-title" data-i18n="Menu Levels">Galeri Yönetimi</span></a>
			<ul class="menu-content">
				<li class='<?php classActive('galeri',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=galeri"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galeriyi Görüntüle</span></a>
				</li>

				<li  class='<?php classActive('galeri_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=galeri_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Fotoğraf Ekle</span></a>
				</li>
			</ul>
		</li>
			
			<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Çözüm Ortağı Yönetimi</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('galeri2',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=galeri2"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Çözüm Ortakları</span></a>
					</li>

					<li  class='<?php classActive('galeri_ekle2',@$_GET['sayfa']);?>'><a href="index.php?sayfa=galeri_ekle2"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span></a>
					</li>
				</ul>
			</li>
			<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Müşteri Yorumları</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('musteriler',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=musteriler"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Yorumları Görüntüle</span></a>
					</li>

					<li  class='<?php classActive('musteri_ekle',@$_GET['sayfa']);?>'><a href="index.php?sayfa=musteri_ekle"><i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yorum Ekle</span></a>
					</li>
				</ul>
			</li>
	



			<li class=" nav-item"><a href="javascript:void(0);"><i class="fa fa-volume-control-phone"></i><span class="menu-title" data-i18n="Menu Levels">İletişim Formu</span></a>
				<ul class="menu-content">
					<li class='<?php classActive('okunan',@$_GET['sayfa']);?>'><a href="index.php?sayfa=okunan"><i class="fa fa-book"></i><span class="menu-item" data-i18n="Second Level">Okunan İletiler</span></a>
					</li>
					<li class='<?php classActive('bekleyen',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=bekleyen"><i class="fa fa-pencil-square-o"></i><span class="menu-item" data-i18n="Second Level">Bekleyen İletiler</span></a>
					</li>
				</ul>
			</li>-->

		




		<li class=" nav-item"><a href="javascript:void(0);"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Menu Levels">Ayarlar</span></a>
			<ul class="menu-content">
				<!--	<li class='<?php classActive('ayarlar.anasayfa',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.anasayfa"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Anasayfa Bloklar</span></a>
				</li>-->
				<li class='<?php classActive('ayarlar.sosyalmedya',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.sosyalmedya"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Sosyal Medya</span></a>
				</li>
				
				<li class='<?php classActive('ayarlar.mail', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.mail">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">SMTP Mail Ayarları</span>
					</a>
				</li>
				<li class='<?php classActive('ayarlar.iletisim',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.iletisim"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">İletişim Bilgileri</span></a>
				</li>
				<li class='<?php classActive('ayarlar.seo',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.seo"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Seo Ayarları</span></a>
				</li>
				<li class='<?php classActive('ayarlar.dil',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.dil"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Dil Dosyası</span></a>
				</li>
				<li class='<?php classActive('ayarlar.logo',@$_GET['sayfa']);?>' ><a href="index.php?sayfa=ayarlar.logo"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Logo</span></a>
				<!--</li>
					<li class='<?php classActive('bakim',@$_GET['sayfa']);?>'><a href="index.php?sayfa=bakim"><i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Bakım Modu</span></a>
				</li>-->
				
			</ul>
		</li>
	</ul>
</div>
</div>






