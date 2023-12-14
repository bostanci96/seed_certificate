<?php echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php 
if(isset($_GET["id"])){
	$id = g("id");
	$menuControl = $db->query("SELECT * FROM menuler WHERE menu_id='$id'");
	if($menuControl->rowCount()){
		$menuRow = $menuControl->fetch(PDO::FETCH_ASSOC);
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');	
	}
}else{
		go(ADMIN_URL.'index.php?sayfa=404');	
}
?>
<?php
function menuSelect($tree,$level=0,$ustId=null){
	global $db;
	$sorgula = $db->query("SELECT * FROM menuler WHERE menu_ust='$tree' and menu_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($ustId==$item["menu_id"]){$sel = " selected ";}else{$sel="";}
			echo '<option value="'.$item["menu_id"].'" '.$sel.'>'.str_repeat('-', $level*3).$item['menu_baslik'].'</option>';
			menuSelect($item['menu_id'],$level + 1);
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
					<h2 class="content-header-title float-left mb-0">Menü Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=menuler">Menüler</a>
							</li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);">Menü Düzenle</a>
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
							<h4 class="card-title">   <p><b><?php echo $menuRow["menu_baslik"];?> </b> Adlı Menü Düzenleniyor</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=menu_edit">
									<input type="hidden" name="menu_id" value="<?php echo $menuRow["menu_id"];?>" />
									<input type="hidden" name="menu_resim" value="<?php echo $menuRow["menu_resim"];?>" />

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
																<span> Menü Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="menu_baslik" placeholder="Menü Adı" value="<?php echo $menuRow["menu_baslik"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class=" row">
															<div class="col-md-2">
																<span> Menü Linki</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="menu_href" placeholder="Menü Linki"  value="<?php echo $menuRow["menu_href"];?>">
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
																<span>EN Menü Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="en_menu_baslik" placeholder="Menü Adı" value="<?php echo $menuRow["en_menu_baslik"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													


													<div class="col-12">
														<div class=" row">
															<div class="col-md-2">
																<span>EN Menü Linki</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="en_menu_href" placeholder="Menü Linki"  value="<?php echo $menuRow["en_menu_href"];?>">
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
																<span>AR Menü Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="ar_menu_baslik" placeholder="Menü Adı" value="<?php echo $menuRow["ar_menu_baslik"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class=" row">
															<div class="col-md-2">
																<span>AR Menü Linki</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="ar_menu_href" placeholder="Menü Linki"  value="<?php echo $menuRow["ar_menu_href"];?>">
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
																<span>RU Menü Adı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fa_menu_baslik" placeholder="Menü Adı" value="<?php echo $menuRow["fa_menu_baslik"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class=" row">
															<div class="col-md-2">
																<span>RU Menü Linki</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="desc" id="email-id" class="form-control" name="fa_menu_href" placeholder="Menü Linki"  value="<?php echo $menuRow["fa_menu_href"];?>">
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


											<div class="col-12" style="margin-top:0.5pc;">
														<div class=" row">
															<div class="col-md-2">
																<span>Üst Menü</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<select name="menu_ust" class="form-control">
																		<option value="0">Ana Menü Olsun</option>
																		<?php menuSelect(0,0,$menuRow["menu_ust"]);?>
																	</select>
																</fieldset>
															</div>
														</div>
													</div>
											




											<div class="form-group col-md-8 offset-md-4" >
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
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Menü Yükleniyor. Lütfen Bekleyiniz",
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
						text 	: "Menü Başarılı Bir Şekilde Eklendi",
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



