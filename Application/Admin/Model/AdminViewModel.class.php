<?php namespace Admin\Model;

use Think\Model\ViewModel;

class AdminViewModel extends ViewModel {
   public $viewFields = array(
	   'Admin'=>array('id','username','name','last_login_time','last_login_ip','login_count'),
	   'AdminRoleUser'=>array('role_id', '_on'=>'Admin.id = AdminRoleUser.user_id'),
	   'AdminRole'=>array('name'=>'role_name', '_on'=>'AdminRole.id = AdminRoleUser.role_id')
   ); 
}