
<?php
	class User_model extends CI_Model{
		private static $table = 'user';
		private static $column ='username,password';
		function __construct(){
			parent::__construct();
			//已自动加载database
		}
		//登录控制
		public function query($name,$pwd){
			$sql = "select * from user where username = '".$name."' and password = '".$pwd."'";
			return $query = $this->db->query($sql)->result_array();
		}
	}