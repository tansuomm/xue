<?php
// debug all port
function err($msg){
	error_log($msg);
	var_dump($msg);
	die;
}

function get_access_token(){
	if(isset($_SESSION['access_token']) && time()<$_SESSION['access_token_expire']){
		$access_token = $_SESSION['access_token'];
	}else{
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
		$tempEnd = json_decode(httpCurl($url));
		$access_token = $tempEnd->access_token;
		$_SESSION['access_token'] = $access_token;
		$_SESSION['access_token_expire'] = time()+7200;
	}
	return $access_token;
}

function httpCurl($url,$data=null){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	if (!empty($data)){
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($curl);
	curl_close($curl);
	return $output;
}
//静默授权获取openid
function getOpenid(){
	$codeUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".site_url()."/fr_Index/know"."&response_type=code&scope=SCOPE&state=STATE#wechat_redirect";
}

 