<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

/**
 *
 */
class ClubController extends BaseController
{

// ==================发起单位=================//
    public function index()
    {
        $map = array(
            'type' => 3,
            'status' => 1,
        );
        $this->_list(M('news'), $map);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $_POST['type'] = 3;
            $_POST['status'] = 1;
            $_POST['create_time'] = time();
            if (I('post.id')) {
                if (M('news')->save(I('post.'))) {
                    $this->success('修改成功');
                } else {
                    $this->error('修改失败');
                }
            } else {
                if (M('news')->add(I('post.'))) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }

    }

    public function edit()
    {
        $id = I('get.id');
        $this->info = M('news')->find($id);
        $this->display('Club/add');
    }

    public function delete()
    {
        $id = I('get.id');
        if (M('news')->where(array('id' => $id))->setField('status', 2)) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }


// ==================发起人=================//

    public function listsr()
    {
        $map = array(
            'type' => 4,
            'status' => 1,
        );
        $this->_list(M('news'), $map);
        $this->display();
    }

    public function addr()
    {
        if (IS_POST) {
            $_POST['type'] = 4;
            $_POST['status'] = 1;
            $_POST['create_time'] = time();
            if (I('post.id')) {
                if (M('news')->save(I('post.'))) {
                    $this->success('修改成功');
                } else {
                    $this->error('修改失败');
                }
            } else {
                if (M('news')->add(I('post.'))) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }

    }

    public function editr()
    {
        $id = I('get.id');
        $this->info = M('news')->find($id);
        $this->display('Club/addr');
    }

    public function deleter()
    {
        $id = I('get.id');
        if (M('news')->where(array('id' => $id))->setField('status', 2)) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }


}