<?php
namespace Admin\Model;

use Think\Model\ViewModel;

class AdvViewModel extends ViewModel
{
    public $viewFields = array(
        'Adv' => array('id', 'title', 'adv_id', 'pic', 'link'),
        'AdvPlace' => array('title' => 'place_title', '_on' => 'Adv.adv_id = AdvPlace.id'),
        //@more
    );
}
