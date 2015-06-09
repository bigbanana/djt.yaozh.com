<?php namespace Admin\Controller;

use Admin\Model\AdminRoleModel;
use Common\Controller\BaseController;

class AdminRoleController extends BaseController {
	public function _initialize() {
        parent::_initialize();
        $all_nodes = M('AdminNode')->where('status > 0')->select();
        $this->all_nodes = array_values(list_to_tree($all_nodes, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0));
    }
    public function index() {
        // echo "角色列表";
        $model = new AdminRoleModel();
        // p($model->relation(true)->select());
        $map['status'] = 1;
        $this->list = $model->where($map)->select();
        $this->display();
    }
    public function add() {
        if(IS_POST){
            $nodes = I('post.nodes');
            $modules = array();
            foreach($nodes as $node){
                $info = M('AdminNode')->where('id='.$node)->find();
                if( !in_array($info['pid'],$modules) ) $modules[]=$info['pid'];
            }
            $role['name'] = I('post.role_name');
            $role['status'] = I('post.status');
            // 新增组 
            $role_id = M('AdminRole')->add($role);
            // 授权组
            $access = array();
            if($role_id){
                foreach ($modules as $module) {
                    $maccess['role_id'] = $role_id;
                    $maccess['node_id'] = $module;
                    $maccess['level'] = 1;
                    $access[] = $maccess;
                }
                foreach ($nodes as $node) {
                    $naccess['role_id'] = $role_id;
                    $naccess['node_id'] = $node;
                    $naccess['level'] = 2;
                    $access[] = $naccess;
                }
                if(M('AdminAccess')->addAll($access)) $this->success('添加成功！');
            }
            
        } else $this->display();
    }
    public function edit() {
        if(IS_POST){
            $role_id = I('post.id');
            $nodes = I('post.nodes');
            $modules = array();
            foreach($nodes as $node){
                $info = M('AdminNode')->where('id='.$node)->find();
                if( !in_array($info['pid'],$modules) ) $modules[]=$info['pid'];
            }
            $role['id'] = $role_id;
            $role['name'] = I('post.role_name');
            $role['status'] = I('post.status');
            // 编辑 
            $req = M('AdminRole')->save($role);
            // 授权组
            $access = array();
            // 先删除旧的权限信息，再写入新的权限
            M('AdminAccess')->where('role_id='.$role_id)->delete();
            if($role_id){
                foreach ($modules as $module) {
                    $maccess['role_id'] = $role_id;
                    $maccess['node_id'] = $module;
                    $maccess['level'] = 1;
                    $access[] = $maccess;
                }
                foreach ($nodes as $node) {
                    $naccess['role_id'] = $role_id;
                    $naccess['node_id'] = $node;
                    $naccess['level'] = 2;
                    $access[] = $naccess;
                }
                
                // dump($access);
                if(M('AdminAccess')->addAll($access)) $this->success('编辑成功！');
            }
            
        }else {
            $this->vo = M('AdminRole')->getById(I('get.id'));
            foreach (M('AdminAccess')->field('node_id')->where('role_id='.I('get.id'))->select() as $key => $value) {
                $access[] = $value['node_id'];
            }
            $this->assign('access',$access);
            $this->display();
        }
    }
}
