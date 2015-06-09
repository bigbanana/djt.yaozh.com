<?php namespace Admin\Controller;

use Common\Controller\BaseController;

class AdminNodeController extends BaseController {
    public function all() {
        $model = M('AdminNode');
        $map = array();
        if (I('get.pid')) {
            $map['pid'] = I('get.pid');
        } else {
            $map['pid'] = 0;
        }
        $this->_list($model, $map, 'sort',true);
        $this->display();
    }
    public function add() {
        if (IS_POST) {
            $admin_nodeModel = M('AdminNode');
            $admin_nodeModel->create();
            $flag = $admin_nodeModel->add();
            if ($flag) {
                $this->success('新建成功', U('AdminNode/all'));
            } else {
                $this->error('新建失败', U('AdminNode/all'));
            }
        } else {
            $this->display();
        }
    }
    public function edit() {
        $admin_nodeModel = M('AdminNode');
        if (IS_POST) {
            $admin_nodeModel->create();
            $flag = $admin_nodeModel->save();
            if ($flag) {
                $this->success('编辑成功', U('AdminNode/all'));
            } else {
                $this->error('编辑失败', U('AdminNode/all'));
            }
        } else {
            $id = I('id');
            $admin_node = $admin_nodeModel->find($id);
            $this->assign('admin_node', $admin_node);
            $this->display();
        }
    }
    public function delete() {
        $admin_nodeModel = M('admin_node');
        $id = I('id');
        $flag = $admin_nodeModel->where('id=' . $id)->delete();
        if ($flag) {
            $this->success('删除成功', U('AdminNode/all'));
        } else {
            $this->error('删除失败', U('AdminNode/all'));
        }
    }
}
