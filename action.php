<?php require_once("config.php");

if(isset($_SESSION['session'])){ 
    if(DEMO_MODE==0){
        /* Action Add Counter */
        if(isset($_POST['actionAddCounter'])){
            $counterTitle = $oxcakmak->cleanString($_POST['cTitle']);
            $counterNumber = $oxcakmak->cleanString($_POST['cValue']);
            $counterSlug = $oxcakmak->slugify($counterTitle);
            if(empty($counterTitle) || empty($counterNumber)){
                echo "empty";
            }else{
                $dbh->where("counter_slug", $counterSlug);
                if($dbh->has("counter")){
                    echo "exist";
                }else{
                    $iCounterData = [
                        'counter_slug' => $counterSlug,
                        'counter_number' => $counterNumber,
                        'counter_title' => $counterTitle
                    ];
                    if($dbh->insert("counter", $iCounterData)){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }
            }
        }

        /* Action Delete Counter */
        if(isset($_POST['actionDeleteCounter'])){
            $counterSlug = $oxcakmak->cleanString($_POST['counterSlug']);
            $dbh->where("counter_slug", $counterSlug);
            if($dbh->has("counter")){
                $dbh->where("counter_slug", $counterSlug);
                if($dbh->delete("counter")){
                    echo "success";
                }else{
                    echo "failed";
                }
            }else{
                echo "not_exist";
            }
        }

        /* Action Delete Contact */
        if(isset($_POST['actionDeleteContact'])){
            $contactHash = $oxcakmak->cleanString($_POST['contactHash']);
            $dbh->where("contact_hash", $contactHash);
            if($dbh->has("contact")){
                $dbh->where('contact_hash', $contactHash);
                if($dbh->delete('contact')){
                    echo "success";
                }else{ 
                    echo 'failed';
                }
            }else{
                echo "not_exists";
            }
        }

        /* Action Add Banner */
        if(isset($_POST['actionAddBanner'])){
            $bannerText = $oxcakmak->cleanString($_POST['bannerText']);
            $bannerHash = $oxcakmak->specificHash($bannerText);
            if(empty($bannerText)){
                echo "empty";
            }else{
                $dbh->where("banner_slug", $bannerHash);
                if($dbh->has("banner")){
                    echo "exists";
                }else{
                    $iBannerData = [
                        'banner_slug' => $bannerHash,
                        'banner_text' => $bannerText
                    ];
                    if($dbh->insert('banner', $iBannerData)){
                        echo "success";
                    }else{ 
                        echo 'failed';
                    }
                }
            }
        }
        
        /* Action Delete Banner */
        if(isset($_POST['actionDeleteBanner'])){
            $bannerHash = $oxcakmak->cleanString($_POST['bannerHash']);
            $dbh->where("banner_slug", $bannerHash);
            if($dbh->has("banner")){
                $dbh->where('banner_slug', $bannerHash);
                if($dbh->delete('banner')){
                    echo "success";
                }else{ 
                    echo 'failed';
                }
            }else{
                echo "not_exists";
            }
        }

        /* Action Add Testimonial */
        if(isset($_POST['actionAddTestimonial'])){
            $testimonialFullname = $oxcakmak->cleanString($_POST['mtFullname']);
            $testimonialJob = $oxcakmak->cleanString($_POST['mtJob']);
            $testimonialContent = $oxcakmak->cleanString($_POST['mtContent']);
            $testimonialHash = $oxcakmak->specificHash($testimonialFullname);
            $fileName = @$_FILES['mtPicture']['name'];
            $fileSize = @$_FILES['mtPicture']['size'];
            $fileTmpName = @$_FILES['mtPicture']['tmp_name'];
            $fileType = @$_FILES['mtPicture']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."testimonial_".$fileNameEncoded;
            if(empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialContent)){
                echo "empty";
            }else{
                $dbh->where("testimonial_hash", $testimonialHash);
                if($dbh->has("testimonial")){
                    echo "exists";
                }else{
                    if(isset($_FILES['mtPicture'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $iTestimonialData = [
                                    'testimonial_hash' => $testimonialHash,
                                    'testimonial_picture' => $uploadPath,
                                    'testimonial_fullname' => $testimonialFullname,
                                    'testimonial_job' => $testimonialJob,
                                    'testimonial_content' => $testimonialContent
                                ];
                                if($dbh->insert("testimonial", $iTestimonialData)){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $iTestimonialData = [
                            'testimonial_hash' => $testimonialHash,
                            'testimonial_fullname' => $testimonialFullname,
                            'testimonial_job' => $testimonialJob,
                            'testimonial_content' => $testimonialContent
                        ];
                        if($dbh->insert("testimonial", $iTestimonialData)){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }
            }
        }
        
        /* Action Update Testimonial */
        if(isset($_POST['actionUpdateTestimonial'])){
            $testimonialFullname = $oxcakmak->cleanString($_POST['mtFullname']);
            $testimonialJob = $oxcakmak->cleanString($_POST['mtJob']);
            $testimonialContent = $oxcakmak->cleanString($_POST['mtContent']);
            $testimonialLastHash = $oxcakmak->cleanString($_POST['mtLastHash']);
            $testimonialHash = $oxcakmak->specificHash($testimonialFullname);
            $fileName = @$_FILES['mtPicture']['name'];
            $fileSize = @$_FILES['mtPicture']['size'];
            $fileTmpName = @$_FILES['mtPicture']['tmp_name'];
            $fileType = @$_FILES['mtPicture']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."testimonial_".$fileNameEncoded;
            if(empty($testimonialFullname) || empty($testimonialJob) || empty($testimonialContent)){
                echo "empty";
            }else{
                $dbh->where("testimonial_hash", $testimonialLastHash);
                if($dbh->has("testimonial")){
                    if(isset($_FILES['mtPicture'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $uTestimonialData = [
                                    'testimonial_hash' => $testimonialHash,
                                    'testimonial_picture' => $uploadPath,
                                    'testimonial_fullname' => $testimonialFullname,
                                    'testimonial_job' => $testimonialJob,
                                    'testimonial_content' => $testimonialContent
                                ];
                                $dbh->where("testimonial_hash", $testimonialLastHash);
                                if($dbh->update("testimonial", $uTestimonialData)){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $uTestimonialData = [
                            'testimonial_hash' => $testimonialHash,
                            'testimonial_fullname' => $testimonialFullname,
                            'testimonial_job' => $testimonialJob,
                            'testimonial_content' => $testimonialContent
                        ];
                        $dbh->where("testimonial_hash", $testimonialLastHash);
                        if($dbh->update("testimonial", $uTestimonialData)){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }else{
                    echo "not_exists";
                }
            }
        }
        
        /* Action Delete Testimonial */
        if(isset($_POST['actionDeleteTestimonial'])){
            $slug = $oxcakmak->cleanString($_POST['hash']);
            $dbh->where("testimonial_hash", $slug);
            if($dbh->has("testimonial")){
                $dbh->where('testimonial_hash', $slug);
                if($dbh->delete('testimonial')){
                    echo "success";
                }else{ 
                    echo 'failed';
                }
            }else{
                echo "not_exists";
            }
        }

        /* Action Add Portfolio */
        if(isset($_POST['actionAddPortfolio'])){
            $portfolioTitle = $oxcakmak->cleanString($_POST['mpTitle']);
            $portfolioCategory = $oxcakmak->cleanString($_POST['mpCategory']);
            $portfolioSlug = $oxcakmak->slugify($portfolioTitle);
            $fileName = @$_FILES['mpThumbnail']['name'];
            $fileSize = @$_FILES['mpThumbnail']['size'];
            $fileTmpName = @$_FILES['mpThumbnail']['tmp_name'];
            $fileType = @$_FILES['mpThumbnail']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."portfolio_".$fileNameEncoded;
            if(empty($portfolioTitle)){
                echo "empty";
            }else{
                $dbh->where("portfolio_slug", $portfolioSlug);
                if($dbh->has("portfolio")){
                    echo "exists";
                }else{
                    if(isset($_FILES['mpThumbnail'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $iPortfolioData = [
                                    'portfolio_slug' => $portfolioSlug,
                                    'portfolio_thumbnail' => $uploadPath,
                                    'portfolio_title' => $portfolioTitle,
                                    'portfolio_category' => $portfolioCategory
                                ];
                                $insertPortfolio = $dbh->insert("portfolio", $iPortfolioData);
                                if($insertPortfolio){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $iPortfolioData = [
                            'portfolio_slug' => $portfolioSlug,
                            'portfolio_title' => $portfolioTitle,
                            'portfolio_category' => $portfolioCategory
                        ];
                        $insertPortfolio = $dbh->insert("portfolio", $iPortfolioData);
                        if($insertPortfolio){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }
            }
        }
        
        /* Action Update Portfolio */
        if(isset($_POST['actionUpdatePortfolio'])){
            $portfolioTitle = $oxcakmak->cleanString($_POST['mpTitle']);
            $portfolioCategory = $oxcakmak->cleanString($_POST['mpCategory']);
            $portfolioLastSlug = $oxcakmak->cleanString($_POST['mpLastSlug']);
            $portfolioSlug = $oxcakmak->slugify($portfolioTitle);
            $fileName = @$_FILES['mpThumbnail']['name'];
            $fileSize = @$_FILES['mpThumbnail']['size'];
            $fileTmpName = @$_FILES['mpThumbnail']['tmp_name'];
            $fileType = @$_FILES['mpThumbnail']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."portfolio_".$fileNameEncoded;
            if(empty($portfolioTitle)){
                echo "empty";
            }else{
                $dbh->where("portfolio_slug", $portfolioLastSlug);
                if($dbh->has("portfolio")){
                    if(isset($_FILES['portfolioThumbnail'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $uPortfolioData = [
                                    'portfolio_slug' => $portfolioSlug,
                                    'portfolio_thumbnail' => $uploadPath,
                                    'portfolio_title' => $portfolioTitle,
                                    'portfolio_category' => $portfolioCategory
                                ];
                                $dbh->where("portfolio_slug", $portfolioLastSlug);
                                if($dbh->update("portfolio", $uPortfolioData)){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $uPortfolioData = [
                            'portfolio_slug' => $portfolioSlug,
                            'portfolio_title' => $portfolioTitle,
                            'portfolio_category' => $portfolioCategory
                        ];
                        $dbh->where("portfolio_slug", $portfolioLastSlug);
                        if($dbh->update("portfolio", $uPortfolioData)){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }else{
                    echo "not_exists";
                }
            }
        }
        
        /* Action Delete Portfolio */
        if(isset($_POST['actionDeletePortfolio'])){
            $slug = $oxcakmak->cleanString($_POST['slug']);
            $dbh->where("portfolio_slug", $slug);
            if($dbh->has("portfolio")){
                $dbh->where('portfolio_slug', $slug);
                if($dbh->delete('portfolio')){
                    echo "success";
                }else{ 
                    echo 'failed';
                }
            }else{
                echo "not_exists";
            }
        }

        /* Action Add Service */
        if(isset($_POST['actionAddService'])){
            $serviceTitle = $oxcakmak->cleanString($_POST['msFullname']);
            $serviceContent = $oxcakmak->cleanString($_POST['msContent']);
            $serviceHash = $oxcakmak->specificHash($serviceTitle);
            $fileName = @$_FILES['msPicture']['name'];
            $fileSize = @$_FILES['msPicture']['size'];
            $fileTmpName = @$_FILES['msPicture']['tmp_name'];
            $fileType = @$_FILES['msPicture']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."service_".$fileNameEncoded;
            if(empty($serviceTitle) || empty($serviceContent)){
                echo "empty";
            }else{
                $dbh->where("service_slug", $serviceHash);
                if($dbh->has("service")){
                    echo "exists";
                }else{
                    if(isset($_FILES['msPicture'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $iServiceData = [
                                    'service_slug' => $serviceHash,
                                    'service_thumbnail' => $uploadPath,
                                    'service_title' => $serviceTitle,
                                    'service_description' => $serviceContent
                                ];
                                if($dbh->insert("service", $iServiceData)){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $iServiceData = [
                            'service_slug' => $serviceHash,
                            'service_title' => $serviceTitle,
                            'service_description' => $serviceContent
                        ];
                        if($dbh->insert("service", $iServiceData)){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }
            }
        }
        
        /* Action Update Service */
        if(isset($_POST['actionUpdateService'])){
            $serviceTitle = $oxcakmak->cleanString($_POST['msFullname']);
            $serviceContent = $oxcakmak->cleanString($_POST['msContent']);
            $serviceLastHash = $oxcakmak->cleanString($_POST['msLastHash']);
            $serviceHash = $oxcakmak->specificHash($serviceTitle);
            $fileName = @$_FILES['msPicture']['name'];
            $fileSize = @$_FILES['msPicture']['size'];
            $fileTmpName = @$_FILES['msPicture']['tmp_name'];
            $fileType = @$_FILES['msPicture']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."service_".$fileNameEncoded;
            if(empty($serviceTitle) || empty($serviceContent)){
                echo "empty";
            }else{
                $dbh->where("service_slug", $serviceLastHash);
                if($dbh->has("service")){
                    if(isset($_FILES['msPicture'])){
                        if (!in_array($fileExtension,$fileExtensions)){
                            echo "extension";
                        }else{
                            if ($fileSize > 5000000){
                                echo "size";
                            }else{
                                move_uploaded_file($fileTmpName, $uploadPath);
                                $uServiceData = [
                                    'service_slug' => $serviceHash,
                                    'service_thumbnail' => $uploadPath,
                                    'service_title' => $serviceTitle,
                                    'service_description' => $serviceContent
                                ];
                                $dbh->where("service_slug", $serviceLastHash);
                                if($dbh->update("service", $uServiceData)){
                                    echo "success";
                                }else{
                                    echo "failed";
                                }
                            }
                        }
                    }else{
                        $uServiceData = [
                            'service_slug' => $serviceHash,
                            'service_title' => $serviceTitle,
                            'service_description' => $serviceContent
                        ];
                        $dbh->where("service_slug", $serviceLastHash);
                        if($dbh->update("service", $uServiceData)){
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                }else{
                    echo "not_exists";
                }
            }
        }
        
        /* Action Delete Service */
        if(isset($_POST['actionDeleteService'])){
            $slug = $oxcakmak->cleanString($_POST['hash']);
            $dbh->where("service_slug", $slug);
            if($dbh->has("service")){
                $dbh->where('service_slug', $slug);
                if($dbh->delete('service')){
                    echo "success";
                }else{ 
                    echo 'failed';
                }
            }else{
                echo "not_exists";
            }
        }

        /* Action Update System Pre */
        if(isset($_POST['actionUpdateSystemParticles'])){
            $stParticles = $oxcakmak->cleanString($_POST['stParticles']);
            if(isset($stParticles)){
                echo $stParticles;
                if($dbh->update('setting', ['setting_particle_status' => $stParticles])){
                    echo "success";
                }else{
                    echo "failed";
                }
            }else{
                echo "empty"; 
            }
        }

        /* Action Update System Contact */
        if(isset($_POST['actionUpdateSystemContact'])){
            $stContactAddress = $oxcakmak->cleanString($_POST['stContactAddress']);
            $stContactPhone = $oxcakmak->cleanString($_POST['stContactPhone']);
            $stContactEmail = $oxcakmak->cleanString($_POST['stContactEmail']);
            if(empty($stContactAddress) || empty($stContactPhone) || empty($stContactEmail)){
                echo "empty";
            }else{
                $updateSystemData = [
                    'setting_contact_address' => $stContactAddress,
                    'setting_contact_email' => $stContactEmail,
                    'setting_contact_phone' => $stContactPhone
                    
                ];
                if($dbh->update('setting', $updateSystemData)){
                    echo "success";
                }else{
                    echo "failed";
                }
            }
        }
        
        /* Action Update System Banner */
        if(isset($_POST['actionUpdateSystemBanner'])){
            $stBannerTitle = $oxcakmak->cleanString($_POST['stBannerTitle']);
            $stBannerSubTitle = $oxcakmak->cleanString($_POST['stBannerSubTitle']);
            $stBannerTypewriterText = $oxcakmak->cleanString($_POST['stBannerTypewriterText']);
            $stBannerParagraph = $oxcakmak->cleanString($_POST['stBannerParagraph']);
            $fileName = @$_FILES['stBannerBackground']['name'];
            $fileSize = @$_FILES['stBannerBackground']['size'];
            $fileTmpName = @$_FILES['stBannerBackground']['tmp_name'];
            $fileType = @$_FILES['stBannerBackground']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."banner_".$fileNameEncoded;
            if(empty($stBannerTitle) || empty($stBannerSubTitle) || empty($stBannerTypewriterText) || empty($stBannerParagraph)){
                echo "empty";
            }else{
                if(isset($_FILES['stBannerBackground'])){
                    if (!in_array($fileExtension,$fileExtensions)){
                        echo "extension";
                    }else{
                        if ($fileSize > 5000000){
                            echo "size";
                        }else{
                            move_uploaded_file($fileTmpName, $uploadPath);
                            $updateSystemData = [
                                'setting_index_small_title' => $stBannerTitle,
                                'setting_index_typewriter_header' => $stBannerSubTitle,
                                'setting_index_typewriter_text' => $stBannerTypewriterText,
                                'setting_banner' => $uploadPath
                            ];
                            if($dbh->update('setting', $updateSystemData)){
                                echo "success";
                            }else{
                                echo "failed";
                            }
                        }
                    }
                }else{
                    $updateSystemData = [
                        'setting_index_small_title' => $stBannerTitle,
                        'setting_index_typewriter_header' => $stBannerSubTitle,
                        'setting_index_typewriter_text' => $stBannerTypewriterText
                    ];
                    if($dbh->update('setting', $updateSystemData)){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }
            }
        }

        /* Action Update System Meta */
        if(isset($_POST['actionUpdateSystemMeta'])){
            $stTitle = $oxcakmak->cleanString($_POST['stTitle']);
            $stDescription = $oxcakmak->cleanString($_POST['stDescription']);
            $stKeyword = $oxcakmak->cleanString($_POST['stKeyword']);
            $stStuck = $oxcakmak->cleanString($_POST['stStuck']);
            if(empty($stTitle) || empty($stDescription) || empty($stKeyword) || empty($stStuck)){
                echo "empty";
            }else{
                $updateSystemData = [
                    'setting_meta_title' => $stTitle,
                    'setting_meta_description' => $stDescription,
                    'setting_meta_keyword' => $stKeyword,
                    'setting_meta_stuck' => $stStuck
                ];
                if($dbh->update('setting', $updateSystemData)){
                    echo "success";
                }else{
                    echo "failed";
                }
            }
        }

        /* Action Update System About */
        if(isset($_POST['actionUpdateSystemAbout'])){
            $stAboutTitle = $oxcakmak->cleanString($_POST['stAboutTitle']);
            $stAboutSpecial = $oxcakmak->cleanString($_POST['stAboutSpecial']);
            $stAboutDescription = $oxcakmak->cleanString($_POST['stAboutDescription']);
            $fileName = @$_FILES['stAboutImage']['name'];
            $fileSize = @$_FILES['stAboutImage']['size'];
            $fileTmpName = @$_FILES['stAboutImage']['tmp_name'];
            $fileType = @$_FILES['stAboutImage']['type'];
            $fileExtensions = ['jpeg','jpg','png'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension;
            $uploadPath = UPLOAD_PATH."about_".$fileNameEncoded;
            if(empty($stAboutTitle) || empty($stAboutSpecial) || empty($stAboutDescription)){
                echo "empty";
            }else{
                if(isset($_FILES['stAboutImage'])){
                    if (!in_array($fileExtension,$fileExtensions)){
                        echo "extension";
                    }else{
                        if ($fileSize > 5000000){
                            echo "size";
                        }else{
                            move_uploaded_file($fileTmpName, $uploadPath);
                            $updateSystemData = [
                                'setting_about_text' => $stAboutTitle,
                                'setting_about_special_text' => $stAboutSpecial,
                                'setting_about_description' => $stAboutDescription,
                                'setting_about_image' => $uploadPath
                            ];
                            if($dbh->update('setting', $updateSystemData)){
                                echo "success";
                            }else{
                                echo "failed";
                            }
                        }
                    }
                }else{
                    $updateSystemData = [
                        'setting_about_text' => $stAboutTitle,
                                'setting_about_special_text' => $stAboutSpecial,
                                'setting_about_description' => $stAboutDescription
                    ];
                    if($dbh->update('setting', $updateSystemData)){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }
            }
        }
    }
}else{ 

    /* Action Login */
    if(isset($_POST['actionLogin'])){
        $user = $oxcakmak->cleanString($_POST['user']);
        $pass = $oxcakmak->cleanString($_POST['pass']);
        $pass = $oxcakmak->hashPassword($pass);
        if(empty($user) || empty($pass)){
            echo "empty";
        }else{
            if($oxcakmak->checkIsMail($user)){
                $dbh->where("user_email", $user);
            }else{
                $dbh->where("user_username", $user);
            }
            if($dbh->has("user")){
                $userRow = $dbh->getOne("user");
                if($pass == $userRow['user_password']){
                    $_SESSION['session'] = true;
                    $_SESSION['user'] = $user;
                    echo "success";
                }else{
                    echo "wrong_password";
                }
            }else{
                echo "not_exists";
            }
        }
    }
}

if(DEMO_MODE==0){
    /* Action Contact */
    if(isset($_POST['actionContact'])){
        $name = $oxcakmak->cleanString($_POST['name']);
        $email = $oxcakmak->cleanString($_POST['email']);
        $subject = $oxcakmak->cleanString($_POST['subject']);
        $message = $oxcakmak->cleanString($_POST['message']);
        $contactHash = $oxcakmak->specificHash($name."-".$email);
        if(empty($name) || empty($email) || empty($subject) || empty($message)){
            echo "empty";
        }else{
            if($oxcakmak->checkIsMail($email)){
                $dbh->where("contact_hash", $contactHash);
                if($dbh->has("contact")){
                    echo "exists";
                }else{
                    $iContactData = [
                        'contact_hash' => $contactHash,
                        'contact_fullname' => $name,
                        'contact_email' => $email,
                        'contact_subject' => $subject,
                        'contact_message' => $message,
                        'contact_address' => $oxcakmak->getIPAddress(),
                        'contact_date' => $oxcakmak->latestDateHM()
                    ];
                    if($dbh->insert("contact", $iContactData)){
                        echo "success";
                    }else{
                        echo "failed";
                    }
                }
               
            }else{
                echo "not_supported_email";
            }
        }
    }
}
?>