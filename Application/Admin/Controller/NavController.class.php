<?php

namespace Admin\Controller;

use Common\Controller\BaseController;

class NavController extends BaseController
{
    public function all()
    {
        $navModel = M('Nav');
        $map = array();
        $type = I('get.type');
        switch ($type) {
            case '0':
            default:
                $this->type = 0;
                break;

            case '1':
                $map['type'] = '顶部导航';
                $this->type = 1;
                break;

            case '2':
                $map['type'] = '底部导航';
                $this->type = 2;
                break;
        }
        $list = $navModel->where($map)->order('sort asc')->select();
        $this->list = unlimitListTree($list);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $navModel = M('Nav');
            $navModel->create();
            $flag = $navModel->add();
            if ($flag) {
                $this->success('新建成功', U('Nav/all'));
            } else {
                $this->error('新建失败', U('Nav/all'));
            }
        } else {
            $this->display();
        }
    }

    public function getNav()
    {
        $map['type'] = I('post.type');
        $map['pid'] = '';
        $result = M('nav')->where($map)->select();
        echo json_encode($result);
    }

    public function edit()
    {
        $navModel = M('Nav');
        if (IS_POST) {
            $navModel->create();
            $flag = $navModel->save();
            if ($flag) {
                $this->success('编辑成功', U('Nav/all'));
            } else {
                $this->error('编辑失败', U('Nav/all'));
            }
        } else {
            $id = I('id');
            $nav = $navModel->find($id);
            dump($nav);
            if ($nav['type'] == '顶部导航') {
                $this->pidList = M('nav')->where(array('pid' => 0, 'type' => '顶部导航'))->select();
            } else {
                $this->pidList = M('nav')->where(array('pid' => 0, 'type' => '底部导航'))->select();
            }
            $this->assign('nav', $nav);
            $this->display();
        }
    }

    public function delete()
    {
        $navModel = M('nav');
        $id = I('id');
        $flag = $navModel->where('id=' . $id)->delete();
        if ($flag) {
            $this->success('删除成功', U('Nav/all'));
        } else {
            $this->error('删除失败', U('Nav/all'));
        }
    }

}
