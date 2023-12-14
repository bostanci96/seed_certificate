<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>

<?php
if(isset($_GET["id"])){
	$id = g("id");
	$kcontrol = $db->prepare("SELECT * FROM iletisim WHERE iletisim_id=:id");
	$kcontrol->execute(array("id"=>$id));
	if($kcontrol->rowCount()){
		$catRow = $kcontrol->fetch(PDO::FETCH_ASSOC);
		if ($catRow["iletisim_cevap"]!="") {
			header("Location:".ADMIN_URL. "index.php?sayfa=bekleyen");		

		}
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');	
	}
}else{
	go(ADMIN_URL.'index.php?sayfa=404');	
}


?>
<style type="text/css">
	.card-body {
		padding: 0.5pc 0.5pc;
	}
</style>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Mesaj Cevapla</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=bekleyen">Bekleyen Mesajlar</a>
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
							<h4 class="card-title">   <p><b><?php echo $catRow["iletisim_isim"];?> </b> 'ın Mesajını Okuyorsunuz</p> </h4>
						</div>
						<div class="card-content">


							<div class="card-body">
								<form role="form" class="form-horizontal"  id="forms" method="POST" action="<?php echo ADMIN_URL;?>ajax.php?p=mesaj_cevap"  enctype="multipart/form-data">
									<input type="hidden" value="<?php echo $id;?>" name="mid">
									
									<div class="form-body">
										<div class="">
											<!-- Nav Filled Starts -->
											<section id="nav-filled">
												<div class="row">
													<div class="col-sm-12">
														<div class="">

															<div class="card-content">
																<div class="card-body">

																	<!-- Nav tabs -->
																	<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
																		<li class="nav-link active">
																			<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> Mesaj Ayrıntıları </a>
																		</li>

																	</ul>
																	<!-- Tab panes -->
																	<div class="tab-content pt-1">
																		<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

																			<div class="row">


																				<div class="col-12">
																					<div class="form-group row">
																						<div class="col-md-2" style="line-height: 33px;">
																							<span>Mesajı Gönderinin Adı</span>
																						</div>
																						<div class="col-md-10">
																							<fieldset class="position-relative has-icon-left">
																								<input type="text" class="form-control" value="<?php echo $catRow["iletisim_isim"];?>" disabled>
																								<input type="hidden" name="kisiad" class="form-control" value="<?php echo $catRow["iletisim_isim"];?>">
																								<div class="form-control-position">
																									<i class="fa fa-user-o"></i>
																								</div>
																							</fieldset>
																						</div>
																					</div>
																				</div>

																				<div class="col-12">
																					<div class="form-group row">
																						<div class="col-md-2" style="line-height: 33px;">
																							<span>Telefonu</span>
																						</div>
																						<div class="col-md-10">
																							<fieldset class="position-relative has-icon-left">
																								<input type="text" class="form-control" value="<?php echo $catRow["iletisim_tel"];?>" disabled>
																								<div class="form-control-position">
																									<i class="fa fa-mobile"></i>
																								</div>
																							</fieldset>
																						</div>
																					</div>
																				</div>
																				<div class="col-12">
																					<div class="form-group row">
																						<div class="col-md-2" style="line-height: 33px;">
																							<span>E-Posta Adresi</span>
																						</div>
																						<div class="col-md-10">
																							<fieldset class="position-relative has-icon-left">
																								<input type="text" class="form-control" value="<?php echo $catRow["iletisim_eposta"];?>" disabled>
																								<input type="hidden" name="elcevap" class="form-control" value="<?php echo $catRow["iletisim_eposta"];?>" >
																								<div class="form-control-position">
																									<i class="fa fa-envelope-o"></i>
																								</div>
																							</fieldset>
																						</div>
																					</div>
																				</div>
																				<div class="col-12">
																					<div class="form-group row">
																						<div class="col-md-2" style="line-height: 33px;">
																							<span>Mesajın Konusu</span>
																						</div>
																						<div class="col-md-10">
																							<fieldset class="position-relative has-icon-left">
																								<input type="text" class="form-control" value="<?php echo $catRow["iletisim_konu"];?>" disabled>
																								<div class="form-control-position">
																									<i class="fa fa-paper-plane"></i>
																								</div>
																							</fieldset>
																						</div>
																					</div>
																				</div>


																				<div class="col-12">
																					<div class="form-group row">
																						<div class="col-md-2" style="line-height: 33px;">
																							<span>Mesajı</span>
																						</div>
																						<div class="col-md-10">
																							<fieldset class="position-relative has-icon-left">


																								<textarea rows="8" type="text" class="form-control" disabled ><?php echo $catRow["iletisim_mesaj"];?></textarea>
																								<div class="form-control-position">
																									<i class="fa fa-pencil-square-o"></i>
																								</div>
																							</fieldset>
																						</div>
																					</div>
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

											<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist" style="margin-top: -55px;">
												<li class="nav-link active">
													<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> Mesajı Cevapla</a>
												</li>

											</ul>
											<div class="tab-content pt-1">
												<div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<div class="row">

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2" style="line-height: 33px;">
																	<span>Cevabınızı Yazınız</span>
																</div>
																<div class="col-md-10">
																	<!--CK EDİDÖR GELİNCE BOŞ POST EDİYOR-->
																	<textarea class="form-control" rows="8" name="cevap"></textarea>

																</div>
															</div>
														</div>



													</div>
												</div>


											</div>


											<!-- Nav Filled Ends -->

											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Cevapla</button>
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
					sweetAlert("Hata","Sorun Oluştu.. Sonra Tekrar Dene.","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text    : "Mesaj Başarılı Bir Şekilde Cevaplandı !",
						type	: "success"
					},
					function(){
						window.location = "<?php echo ADMIN_URL ;?>index.php?sayfa=bekleyen"
					});
					return false;
				}else{
					sweetAlert("Başarısız","Bir Hata Oluştu ! Mail Gönderilemedi..","error");
					return false;
				}
			}
		});

	});
</script>
