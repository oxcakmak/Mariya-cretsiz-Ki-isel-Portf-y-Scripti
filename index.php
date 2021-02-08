<?php require_once("config.php"); echo '
<!DOCTYPE html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300i,400,400i,500,600,700,800&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800&display=swap" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/bootstrap.min.css" >	
		<!--Favicon for this site -->
		<link rel="icon" href="'.BASE_URL.'assets/index/img/favicon.jpg">		
		<!-- Fonts -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'fonts/font-awesome.min.css">
		<!-- Icon -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'fonts/simple-line-icons.css">
		<!-- Slicknav -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/slicknav.css">
		<!-- Owl-carousel -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/owl.theme.default.min.css">
		<!-- Nivo Lightbox -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/nivo-lightbox.css" >
		<!-- Text-animated -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/animated-headline.css" >
		<!-- Normalize -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/normalize.css">
		<!-- Animate -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/animate.css">
		<!-- Main Style -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/main.css">
		<!-- Responsive Style -->
		<link rel="stylesheet" type="text/css" href="'.INDEX_ASSETS_URL.'css/responsive.css">
		<!-- Notyf Style -->
		<link href="'.PANEL_ASSETS_URL.'vendor/notyf/notyf.min.css" rel="stylesheet" type="text/css">				
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->';
		$oxcakmak->wmMetaTitle(ST_META_TITLE, "-", ST_META_STUCK);
		$oxcakmak->wmMetaDescription(ST_META_DESCRIPTION);
		$oxcakmak->wmMetaKeyword(ST_META_KEYWORD);
		$oxcakmak->wmMetaAuthor(strtolower(ST_META_KEYWORD));
		$oxcakmak->wmOpenGraph(ST_META_TITLE."-".ST_META_STUCK, BASE_URL, BASE_URL.'assets/index/img/favicon.jpg', ST_META_DESCRIPTION);
	echo '</head>
  
	<body data-spy="scroll" data-offset="80">		
		<!-- START NAVBAR -->
		  <nav class="navbar navbar-toggleable-sm fixed-top navbar-light bg-faded site-navigation" style="z-index:2;">
			<div class="container">
			  <a class="navbar-brand" href="index.html"><p>'.ST_META_STUCK.'</p></a>          
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
				<ul class="navbar-nav">
				  <li class="nav-item"><a class="nav-link" href="#home">'.$lang['m_home'].'</a></li>
				  <li class="nav-item"><a class="nav-link" href="#about">'.$lang['m_about_me'].'</a></li>
				  <li class="nav-item"><a class="nav-link" href="#services">'.$lang['m_services_me'].'</a></li>				
				  <li class="nav-item"><a class="nav-link" href="#portfolio">'.$lang['m_portfolio'].'</a></li>
				  <li class="nav-item"><a class="nav-link" href="#resume">'.$lang['m_resume_my'].'</a></li>			
				  <!-- <li class="nav-item"><a class="nav-link" href="#blog">'.$lang['m_home'].'</a></li> -->		
				  <li class="nav-item"><a class="nav-link" href="#contact">'.$lang['m_contact'].'</a></li>
				</ul>
			  </div>
			</div>
		  </nav>      
		<!-- END NAVBAR -->
		
		<!-- Hero Area Start -->
		<section id="home" class="gray_bg">'; if(ST_PARTICLE_STATUS==1){ echo '<div id="particles-js"></div>'; } echo '
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="banner_content">
							<h3>'.ST_INDEX_SMALL_TITLE.'</h3>
							<h1 class="cd-headline clip script-font"><span class="fw_600">'.ST_INDEX_TYPEWRITER_HEADER.'</span>&nbsp;<span class="cd-words-wrapper"><b class="is-visible fw_600">'.ST_INDEX_TYPEWRITER_TEXT.'</b>'; $dbh->orderBy("banner_slug", "ASC");  foreach($dbh->get("banner") as $bannerRow){ echo '<b class="fw_600">'.$bannerRow['banner_text'].'</b>'; } echo '</span></h1>
							<p>'.ST_INDEX_PARAGRAPH.'</p>
							<!-- <a href="#" class="btn btn-secondary banner_btn">Contact Me</a> -->
						</div>
					</div>
					<div class="col-lg-4 col-md-4"><div class="banner-images"><img src="'.BASE_URL.ST_BANNER.'" alt=""/></div></div>
				</div>
			</div>
			
		</section>
		<!-- Hero Area End -->
		
		<!-- About Section Start -->
        <section id="about" class="gray_bg section-padding about-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12"><div class="about-image"><img src="'.BASE_URL.ST_ABOUT_IMAGE.'" alt="'.ST_META_TITLE."-".ST_META_KEYWORD.'"></div></div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <h3>'.ST_ABOUT_TEXT.'&nbsp;<span>'.ST_ABOUT_SPECIAL_TEXT.'</span></h3>
                            <p>'.ST_ABOUT_DESCRIPTION.'</p>
							<!--
                            <div class="about-profile">
								<ul class="admin-profile">
								  <li><span class="pro-title">'.$lang['t_fullname'].'</span><span class="pro-detail">'.ST_META_STUCK.'</span></li>
								  <li><span class="pro-title">'.$lang['t_age'].'</span> <span class="pro-detail">'.ST_META_STUCK.'</span></li>
								  <li><span class="pro-title">'.$lang['t_address'].'</span> <span class="pro-detail">'.ST_META_STUCK.'</span></li>
								  <li><span class="pro-title">'.$lang['t_phone'].'</span> <span class="pro-detail">'.ST_META_STUCK.'</span></li>
								  <li><span class="pro-title">'.$lang['t_email'].'</span> <span class="pro-detail">'.ST_META_STUCK.'</span></li>					
								  <li><span class="pro-title">'.$lang['t_status'].'</span> <span class="pro-detail">'.ST_META_STUCK.'</span></li>
								</ul>
							</div>
							<a href="#" class="btn btn-secondary about_btn">Download Cv</a>
							-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->        

		<!-- Services Section Start -->
		<section id="services" class="gray_bg services section-padding">
			<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_services_me'].'</span></h2>
			<div class="container">
				<div class="row">'; $dbh->orderBy("service_id", "DESC"); foreach($dbh->get("service") as $serviceRow){ echo '
					<div class="col-lg-4 col-md-6 col-xs-12">
						<div class="services-item wow fadeInDown" data-wow-delay="0.3s">
							<div class="icon"><img src="'.$serviceRow['service_thumbnail'].'"></div>
							<div class="services-content">
								<h3><a href="#">'.$serviceRow['service_title'].'</a></h3>
								<p>'.$serviceRow['service_description'].'</p>
							</div>
						</div>
					</div>'; } echo '
				</div>
			</div>
		</section>
		<!-- Services Section End -->

		<!-- Portfolio Section -->
		<section id="portfolio" class="gray_bg section-padding">
		  <!-- Container Starts -->
		    <div class="container">        
				<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_portfolio'].'</span></h2>
				<div class="row">          
					<div class="col-md-12"><div class="controls text-center"><a class="filter active btn btn-common" data-filter="all">'.$lang['t_all'].'</a>'; $dbh->orderBy("category_slug", "ASC"); foreach($dbh->get("category") as $categoryRow){ echo '<a class="filter btn btn-common" data-filter=".'.$categoryRow['category_slug'].'">'.$categoryRow['category_title'].'</a>'; } echo '</div></div>
					<div id="portfolio" class="row">'; $dbh->orderBy("portfolio_id", "DESC"); foreach($dbh->get("portfolio") as $portfolioRow){ echo '
						<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix development">
							<div class="portfolio-item">
								<div class="shot-item">
									<img src="'.BASE_URL.$portfolioRow['portfolio_thumbnail'].'" alt="'.$portfolioRow['portfolio_title'].'" /> 
									<div class="overlay"><div class="icons"><a class="lightbox preview" href="'.$portfolioRow['portfolio_thumbnail'].'"><i class="icon-eye"></i></a><!-- <a class="link" href="#"><i class="icon-link"></i></a> --></div></div>
								</div>               
							</div>
						</div>'; } echo '
					</div>	
				</div>	
		    </div>
		  <!-- Container Ends -->
		</section>
		<!-- Portfolio Section Ends --> 
		
		<!-- Funfacts Section Start -->
        <section class="gray_bg funfacts-area pb_80 ">
            <div class="container">
				<div class="row">'; $dbh->orderBy("counter_id", "DESC"); foreach($dbh->get("counter") as $counterRow){ echo '
                    <div class="col-lg-3 col-md-3">
                        <div class="funfact">
                            <h3><span class="counterUp">'.$counterRow['counter_number'].'</span></h3>
                            <p>'.$counterRow['counter_title'].'</p>
                        </div>
					</div>'; } echo '
                </div>
            </div>
        </section>
        <!-- Funfacts Section End -->
		
		<!-- Resume Section Start -->
		<section id="resume" class="gray_bg section-padding">
			<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_resume_my'].'</span></h2>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6  col-xs-12">
						<div class="block">
							<div class="block-title"><h3>'.$lang['t_education'].'</h3></div>   
							<div class="timeline">'; $dbh->where("resume_type", "education"); $dbh->orderBy("resume_id", "DESC"); foreach($dbh->get("resume") as $resEduRow){ echo '
								<div class="timeline-item">
									<h4 class="item-title">'.$resEduRow['resume_title'].'</h4>
									<span class="item-period">'.$resEduRow['resume_year'].'</span>
									<span class="item-small">'.$resEduRow['resume_subtitle'].'</span>
									<p class="item-description">'.$resEduRow['resume_description'].'</p>
								</div>'; } echo '
							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6  col-xs-12">
						<div class="block">
							<div class="block-title"><h3>'.$lang['t_experience'].'</h3></div>
							<div class="timeline">'; $dbh->where("resume_type", "experience"); $dbh->orderBy("resume_id", "DESC"); foreach($dbh->get("resume") as $resEduRow){ echo '
								<div class="timeline-item">
									<h4 class="item-title">'.$resEduRow['resume_title'].'</h4>
									<span class="item-period">'.$resEduRow['resume_year'].'</span>
									<span class="item-small">'.$resEduRow['resume_subtitle'].'</span>
									<p class="item-description">'.$resEduRow['resume_description'].'</p>
								</div>'; } echo '
							</div>
						</div>
					</div>
				</div>
            </div>
		</section>
		<!-- Resume Section End -->
		
		
		<!-- Testimonial Area Start-->
			<section class="gray_bg testimony-section section-padding">
				<div class="container">
				<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_testimonials'].'</span></h2>    
					<div class="row">
						<div class="col-lg-12">
							<div class="carousel-testimony owl-carousel">'; $dbh->orderBy("testimonial_id", "DESC");
								foreach($dbh->get("testimonial") as $testimonialRow){ echo '
								<div class="testimonial text-center">
									<div class="qote"><i class="fa fa-quote-left"></i></div>
									<div class="pic"><img src="'.BASE_URL.$testimonialRow['testimonial_picture'].'" alt="'.$testimonialRow['testimonial_fullname'].'"></div>
									<p class="description">'.$testimonialRow['testimonial_content'].'</p>
									<h4 class="name">'.$testimonialRow['testimonial_fullname'].'</h4>
									<span class="position">'.$testimonialRow['testimonial_job'].'</span>
								</div>'; } echo '
							</div>
						</div>
					</div>
				</div>
			</section>
		<!-- Testimonial Area End-->
		
		<!-- START BLOG 
		<div id="blog" class="gray_bg blog-area section-padding">
			<h2 class="section-title wow flipInX" data-wow-delay="0.4s">My <span>Blog</span></h2>
			<div class="container">
				<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_testimonials'].'</span></h2>    
				<div class="row">
					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="single_blog wow fadeInLeft">
							<div class="blog-thumb">
								<div class="blog-image"><a href="#"><img src="ssss" class="img-responsive" alt="" ></a></div>
								<div class="blog-info">
									<a href="#"><h4>Our Marketing Website</h4></a>
									<small><i class="fa fa-clock-o"></i>March 31, 2020</small>
									<span>| lifestyle</span>											
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim eveniet incidunt quidem illum repellat</p>
									<a href="#" class="btn blog_btn btn-secondary">Read More</a>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		END BLOG -->

		<!-- Contact Section Start -->
		<section id="contact" class="gray_bg section-padding">      
		    <div class="contact-form">
				<div class="container">
					<h2 class="section-title wow flipInX" data-wow-delay="0.4s"><span>'.$lang['m_contact'].'</span></h2>      
					<div class="row contact-form-area">   						
						<div class="col-md-6 col-lg-6 col-sm-12">
						    <div class="footer-right-area wow fadeIn">
								<h4>'.$lang['t_contact_info'].'</h4>
								<div class="footer-right-contact">
								    <div class="single-contact"><div class="contact-icon"><i class="fa fa-map-marker"></i></div><p>'.ST_CONTACT_ADDRESS.'</p></div>
								    <div class="single-contact"><div class="contact-icon"><i class="fa fa-envelope"></i></div><p><a href="#">'.ST_CONTACT_EMAIL.'</a></p></div>
								    <div class="single-contact"><div class="contact-icon"><i class="fa fa-phone"></i></div><p><a href="#">'.ST_CONTACT_PHONE.'</a></p></div>
								</div>								
							</div>	
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12">
							<div class="contact_form">
								<div class="contact_input_area">
									<div id="success_fail_info"></div>
									<div class="row">
										<div class="col-12"><div class="form-group"><input type="text" class="form-control mb-30" name="name" id="name" placeholder="'.$lang['t_fullname'].'" required></div></div>
										<div class="col-12 col-lg-6"><div class="form-group"><input type="email" class="form-control mb-30" name="email" id="email" placeholder="'.$lang['t_email'].'" required></div></div>
										<div class="col-12 col-lg-6"><div class="form-group"><input type="text" class="form-control mb-30" name="subject" id="subject" placeholder="'.$lang['t_subject'].'"></div></div>
										<div class="col-12"><div class="form-group"><textarea name="message" class="form-control mb-30" id="message" cols="30" rows="6" placeholder="'.$lang['t_message'].'" required></textarea></div></div>
										<div class="col-12 text-center"><button type="submit" class="btn btn-secondary ct_btn">'.$lang['t_send'].'</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>   
		</section>
		<!-- Contact Section End -->

		<!-- Footer Section Start -->
		<footer class="footer-area"><div class="container"><div class="row"><div class="col-lg-12"><div class="footer-text text-center wow fadeInDown" data-wow-delay="0.3s"><p>Copyright &copy; '.date("Y").' Mariya | All Rights Reserved</p></div></div></div></div></footer>
		<!-- Footer Section End -->

		<!-- Go to Top Link -->
		<a href="#" class="back-to-top"><i class="icon-arrow-up"></i></a>
		<!-- Go to Top Link -->

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="'.INDEX_ASSETS_URL.'js/jquery-min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/popper.min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/bootstrap.min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/modernizr-2.8.3.min.js"></script>'; if(ST_PARTICLE_STATUS==1){ echo '<script src="'.INDEX_ASSETS_URL.'js/particles.min.js"></script>'; } echo '
		<script src="'.INDEX_ASSETS_URL.'js/app.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/jquery.nav.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/smooth-scroll.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/owl.carousel.min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/jquery.mixitup.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/animated-headline.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/jquery.counterup.min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/waypoints.min.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/wow.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/jquery.easing.min.js"></script>  
		<script src="'.INDEX_ASSETS_URL.'js/nivo-lightbox.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/form-contact.js"></script>
		<script src="'.INDEX_ASSETS_URL.'js/main.js"></script>
		<script src="'.PANEL_ASSETS_URL.'vendor/notyf/notyf.min.js"></script>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script>
			var notyf = new Notyf({
				duration: 2500,
				position: {
					x: "right",
					y: "top",
				}
			});
			function notify(nType, nMessage){
				notyf.open({
					type: nType,
					message: nMessage
				});
			}
			function redirect(address, time){
				setInterval(function(){
					window.location.href=address;
				},time*1000);
			}
			$(".ct_btn").click(function(e){
				e.preventDefault();
				$(".ct_btn").attr("disabled", true);
				$(".ct_btn").text("'.$lang['t_please_wait'].'");
				$.ajax({
					type: "POST",
					url: "'.POST_URL.'",
					data: {name:$("#name").val(), email:$("#email").val(), subject:$("#subject").val(), message:$("#message").val(), actionContact:"actionContact"},
					success: function(response){
						if($.trim(response) == "empty"){
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("error", "'.$lang['msg_error'].'");
						}else if($.trim(response) == "not_supported_email"){
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("error", "'.$lang['msg_not_supported_email'].'");
						}else if($.trim(response) == "exists"){
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("error", "'.$lang['msg_exists'].'");
						}else if($.trim(response) == "failed"){
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("error", "'.$lang['msg_error'].'");
						}else if($.trim(response) == "success"){
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("success", "'.$lang['msg_contact_add_success'].'");
							$("#name").val("");
							$("#email").val("");
							$("#subject").val("");
							$("#message").val("");
							redirect("'.BASE_URL.'", 2);
						}else{
							$(".ct_btn").attr("disabled", false);
							$(".ct_btn").text("'.$lang['t_send'].'");
							notify("error", "'.$lang['msg_error'].'");
						}
					}
				});
			});
		</script>
	</body>
</html>'; ?>