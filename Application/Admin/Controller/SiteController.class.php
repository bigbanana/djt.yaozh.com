<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

class SiteController extends BaseController
{

    public function index()
    {
        if (IS_POST) {
            $post = I('post.');
            foreach ($post as $name => $value) {
                $data['value'] = $value;
                $where['name'] = $name;
                $req = M('site')->where($where)->save($data);
                if (false === $req) {
                    die($model->getlastsql());
                }

                //$this->error('修改失败');
            }
            $this->success('修改成功');
        } else {
            $this->list = M('site')->select();
            $this->display();
        }
    }

    public function add()
    {
        if (IS_POST) {
            $model = M('Site');
            $model->create();
            $flag = $model->add();
            if ($flag) {
                $this->success('新建成功');
            } else {
                $this->error('新建失败');
            }
        } else {
            $this->display();
        }
    }

    public function edit()
    {
        $model = M('Site');
        if (IS_POST) {
            $model->create();
            $flag = $model->save();
            if ($flag) {
                $this->success('编辑成功');
            } else {
                $this->error('编辑失败');
            }
        } else {
            $id = I('id');
            $admin_node = $model->find($id);
            $this->assign('admin_node', $admin_node);
            $this->display();
        }
    }

    public function delete()
    {
        $model = M('admin_node');
        $id = I('id');
        $flag = $model->where('id=' . $id)->delete();
        if ($flag) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}
