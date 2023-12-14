  <?php
  echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
  $bakimbilgi = $db->query("SELECT * FROM bakim");
  if($bakimbilgi->rowCount()){
  	$bakimow = $bakimbilgi->fetch(PDO::FETCH_ASSOC);
  }else{
  	go(ADMIN_URL.'index.php?sayfa=404');	
  }
  ?>


  <div class="content-wrapper">
  	<div class="content-header row">
  		<div class="content-header-left col-md-9 col-12 mb-2">
  			<div class="row breadcrumbs-top">
  				<div class="col-12">
  					<h2 class="content-header-title float-left mb-0">Bakın Modu İşlemleri</h2>
  					<div class="breadcrumb-wrapper col-12">
  						<ol class="breadcrumb">
  							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
  							</li>
  							<li class="breadcrumb-item"><a href="javascript:void(0);">Bakım Modu</a>

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
  								<h4 class="card-title">   <p><b>Bakım Modu</b> Etkinleştirme</p> </h4>
  							</div>
  							<div class="card-content">
  								<div class="card-body">
  									<form role="form" id="forms" method="POST" action="ajax.php?p=bakimModu"  enctype="multipart/form-data">
  										<div class="form-body">
  											<div class="row">


  												<script type="text/javascript">
  													$(function() {
  														$('#bakimmodon').change(function(){
  															$('.bakimmodon').hide();
  															$('#' + $(this).val()).show();
  														});
  													});
  												</script>


  												<div class="col-12">
  													<div class="form-group row">
  														<div class="col-md-2">
  															<span>Bakım Modu</span>
  														</div>
  														<div class="col-md-10">
  															<fieldset class="form-group">
  																<select class="form-control" name="mod" id="bakimmodon">
  																	<option <?php if ($bakimow["bakim_mod"]==0){ echo "selected";} ?> value="0">Kapalı</option>
  																	<option <?php if ($bakimow["bakim_mod"]==1){ echo "selected";} ?> value="1">Açık</option>

  																</select>
  															</fieldset>
  														</div>
  													</div>
  												</div>
  												<div id="1" class="bakimmodon" style="<?php if ($bakimow["bakim_mod"]==0) { ?>
  													display:none
  													<?php } ?>;width: 100%" >
  													<div class="col-12">
  														<div class="form-group row">
  															<div class="col-md-2">
  																<span>Bakım Modu Yazınız</span>
  															</div>
  															<div class="col-md-10">
  																<fieldset class="form-group">
  																	<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Kısa Bir Açıklama Girin..."  name="yazi" ><?php echo $bakimow["bakim_yazi"];?></textarea>
  																</fieldset>

  															</div>
  														</div>
  													</div>

  													<div class="col-12 ">
  														<div class=" row">
  															<div class="col-md-2">
  																<span>Bakım Modu Bitiş Tarihi</span>
  															</div>
  															<div class="col-md-5">


  																<fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left">
  																	<input type='text' class="form-control " id="iconLeftDivider" value="<?php echo $bakimow["bakim_tarih"];?>" name="bitisdate" placeholder="Bakım Modu Bitiş Tarihini Gir" />
  																	<div class="form-control-position">
  																		<i class="feather icon-calendar"></i>
  																	</div>
  													
  																</fieldset>
  															</div>
  															<div class="col-md-5">

  																<fieldset class="form-label-group form-group position-relative has-icon-left input-divider-left">
  																	<input type='text' class="form-control " id="iconLeftDivider" value="<?php echo $bakimow["bakim_saat"];?>" name="bitistime" placeholder="Bakım Modu Saati Belirti Gir" />
  																	<div class="form-control-position">
  																		<i class="feather icon-clock"></i>
  																	</div>
  																	
  																</fieldset>
  															</div>
  														</div>
  													</div> 





  													<div class="col-12">
  														<div class="form-group row">
  															<div class="col-md-2">
  																<span>Cep Tel</span>
  															</div>
  															<div class="col-md-10">
  																<fieldset class="position-relative has-icon-left">
  																	<input type="text" class="form-control" id="iconLeft1" name="ceptel" value="<?php echo $bakimow["bakim_cep"];?>" placeholder="Cep Telefonunuzu girin...">
  																	<div class="form-control-position">
  																		<i class="feather icon-smartphone"></i>
  																	</div>
  																</fieldset>
  															</div>
  														</div>
  													</div>
  													<div class="col-12">
  														<div class="form-group row">
  															<div class="col-md-2">
  																<span>Harita Konumu</span>
  															</div>
  															<div class="col-md-10">
  																<fieldset class="position-relative has-icon-left">
  																	<input type="text" class="form-control" id="iconLeft1" name="harita" value="<?php echo $bakimow["bakim_harita"];?>"  placeholder="Konumuzu Girin..">
  																	<div class="form-control-position">
  																		<i class="feather icon-map"></i>
  																	</div>
  																</fieldset>
  															</div>
  														</div>
  													</div>

  												</div>
  												<div class="form-group col-md-8 offset-md-4">
  												</div>
  												<div class="col-md-8 offset-md-4">
  													<div id="id_box"></div>
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
				sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
				return false;
			}else if(data=="basarili"){
				sweetAlert({
					title	: "Başarılı",
					text 	: "Bakım Modu Başarılı Bir Şekilde Aktifleşti",
					type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else{
				sweetAlert(data,"Bakım Modu Başarılı Bir Şekilde Pasifleşti","error");
				return false;
			}
		}
	});

});
</script>