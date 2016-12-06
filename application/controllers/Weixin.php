<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weixin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('wx');
	}

	public function index()

	{
		if(isset($_GET['echostr'])){
			$this->valid();
		}else{
			$this->responseMsg();
		}
	}
	//设置菜单
	public function setMenu(){
		$menu = '
				{
					"button":[
					{
						"name":"申请",
						"type":"view",
						"url":"http://xue.x-chuang.com/index.php/fr_Index"
					},
					{
						"name":"我的",
						"sub_button":[
						{
							"type":"view",
							"name":"还款",
							"url":"http://xue.x-chuang.com/index.php/fr_Index/pay"
						},
						{
							"type":"view",
							"name":"订单",
							"url":"http://xue.x-chuang.com/index.php/fr_Index/order"
						},{
							"type":"view",
							"name":"资料",
							"url":"http://xue.x-chuang.com/index.php/fr_Index/info"
						}]
					},
					{
						"name":"更多",
						"sub_button":[
						{
							"type":"view",
							"name":"产品介绍",
							"url":"http://h.eqxiu.com/s/gzMI75sa?eqrcode=1"
						},
						{
							"type":"click",
							"name":"在线客服",
							"key":"communicate"
						},
						{
							"type":"view",
							"name":"微信小店",
							"url":"https://weidian.com/s/1062741039?wfr=c"
						}]
					}]
				}';
		$menuUrl = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".get_access_token();
			$res = httpCurl($menuUrl,$menu);
			var_dump($res);
	}
	//回复消息
	public function responseMsg(){
		$postStr = isset($GLOBALS['HTTP_ROW_POST_DATA'])?$GLOBALS['HTTP_ROW_POST_DATA']:file_get_contents("php://input");
		//$postStr = $GLOBALS['HTTP_ROW_POST_DATA'];
		if(!empty($postStr)){
			$postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
			$RX_TYPE = trim($postObj->MsgType);
			$FromUserName = $postObj->FromUserName;
			$ToUserName = $postObj->ToUserName;
			$CreateTime = $postObj->CreateTime;
			$time = time();
			switch ($RX_TYPE) {
				case 'event':
					$resultStr = $this->receiveEvent($postObj);
					break;
				case 'text':
					$resultStr = $this->receiveText($postObj);
					break;
				default:
					$resultStr = "";
					break;
			}
			echo $resultStr;
		}else{
			echo "";
		}


	}
	//1:回复文本
	private function receiveText($object){
		//可能小机器人代码

	}
	//2 回复事件
	private function receiveEvent($object){
		$contentStr = "";
		switch ($object->Event) {
			case 'subscribe':
				$contentStr = "欢迎关注西瓜帮·乐青春";
				break;
			case 'unsubscribe':
				break;
			case 'CLICK':
				switch ($object->EventKey) {
					case 'communicate':
						$contentStr = "嗨！亲!请输入问题，直接与西瓜王子对话";
						break;
					default:
						$contentStr[] = array("Title"=>"您好","Description"=>"欢迎使用西瓜王子自定义菜单","PicUrl"=>"","Url"=>"");
						break;
				}
				break;
			default:
				break;
		}
		if(is_array($contentStr)){
			//可能回复图文消息code

		}else{
			$resultStr = sprintf(TEXTTPL,$object->FromUserName,$object->ToUserName,time(),'text',$contentStr);
		}
		return $resultStr;
	}
	//验证入口
	private function valid(){
		$echostr = $_GET['echostr'];
		$signature = $_GET['signature'];
		$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];
		$tmpArr= array($nonce,$timestamp,TOKEN);
		sort($tmpArr);
		$tmpArr = implode($tmpArr);
		$tmpArr = sha1($tmpArr);
		if($tmpArr == $signature){
			echo $echostr;
			return true;
		}else{
			return false;
		}
	}
	
}

