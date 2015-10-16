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
		$where = [
			'wx_djh' => I('get.wx_djh'),
		];
		// $message = send_request('Detail', $conf);
		if($message = M('globle')->where($where)->select()){
			session('wx_djh', I('get.wx_djh'));
			return $message;
		}else{
			flase;
		}
	}
	public function returnVisit(){
		if(session('stuId') && session('wx_djh') && I('post.hfmyd') && I('post.hfjy')){
			$conf = [
				'rzm' => session('stuId'),
				'wxdjh' => session('get.wx_djh'),
				'hfmyd' => I('post.hfmyd'),
				'hfjy' => I('post.hfjy'),
			];
			if(send_request('PayReturnVisit', $conf)){
				$this->ajaxReturn(true);
			}else{
				$this->ajaxReturn(false);
			}
		}else{
			$this->error('数据填写不完整');
		}
	}
}
