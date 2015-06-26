<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

class UserController extends BaseController
{

	public function _list()
	{
		$UserList = M('member')->select();
		$this->assign('list',$UserList);
		$this->display();
	}
	public function index(){
		$list = M('User')->order('sort desc')->select();
		dump($list);exit;
		$this->display();
	}
	public function add (){
		if(IS_POST){
			$data = I('post.');
			unset($data['editorValue']);
			// dump($data);
			if(M('User')->add($data)){
				$this->success('添加成功！');
			}else{
				$this->error('添加失败！');
			}
		} else {
			$this->display();
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