<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

/**
 *
 */
class NewsController extends BaseController
{

    public function index()
    {
        $map = array(
            'type' => 1,
            'status' => 1,
        );
        if(I('get.user_id')) $map['user_id'] = I('get.user_id');
        if(I('get.user_news_type')) $map['user_news_type'] = I('get.user_news_type');
        
        $this->_list(M('news'), $map);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $_POST['type'] = 1;
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
        $this->display('News/add');
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
}
