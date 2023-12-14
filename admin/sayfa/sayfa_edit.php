<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$pageControl = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_id=:id");
	$pageControl->execute(array("id"=>$id));
	if($pageControl->rowCount()){
		$pageRow = $pageControl->fetch(PDO::FETCH_ASSOC);
	}else{
		go(ADMIN_URL.'index.php?sayfa=404');	
	}
}else{
	go(ADMIN_URL.'index.php?sayfa=404');	
}
function Kategori_Select($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM haberkategori WHERE kategori_ust_id='$tree' and kategori_durum=1 and kat_secenek=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1,$selID);
		}
	}
}


function Selectxxx($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM databasekategori WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Selectxxx($item['kategori_id'],$level + 1,$selID);
		}
	}
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
					<h2 class="content-header-title float-left mb-0">Sayfa Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=sayfalar">Sayfalar</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Sayfa Düzenle </a>
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
							<h4 class="card-title">   <p><b><?php echo $pageRow["sayfa_adi"];?> </b> Adlı Sayfa Düzenleniyor </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form"id="forms" method="POST" action="ajax.php?p=sayfa_edit"  enctype="multipart/form-data">
									<input type="hidden" value="<?php echo $pageRow["sayfa_id"];?>" name="sayfa_id" />
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


											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Başlığı girin " value="<?php echo $pageRow["sayfa_adi"];?>"  name="sayfa_adi">
																	<div class="form-control-position">
																		<i class="feather icon-feather"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Kısa Açıklaması "value="<?php echo $pageRow["sayfa_desc"];?>" name="sayfa_desc">
																	<div class="form-control-position">
																		<i class="feather icon-file-text"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"><?php echo $pageRow["sayfa_icerik"];?></textarea>
																<?php ckeditor('bootstrapck');?>           
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
																<span>EN Başlık</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Başlığı girin " value="<?php echo $pageRow["en_sayfa_adi"];?>"  name="en_sayfa_adi">
																	<div class="form-control-position">
																		<i class="feather icon-feather"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Kısa Açıklaması "value="<?php echo $pageRow["en_sayfa_desc"];?>" name="en_sayfa_desc">
																	<div class="form-control-position">
																		<i class="feather icon-file-text"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="en_bootstrapck" name="en_sayfa_icerik"><?php echo $pageRow["en_sayfa_icerik"];?></textarea>
																<?php ckeditor('en_bootstrapck');?>           
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
																<span>AR Başlık</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Başlığı girin " value="<?php echo $pageRow["ar_sayfa_adi"];?>"  name="ar_sayfa_adi">
																	<div class="form-control-position">
																		<i class="feather icon-feather"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Kısa Açıklaması "value="<?php echo $pageRow["ar_sayfa_desc"];?>" name="ar_sayfa_desc">
																	<div class="form-control-position">
																		<i class="feather icon-file-text"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="ar_bootstrapck" name="ar_sayfa_icerik"><?php echo $pageRow["ar_sayfa_icerik"];?></textarea>
																<?php ckeditor('ar_bootstrapck');?>           
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
																<span>RU Başlık</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Başlığı girin " value="<?php echo $pageRow["fa_sayfa_adi"];?>"  name="fa_sayfa_adi">
																	<div class="form-control-position">
																		<i class="feather icon-feather"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Sayfa Kısa Açıklaması "value="<?php echo $pageRow["fa_sayfa_desc"];?>" name="fa_sayfa_desc">
																	<div class="form-control-position">
																		<i class="feather icon-file-text"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU İçerik</span>
															</div>
															<div class="col-md-10">
																<textarea class="ckeditor" id="fa_bootstrapck" name="fa_sayfa_icerik"><?php echo $pageRow["fa_sayfa_icerik"];?></textarea>
																<?php ckeditor('fa_bootstrapck');?>           
															</div>
														</div>
													</div>


													<!-- RUSÇA bitiş -->   
												</div>
										
										</div>

								<?php if($pageRow["secenekHaber"]==0){ ?>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Sayfa Seçenekleri</span>
										</div>
										<div class="col-md-10">
											<fieldset class="form-group">
												<select name="secenekHaber" class="form-control">
													<option value="0" <?php echo $pageRow["secenekHaber"]==0 ? 'selected' : null; ?>>Normal Sayfa Olsun</option>
														<!--<option value="1" <?php echo $pageRow["secenekHaber"]==1 ? 'selected' : null; ?>>Blog Alanına Ekle</option>
													<option value="3" <?php echo $pageRow["secenekHaber"]==3 ? 'selected' : null; ?>>Etkinlik Ekle</option>
													<option value="3" <?php echo $pageRow["secenekHaber"]==3 ? 'selected' : null; ?>> Kurumsal Alana Ekle</option>
													<option value="4" <?php echo $pageRow["secenekHaber"]==4 ? 'selected' : null; ?>> SSS ÜST Alana Ekle</option>
													<option value="5" <?php echo $pageRow["secenekHaber"]==5 ? 'selected' : null; ?>> SSS ALT Alana Ekle</option>-->
												</select>
											</fieldset>
										</div>
									</div>
								</div>
								<?php }else if($pageRow["secenekHaber"]==1){ ?>
								<input type="hidden" name="secenekHaber" value="<?php echo $pageRow["secenekHaber"]; ?>">
								<div class="col-12">
									<div class=" row">
										<div class="col-md-2">
											<span>Blog Kategori Seç</span>
										</div>
										<div class="col-md-10">
											<fieldset class="form-group">
												<select class="form-control" id="basicSelect" name="portkat">
													<?php Kategori_Select(0,0,$pageRow["portkat"]);?>
												</select>
											</fieldset>
										</div>
									</div>
								</div>
								<?php }else{ ?>
								<input type="hidden" name="secenekHaber" value="<?php echo $pageRow["secenekHaber"]; ?>">
								<div class="col-12">
									<div class=" row">
										<div class="col-md-2">
											<span>Database Kategori Seç</span>
										</div>
										<div class="col-md-10">
											<fieldset class="form-group">
												<select class="form-control" id="basicSelect" name="portkat">
													<?php Selectxxx(0,0,$pageRow["portkat"]);?>
												</select>
											</fieldset>
										</div>
									</div>
								</div>
								<?php } ?>

										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ön Görsel</span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">                                                    
														<div class="custom-file">
															<input type="file" class="custom-file-input" name="dosya[]" id="dosya[]">
															<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>

										<div class="col-md-5"><img src="<?php echo URL;?>images/sayfalar/thumb/<?php echo $pageRow["sayfa_resim"];?>" style="width: 150px;"></div>
										<?php if ($pageRow["secenekHaber"]==1) { ?>
											<!--	<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Ön Görsel 2</span>
														</div>
														<div class="col-md-10">
															<fieldset class="form-group">                                                    
																<div class="custom-file">
																	<input type="file" class="custom-file-input" name="dosya3[]" id="dosya3[]">
																	<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
																</div>
															</fieldset>
														</div>
													</div>
												</div>

												<div class="col-md-5"><img src="<?php echo URL;?>images/sayfalar/thumb/<?php echo $pageRow["sayfa_resim2"];?>" style="width: 150px;"></div>-->
												<!--<div class="col-12">
													<div class="form-group row">
														<div class="col-md-2">
															<span>Yazı Galeri</span>
														</div>
														<div class="col-md-10">
															<fieldset class="form-group">                                                    
																<div class="custom-file">
																	<input type="file" class="custom-file-input" name="dosya2[]" id="dosya2[]" multiple>
																	<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
																</div>
															</fieldset>
														</div>
													</div>
												</div>-->
											<?php } ?>



											<div class="col-md-7 offset-md-4 ressss" >
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
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
	function TekSil(slideId){
		var x = confirm("Silmek istediğinize eminmisiniz ?");
		if(x){
			$.post('ajax.php?p=tek_foto_sil', {id: slideId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Resim başarılı bir şekilde silindi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					swal("Başarısız","Silinemedi","error");
					return false;
				}
			});
		}else{
			return false;
		}
	}
	$(document).ready(function(event) {
		$('#forms').ajaxForm({
			beforeSerialize: function(form, options) { 
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Fotoğraflar Yükleniyor. Lütfen Bekleyiniz",
					type : "info",
					closeOnConfirm : false,
					showLoaderOnConfirm:true,
				});
			},
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Sayfa Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});
	});
</script>



