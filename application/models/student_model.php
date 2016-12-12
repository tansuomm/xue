<?php
	class Student_model extends CI_Model{
		private static $table = 'student';
		private static $column ='id,name,id_num,tel,email,father,father_tel,mother,mother_tel,educate_degree,pic_fore,pic_back,pic_hand,pic_protocol,card_num,marriage,resident,postage,college,profession,time_start,time_end,openid,time_register,pre_one,pre_two,pre_three';
		function __construct(){
			parent::__construct();
			//已自动加载database
		}
		public function insert_entry(){
			/*$title = $this->input->post('title');
			$name =  $this->input->post('name');*/
			$test = array("title"=>'aaa',"name"=>'bbb');
			$this->db->insert('test',$test);	
		}
		//查询openid 是否存在
		public function isexist_openid($openid){
                if(!$openid){ 
                	return false;
                }else{
                    $query = $this->db->where('openid',$openid)->get(self::$table);
                   	if($query->num_rows()>0){
                   		return true;
                   	}
                    return false;
                }
			
		}
	}