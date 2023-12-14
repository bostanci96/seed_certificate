<?php echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php
function Kategori_Select($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==159){$sel="selected";}else{$sel="";}
			echo '<option value="'.$item["kategori_id"].'" '.$sel.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1);
		}
	}
}
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Ürün Yönetimi </h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php ECHO ADMIN_URL;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL?>page/urunler.php">Ürünler</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Yeni Ürün Ekle</a>
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
							<h4 class="card-title">   <p><b>Yeni</b> Ürün Ekle</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">

								<form role="form" class="form-horizontal" id="forms" method="POST" action="ajax.php?p=urun_add"  enctype="multipart/form-data">
									<div class="row">
									<!--	<div class="col-12">
											<div class=" row">
												<div class="col-md-2">
													<span>Ürün Kategori</span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">
														<select class="form-control" id="basicSelect" name="urun_kategori">
															<option value="0">Kategori Seçiniz</option>
															<?php Kategori_Select(0,0,0);?>
														</select>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Durumu</span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">
														<select class="form-control" id="basicSelect" name="urun_populer">
															<option value="0">Normal Ürün </option>
															<option value="1 ">Vitrin Ürün </option>

														</select>
													</fieldset>
												</div>
											</div>
										</div>
-->
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Başlığı</span>
												</div>
												<div class="col-md-10">
													<fieldset class="position-relative has-icon-left">

														<input type="text" id="first-name" class="form-control" name="urun_adi" placeholder="Örn: Ürünün Adı">

														<div class="form-control-position">
															<i class="feather icon-tag"></i>
														</div>
													</fieldset>

												</div>
											</div>
										</div>
										<!--<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Desc</span>
												</div>
												<div class="col-md-10">
													<fieldset class="position-relative has-icon-left">

														<input type="text" id="first-name" class="form-control" name="urun_desc" placeholder="Örn: Ürünün Kısa Açıklama">

														<div class="form-control-position">
															<i class="feather icon-tag"></i>
														</div>
													</fieldset>

												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Harici Link</span>
												</div>
												<div class="col-md-10">
													<fieldset class="position-relative has-icon-left">

														<input type="text" id="first-name" class="form-control" name="urun_link" placeholder="Örn: Ürün Dış Bağlantı">

														<div class="form-control-position">
															<i class="feather icon-tag"></i>
														</div>
													</fieldset>

												</div>
											</div>
										</div>

-->
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün İçerik</span>
												</div>
												<div class="col-md-10">
													<textarea class="ckeditor" id="bootstrapck" name="urun_icerik"></textarea>
													<?php ckeditor('bootstrapck');?>


												</div>
											</div>
										</div>




										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Resmi</span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">                                                    
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile01" title="Resim seç !" name="dosya[]" id="dosya[]" multiple>
															<label class="custom-file-label" for="inputGroupFile01">Ürün Görsellerini Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
											<div class="col-12">
											<div class="form-group row">
												<div class="col-md-2">
													<span>Ürün Sertifika Belgesi <br><small>(3508x2480)</small></span>
												</div>
												<div class="col-md-10">
													<fieldset class="form-group">                                                    
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile022" title="Resim seç !" name="dosya22[]" id="dosya22[]" multiple>
															<label class="custom-file-label" for="inputGroupFile022">Ürün Sertifikasını Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>





										<div class="form-group col-md-8 offset-md-4">
										</div>
										<div class="col-md-8 offset-md-4">
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
			beforeSerialize: function(form, options) { 
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Ürün Yükleniyor. Lütfen Bekleyiniz",
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
						text 	: "Ürün Başarılı Bir Şekilde Eklendi",
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



