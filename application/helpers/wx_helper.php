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
//辅助获得openid
function getCode($re_url){
	$redirect_uri = urlencode($re_url);
	$codeUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".$redirect_uri."&scope=snsapi_base&response_type=code&state=123#wechat_redirect";
	header('location:'.$codeUrl);
}
//获取openid
function getOpenId(){
	$code = $_GET['code'];
	$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
	$res =json_decode(httpCurl($url),true);
	$openId = $res['openid'];
	return $openId;
}



 