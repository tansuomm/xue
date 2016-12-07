<?php
	class Test_model extends CI_Model{
		private $title;
		private $name;
		function __construct(){
			parent::__construct();
		}
		public function insert_entry(){
			/*$title = $this->input->post('title');
			$name =  $this->input->post('name');*/
			$test = array("title"=>'aaa',"name"=>'bbb');
			$this->db->insert('test',$test);	
		}

	}