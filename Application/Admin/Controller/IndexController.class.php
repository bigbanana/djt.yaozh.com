<?php
namespace Admin\Controller;

use Common\Controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        $this->display();
    }
    public function top()
    {
        $menus = M('AdminNode')->where('level="0"')->order("sort asc")->select();

        foreach ($menus as $key => $value) {
            $menus_id[] = "'" . $value['name'] . "'";
        }
        $this->menus_id = implode(',', $menus_id);
        $this->menus = array_values(listToTree($menus));
        $this->display();
    }
    public function left()
    {
        $left_menus = M('AdminNode')->where('level != "-1" and status > 0')->order('id asc')->select();
        $this->left_menus = array_values(listToTree($left_menus, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0));
        // dump($this->left_menus);die();
        $this->display();
    }
    public function right()
    {
        $admin_id = $_SESSION['authId'];
        $this->info = M('admin')->find($admin_id);
        // var_dump($this->info);
        // die;
        // p($this->count);
        $this->display();
    }
    public function all()
    {
        $all_nodes = M('AdminNode')->where('level != "-1" and status > 0')->select();
        $this->all_nodes = array_values(listToTree($all_nodes, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0));
        // dump($this->left_menus);die();
        $this->display();
    }
    public function clear()
    {
    }
}
