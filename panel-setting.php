<?php
include("panel-inc-header.php");
if(empty($_SESSION['session'])){ $oxcakmak->redirect("panel/login"); }
$oxcakmak->wmMetaTitle($lang['m_setting'], ST_META_SPERATOR, ST_META_STUCK);
include("panel-inc-middle.php");
include("panel-inc-sidebar.php");
echo '
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">'.$lang['m_setting'].'</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="'.BASE_URL.'panel">'.$lang['m_panel'].'</a></li>
		<li class="breadcrumb-item active" aria-current="page">'.$lang['m_setting'].'</li>
	</ol>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['t_password_update'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwLast">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwLast" placeholder="'.$lang['t_password'].'">
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwNew">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwNew" placeholder="'.$lang['t_password'].'">
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="uPwReNew">'.$lang['t_password'].'</label>
								<input type="text" class="form-control" id="uPwReNew" placeholder="'.$lang['t_password'].'">
								
							</div>
						</div>
					</div>
					<button class="btn btn-md btn-primary actionUpdatePassword">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_home'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="stTitle">'.$lang['t_title'].'</label>
								<input type="text" class="form-control" id="stTitle" placeholder="'.$lang['t_title'].'" value="'.ST_META_TITLE.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stStuck">'.$lang['t_stuck'].'</label>
								<input type="text" class="form-control" id="stStuck" placeholder="'.$lang['t_stuck'].'" value="'.ST_META_STUCK.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stDescription">'.$lang['t_description'].'</label>
								<textarea type="text" class="form-control" id="stDescription" placeholder="'.$lang['t_description'].'" rows="3">'.ST_META_DESCRIPTION.'</textarea>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stKeyword">'.$lang['t_keywords'].'</label>
								<textarea type="text" class="form-control" id="stKeyword" placeholder="'.$lang['t_keyword'].'" rows="3">'.ST_META_KEYWORD.'</textarea>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemMeta">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_contact'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="stContactAddress">'.$lang['t_location'].'</label>
								<input type="text" class="form-control" id="stContactAddress" placeholder="'.$lang['t_location'].'" value="'.ST_CONTACT_ADDRESS.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stContactPhone">'.$lang['t_phone'].'</label>
								<input type="text" class="form-control" id="stContactPhone" placeholder="'.$lang['t_phone'].'" value="'.ST_CONTACT_PHONE.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stContactEmail">'.$lang['t_email'].'</label>
								<input type="text" class="form-control" id="stContactEmail" placeholder="'.$lang['t_email'].'" value="'.ST_CONTACT_EMAIL.'">
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemContact">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_banner'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="stBannerTitle">'.$lang['t_title'].'</label>
								<input type="text" class="form-control" id="stBannerTitle" placeholder="'.$lang['t_title'].'" value="'.ST_INDEX_SMALL_TITLE.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stBannerSubTitle">'.$lang['t_sub_title'].'</label>
								<input type="text" class="form-control" id="stBannerSubTitle" placeholder="'.$lang['t_sub_title'].'" value="'.ST_INDEX_TYPEWRITER_HEADER.'">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerTypewriterText">'.$lang['t_text'].'</label>
								<input type="text" class="form-control" id="stBannerTypewriterText" placeholder="'.$lang['t_text'].'" value="'.ST_INDEX_TYPEWRITER_TEXT.'">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerParagraph">'.$lang['t_paragraph'].'</label>
								<textarea type="text" class="form-control" id="stBannerParagraph" placeholder="'.$lang['t_paragraph'].'" rows="3">'.ST_INDEX_PARAGRAPH.'</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stBannerBackground">'.$lang['t_thumbnail_background'].'</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="stBannerBackground">
									<label class="custom-file-label" for="stBannerBackground">'.$lang['t_choose_file'].'</label>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemBanner">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['t_particles'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="stParticles">'.$lang['t_particles'].'</label>
								<select class="form-control" id="stParticles" placeholder="'.$lang['t_status'].'">
									<option value="" selected disabled>'.$lang['t_choose'].'</option>
									<!-- <option value="deneme">deneme</option> -->
									<option value="1"'; if(ST_PARTICLE_STATUS==1){echo' selected';} echo '>'.$lang['t_active'].'</option>
									<option value="0"'; if(ST_PARTICLE_STATUS==0){echo' selected';} echo '>'.$lang['t_passive'].'</option>
								</select>
								
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemParticles">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"><h6 class="m-0 font-weight-bold text-primary">'.$lang['m_about_me'].'</h6></div>
			<div class="card-body">
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="stAboutTitle">'.$lang['t_title'].'</label>
								<input type="text" class="form-control" id="stAboutTitle" placeholder="'.$lang['t_title'].'" value="'.ST_ABOUT_TEXT.'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stAboutSpecial">'.$lang['t_title_special'].'</label>
								<input type="text" class="form-control" id="stAboutstAboutSpecial" placeholder="'.$lang['t_title_special'].'" value="'.ST_ABOUT_SPECIAL_TEXT.'">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stAboutDescription">'.$lang['t_description'].'</label>
								<textarea type="text" class="form-control" id="stAboutDescription" placeholder="'.$lang['t_description'].'" rows="3">'.ST_ABOUT_DESCRIPTION.'</textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="stAboutImage">'.$lang['t_thumbnail'].'</label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="stAboutImage">
									<label class="custom-file-label" for="stAboutImage">'.$lang['t_choose_file'].'</label>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-lg btn-primary btn-block actionUpdateSystemAbout">'.$lang['t_update'].'</button>
				</form>
			</div>
		</div>
	</div>
</div>';
include("panel-inc-footer.php");
include("panel-inc-script.php");
echo '
<script>
$(".actionUpdatePassword").click(function(e){
	$(".actionUpdatePassword").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {pwLast: $("#uPwLast").val(), pwNew: $("#st").val(), pwReNew: $("#uPwReNew").val(), actionUpdatePassword:"actionUpdatePassword"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "not_equal_last"){
				notify("error", "'.$lang['msg_not_equal'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "not_equal_new"){
				notify("error", "'.$lang['msg_not_equal'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_password_update_failed'].'");
				$(".actionUpdatePassword").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#uPwLast").val("");
				$("#st").val("");
				$("#uPwReNew").val("");
				notify("success", "'.$lang['msg_password_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
$(".actionUpdateSystemMeta").click(function(e){
	$(".actionUpdateSystemMeta").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {stTitle: $("#stTitle").val(), stDescription: $("#stDescription").val(), stKeyword: $("#stKeyword").val(), stStuck: $("#stStuck").val(), actionUpdateSystemMeta:"actionUpdateSystem"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".actionUpdateSystemMeta").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemMeta").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stTitle").val("");
				$("#stDescription").val("");
				$("#stKeyword").val("");
				$("#stStuck").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
$(".actionUpdateSystemContact").click(function(e){
	$(".actionUpdateSystemContact").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {stContactAddress: $("#stContactAddress").val(), stContactEmail: $("#stContactEmail").val(), stContactPhone: $("#stContactPhone").val(), actionUpdateSystemContact:"actionUpdateSystemContact"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".actionUpdateSystemContact").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemContact").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stContactAddress").val("");
				$("#stContactEmail").val("");
				$("#stContactPhone").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
$(".actionUpdateSystemBanner").click(function(e){
	$(".actionUpdateSystemBanner").attr("disabled", true);
	var formData = new FormData();
    formData.append("stBannerTitle", $("#stBannerTitle").val());
	formData.append("stBannerSubTitle", $("#stBannerSubTitle").val());
	formData.append("stBannerTypewriterText", $("#stBannerTypewriterText").val());
	formData.append("stBannerParagraph", $("#stBannerParagraph").val());
	formData.append("stBannerBackground", $("#stBannerBackground").prop("files")[0]);
    formData.append("actionUpdateSystemBanner", "actionUpdateSystemBanner");
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
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemBanner").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});

$(".actionUpdateSystemAbout").click(function(e){
	$(".actionUpdateSystemAbout").attr("disabled", true);
	var formData = new FormData();
    formData.append("stAboutTitle", $("#stAboutTitle").val());
	formData.append("stAboutSpecial", $("#stAboutSpecial").val());
	formData.append("stAboutDescription", $("#stAboutDescription").val());
	formData.append("stAboutImage", $("#stAboutImage").prop("files")[0]);
    formData.append("actionUpdateSystemAbout", "actionUpdateSystemAbout");
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
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response) == "extension"){
				notify("error", "'.str_replace("%extension%", "JPG, JPEG, PNG", $lang['msg_upload_file_extension']).'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response) == "size"){
				notify("error", "'.str_replace("%size%", "5", $lang['msg_upload_file_size']).'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response)=="failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemAbout").attr("disabled", false);
			}else if($.trim(response)=="success"){
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
$(".actionUpdateSystemParticles").click(function(e){
	$(".actionUpdateSystemParticles").attr("disabled", true);
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: "'.POST_URL.'",
		data: {stParticles: $("#stParticles").val(), actionUpdateSystemParticles:"actionUpdateSystemParticles"},
		success: function(response){
			if($.trim(response) == "empty"){
				notify("error", "'.$lang['msg_empty'].'");
				$(".actionUpdateSystemParticles").attr("disabled", false);
			}else if($.trim(response) == "failed"){
				notify("error", "'.$lang['msg_system_update_failed'].'");
				$(".actionUpdateSystemParticles").attr("disabled", false);
			}else if($.trim(response) == "success"){
				$("#stParticles").val("");
				notify("success", "'.$lang['msg_system_update_success'].'");
				redirect("'.BASE_URL.'panel/setting",1);
			}
		}
	});
});
</script>';
include("inc-end.php");
?>