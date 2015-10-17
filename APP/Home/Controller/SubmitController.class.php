<?php
namespace Home\Controller;
use Think\Controller;
class SubmitController extends Controller {
	public function index(){
		if(!session('stuId')){
			$this->error('请先登陆');
		}else{
			$this->display();
		}
	}

	public function submit(){
		switch (I('post.fwxmh')) {
			case '水':
				$xmh = '01';
				break;	
			case '电':
				$xmh = '02';
				break;
			case '光源类':
				$xmh = '06';
				break;
			case '木工':
				$xmh = '08';
				break;
			case '电器':
				$xmh = '09';
				break;
			case '泥水':
				$xmh = '10';
				break;
			case '管道疏通':
				$xmh = '11';
				break;
			case '换表':
				$xmh = '12';
				break;
			case '多媒体设备':
				$xmh = '13';
				break;
		}
		switch (I('post.fwquy')) {
			case '住宅区':
				$qy = '078f8464-6bc0-4274-91f7-a0ab00df27d4';
				break;
			case '教学区':
				$qy = '273da92e-7c1a-46b8-a518-a0a901326987';
				break;
			case '校园公共区':
				$qy = '63e1be9e-fb1d-46f0-8402-a18f00a7a960';
				break;
			case '办公区':
				$qy = 'a6f44799-c68c-4574-8796-a18f00a7fed4';
				break;
			case '学生公寓区':
				$qy = 'e51e1aae-8aa3-4546-aaab-a18d013873b0';
				break;
		}
		//先接受get数组，然后再填充到conf里面
		$conf = [
			'rzm' => session('stuId'),
			'xm' => session('usrname'),
			//'ip' => '202.202.41.125',
			'ip' => $_SERVER['HTTP_X_FORWARDED_FOR'],
			//'bt' => '这是测试数据，请穆老师处理',
			'bt' => I('post.bt'),
			'fwxmh' => $xmh,
			'bxdh' => I('post.bxdh'),
			'fwquy' => $qy,
			'bxdd' => I('post.bxdd'),
			'bxnr' => I('post.bxnr'),
		];
		$wxdh = send_request('RepairApp', $conf);//提交
		if($wxdh){
			$config = [
				'wx_djh' => $wxdh,
				'wx_bt' => $conf['bt'],
				'wx_bxlxh' => $conf['fwxmh'],
				'wx_bxlxm' => I('post.fwxmh'),
				'wx_bxrrzm' => '',
				'wx_bxr' => session('usrname'),
				'wx_bxsj' => date('y-m-d h:i:s',time() + 8 * 3600),
				'wx_bxdh' => $conf['bxdh'],
				'wx_fwqyh' => $conf['fwquy'],
				'wx_bxdd' => $conf['bxdd'],
				'wx_bxnr' => $conf['bxnr'],
				'wx_fwqym' => I('post.fwquy'),
				'wx_bxip' => $conf['ip'],
				'stunum' => session('stuId'),
				'wx_wxztm' => '未受理',
			];
			
			M('Globle')->add($config);
			session('wx_djh', $wxdh);
			$this->ajaxReturn('true', 'json');
		}else{
			$this->ajaxReturn('false', 'json');
		}
	}
	public function submit_suc(){
		$this->assign('wx_djh', session('wx_djh'));
		$this->display();
	}
}
