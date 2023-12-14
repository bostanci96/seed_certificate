<?php
echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id");
	$uyeControl->execute(array("id"=>$id));
	if($uyeControl->rowCount()){
		$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');	
	}
}else{
		go(ADMIN_URL.'index.php?sayfa=404');	
}
?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kullanıcı İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=kullanicilar">Kullanıcılar</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Kullanıcı Düzenleme </a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content-body">
		<section id="multiple-column-form">
			<div class="row match-height">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> Kullanıcı Şifre Güncelleniyor..</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_edit_sifre">
									<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
								<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Şifre</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" name="uye_sifre" placeholder="********"  required>
															<div class="form-control-position">
																<i class="feather icon-user"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div> 
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Şifre Tekrar</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1"  name="uye_sifre_tekrar" placeholder="********"  required>
															<div class="form-control-position">
																<i class="feather icon-user"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>


											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<div id="id_box"></div>
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şifre Güncelle</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<script>
	$(document).ready(function(event) {
		$('#forms').ajaxForm({

			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Üye Şifre Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="sifreler-uyusmuyor"){
					sweetAlert("Hata","Şifreler Uyuşmuyor","warning");
					return false;
				}else if(data=="degisiklik-yok"){
					sweetAlert("Hata","Değişiklik Yok","warning");
					return false;
				}else if(data=="gecersiz-eposta"){
					sweetAlert("Hata","Geçerli Bir Eposta Girin","warning");
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



