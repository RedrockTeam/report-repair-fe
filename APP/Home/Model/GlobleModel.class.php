<?php
namespace Home\Model;
use Think\Model;
class GlobleModel extends Model {
    public function cacheRefresh($data){
        if(count($data) == 27){
        	$this->run($data);
        }else{
            foreach ($data as $key) {
               $this->run($key);
            }
        }
    }
    //跟新本地缓存

    private function run($data){
        foreach ($data as $key => $value) {
            $conf[$key] = $value[0]["#text"];
        }
        $conf['stunum'] = session('stuId');
        $where = [
            'wx_djh' => $conf['wx_djh'],
        ];
        if(M('globle')->where($where)->select()){
            M('globle')->where($where)->delete();
            M('globle')->data($conf)->add();
        }else{
            M('globle')->data($conf)->add();
        }
    }
    //刷新具体方法

    public function get_5_unfinshed_contends($time = 0){
        $time = I('get.time');
        $message = [];//结果数组
        $status = [
            0 => '未受理',
            1 => '已审核',
            2 => '已受理',
            3 => '已派出',
        ];
        for($i = 0; $i < 4; $i++){
            $where = [
                'stunum' => session('stuId'),
                'wx_wxztm' => $status[$i],
            ];
            $newres = M('globle')->where($where)->select();//对应状态的栏数
            if($newres){
                foreach ($newres as $key) {
                    array_push($message, $key);
                }
            }
        }
        if($message){
            if($time < 1){
                return array_slice($message, 0, 5);  //0-4
            }else{
                return array_slice($message, ($time - 1) * 4 + 5 , 4);
            }
        }else{
            return false;
        }
    }

    public function get_5_finshed_contends($time = 0){
        $message = [];//结果数组
        $status = [
            0 => '已完工',
            1 => '已验收',
            2 => '已驳回',
            3 => '已回访',
        ];
        for($i = 0; $i < 4; $i++){
            $where = [
                'stunum' => session('stuId'),
                'wx_wxztm' => $status[$i],
            ];
            $newres = M('globle')->where($where)->select();//对应状态的栏数
            if($newres){
                foreach ($newres as $key) {
                    array_push($message, $key);
                }
            }
        }
        if($message){
            if($time < 1){
                return array_slice($message, 0, 5);  //0-4
            }else{
                return array_slice($message, ($time - 1) * 4 + 5 , 4);
            }
        }else{
            return false;
        }
    }

    public function save_new_repaire($conf){
        M('globle')->save($conf);
    }
}
