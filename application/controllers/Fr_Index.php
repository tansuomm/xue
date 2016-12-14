<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_Index extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('wx');
		$this->load->model('Student_model','student');
		$this->load->model('Order_model','order');
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
			$redirect_uri = "http://testwx.x-chuang.com/index.php/fr_Index/know";
			getCode($redirect_uri);
		}
	}
	//重定向
	public function know(){
		//获取openid
		$openId = getOpenId();
		$this->load->model('student_model');
		$flag = $this->student->isexist_openid($openId);
		if(!$flag){
			$this->load->view('fore/regesit');
		}else{
			//查询是否存在订单
			$array = $this->order->queryOrderByOpenId($openId);
			if(empty($array)){
				$this->load->view('fore/apply');
			}else{
				$this->load->view('fore/order');
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
