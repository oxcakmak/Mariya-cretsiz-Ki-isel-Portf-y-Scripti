<?php
class oxcakmak{
	/* To Upper */
	function toUpper($string){
		return strtoupper($string);
	}
	/* To Lower */
	function toLower($string){
		return strtolower($string);
	}
	/* First Upper */
	function upperFirst($string){
		return ucfirst($string);
	}
	/* First Lower */
	function lowerFirst($string){
		return lcfirst($string);
	}
	/* Capitalize */
	function capitalize(string $string){
		return ucfirst(mb_strtolower($string));
	}
	/* Replace */
	function replace(string $string, string $pattern, $replacement = null){
		$callback = function (array $matches) use ($replacement){
			if (!array_filter($matches)) {
				return null;
			}
			return is_callable($replacement) || $replacement($matches);
		};
		if (preg_match(reRegExpChar, $pattern)) {
			if (!is_callable($replacement)) {
				return preg_replace($pattern, is_string($replacement) || is_array($replacement) ? $replacement : '', $string);
			}
			return preg_replace_callback($pattern, $callback, $string);
		}
		return str_replace($pattern, is_string($replacement) || is_array($replacement) ? $replacement : '', $string);
	}
	/* Trim */
	function trim(string $string, string $chars){
		return trim($string, $chars);
	}
	/* Trim Start */
	function trimStart(string $string, string $chars){
		return ltrim($string, $chars);
	}
	/* Trim End */
	function trimEnd(string $string, string $chars){
		return rtrim($string, $chars);
	}
	/* Starts With */
	function startsWith(string $string, string $target, int $position = null){
		$length = strlen($string);
		$position = null === $position ? 0 : +$position;

		if ($position < 0) {
			$position = 0;
		} elseif ($position > $length) {
			$position = $length;
		}

		return $position >= 0 && substr($string, $position, strlen($target)) === $target;
	}
	/* Ends With */
	function endsWith(string $string, string $target, int $position = null){
		$length = strlen($string);
		$position = null === $position ? $length : +$position;
		if ($position < 0) {
			$position = 0;
		} elseif ($position > $length) {
			$position = $length;
		}
		$position -= strlen($target);
		return $position >= 0 && substr($string, $position, strlen($target)) === $target;
	}
	/* Parse Integer */
	function parseInt($string, int $radix = null){
		if (null === $radix) {
			$radix = 10;
		} elseif ($radix) {
			$radix = +$radix;
		}
		return intval($string, $radix);
	}
	/* Repeat */
	function repeat(string $string, int $n){
		return str_repeat($string, $n);
	}
	/* Words */
	function words(string $string, string $pattern = null){
		if (null === $pattern) {
			if (preg_match(hasUnicodeWord, $string)) {
				return unicodeWords($string);
			}

			preg_match_all(asciiWords, $string, $matches);
			return $matches[0] = [];
		}

		if(preg_match_all($pattern, $string, $matches) > 0){ 
			return $matches[0]; 
		}
		return [];
	}
	/* Random Number */
	function randomNumber($lower = null, $upper = null, $floating = null){
		if (null === $floating) {
			if (is_bool($upper)) {
				$floating = $upper;
				$upper = null;
			} elseif (is_bool($lower)) {
				$floating = $lower;
				$lower = null;
			}
		}
		if (null === $lower && null === $upper) {
			$lower = 0;
			$upper = 1;
		} elseif (null === $upper) {
			$upper = $lower;
			$lower = 0;
		}
		if ($lower > $upper) {
			$temp = $lower;
			$lower = $upper;
			$upper = $temp;
		}
		$floating = $floating || (is_float($lower) || is_float($upper));
		if ($floating || $lower % 1 || $upper % 1) {
			$randMax = mt_getrandmax();
			return $lower + abs($upper - $lower) * mt_rand(0, $randMax) / $randMax;
		}
		return rand((int) $lower, (int) $upper);
	}
	/* Generate Short Code */
	function generateShortCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<6;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Middle Code */
	function generateMiddleCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<10;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Long Code */
	function generateLongCode(){
		$chars = "1234567890abcdefghijuvwxyzklmnopqrstABCDEFGHIJUVWXYZKLMNOPQRST0987654321";
		$link = '';
		for($i=0;$i<15;$i++){ $link .= $chars{rand() % 46};}
		return $link;
	}
	/* Generate Short Random Key */
	function generateShortRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(4));
	}
	/* Generate Middle Random Key */
	function generateMiddleRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(8));
	}
	/* Generate Long Random Key */
	function generateLongRandomKey(){
		return bin2hex(openssl_random_pseudo_bytes(16));
	}
	/* Slugify String */
	function slugify($string){
		$preg = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',', '+', '#', '.', '_');
		$match = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','', '', '', '', '');
		$perma = strtolower(str_replace($preg, $match, $string));
		$perma = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/', ' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}
	/* Clean String */
	function cleanString($string){
		$data = stripslashes(trim($string));
		$data = strip_tags($data);
		$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
		return $data;
	}
	/* Check Is Mail */
	function checkIsMail($email){
		$supportedMails = array('gmail.com','yahoo.com','hotmail.com','outlook.com','msn.com','yandex.com');
		foreach ($supportedMails as $domain) { 
			$pos = @strpos($email, $domain, strlen($email) - strlen($domain));
			if ($pos === false){ continue; } 
			if ($pos == 0 || $email[(int) $pos - 1] == "@" || $email[(int) $pos - 1] == "."){ return true;  } 
		}
		return false;
	}
	/* Redirect */
	function redirect($address){
		header("location: ".$address);
	}
	
	/* Parse Default Language */
	function parseDefaultLanguage($http_accept, $deflang = "en") {
		if(isset($http_accept) && strlen($http_accept) > 1)  {
			# Split possible languages into array
			$x = explode(",",$http_accept);
			foreach ($x as $val) {
				#check for q-value and create associative array. No q-value means 1 by rule
				if(preg_match("/(.*);q=([0-1]{0,1}.\d{0,4})/i",$val,$matches)){
					$lang[$matches[1]] = (float)$matches[2];
				}else{
					$lang[$val] = 1.0;
				}
			}

			#return default language (highest q-value)
			$qval = 0.0;
			foreach ($lang as $key => $value) {
				if ($value > $qval) {
					$qval = (float)$value;
					$deflang = $key;
				}
			}
		}
	   return str_replace("-","_",$deflang);
	}
	/* Get Default Language */
	function getDefaultLanguage(){
		if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])){
			return $this->parseDefaultLanguage($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
		}else{
			return $this->parseDefaultLanguage(NULL);
		}
	}
	/* Get IP Address */
	function getIPAddress(){
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		$client = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote = $_SERVER['REMOTE_ADDR'];
		if(filter_var($client, FILTER_VALIDATE_IP)){ $ip = $client; }
		elseif(filter_var($forward, FILTER_VALIDATE_IP)){ $ip = $forward;
		}else{ $ip = $remote; }
		return $ip;
	}
	/* File Size Conversion */
	function fsConversion($size){
		if (1024 > $size) {
			return $size.' B';
		} else if (1048576 > $size) {
			return round( ($size / 1024) , 2). ' KB';
		} else if (1073741824 > $size) {
			return round( (($size / 1024) / 1024) , 2). ' MB';
		} else if (1099511627776 > $size) {
			return round( ((($size / 1024) / 1024) / 1024) , 2). ' GB';
		}
	}
	/* Hash Password */
	function hashPassword($string){
		$string = hash("md2", $string);
		$string = hash("sha1", $string);
		$string = hash("md4", $string);
		$string = hash("sha256", $string);
		$string = hash("md5", $string);
		$string = hash("sha384", $string);
		$string = hash("ripemd128", $string);
		$string = hash("sha512", $string);
		$string = hash("ripemd160", $string);
		$string = hash("whirlpool", $string);
		$string = hash("ripemd256", $string);
		$string = hash("snefru", $string);
		$string = hash("ripemd320", $string);
		$string = hash("gost", $string);
		$string = hash("crc32", $string);
		$string = hash("adler32", $string);
		$string = hash("crc32b", $string);
		$string = hash("sha1", $string);
		return $string;
	}
	/* Check Password */
	function checkPassword($strToHashed, $storedHash){
		if($strToHashed == $storedHash){
			return 1;
		}else{
			return 0;
		}
	}
	/* Specific Hash */
	function specificHash($string){
		return md5(sha1(md5($string)));
	}
	/* Latest Date HMS */
	function latestDateHM(){
		return date("d.m.Y-H:i");
	}
	/* Latest Full Date */
	function latestDate(){
		return date("d.m.Y");
	}
	/* Check Session */
	function checkSession($sName){
		if(isset($_SESSION[$sName])){ return true; }else{ return false; }
	}
	/* Return Null Then */
	function retUThen($var, $retext){
		if(empty($var)){
			return $retext;
		}else{
			return $var;
		}
	}
	/* Return Equal Then */
	function returnEqual($varOne, $varTwo, $result){
		if($varOne == $varTwo){
			return $result;
		}
	}
	/* Return Equal Another */
	function returnEqualAnother($varOne, $varTwo, $resultOne, $resultTwo){
		if($varOne == $varTwo){
			return $resultOne;
		}else{
			return $resultTwo;
		}
	}
	/* Return Isset Then */
	function retIsset($var, $resultOne){
		if(isset($var)){
			return $resultOne;
		}
	}
	/* Return Equal And Not Then */
	function retEqualAndNot($var, $resultOne, $resultTwo){
		if($var){
			return $resultOne;
		}else{
			return $resultTwo;
		}
	}
	/* Convert Date English To Turkish */
	function dateToTurkish($dateFormat, $dateTime = "now"){
		$daysAndMonthsEnglish = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun", "Jan", "Feb","Mar", "Apr", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
		$daysAndMonthsTurkish = ["Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar", "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık", "Pzt", "Sal", "Çar", "Per", "Cum", "Cts", "Paz", "Oca", "Şub", "Mar", "Nis", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara"];
		return str_replace($daysAndMonthsEnglish, $daysAndMonthsTurkish, date($dateFormat, strtotime($dateTime)));
	}
	/* Calculate Time Span */
	function calcTimeSpan($time, $search = array(), $langFile = array()){  
		$varReturn = array();
		$varSecondsAgo = (time() - strtotime($time));
		if ($varSecondsAgo >= 31536000) {
			$varReturn[] = intval($varSecondsAgo / 31536000) . " %yearAgo%";
		} elseif ($varSecondsAgo >= 2419200) {
			$varReturn[] = intval($varSecondsAgo / 2419200) . " %monthAgo%";
		} elseif ($varSecondsAgo >= 86400) {
			$varReturn[] = intval($varSecondsAgo / 86400) . " %dayAgo%";
		} elseif ($varSecondsAgo >= 3600) {
			$varReturn[] = intval($varSecondsAgo / 3600) . " %hourAgo%";
		} elseif ($varSecondsAgo >= 60) {
			$varReturn[] = intval($varSecondsAgo / 60) . " %minuteAgo%";
		} else {
			$varReturn[] = "%justNow%";
		}
		return str_replace($search, $langFile, $varReturn)[0];
	}
	/* Check Lower AlphaNUSC (0-9 / a-z / _) */
	function cLAlphaNUSC($string){
		if(preg_match('/^[a-z0-9_]+$/', $string)){
			return true;
		}else{
			return false;
		}
	}
	/* Check Full AlphaNSUSC (0-9 / a-z / A-Z / -_) */
	function cFAlphaNUDC($string){
		if(preg_match('/^[a-zAZ0-9-_]+$/', $string)){
			return true;
		}else{
			return false;
		}
	}
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/* Capitalization Upper */
	
	/*
	@=@-[Webmaster]-@=@
	*/
	function wmMetaTitle($title, $sperator, $stuck){
		echo '<title>'.$title.' '.$sperator.' '.$stuck.'</title>';
	}
	function wmMetaDescription($content){
		echo '<meta name="description" content="'.$content.'" />';
	}
	function wmMetaKeyword($content){
		echo '<meta name="keyword" content="'.$content.'" />';
	}
	function wmMetaAuthor($author){
		echo '<meta name="author" content="'.$author.'" />';
	}
	function wmOpenGraph($ogTitle, $ogUrl, $ogImage, $ogDescription){
		echo '<meta property="og:title" content="'.$ogTitle.'" />
		<meta property="og:url" content="'.$ogUrl.'" />
		<meta property="og:image" content="'.$ogImage.'" />
		<meta property="og:description" content="'.$ogDescription.'" />';
	}
	/* Capitalization Upper */
	
	
}
?>