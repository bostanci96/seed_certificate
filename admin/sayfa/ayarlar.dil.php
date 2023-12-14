<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM ayarlar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	die(go(ADMIN_URL.'index.php?sayfa=404'));
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
					<h2 class="content-header-title float-left mb-0">Dil Dosyası</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Dil Dosyası</a>
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
							<h4 class="card-title">   <p><b>Dil Dosyasını</b>  Düzenle </p> </h4>
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

												<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=dil_ayarlari"  enctype="multipart/form-data">
												  <input type="hidden" name="dil_hidden" value="">
												 <div class="col-sm-12">
                                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                                <thead>
                                                                    <tr >
                                                                        <th class="text-center">
                                                                            TR Title
                                                                        </th>
                                                                        <th class="text-center">
                                                                            TR Değer
                                                                        </th>
                                                                        <th class="text-center">
                                                                            TR Sil
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $arr = json_decode($ayarRow["site_bloklar"],true);
                                                                    if(!empty($arr)){
                                                                    foreach($arr as $cek){ ?>
                                                                    <tr id='addr0'>
                                                                        <td class='text-center'>
                                                                            <input class="form-control" type="text" name="title[]" value="<?=$cek["title"]?>">
                                                                        </td>
                                                                        <td class='text-center'>
                                                                            <input class="form-control" type="text" name="value[]" value="<?=htmlspecialchars($cek["value"])?>">
                                                                        </td>
                                                                        <td class='text-center'>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <?php }}  ?>
                                                                <tr id='addr1'></tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="row pb-2">
                                                            <div class="col-6 mt-2">
                                                                <button id="add_row" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>Satır Ekle</span>
                                                                </button>
                                                            </div>
                                                            <div class="col-6 mt-2">
                                                                <button class="btn btn-icon btn-outline-success" type="submit">
                                                                <i data-feather='save'></i>
                                                                <span>Güncelle</span>
                                                                </button>
                                                            </div>
                                                        </div>
													
