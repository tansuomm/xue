<?php
	class Order_model extends CI_Model{
		private static $table = 'order';
		private static $column ='id,order_code,order_name,money,cycle,status,time_one,time_two,time_three,time_four,location,openid,oid,cid,pre_one,pre_two,pre_three';
		function __construct(){
			parent::__construct();
			//已自动加载database
		}
		public function insert_entry(){
				
		}
		//根据openId 查询订单。
		public function queryOrderByOpenId($openid){
			if(!$openid){ 
                	return null;
            }else{
                $query = $this->db->where('openid',$openid)->get(self::$table);
                if($query->num_rows()>0){
                  	return $query->result_array();
                }
                return null;
            }
		}
		//查询所有订单
		public function queryAll(){
			$query = $this->db->get(self::$table);
			return $query->result_array();
		}
	}