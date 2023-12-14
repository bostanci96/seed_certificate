<?php echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php
function menuSelect($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM menuler WHERE menu_ust='$tree' and menu_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			echo '<option value="'.$item["menu_id"].'">'.str_repeat('-', $level*3).$item['menu_baslik'].'</option>';
			menuSelect($item['menu_id'],$level + 1);
		}
	}
}
function Kategori_Select($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			echo '<option value="'.URL.'kategoriler/'.$item["kategori_id"].'/'.$item["kategori_url"].'">'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1);
		}
	}
}
?>
<script>
	$(document).ready(function(){
		$("select[name=menu_ust]").change(function(){
			var menuVal = $("select[name=menu_ust]").val();
			if(menuVal==0){
				$("#menuType").show(500);
			}else{
				$("#menuType").hide(500);
			}
		});


		/* Bağlantı seçeneğine göre inputları göster */
		$("select[name=hrefTypes]").change(function(){
			var hrefType = $("select[name=hrefTypes]").val();
			if(hrefType=='manuel'){
                // Manuel seçildiyse sayfaları gösteren selectBox disable edilip gizlenecek.
                $("#hrefSayfalar select[name=menu_href]").attr('disabled','disabled');
                $("#hrefSayfalar").hide();
                $("#hrefKategoriler").hide(500);
                $("#hrefKategoriler select[name=menu_href]").attr('disabled','disabled');
                $("#hrefManuel").show(500);
                $("#hrefManuel input[name=menu_href]").removeAttr('disabled');

            }else if(hrefType=='sayfalar'){
            	$("#hrefManuel input[name=menu_href]").attr('disabled','disabled');
            	$("#hrefManuel").hide();
            	$("#hrefKategoriler").hide(500);
            	$("#hrefKategoriler select[name=menu_href]").attr('disabled','disabled');
            	$("#hrefSayfalar").show(500);
            	$("#hrefSayfalar select[name=menu_href]").removeAttr('disabled');
            }else if(hrefType=="kategoriler"){
            	$("#hrefSayfalar").hide(500);
            	$("#hrefSayfalar select[name=menu_href]").attr("disabled","disabled");
            	$("#hrefManuel").hide(500);
            	$("#hrefManuel input[name=menu_href]").attr('disabled','disabled');
            	$("#hrefKategoriler").show(500);
            	$("#hrefKategoriler select[name=menu_href]").removeAttr('disabled');
            }
        });

		/*  Menü tipine göre resim ekletme */ 

		$("select[name=menu_type]").change(function(){
			var menuType = $(this).val();
			if(menuType=='mega-menu'){
				$("#menuResim").show(500);
				$("#menuResim input").removeAttr('disabled','disabled');
			}else{
				$("#menuResim").hide(500);
				$("#menuResim input").attr('disabled','disabled');
			}
		});


	});

</script>


<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Menü Ekle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=menuler">Menüler</a>
							</li>
							<li class="breadcrumb-item active"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=menu_ekle">Yeni Menü Ekle</a>
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
							<h4 class="card-title">   <p><b>Yeni</b> Menü Ekle</p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" class="form-horizontal" id="forms" method="POST" action="ajax.php?p=menu_add">
									<div class="form-body">
										<div class="row">

											<div class="col-12">
												<div class=" row">
													<div class="col-md-2">
														<span>Üst Menü</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select name="menu_ust" class="form-control">

																<option value="0">Ana Menü Olsun</option>
																<?php menuSelect(0,0);?>
															</select>
														</fieldset>
													</div>
												</div>
											</div>

											<!--<div class="col-12">
												<div class=" row">
													<div class="col-md-2">
														<span>Menü Tipini Seçin</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">
															<select class="form-control" id="basicSelect" name="menu_tipi">
																<option value="0">Header(Üst) Menü</option>
																<option value="1">Footer(Alt) Menü</option>                                                        
															</select>
														</fieldset>
													</div>
												</div>
											</div>-->
											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
														<span>Menü Başlığı</span>
													</div>
													<div class="col-md-10">
														<fieldset class="position-relative has-icon-left">
															<input type="text" id="first-name" class="form-control" name="menu_baslik" placeholder="Menü Başlığı">
															<div class="form-control-position">
																<i class="feather icon-menu"></i>
															</div>
														</fieldset>
													</div>
												</div>
											</div>                                                  

											<div class="col-12">   
												<div class="form-group row">
													<label for="input-text" class="col-sm-2 control-label">Bağlantı Seçenekleri</label>
													<div class="col-sm-9">
														<select name="hrefTypes" class="form-control">
															<option value="0">Link verme seçeneğini belirleyin !</option>
															<option value="manuel">Manuel Gireceğim</option>
															<option value="sayfalar" >Sayfaları Göster</option>
															<option value="kategoriler" >Kategorileri Göster</option>
														</select>
													</div>
												</div>
											</div>

											<div class="col-12" id="hrefSayfalar" style="display:none">   <div class="form-group row">
												<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
												<div class="col-sm-9">
													<select name="menu_href" class="form-control"  disabled>
														<option value="0">Sayfa Seçin !</option>
														<?php
														$sayfaQuery = $db->query("SELECT * FROM sayfalar WHERE sayfa_durum=1 ");
														if($sayfaQuery->rowCount()){
															foreach($sayfaQuery as $sayfaRow){
																echo '<option value="'.URL.$sayfaRow["sayfa_url"].'/">'.$sayfaRow["sayfa_adi"].'</option>';
															}
														}
														?>
													</select>
												</div></div>
											</div>
											<div class="col-12" id="hrefKategoriler" style="display:none"> 
												<div class="form-group row">
													<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
													<div class="col-sm-9">
														<select name="menu_href" class="form-control"  disabled>
															<option value="">Kategori Seçin !</option>
															<?php Kategori_Select(0,0);?>
														</select>
													</div>
												</div>
											</div>
											<div class="col-12" id="hrefManuel" style="display:none">  
												<div class="form-group row">
													<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="menu_href" placeholder="Örn : http://www.google.com.tr/" disabled>
													</div>
												</div>
											</div>

											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-8 offset-md-4">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Tamamla</button>
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
				}else if(data=='mega-resim-yok'){
					sweetAlert("Uyarı","Mega Menü için resim seçmediniz !","warning");
					return false;
				}else{
					sweetAlert(data,"Bir hata oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



