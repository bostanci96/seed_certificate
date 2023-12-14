<?php
echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');	
	}
}else{
		go(ADMIN_URL.'index.php?sayfa=404');	
}
function Kategori_Select($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1,$selID);
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
					<h2 class="content-header-title float-left mb-0">Kategori Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=kategoriler">Kategoriler</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Kategori Düzenle</a>
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
							<h4 class="card-title">   <p><b><?php echo $catRow["kategori_adi"];?></b> adlı kategori düzenleniyor.. </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=kategori_edit"  enctype="multipart/form-data">
									<input type="hidden" name="kategori_id" value="<?php echo $catRow["kategori_id"];?>" />
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
																<span>Kategori Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="kategori_adi" value="<?php echo $catRow["kategori_adi"];?>" placeholder="Kategori Adı">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Kategori Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="kategori_desc" value="<?php echo $catRow["kategori_desc"];?>" placeholder="Kategori Desc(SEO)">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
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
																<span>EN Kategori Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="en_kategori_adi" value="<?php echo $catRow["en_kategori_adi"];?>" placeholder="Kategori Adı">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Kategori Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="en_kategori_desc" value="<?php echo $catRow["en_kategori_desc"];?>" placeholder="Kategori Desc(SEO)">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
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
																<span>AR Kategori Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="ar_kategori_adi" value="<?php echo $catRow["ar_kategori_adi"];?>" placeholder="Kategori Adı">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Kategori Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="ar_kategori_desc" value="<?php echo $catRow["ar_kategori_desc"];?>" placeholder="Kategori Desc(SEO)">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
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
																<span>RU Kategori Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fa_kategori_adi" value="<?php echo $catRow["fa_kategori_adi"];?>" placeholder="Kategori Adı">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Kategori Desc</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="fa_kategori_desc" value="<?php echo $catRow["fa_kategori_desc"];?>" placeholder="Kategori Desc(SEO)">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>



													<!-- RUSÇA bitiş -->   
												</div>
											</div>


											<div class="col-12">
												<div class=" row">
													<div class="col-md-2">
														<span>Üst Kategori</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" id="basicSelect" name="ust_kategori">
																<option value="0">Ana Kategori Olsun</option>
																<?php Kategori_Select(0,0,$catRow["kategori_ust_id"]);?>                                      
															</select>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Kategori Fotoğrafı</span>
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
											<div class="col-md-5"><img src="<?php echo URL;?>images/kategoriler/big/<?php echo $catRow["kategori_resim"];?>" style="width: 150px;"></div>

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
	$(document).ready(function(event) {
		$('#forms').ajaxForm({
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Kategori Güncelleniyor. Lütfen Bekleyiniz",
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
						text 	: "Kategori Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir hata oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



