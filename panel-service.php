<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect(BASE_URL."panel/login"); }
$oxcakmak->wmMetaTitle($lang['m_service'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_service'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_service'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_service'].'</h6>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addBrandModal">'.$lang['t_new_service'].'</a>
			</div>
			<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_service'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="msFullname">'.$lang['t_fullname'].'</label>
                                        <input type="text" class="form-control" id="msFullname" placeholder="'.$lang['t_fullname'].'">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="msContent">'.$lang['t_content'].'</label>
                                        <textarea rows="3" class="form-control" id="msContent" placeholder="'.$lang['t_content'].'" maxlength="250"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="msPicture">'.$lang['t_thumbnail'].'</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="msPicture">
                                            <label class="custom-file-label" for="msPicture">'.$lang['t_choose_file'].'</label>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addService">'.$lang['t_send'].'</button>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="border:1px solid #efefef;">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th>#</th>
                            <th>'.$lang['t_title'].'</th>
                            <th>'.$lang['t_description'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("service_id", "DESC");
					foreach($dbh->get("service") as $serviceRow){
					$i++;
					echo '
						<tr id="'.$serviceRow['service_slug'].'">
							<td>'.$i.'</td>
                            <td>'.$serviceRow['service_title'].'</td>
                            <td>'.$serviceRow['service_description'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning" onclick="editServiceItem(\''.$serviceRow['service_slug'].'\')">'.$lang['t_edit'].'</a>&nbsp;<button class="btn btn-sm btn-danger actionDeleteService" onclick="actionDeleteService(\''.$serviceRow['service_slug'].'\')">'.$lang['t_remove'].'</button></td>
						</tr>';
					}
					echo '</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
';
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_edit_service'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="mesFullname">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="mesFullname" placeholder="'.$lang['t_title'].'">
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group">
							<label for="mesContent">'.$lang['t_content'].'</label>
							<textarea rows="3" class="form-control" id="mesContent" placeholder="'.$lang['t_content'].'" maxlength="250"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mesPicture">'.$lang['t_thumbnail'].'</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="mesPicture">
								<label class="custom-file-label" for="mesPicture">'.$lang['t_choose_file'].'</label>
							</div>
						</div>
                    </div>
				</div>
				<span id="mesLastHash" style="display:none;"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success editService">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
$(".addService").click(function(e){
	$(".addService").attr("disabled", true);
	var formData = new FormData();
    formData.append("msFullname", $("#msFullname").val());
    formData.append("msJob", $("#msJob").val());
    formData.append("msPicture", $("#msPicture").prop("files")[0]);
    formData.append("msContent", $("#msContent").val());
    formData.append("actionaddService", "actionaddService");
    $.ajax({
        type: "POST",
        url: "'.POST_URL.'",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_add_failed'].'");
				$(".addService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_service_add_success'].'");
				redirect("'.BASE_URL.'panel/service",1);
			}
		}
	});
});
function editServiceItem(hash){
	var tableRow = document.getElementById(hash);
	$("#mesFullname").val(tableRow.children[1].outerText);
	$("#mesContent").val(tableRow.children[2].outerText);
	$("#mesLastHash").attr("value", hash);
	$("#editServiceModal").modal("toggle");
}
$(".editService").click(function(e){
	$(".editService").attr("disabled", true);
	var formData = new FormData();
    formData.append("msFullname", $("#mesFullname").val());
    formData.append("msPicture", $("#mesPicture").prop("files")[0]);
	formData.append("msContent", $("#mesContent").val());
	formData.append("msLastHash", $("#mesLastHash").attr("value"));
    formData.append("actionUpdateService", "actionUpdateService");
    $.ajax({
        type: "POST",
        url: "'.POST_URL.'",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
		success: function(response){
			if($.trim(response)=="empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".editService").attr("disabled", false);
			}else if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists'].'");
				$(".editService").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				$(".editService").attr("disabled", false);
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
			}else if($.trim(response) == "size"){
				$(".editService").attr("disabled", false);
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_update_failed'].'");
				$(".editService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_service_update_success'].'");
				redirect("'.BASE_URL.'panel/service",1);
			}
		}
	});
});
function actionDeleteService(hash){
	$(".actionDeleteService").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {hash:hash, actionDeleteService:"actionDeleteService"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists'].'");
				$(".actionDeleteService").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_service_delete_failed'].'");
				$(".actionDeleteService").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_service_delete_success'].'");
				redirect("'.BASE_URL.'panel/service",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>