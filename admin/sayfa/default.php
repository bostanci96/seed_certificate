<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>

<div class="content-header row">
</div>
<div class="content-body">
	<!-- Dashboard Analytics Start -->
	<div class="content-wrapper">
		<div class="content-header row">
			<div class="content-header-left col-md-9 col-12 mb-2">
				<div class="row breadcrumbs-top">
					<div class="col-12">
						<h2 class="content-header-title float-left mb-0">Yönetim Paneli</h2>
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Anasayfa</a>
								</li>
								<li class="breadcrumb-item active">Yönetim Paneli
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="content-body">
			<!-- Statistics card section start -->
			<section id="statistics-card">



<div class="row">

					<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxsa = $db->prepare("SELECT COUNT(*) FROM uyeler WHERE uye_kyc_mod=2");
									$sorguxsa->execute();
									$sayfirma = $sorguxsa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirma;?></h2>
									<p class="mb-0"> KYC Bekleyen</p>
								</div>

							</div>
						</div>
							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxisle = $db->prepare("SELECT COUNT(*) FROM uyeler WHERE uye_kayıt_rutbe=4");
									$sorguxisle->execute();
									$sayfirmasasa = $sorguxisle->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasa;?></h2>
									<p class="mb-0"> İşletme Bekleyen</p>
								</div>

							</div>
						</div>

							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxile = $db->prepare("SELECT COUNT(*) FROM sertifikalar WHERE sertifi_onay=1");
									$sorguxile->execute();
									$sayfirmasile = $sorguxile->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasile;?></h2>
									<p class="mb-0"> Sertifika Başvuru Bekleyen</p>
								</div>

							</div>
						</div>

							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxile = $db->prepare("SELECT COUNT(*) FROM sertifikalar WHERE sertifi_onay=2");
									$sorguxile->execute();
									$sayfirmasile = $sorguxile->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasile;?></h2>
									<p class="mb-0"> Sertifika Başvuru Onaylanan</p>
								</div>

							</div>
						</div>
							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM sertifika_transfertalep WHERE transfer_durum=1");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0"> Sertifika Transfer Bekleyen</p>
								</div>

							</div>
						</div>
						<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM sertifika_transfertalep WHERE transfer_durum=2");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0"> Sertifika Transfer Onaylanan</p>
								</div>

							</div>
						</div>
								<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM urunler WHERE urun_durum=1");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0"> QR Sertifika Üretimi Bekleyen</p>
								</div>

							</div>
						</div>
							<div class="col-lg-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM urunler WHERE urun_durum=8888");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0"> QR Sertifika Üretimi Tamamlanan</p>
								</div>

							</div>
						</div>
	<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM uyeler WHERE uye_rutbe=1");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0">Total Kullanıcı Sayısı</p>
								</div>

							</div>
						</div>
							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM uyeler WHERE uye_rutbe=0");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0">Total Admin Sayısı</p>
								</div>

							</div>
						</div>
							<div class="col-lg-2 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorguxileasa = $db->prepare("SELECT COUNT(*) FROM qr_codes");
									$sorguxileasa->execute();
									$sayfirmasasdasd = $sorguxileasa->fetchColumn();

									?>
									<h2 class="text-bold-700 mt-1"><?php echo $sayfirmasasdasd;?></h2>
									<p class="mb-0">Total Üretilen Sertifika</p>
								</div>

							</div>
						</div>
					
					</div>












</section>
<!-- // Statistics Card section end-->

</div>
</div>
</div>
<!-- Dashboard Analytics end -->
