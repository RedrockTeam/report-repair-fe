<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller{
	private $this->wx_djh = null;
	public function index(){
		if($data = $this->getInfo_by_wxdh()){
			$this->assign('resarr', $data[0]);
			$this->display();
		}else{
			$this->error('此维修单号没有数据');
		}
	}

	public function getInfo_by_wxdh(){
		$where = [
			'wx_djh' => I('get.wx_djh'),
		];
		// $message = send_request('Detail', $conf);
		if($message = M('globle')->where($where)->select()){
			$this->wx_djh = I('get.wx_djh');
			return $message;
		}else{
			flase;
		}
	}
	public function returnVisit(){
		if(session('stuId') && $this->wx_djh && I('get.hfmyd') && I('get.hfjy')){
			$conf = [
				'rzm' => session('stuId'),
				'wxdjh' => $this->wx_djh,
				'hfmyd' => I('get.hfmyd'),
				'hfjy' => I('get.hfjy'),
			];
			if(send_request('PayReturnVisit', $conf)){
				return true;
			}else{
				return false;
			}
		}else{
			$this->error('数据填写不完整');
		}
	}
}
