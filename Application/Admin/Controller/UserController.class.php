<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

class UserController extends BaseController
{

	public function __list()
	{
		// $UserList = M('member')->select();
		$this->assign('list',$UserList);
		$this->display();
	}
	public function index(){
		$map = isset($_GET['type']) && $_GET['type']!='' ? ['type' => I('GET.type')]:[];	
        $this->_list(M('User'), $map);
		$this->display();
	}
	public function add (){
		if(IS_POST){
			$data = I('post.');
			unset($data['editorValue']);
			// dump($data);
			if(I('get.id')) 
				$req = M('User')->save($data);
			else
				$req = M('User')->add($data);
			if($req){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
		} else {
			if(I('get.id')) {
				$vo = M('User')->getbyId(I('get.id'));
				$this->assign('vo',$vo);
			}
			$this->display();
		}
	}
	public function delete (){
		$req = M('User')->delete(I('get.id'));
		if($req){
				$this->success('操作成功！');
			}else{
				$this->error('操作失败！');
			}
	}
	public function apply()
	{
			$start_time = strtotime(I('get.start_time'));
			$this->start_time = $start_time;
			$end_time = strtotime(I('get.end_time'));
			$this->end_time = $end_time;
			if(!empty($start_time)&&!empty($end_time)){
				$map['add_time'] = array('between',array($start_time,$end_time));
			}elseif(!empty($start_time)){
				$map['add_time'] = array('gt',$start_time);
			}elseif(!empty($end_time)){
				$map['add_time'] = array('lt',$end_time);
			}
			if($_GET['status']!==''){
				$map['status'] = I('get.status');
				$this->status = I('get.status');
			}
		$ApplyList = M('apply')->where($map)->select();
		$this->assign('list',$ApplyList);
		$this->display();
	}

	public function do_apply()
	{
		if(IS_POST){
			foreach(I('post.ids') as $key=>$value){
				M('apply')->where(array('id'=>$value))->setField('status',I('post.status'));
			}
			$this->success('处理成功');
		}
	}

}

?>