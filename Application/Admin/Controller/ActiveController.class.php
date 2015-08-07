<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

/**
 *
 */
class ActiveController extends BaseController
{

    public function index()
    {
        $map = array(
            'type' => 2,
            'status' => 1,
        );
        $this->_list(M('news'), $map);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $_POST['type'] = 2;
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
        $this->display('Active/add');
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
// =======================相册====================//
    // 相册列表
    public function lists()
    {
        // 查询
        $this->_list(M('pic'));

        $this->display();
    }

    // 添加相册
    public function addpic()
    {
        if (IS_POST) {
            // $_POST['type'] = 2;
            // $_POST['status'] = 1;
            $_POST['time'] = time();

            if (I('post.id')) {
                // pic表插入数据
                $result1 = M('pic')->save(I('post.'));
                // picshow表插入数据
                if (I('POST.picurl')) {
                    $result='';
                    foreach (I('POST.picurl') as $key => $value) {
                        $data['picurl'] = $value;
                        $data['pid'] = I('post.id');
                        $result .= M('picshow')->add($data);
                    }
                }
                if ($result1 || $result) {
                    $this->success('编辑成功');
                }else{
                    $this->error('未进行任何操作！');
                }

            }else {
                $pic = M('pic');
                $picshow = M('picshow');
                //开启事务
                M()->startTrans(); 
                // pic表插入数据
                $pid = $pic->add(I('post.'));
                // picshow表插入数据
                if ($pid) {
                    $picsurl = I('POST.picurl');
                    $result='';
                    foreach ($picsurl as $key => $value) {
                        $data['picurl'] = $value;
                        $data['pid'] = $pid;
                        $result .= $picshow->add($data);
                    }
                }
                // 事务处理
                if ($pid && $result) {
                    // 提交事务
                    M()->commit();
                    $this->success('添加成功');
                }else{
                    // 事务回滚
                    M()->rollback();
                    $this->error('添加失败！图片集必须上传！');
                }
            }
        }else{
            $this->display();
        }
    }

    // 编辑相册
    public function editpic()
    {
        $id = I('get.id');
        $pic = M('pic');
        $data = $pic->join('yzclub_picshow ON yzclub_pic.id = yzclub_picshow.pid')->select();
        $info = [];
        $info['id'] = $data[0]['pid'];
        $info['title'] = $data[0]['title'];
        $info['smallpic'] = $data[0]['smallpic'];
        $info['content'] = $data[0]['content'];
        // 将图片集 循环添加到数组
        foreach ($data as $key => $value) {
            $info['picurl'][$key] = $value['picurl'];
        }
        $this->assign('info',$info);
        $this->display('Active/addpic');
    }

    // 相册删除
    public function deletepic()
    {
        $id = I('get.id');
        if (M('pic')->where(array('id' => $id))->delete() && M('picshow')->where(array('pid' => $id))->delete()) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }

// =======================视频====================//

    public function liststv()
    {
        $this->_list(M('video'));
        $this->display();
    }

    public function addtv()
    {
        if (IS_POST) {
            $_POST['time'] = time();
            if (I('post.id')) {
                if (M('video')->save(I('post.'))) {
                    $this->success('修改成功');
                } else {
                    $this->error('修改失败');
                }
            } else {
                if (M('video')->add(I('post.'))) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            }
        } else {
            $this->display();
        }

    }

    public function edittv()
    {
        $id = I('get.id');
        $this->info = M('video')->find($id);
        $this->display('Active/addtv');
    }

    public function deletetv()
    {
        $id = I('get.id');
        if (M('video')->where(array('id' => $id))->delete()) {
            $this->success('删除成功');
        } else {
            $this->success('删除失败');
        }
    }

}