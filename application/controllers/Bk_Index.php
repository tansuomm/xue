<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bk_Index extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('User_model','user');
		$this->load->model('Order_model','order');
	}
	public function index()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$arr = $this->user->query($username,$password);

		if(count($arr)>0){
			$this->load->view('back/index');
		}else{
			$this->load->view('back/login');
		}
	}
	//订单列表
	public function order_list(){
		$orderArr = $this->order->queryAll();
		$this->load->view('back/order_list',$orderArr);
	}
}
