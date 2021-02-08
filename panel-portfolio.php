<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect(BASE_URL."panel/login"); }
$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = $dbh->getValue("portfolio", "COUNT(*)");
$pageLimit = 10;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 10;
$oxcakmak->wmMetaTitle($lang['m_portfolio'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_portfolio'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_portfolio'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12 mb-4">
		<!-- Simple Tables -->
		<div class="card">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">'.$lang['m_portfolio'].'</h6>
				<a class="btn btn-success" href="#" data-toggle="modal" data-target="#addPortfolioModal">'.$lang['t_new_portfolio'].'</a>
			</div>
			<div class="modal fade" id="addPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_portfolio'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpTitle">'.$lang['t_title'].'</label>
										<input type="text" class="form-control" id="mpTitle" placeholder="'.$lang['t_title'].'">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpDescription">'.$lang['t_category'].'</label>
										<select class="form-control" id="mpCategory" placeholder="'.$lang['t_category'].'">'; $dbh->orderBy("category_slug", "ASC"); foreach($dbh->get("category") as $categoryRow){ echo '<option value="'.$categoryRow['category_slug'].'">'.$categoryRow['category_title'].'</option>'; } echo '</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="mpThumbnail">'.$lang['t_thumbnail'].'</label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="mpThumbnail">
											<label class="custom-file-label" for="mpThumbnail">'.$lang['t_choose_file'].'</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
							<button type="button" class="btn btn-success addPortfolio">'.$lang['t_send'].'</button>
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
							<th>'.$lang['t_category'].'</th>
							<th>'.$lang['t_process'].'</th>
						</tr>
					</thead>
					<tbody>';
					$i = 0;
					$dbh->orderBy("portfolio_id", "DESC");
					foreach($dbh->rawQuery('SELECT * FROM portfolio ORDER BY portfolio_id DESC LIMIT ?, ?', [$viewData, $pageLimit]) as $portfolioRow){
					$i++;
					echo '
						<tr id="'.$portfolioRow['portfolio_slug'].'">
							<td>'.$i.'</td>
							<td>'.$portfolioRow['portfolio_title'].'</td>
							<td>'.$portfolioRow['portfolio_category'].'</td>
							<td><a href="#" class="btn btn-sm btn-warning" onclick="editPortfolioItem(\''.$portfolioRow['portfolio_slug'].'\')">'.$lang['t_edit'].'</a>&nbsp;<button class="btn btn-sm btn-danger actionDeletePortfolio" onclick="actionDeletePortfolio(\''.$portfolioRow['portfolio_slug'].'\')">'.$lang['t_remove'].'</button></td>
						</tr>';
					}
					echo '</tbody>
				</table>
			</div>';
			if($totalDataCount > 0){
				echo '<div class="card-footer text-center">';
				if($page > 1){ echo '
					<!-- Previous -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page=1"><i class="fa fa-angle-double-left"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.($page - 1).'"><i class="fa fa-angle-left"></i></a>
					<!-- / Previous -->';
				}
				for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
					if($i > 0 && $i <= $pageNumber){
						if($i == $page){
							echo '<a class="btn btn-primary" href="'.BASE_URL.'panel/portfolio?page='.$i.'">'.$i.'</a>';
						}else{
							echo '<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.$i.'">'.$i.'</a></li>';
						}
					}
				}
				if($page != $pageNumber){
					echo '<!-- Next -->
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.($page + 1).'"><i class="fa fa-angle-right"></i></a>
					<a class="btn btn-light" href="'.BASE_URL.'panel/portfolio?page='.$pageNumber.'"><i class="fa fa-angle-double-right"></i></a>
					<!-- / Next -->';
				}
				echo '</div>';
			}
		echo '</div>
	</div>
</div>';
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">'.$lang['t_new_portfolio'].'</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button></div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepTitle">'.$lang['t_title'].'</label>
							<input type="text" class="form-control" id="mepTitle" placeholder="'.$lang['t_title'].'">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepCategory">'.$lang['t_category'].'</label>
							<select class="form-control" id="mepCategory" placeholder="'.$lang['t_category'].'">'; $dbh->orderBy("category_slug", "ASC"); foreach($dbh->get("category") as $categoryRow){ echo '<option value="'.$categoryRow['category_slug'].'">'.$categoryRow['category_title'].'</option>'; } echo '</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="mepThumbnail">'.$lang['t_thumbnail'].'</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="mepThumbnail">
								<label class="custom-file-label" for="mepThumbnail">'.$lang['t_choose_file'].'</label>
							</div>
						</div>
					</div>
				</div>
				<span id="mepSlug" style="display:none;"></span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">'.$lang['t_cancel'].'</button>
				<button type="button" class="btn btn-success editPortfolio">'.$lang['t_send'].'</button>
			</div>
		</div>
	</div>
</div>
<script>
$(".addPortfolio").click(function(e){
	$(".addPortfolio").attr("disabled", true);
	var formData = new FormData();
    formData.append("mpTitle", $("#mpTitle").val());
	formData.append("mpThumbnail", $("#mpThumbnail").prop("files")[0]);
	formData.append("mpCategory", $("#mpCategory").val());
	formData.append("actionAddPortfolio", "actionAddPortfolio");
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
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists'].'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_add_failed'].'");
				$(".addPortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_add_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
});
function editPortfolioItem(slug){
	var tableRow = document.getElementById(slug);
	$("#mepTitle").val(tableRow.children[1].outerText);
	$("#mepCategory").val(tableRow.children[2].outerText);
	$("#mepSlug").attr("value", slug);
	$("#editPortfolioModal").modal("toggle");
}
$(".editPortfolio").click(function(e){
	$(".editPortfolio").attr("disabled", true);
	var formData = new FormData();
    formData.append("mpTitle", $("#mepTitle").val());
	formData.append("mpThumbnail", $("#mepThumbnail").prop("files")[0]);
	formData.append("mpCategory", $("#mepCategory").val());
	formData.append("mpLastSlug", $("#mepSlug").attr("value"));
    formData.append("actionUpdatePortfolio", "actionUpdatePortfolio");
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
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response)=="exists"){
				notify("error", "'.$lang['msg_exists'].'");
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				$(".editPortfolio").attr("disabled", false);
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
			}else if($.trim(response) == "size"){
				$(".editPortfolio").attr("disabled", false);
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_update_failed'].'");
				$(".editPortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_update_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
});
function actionDeletePortfolio(slug){
	$(".actionDeletePortfolio").attr("disabled", true);
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {slug:slug, actionDeletePortfolio:"actionDeletePortfolio"},
		success: function(response){
			if($.trim(response)=="not_exists"){
				notify("error", "'.$lang['msg_not_exists'].'");
				$(".actionDeletePortfolio").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_portfolio_delete_failed'].'");
				$(".actionDeletePortfolio").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_portfolio_delete_success'].'");
				redirect("'.BASE_URL.'panel/portfolio",1);
			}
		}
	});
}
</script>
';
include("inc-end.php");
?>