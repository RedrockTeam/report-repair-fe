<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{
	public function index(){
		if($data = $this->getInfo_by_wxdh()){
			$this->assign('resarr', $data[0]);
			$this->display();
		}else{
			$this->error('此维修单号没有数据');
		}
	}

	public function getInfo_by_wxdh(){

		// $conf = [
		// 	'appId' => 'a66222d0-f5ba-4fe5-86d4-a3cd01815db4',
		// 	'id' => '1635841',
		// ];
		$where = [
			'wx_djh' => I('get.wx_djh'),
		];
		// $message = send_request('Detail', $conf);
		if($message = M('globle')->where($where)->select()){
			return $message;
		}else{
			flase;
		}
	} 
}
