<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class AdminModel extends RelationModel {
    protected $_link = array(
    	'role' => array(
    		'mapping_type' => self::MANY_TO_MANY,
    		'class_name' => 'admin_role',
    		'foreign_key' => 'user_id',
    		'mapping_name' => 'admin_role',
            'relation_foreign_key'=>'role_id',
            'relation_table'=>'yzclub_admin_role_user'
    		),
    	);
}
