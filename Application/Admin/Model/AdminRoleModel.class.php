<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class AdminRoleModel extends RelationModel {
    protected $_link = array(
    	'role' => array(
    		'mapping_type' => MANY_TO_MANY,
    		'class_name' => 'admin',
    		'foreign_key' => 'role_id',
    		'mapping_name' => 'admin',
            'relation_foreign_key'=>'user_id',
            'relation_table'=>'yzclub_admin_role_user'
    		),
    	);
}
