<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fr_Index extends CI_Controller {

	/**
	 * 申请控制
	 */
	public function index()
	{
		$this->load->view('fore/index');
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
