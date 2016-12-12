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
	public function know(){
		//微信内打开
		if(!strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')){
			$this->load->view('fore/openerror.html');
		}else{
			$this->load->model('student_model');
			//授权获取openid;
			
			$flag = $this->student->isexist_openid('abc');
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
