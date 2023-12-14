<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Menü İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=menuler">Tüm Menüler</a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="content-body">
		<!-- Data list view starts -->
		<section id="data-list-view" class="data-list-view-header">


			<!-- DataTable starts -->
			<div class="table-responsive">
				<div class="actions action-btns"><div class="dt-buttons btn-group">
					<a href="<?php echo ADMIN_URL?>index.php?sayfa=menu_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>İd</th>
								<th>Sıra No</th>
								<th>Üst Menü</th>
								<th>Menü Adı</th>
								<th>Menü Tarihi</th>
								<th>Menü Linki</th>
								
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$kquery = $db->query("SELECT * FROM  menuler ORDER BY menu_ust,menu_sira");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){           $ustId = $kRow["menu_ust"];
								if($ustId==0){
									$ustKat = "Ana Menü";
								}else{
									$ustCatQuery = $db->query("SELECT menu_baslik FROM menuler WHERE menu_id='$ustId'");
									if($ustCatQuery->rowCount()){
										$ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
										$ustKat = $ustKatRow["menu_baslik"];
									}
								}
								?>
								<tr>
									<td></td>
									<td><?php echo $kRow["menu_id"];?></td>
									<td style="width:100px">
										<input type="text" value="<?php echo $kRow["menu_sira"];?>" name="sira_no<?php echo $kRow["menu_id"]?>" style="margin-right:5px;width:30px;float:left"/>
										<a href="javascript:;" id="updateSira" get-id="<?php echo $kRow["menu_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
									</td>
									
									<td><?php echo $ustKat;?></td>
									<td><?php echo $kRow["menu_baslik"];?></td>
									<td><?php echo tarih($kRow["menu_tarih"]);?></td>
									<td><a target="_blank" href="<?php echo $kRow["menu_href"];?>">Menüye Git </a></td>
									<td>    <?php
									if($kRow["menu_durum"]==1){ ?>
										<div class="chip chip-success">
											<div class="chip-body">
												<div class="chip-text">Yayında</div>
											</div>
											</div> <?php }else {?>
												<div class="chip chip-danger">
													<div class="chip-body">
														<div class="chip-text">Yayında Değil</div>
													</div>
												</div>
											<?php }?>
										</td>
										<td > <div class="dropdown dropright">

											<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												İşlemler
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="<?php echo ADMIN_URL ;?>index.php?sayfa=menu_duzenle&id=<?php echo $kRow["menu_id"];?>">Görüntüle / Düzenle</a>
												<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $kRow["menu_id"];?>);">
													<?php if($kRow["menu_durum"]==1){echo  "Menü'yü Gizle";}else{echo "Menü'yü Aktif Et";}?>
												</a>
												<a class="dropdown-item"  onclick="TekSil(<?php echo $kRow["menu_id"];?>);" >Menü'yü Sil</a>
											</div>
										</div>   


									</td>
								</tr>

							<?php  }} ?>



						</tbody>
					</table>
				</div>
				<!-- DataTable ends -->

				<!-- add new sidebar ends -->
			</section>
			<!-- Data list view end -->

		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('.datatable').dataTable({
				"bSort":false
			});
			$("td #updateSira").click(function(){
				var id = $(this).attr("get-id");
				var inputValue = $("input[name=sira_no"+id+"]").val();
				$.post('ajax.php?p=menuSiraGuncelle', {sira_no: inputValue,menu_id:id}, function (data) {
					alert(data);
				});
			});
		});
		function TekSil(menuId){
			$.post('ajax.php?p=tek_menu_sil', {id: menuId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Menü başarılı bir şekilde silinmiştir.",
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
		}
		function durumDegis(menuId){
			$.post('ajax.php?p=menu_durum_degis', {id: menuId}, function (data) {
				if(data=="yasaklama-basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Menü başarılı bir şekilde gizlendi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="yasak-kaldirildi"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Menü başarılı bir şekilde aktifleştirildi.",
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
		}

	</script>