</div>

												
												</form>




												<!-- Türkçe bitiş -->
											</div>
									
											<div class="tab-pane" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

												<!-- İngilizce başlangıç -->
												<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=dil_ayarlari"  enctype="multipart/form-data">
												   <input type="hidden" name="dil_hidden" value="en">

													                    <div class="col-sm-12">
                                                        <table class="table table-bordered table-hover" id="tab_logic2">
                                                            <thead>
                                                                <tr >
                                                                    <th class="text-center">
                                                                        EN Title
                                                                    </th>
                                                                    <th class="text-center">
                                                                        EN Değer
                                                                    </th>
                                                                    <th class="text-center">
                                                                        EN Sil
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $arr = json_decode($ayarRow["en_site_bloklar"],true);
                                                                if(!empty($arr)){
                                                                foreach($arr as $cek){ ?>
                                                                <tr id='addr20'>
                                                                    <td class='text-center'>
                                                                        <input class="form-control" type="text" name="title[]" value="<?=$cek["title"]?>">
                                                                    </td>
                                                                    <td class='text-center'>
                                                                        <input class="form-control" type="text" name="value[]" value="<?=htmlspecialchars($cek["value"])?>">
                                                                    </td>
                                                                    <td class='text-center'>
                                                                       
                                                                    </td>
                                                                </tr>
                                                                <?php }} ?>
                                                            <tr id='addr21'></tr>
                                                        </tbody>
                                                    </table>
                                                     <div class="row pb-2">
                                                        <div class="col-6 mt-2">
                                                            <button id="add_row2" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Satır Ekle</span>
                                                            </button>
                                                        </div>
                                                        <div class="col-6 mt-2">
                                                            <button class="btn btn-icon btn-outline-success" type="submit">
                                                            <i data-feather='save'></i>
                                                            <span>Güncelle</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>


												
												</form>

												<!-- İngilizce bitiş -->

											</div>
									
											<div class="tab-pane" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
												<!-- Arapça başlangıç -->
												<form role="form" class="form-horizontal"  id="forms3" method="POST" action="ajax.php?p=dil_ayarlari"  enctype="multipart/form-data">
												    <input type="hidden" name="dil_hidden" value="ar">

												 <div class="col-sm-12">
                                                <table class="table table-bordered table-hover" id="tab_logic4">
                                                    <thead>
                                                        <tr >
                                                            <th class="text-center">
                                                                AR Title
                                                            </th>
                                                            <th class="text-center">
                                                                AR Değer
                                                            </th>
                                                            <th class="text-center">
                                                                AR Sil
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $arr = json_decode($ayarRow["ar_site_bloklar"],true);
                                                        if(!empty($arr)){
                                                        foreach($arr as $cek){ ?>
                                                        <tr id='addr40'>
                                                            <td class='text-center'>
                                                                <input class="form-control" type="text" name="title[]" value="<?=$cek["title"]?>">
                                                            </td>
                                                            <td class='text-center'>
                                                                <input class="form-control" type="text" name="value[]" value="<?=htmlspecialchars($cek["value"])?>">
                                                            </td>
                                                            <td class='text-center'>
                                                                
                                                            </td>
                                                        </tr>
                                                        <?php }} ?>
                                                    <tr id='addr41'></tr>
                                                </tbody>
                                            </table>
                                              <div class="row pb-2">
                                                <div class="col-6 mt-2">
                                                    <button id="add_row4" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Satır Ekle</span>
                                                    </button>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <button class="btn btn-icon btn-outline-success" type="submit">
                                                    <i data-feather='save'></i>
                                                    <span>Güncelle</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>




												
												</form>
												<!-- Arapça bitiş -->    
											</div>

										
											<div class="tab-pane" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

												<!-- RUSÇA başlangıç -->

												<form role="form" class="form-horizontal"  id="forms4" method="POST" action="ajax.php?p=dil_ayarlari"  enctype="multipart/form-data">
												   <input type="hidden" name="dil_hidden" value="fa">

      <div class="col-sm-12">
                                                    <table class="table table-bordered table-hover" id="tab_logic3">
                                                        <thead>
                                                            <tr >
                                                                <th class="text-center">
                                                                    RU Title
                                                                </th>
                                                                <th class="text-center">
                                                                    RU Değer
                                                                </th>
                                                                <th class="text-center">
                                                                    RU Sil
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $arr = json_decode($ayarRow["fa_site_bloklar"],true);
                                                            if(!empty($arr)){
                                                            foreach($arr as $cek){ ?>
                                                            <tr id='addr30'>
                                                                <td class='text-center'>
                                                                    <input class="form-control" type="text" name="title[]" value="<?=$cek["title"]?>">
                                                                </td>
                                                                <td class='text-center'>
                                                                    <input class="form-control" type="text" name="value[]" value="<?=htmlspecialchars($cek["value"])?>">
                                                                </td>
                                                                <td class='text-center'>
                                                                  
                                                                </td>
                                                            </tr>
                                                            <?php }} ?>
                                                        <tr id='addr31'></tr>
                                                    </tbody>
                                                </table>
                                               <div class="row pb-2">
                                                    <div class="col-6 mt-2">
                                                        <button id="add_row3" class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Satır Ekle</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-6 mt-2">
                                                        <button class="btn btn-icon btn-outline-success" type="submit">
                                                        <i data-feather='save'></i>
                                                        <span>Güncelle</span>
                                                        </button>
                                                    </div>
                                                </div>
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
	$(document).ready(function(){
var i=1;
$("#add_row").click(function(){
$('#addr'+i).html("<td class='text-center'><input class='form-control' type='text' name='title[]' required></td><td class='text-center'><input class='form-control' type='text' name='value[]' required></td><td class='text-center'><span class='delete-row'>X</span></td>");
$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
i++;
});
$("#delete_row").click(function(){
if(i>1){
$("#addr"+(i-1)).html('');
i--;
}
});
$(".table").on("click",".delete-row", function(){
$(this).parents("tr").remove();
})
});
$(document).ready(function(){
var a=1;
$("#add_row2").click(function(){
$('#addr2'+a).html("<td class='text-center'><input class='form-control' type='text' name='title[]' required></td><td class='text-center'><input class='form-control' type='text' name='value[]' required></td><td class='text-center'><span class='delete-row2'>X</span></td>");
$('#tab_logic2').append('<tr id="addr2'+(a+1)+'"></tr>');
a++;
});
$("#delete_row2").click(function(){
if(a>1){
$("#addr2"+(a-1)).html('');
a--;
}
});
$(".table").on("click",".delete-row2", function(){
$(this).parents("tr").remove();
})
});
$(document).ready(function(){
var x=1;
$("#add_row3").click(function(){
$('#addr3'+x).html("<td class='text-center'><input class='form-control' type='text' name='title[]' required></td><td class='text-center'><input class='form-control' type='text' name='value[]' required></td><td class='text-center'><span class='delete-row3'>X</span></td>");
$('#tab_logic3').append('<tr id="addr3'+(x+1)+'"></tr>');
x++;
});
$("#delete_row3").click(function(){
if(x>1){
$("#addr3"+(x-1)).html('');
x--;
}
});
$(".table").on("click",".delete-row3", function(){
$(this).parents("tr").remove();
})
});
$(document).ready(function(){
var x=1;
$("#add_row4").click(function(){
$('#addr4'+x).html("<td class='text-center'><input class='form-control' type='text' name='title[]' required></td><td class='text-center'><input class='form-control' type='text' name='value[]' required></td><td class='text-center'><span class='delete-row4'>X</span></td>");
$('#tab_logic4').append('<tr id="addr4'+(x+1)+'"></tr>');
x++;
});
$("#delete_row4").click(function(){
if(x>1){
$("#addr4"+(x-1)).html('');
x--;
}
});
$(".table").on("click",".delete-row3", function(){
$(this).parents("tr").remove();
})
});
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



