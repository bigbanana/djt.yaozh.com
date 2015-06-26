<?php
namespace Home\Controller;

use Common\Controller\BaseController;
use Think\Controller;
use Think\Page;

class IndexController extends BaseController
{
    public function index()
    {
        $this->condition = 1;
        $last_news = M('news')->where(array('type' => 1, 'status' => 1, 'is_top' => 1, 'user_id' => 0))->limit(6)->select();
        foreach ($last_news as $key => $value) {
            if ($value['news_id']) {
                $last_news[$key] = D('news')->find($value['news_id']);
                $last_news[$k]['id'] = $value['id'];
            }
        }
        $last_active = M('news')->where(array('type' => 2, 'status' => 1, 'is_top' => 1, 'user_id' => 0))->limit(6)->select();
        foreach ($last_active as $k => $v) {
            if ($v['news_id']) {
                $last_active[$k] = D('news')->find($v['news_id']);
                $last_active[$k]['id'] = $v['id'];
            }
        }
        $this->banner = M('adv')->where(array('adv_id' => 1, 'status' => 1))->select();
        $this->last_news = $last_news;
        $this->last_active = $last_active;

        $this->users = M('User')->order('sort desc')->limit(5)->select();
        $this->display();
    }

    public function apy()
    {
        if (IS_POST) {

            $rules = array(
                array('name', 'require', '姓名必须'),
                array('company', 'require', '单位必须'),
                array('phone', 'require', '联系方式必须'),
            );
            if (!M('apply')->validate($rules)->create()) {
                $result['info'] = M('apply')->getError();
                $result['stat'] = 0;
            } else {
                $_POST['add_time'] = time();
                $_POST['status'] = 2;
                $result['stat'] = M('apply')->add(I('post.'));
                $result['info'] = '恭喜您，提交成功';
            }
            echo json_encode($result);
        } else {
            $this->condition = 5;
            $this->display();
        }
    }

    public function active()
    {
        $this->condition = 3;
        $listRows = 5;
        $count = M('news')->where(array('status' => 1, 'type' => 2, 'user_id' => 0))->count();
        $p = new Page($count, $listRows);
        $list = M('news')->where(array('status' => 1, 'type' => 2, 'user_id' => 0))->limit($p->firstRow . ',' . $p->listRows)->select();
        foreach ($list as $key => $value) {
            if ($value['news_id']) {
                $list[$key] = D('News')->find($value['news_id']);
                $list[$key]['create_time'] = $value['create_time'];
                $list[$key]['id'] = $value['id'];
                isset($list[$key]['pic_title']) ? $list[$key]['pic_title'] = 'http://news.yaozh.com' . $list[$key]['pic_title'] : $list[$key]['pic_title'] = '';
            }
        }
        $this->banner = M('adv')->where(array('adv_id' => '3', 'status' => 1))->getField('pic');
        $this->list = $list;
        $this->page = $p->show();
        $this->display();
    }

    public function apply()
    {
        $this->condition = 5;
        $this->display();
    }

    public function constitution()
    {
        $this->condition = 5;
        $this->banner = M('adv')->where(array('adv_id' => '5', 'status' => 1))->getField('pic');
        $this->display();
    }

    public function contactUs()
    {
        $this->condition = 6;
        $this->banner = M('adv')->where(array('adv_id' => '6', 'status' => 1))->getField('pic');
        $this->display();
    }

    public function introduction()
    {
        $this->condition = 2;
        $this->banner = M('adv')->where(array('adv_id' => '2', 'status' => 1))->getField('pic');
        $this->display();
    }

    public function member()
    {
        $this->condition = 5;
        $this->banner = M('adv')->where(array('adv_id' => '5', 'status' => 1))->getField('pic');
        $this->display();
    }

    public function news()
    {
        $this->condition = 4;
        $listRows = 5;
        $count = M('news')->where(array('status' => 1, 'type' => 1, 'user_id' => 0))->count();
        $p = new Page($count, $listRows);
        $list = M('news')->where(array('status' => 1, 'type' => 1, 'user_id' => 0))->limit($p->firstRow . ',' . $p->listRows)->select();
        foreach ($list as $key => $value) {
            if ($value['news_id']) {
                $list[$key] = D('News')->find($value['news_id']);
                $list[$key]['create_time'] = $value['create_time'];
                $list[$key]['id'] = $value['id'];
                isset($list[$key]['pic_title']) ? $list[$key]['pic_title'] = 'http://news.yaozh.com' . $list[$key]['pic_title'] : $list[$key]['pic_title'] = '';
            }
        }
        $this->banner = M('adv')->where(array('adv_id' => '4', 'status' => 1))->getField('pic');
        $this->list = $list;
        $this->page = $p->show();
        $this->display();
    }

    public function newsDetail()
    {
        $this->condition = 4;
        $detail = M('news')->find(I('get.id'));
        if (!$detail) {
            $this->error('页面不存在');
        } else {
            $type = $detail['type'];
            if ($detail['news_id']) {
                $detail = D('News')->find($detail['news_id']);
                isset($detail['pic_title']) ? $detail['pic_title'] = 'http://news.yaozh.com' . $detail['pic_title'] : $detail['pic_title'] = '';
                $detail['content'] = str_replace('src="/uploads/', 'src="http://news.yaozh.com/uploads/', $detail['content']);
            }
        }
        $this->banner = M('adv')->where(array('adv_id' => '4', 'status' => 1))->getField('pic');
        $this->detail = $detail;
        $this->display();
    }
    public function user(){
        $this->condition = 5;
        $id = I('get.id');
        $user_info = M('User')->getbyId($id);
        dump($user_info);

        $trends = M("News")->where(['user_id'=>$id,'user_news_type'=>1,'status'=>1])->select();
        dump($trends);

        $reports = M("News")->where(['user_id'=>$id,'user_news_type'=>2,'status'=>1])->select();
        dump($reports);
    }
    public function search()
    {
        echo $key = I('get.q');
        $listRows = 5;
        $count = M('news')->where(array('title'=>['LIKE',$key],'status' => 1, 'user_id' => 0))->count();
        $p = new Page($count, $listRows);
        $list = M('news')->where(array('title'=>['LIKE',$key],'status' => 1, 'user_id' => 0))->limit($p->firstRow . ',' . $p->listRows)->select();
        
        foreach ($list as $key => $value) {
            if ($value['news_id']) {
                $list[$key] = D('News')->find($value['news_id']);
                $list[$key]['create_time'] = $value['create_time'];
                $list[$key]['id'] = $value['id'];
                isset($list[$key]['pic_title']) ? $list[$key]['pic_title'] = 'http://news.yaozh.com' . $list[$key]['pic_title'] : $list[$key]['pic_title'] = '';
            }
        }
        $this->banner = M('adv')->where(array('adv_id' => '4', 'status' => 1))->getField('pic');
        $this->list = $list;
        $this->page = $p->show();
        $this->display();
    }

}
