<?php

namespace Admin\Controller;

use Admin\Model\AdvViewModel;
use Common\Controller\BaseController;

class AdvController extends BaseController
{
    public function _initialize()
    {
        parent::_initialize();
        $place = M('AdvPlace')->select();
        $this->assign('place', $place);
    }
    public function all()
    {
        $advModel = new AdvViewModel();
        $map = array();
        $get = I('get.');
        unset($get['p']);
        foreach ($get as $key => $value) {
            if ($value == "") {
                unset($get[$key]);
            }

        }
        $map = $get;
        // p($map);
        $this->_list($advModel, $map, 'id', $asc = true);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $advModel = M('Adv');
            $advModel->create();
            $flag = $advModel->add();
            if ($flag) {
                $this->success('新建成功', U('Adv/all'));
            } else {
                $this->error('新建失败', U('Adv/all'));
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $advModel = M('Adv');
        if (IS_POST) {
            $advModel->create();
            $flag = $advModel->save();
            if ($flag) {
                $this->success('编辑成功', U('Adv/all'));
            } else {
                $this->error('编辑失败', U('Adv/all'));
            }
        } else {
            $id = I('id');
            $adv = $advModel->find($id);
            $this->assign('adv', $adv);
            $this->display();
        }
    }

    public function delete()
    {
        $advModel = M('adv');
        $id = I('id');
        $flag = $advModel->where('id=' . $id)->delete();
        if ($flag) {
            $this->success('删除成功', U('Adv/all'));
        } else {
            $this->error('删除失败', U('Adv/all'));
        }
    }

    public function placeAll()
    {
        $AdvModel = M('AdvPlace');
        $map = array();
        $this->_list($AdvModel, $map);
        $this->display();
    }

    public function placeAdd()
    {
        if (IS_POST) {
            $advModel = M('AdvPlace');
            $advModel->create();
            $flag = $advModel->add();
            if ($flag) {
                $this->success('新建成功', U('Adv/placeAll'));
            } else {
                $this->error('新建失败', U('Adv/placeAll'));
            }
        } else {
            $this->display();
        }
    }

    public function placeEdit()
    {
        $advModel = M('AdvPlace');
        if (IS_POST) {
            $advModel->create();
            $flag = $advModel->save();
            if ($flag) {
                $this->success('编辑成功', U('Adv/placeAll'));
            } else {
                $this->error('编辑失败', U('Adv/placeAll'));
            }
        } else {
            $id = I('id');
            $adv = $advModel->find($id);
            $this->assign('adv', $adv);
            $this->display();
        }
    }

    public function placeDelete()
    {
        $advModel = M('AdvPlace');
        $id = I('id');
        $flag = $advModel->where('id=' . $id)->delete();
        if ($flag) {
            $this->success('删除成功', U('Adv/placeAll'));
        } else {
            $this->error('删除失败', U('Adv/placeAll'));
        }
    }

}
