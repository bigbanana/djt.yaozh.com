<?php namespace Admin\Controller;

use Common\Controller\BaseController;

class FriendLinkController extends BaseController
{

    public function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $model = M('friendlink');
        $this->_list($model);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            if (M('friendlink')->add(I('post.'))) {
                $this->success('添加成功');
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        if (IS_POST) {
            if (M('friendlink')->save(I('post.'))) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        }
        $this->info = M('friendlink')->find(I('get.id'));
        $this->display('add');
    }
}
