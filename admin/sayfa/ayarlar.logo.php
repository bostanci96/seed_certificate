<?php
echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
		go(ADMIN_URL.'index.php?sayfa=404');	

}
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Logoları Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Logoları Düzenle</a>
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
							<h4 class="card-title">   <p><b>Logoları</b> Düzenle</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=logolar"  enctype="multipart/form-data">
									<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
									<div class="form-body">
										<div class="row">
											<div class="col-12">
												<div class="form-group row" style="margin-bottom: -0.5rem;">
													<div class="col-md-2">
														<span>Üst Logo Yükle</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="inputGroupFile01" name="logo[]">
																<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-md-4"><img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" style="width: 150px;"></div>
											<div class="form-group col-md-8 offset-md-4"></div>
											<div class="col-12">
												<div class="form-group row" style="margin-bottom: -0.5rem;">
													<div class="col-md-2">
														<span>Alt Logo Yükle</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="inputGroupFile01" name="footer_logo[]">
																<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>

											<div class="col-md-4"><img src="<?php echo URL;?>images/<?php echo $ayar["footer_logo"];?>" style="width: 150px;"></div>
											<div class="form-group col-md-8 offset-md-4"></div>
											<div class="col-12">
												<div class="form-group row" style="margin-bottom: -0.5rem;">
													<div class="col-md-2">
														<span>favicon Yükle</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" id="inputGroupFile01" name="favicon[]">
																<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-md-5"><img src="<?php echo URL;?>images/<?php echo $ayar["favicon"];?>"></div>
											<div class="col-md-7" style="margin-top:3%;">   
												<button type="submit" class="btn btn-primary mr-1 mb-1">Logoyu Güncelle</button>
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
					sweetAlert("Uyarı","Logo dosyası seçilmedi !","warning");
					return false;
				}else if(data=="basarili"){
					Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarılı')
					sweetAlert({
						title	: "Başarılı",
						text 	: "Logo Başarıyla Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="degisiklik-yok"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else{
					Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarısız')
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



