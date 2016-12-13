<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bk_Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Test_model','test');
	}
	public function index()
	{
		$this->load->view('back/login');
	}
	public function test(){
		//$this->test->insert_entry();
		echo "success,好";
	}
}
