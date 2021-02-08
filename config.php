<?php
/*
* Default
*/
ob_start();
session_start();
setlocale(LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');
date_default_timezone_set('Europe/Istanbul');

/*
* Database
*/
require_once('PDODb.php');
$dbh = new PDODb([
	'type' => 'mysql',
	'host' => 'localhost',
	'username' => 'oxcakma1_oxcakmak', 
	'password' => '#SFG?A_~*S^Q@}2&+z',
	'dbname'=> 'oxcakma1_mariya',
	'port' => 3306,
	'charset' => 'utf8'
]);


/*
* Function
*/
include("function.php");
$oxcakmak = new oxcakmak;

/*
Defined
*/
define("BASE_URL", "https://demo.oxcakmak.com/mariya/");
define("POST_URL", BASE_URL."action");
define("INDEX_ASSETS_URL", BASE_URL."assets/index/");
define("PANEL_ASSETS_URL", BASE_URL."assets/panel/");
define("BASE_PATH", getcwd());
define("UPLOAD_PATH", "assets/uploaded/");
define("DEMO_MODE", 1);

/*
* Language
*/
include('lang/tr_TR.php');

/*
* User
*/
if(isset($_SESSION['session'])){
    if($oxcakmak->checkIsMail($_SESSION['user'])){
        $dbh->where("user_email", $_SESSION['user']);
    }else{
        $dbh->where("user_username", $_SESSION['user']);
    }
    $userRow = $dbh->getOne("user");
    define("USER_USERNAME", $userRow['user_username']);
}

/*
* Config
*/
$dbh->where("setting_id", "1");
$stRow = $dbh->getOne("setting");
define("ST_META_TITLE", $stRow['setting_meta_title']);
define("ST_META_DESCRIPTION", $stRow['setting_meta_description']);
define("ST_META_KEYWORD", $stRow['setting_meta_keyword']);
define("ST_META_STUCK", $stRow['setting_meta_stuck']);
define("ST_META_SPERATOR", "-");
define("ST_PARTICLE_STATUS", $stRow['setting_particle_status']);
define("ST_INDEX_SMALL_TITLE", $stRow['setting_index_small_title']);
define("ST_INDEX_TYPEWRITER_HEADER", $stRow['setting_index_typewriter_header']);
define("ST_INDEX_TYPEWRITER_TEXT", $stRow['setting_index_typewriter_text']);
define("ST_INDEX_PARAGRAPH", $stRow['setting_index_paragraph']);
define("ST_BANNER", $stRow['setting_banner']);
define("ST_ABOUT_TEXT", $stRow['setting_about_text']);
define("ST_ABOUT_SPECIAL_TEXT", $stRow['setting_about_special_text']);
define("ST_ABOUT_DESCRIPTION", $stRow['setting_about_description']);
define("ST_ABOUT_IMAGE", $stRow['setting_about_image']);
define("ST_CONTACT_ADDRESS", $stRow['setting_contact_address']);
define("ST_CONTACT_EMAIL", $stRow['setting_contact_email']);
define("ST_CONTACT_PHONE", $stRow['setting_contact_phone']);

?>