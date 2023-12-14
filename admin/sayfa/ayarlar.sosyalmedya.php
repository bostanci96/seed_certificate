<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
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
					<h2 class="content-header-title float-left mb-0">Sosyal Medya Hesapları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>

								<li class="breadcrumb-item active"><a href="javascript:void(0);">Sosyal Medya Hesaplarını Düzenle </a>
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
								<h4 class="card-title">   <p><b>Sosyal Medya Hesaplarını</b> Düzenle</p> </h4>
							</div>
							<div class="card-content">
								<div class="card-body">
									<form role="form" id="forms" method="POST" action="ajax.php?p=sosyal_medya" >
											<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
										<div class="form-body">
											<div class="row">
												<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Facebook Url</span>
														</div>
														<div class="col-md-10">
															<fieldset class="position-relative has-icon-left">
																<input type="text" class="form-control" id="iconLeft1" placeholder="Facebook" name="facebook_url" value="<?php echo $ayarRow["facebook_url"];?>">
																<div class="form-control-position">
																	<i class="feather icon-facebook"></i>
																</div>
															</fieldset>
														</div>
													</div>
												</div>

												<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Twitter Url</span>
														</div>
														<div class="col-md-10">
															<fieldset class="position-relative has-icon-left">
																<input type="text" class="form-control" id="iconLeft1" placeholder="Twitter" name="twitter_url" value="<?php echo $ayarRow["twitter_url"];?>">
																<div class="form-control-position">
																	<i class="feather icon-twitter"></i>
																</div>
															</fieldset>
														</div>
													</div>
												</div>

												<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>İnstagram Url</span>
														</div>
														<div class="col-md-10">
															<fieldset class="position-relative has-icon-left">
																<input type="text" class="form-control" id="iconLeft1" placeholder="İnstagram" name="instagram_url" value="<?php echo $ayarRow["instagram_url"];?>">
																<div class="form-control-position">
																	<i class="feather icon-instagram"></i>
																</div>
															</fieldset>
														</div>
													</div>
												</div>

												<div class="col-12 ">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Youtube Url</span>
														</div>
														<div class="col-md-10">
															<fieldset class="position-relative has-icon-left">
																<input type="text" class="form-control" id="iconLeft1" placeholder="Youtube Url " name="google_url" value="<?php echo $ayarRow["google_url"];?>">
																<div class="form-control-position">
																	<i class="feather icon-youtube"></i>
																</div>
															</fieldset>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Linkedin Url</span>
														</div>
														<div class="col-md-10">
															<fieldset class="position-relative has-icon-left">
																<input type="text" class="form-control" id="iconLeft1" placeholder="Linkedin Url " name="linkedin_url" value="<?php echo $ayarRow["linkedin_url"];?>">
																<div class="form-control-position">
																	<i class="feather icon-globe"></i>
																</div>
															</fieldset>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group row">

														<div class="form-group col-md-8 offset-md-4">
														</div>
														<div class="col-md-8 offset-md-4">
															<button type="submit" class="btn btn-primary mr-1 mb-1">Kaydet</button>
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
								sweetAlert("Hata","Boş Değer Bırakmamalısınız","warning");
								return false;
							}else if(data=="basarili"){
								sweetAlert({
									title	: "Başarılı",
									text 	: "Sosyal Medya Bilgileriniz Güncellendi !",
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
								sweetAlert(data,"Bir Hata Oluştu !","error");
								return false;
							}
						}
					});

				});
			</script>



