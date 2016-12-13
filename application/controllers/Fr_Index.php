<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_Index extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('wx');
		$this->load->model('student_model','student');
	}
	/**
	 * 申请控制
	 */
	public function index()
	{
		$this->load->view('fore/index');
	}
	//知道了
	public function knowPre(){
		if(!strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')){
			$this->load->view('fore/openerror.html');
		}else{
			$redirect_uri = urlencode("http://xue.x-chuang.com/index.php/fr_Index/know");
			$codeUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
			header('location:'.$codeUrl);
		}
	}
	//重定向
	public function know(){
		$code = $_GET['code'];
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
		$res = json_decode(httpCurl($url),true);
		$openId = $res['openid'];

		$this->load->model('student_model');
		$flag = $this->student->isexist_openid($openId);
		if(!$flag){
			$this->load->view('fore/regesit');
		}else{
			//查询是否存在订单
			if(true){
				$this->load->view('fore/order');
			}else{
				//
				$this->load->view('fore/apply');
			}
		}				
	}
	public function pay(){
		$this->load->view('fore/pay');
	}
	public function order(){
		$this->load->view('fore/order');
	}
	public function info(){
		$this->load->view('fore/info');
	}
}
