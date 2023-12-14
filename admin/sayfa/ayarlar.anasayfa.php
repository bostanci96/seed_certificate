<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM bloklar");
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
					<h2 class="content-header-title float-left mb-0">Anasayfa Ayarları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Anasayfa Ayarları</a>
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
							<h4 class="card-title">   <p><b>Anasayfa</b> Ayarları Düzenle </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								

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

												<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=anasayfa_ayarlari"  enctype="multipart/form-data">
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 1" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 1" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 2" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 2" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 3" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 3" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>




													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 4" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 4" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 5" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 5" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Başlık 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 6" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>Acıklama 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 6" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-md-7 offset-md-4" >
														<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
													</div>
												</form>




												<!-- Türkçe bitiş -->
											</div>
											<?php
											echo !defined('ADMIN') ? die('error: 404 !') : null;
											$ayarControl = $db->query("SELECT * FROM bloklar_en");
											if($ayarControl->rowCount()){
												$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
											}else{
												die('error: 302 !');
											}
											?>
											<div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

												<!-- İngilizce başlangıç -->
												<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=en_anasayfa_ayarlari"  enctype="multipart/form-data">
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 1" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 1" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 2" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 2" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 3" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 3" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 4" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 4" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 5" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 5" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Başlık 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 6" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>EN Acıklama 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 6" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-md-7 offset-md-4" >
														<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
													</div>
												</form>

												<!-- İngilizce bitiş -->

											</div>
											<?php
											echo !defined('ADMIN') ? die('error: 404 !') : null;
											$ayarControl = $db->query("SELECT * FROM bloklar_ar");
											if($ayarControl->rowCount()){
												$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
											}else{
												die('error: 302 !');
											}
											?>
											<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
												<!-- Arapça başlangıç -->
												<form role="form" class="form-horizontal"  id="forms3" method="POST" action="ajax.php?p=ar_anasayfa_ayarlari"  enctype="multipart/form-data">
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 1" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 1" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 2" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 2" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 3" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 3" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 4" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 4" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 5" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 5" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Başlık 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 6" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>AR Acıklama 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 6" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-md-7 offset-md-4" >
														<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
													</div>
												</form>
												<!-- Arapça bitiş -->    
											</div>

											<?php
											echo !defined('ADMIN') ? die('error: 404 !') : null;
											$ayarControl = $db->query("SELECT * FROM bloklar_fa");
											if($ayarControl->rowCount()){
												$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
											}else{
												die('error: 302 !');
											}
											?>
											<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

												<!-- RUSÇA başlangıç -->

												<form role="form" class="form-horizontal"  id="forms4" method="POST" action="ajax.php?p=fa_anasayfa_ayarlari"  enctype="multipart/form-data">
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 1" name="baslik1" value="<?php echo $ayarRow["baslik1"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 1</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 1" name="desc1"><?php echo $ayarRow["desc1"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 2" name="baslik2" value="<?php echo $ayarRow["baslik2"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 2</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 2" name="desc2"><?php echo $ayarRow["desc2"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 3" name="baslik3" value="<?php echo $ayarRow["baslik3"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 3</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 3" name="desc3"><?php echo $ayarRow["desc3"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>


													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 4" name="baslik4" value="<?php echo $ayarRow["baslik4"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 4</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 4" name="desc4"><?php echo $ayarRow["desc4"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 5" name="baslik5" value="<?php echo $ayarRow["baslik5"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 5</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 5" name="desc5"><?php echo $ayarRow["desc5"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Başlık 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" class="form-control" id="iconLeft1" placeholder="Başlık 6" name="baslik6" value="<?php echo $ayarRow["baslik6"];?>">
																	<div class="form-control-position">
																		<i class="feather icon-star"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
																<span>RU Acıklama 6</span>
															</div>
															<div class="col-md-10">
																<fieldset class="form-group">
																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Acıklama 6" name="desc6"><?php echo $ayarRow["desc6"];?></textarea>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-md-7 offset-md-4" >
														<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
													</div>
												</form>

												<!-- RUSÇA bitiş -->   
											</div>
										</div>



									</div>
								</div>

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
						text 	: "Ayarlarınız Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else{
					console.log(data);
					return false;
				}
			}
		});
		$('#forms2').ajaxForm({
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
						text 	: "Ayarlarınız Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else{
					console.log(data);
					return false;
				}
			}
		});
		$('#forms3').ajaxForm({
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
						text 	: "Ayarlarınız Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else{
					console.log(data);
					return false;
				}
			}
		});
		$('#forms4').ajaxForm({
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
						text 	: "Ayarlarınız Güncellendi !",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
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



