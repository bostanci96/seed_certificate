<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	go(ADMIN_URL.'index.php?sayfa=404');
}
?>
<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">SEO Ayarlarını Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Seo Ayarları Düzenle </a>
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
							<h4 class="card-title">   <p><b>Seo</b> Ayarları </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=seo_ayarlari"  enctype="multipart/form-data">
									<input type="hidden" name="ayar_id" value="<?php echo $ayarRow["ayar_id"];?>"/>
									<div class="form-body">
										<div class="row">

											<!-- Nav tabs -->
											<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
												<li class="nav-link active">
													<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> TÜRKÇE </a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false"><i class="feather icon-file-text"></i> İNGİZLİCE </a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false"><i class="feather icon-file-text"></i> ARAPÇA</a>
												</li>
												<li class="nav-link">
													<a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false"><i class="feather icon-file-text"></i> RUSÇA </a>
												</li>
											</ul>

											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Site URL</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" class="form-control" id="iconLeft1" placeholder="Site Url" name="site_title" value = "<?php echo $ayarRow["site_url"];?>" disabled>
															<div class="form-control-position">
																<i class="feather icon-globe"></i>

															</div>
														</fieldset>
													</div>
												</div>
											</div>

											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Site Title</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Site Title" name="site_title" value = "<?php echo $ayarRow["site_title"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-flag"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Site Description</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Description" name="site_desc"><?php echo $ayarRow["site_desc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Site Keywords</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Keywords" name= "site_keyw"><?php echo $ayarRow["site_keyw"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>


													<!-- Türkçe bitiş -->
												</div>
												<div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

													<!-- İngilizce başlangıç -->


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Site Title</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Site Title" name="en_site_title" value = "<?php echo $ayarRow["en_site_title"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-flag"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Site Description</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Description" name="en_site_desc"><?php echo $ayarRow["en_site_desc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Site Keywords</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Keywords" name= "en_site_keyw"><?php echo $ayarRow["en_site_keyw"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>
													<!-- İngilizce bitiş -->

												</div>
												<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
													<!-- Arapça başlangıç -->
													
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Site Title</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Site Title" name="ar_site_title" value = "<?php echo $ayarRow["ar_site_title"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-flag"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Site Description</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Description" name="ar_site_desc"><?php echo $ayarRow["ar_site_desc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Site Keywords</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Keywords" name= "ar_site_keyw"><?php echo $ayarRow["ar_site_keyw"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>
													<!-- Arapça bitiş -->    
												</div>
												<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

													<!-- RUSÇA başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Site Title</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Site Title" name="fa_site_title" value = "<?php echo $ayarRow["fa_site_title"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-flag"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Site Description</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Description" name="fa_site_desc"><?php echo $ayarRow["fa_site_desc"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Site Keywords</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Site Keywords" name= "fa_site_keyw"><?php echo $ayarRow["fa_site_keyw"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>
													<!-- RUSÇA bitiş -->   
												</div>
											</div>

											<div class="form-group col-md-8 offset-md-4" >
											</div>
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Seo Ayarlarını Kaydet</button>
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
			beforeSerialize: function(form, options) { 
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Seo Ayarlarınız Güncellendi !",
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
					console.log(data);
					return false;
				}
			}
		});

	});
</script>



