<?php namespace Admin\Controller;

use Admin\Model\AdminViewModel;
use Common\Controller\BaseController;

class AdminController extends BaseController {
	public function _initialize() {
		parent::_initialize();
		$this->admin_role = M('AdminRole')->select();
	}
	public function index() {
		$model = new AdminViewModel();

		$get = I('get.');
		unset($get['p']);
		foreach ($get as $key => $value) {
			if ($value == "") {
				unset($get[$key]);
			}

		}
		$map = $get;
		$this->admin_role_id = $_GET['role_id'];
		$this->list = $model->where($map)->select();
		$this->display();
	}
	public function add() {
		if (IS_POST) {
			$admin['username'] = I('post.username');
			$admin['name'] = I('post.name');
			$admin['password'] = md5(md5(I('post.password')));
			$user_id = M('Admin')->add($admin);
			if ($user_id) {
				$role_user['user_id'] = $user_id;
				$role_user['role_id'] = I('post.role_id');
				M('AdminRoleUser')->add($role_user);
			}
			$this->success('添加管理员成功！');
		} else {
			$this->display();
		}

	}
	public function edit() {
		if (IS_POST) {
			$post = I('post.');
			$user['id'] = $post['id'];
			$user['name'] = $post['name'];
			$user['username'] = $post['username'];
			if (trim($post[password])) {
				$user['password'] = md5(md5(trim($post[password])));
			}

			// 更新用户信息
			M('Admin')->save($user);
			// 更新用户组信息
			M('AdminRoleUser')->where('user_id=' . $post['id'])->delete();
			$role_user['user_id'] = $post['id'];
			$role_user['role_id'] = $post['role_id'];
			M('AdminRoleUser')->add($role_user);
			if ($model->getError == NULL) {
				$this->success('编辑管理员成功！');
			}

		} else {
			$id = I('get.id');
			$model = new AdminViewModel();
			$this->vo = $model->where('Admin.id=' . $id)->find();

			$this->display();
		}

	}
}
