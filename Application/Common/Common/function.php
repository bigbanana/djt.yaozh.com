<?php

/**
 * 将返回的数据集转换成树
 * @param array $list 数据集
 * @param string $pk 主键
 * @param string $pid 父节点名称
 * @param string $child 子节点名称
 * @param integer $root 根节点ID
 * @return array 转换后的树
 */
function listToTree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    $tree = array(); // 创建Tree
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();

        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }

        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[$data[$pk]] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }

    return $tree;
}

function p($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function printUeditor($height = '300', $width = '500', $name = 'ueditor_contents')
{
    $str = <<<EOT
     <script type="text/javascript" charset="utf-8">
        window.UEDITOR_HOME_URL = "/public/ueditor/";  //UEDITOR_HOME_URL、config、all这三个顺序不能改变
        window.onload=function(){
            window.UEDITOR_CONFIG.initialFrameHeight="{$height}";//编辑器的高度
            window.UEDITOR_CONFIG.initialFrameWidth="{$width}";
            window.UEDITOR_CONFIG.elementPathEnabled=false;
            window.UEDITOR_CONFIG.wordCount =false;
            window.UEDITOR_CONFIG.autoHeightEnabled = false;
            // window.UEDITOR_CONFIG.imagePath='/Uploads/thumb/';//编辑器调用图片的地址
            ueditor_contents_{$name} = UE.getEditor('{$name}');
        }

    </script>
    <script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.all.min.js"> </script>
EOT;
    echo $str;
}

/**
 * 无限级分类树
 * @param  array  $arr   欲分级数组
 * @param  string  $pk    主键
 * @param  string  $pid   关联父分类
 * @param  string  $child [description]
 * @param  integer $root  [description]
 * @return array         转换后的树
 * @example $array = array(
'1'=> array(
'id'=>1,
'name'=>'a',
'pid' => 0,
),
'2'=> array(
'id'=>2,
'name' => 'b',
'pid' => 0,
),
'3'=> array(
'id'=>3,
'name' => 'aa',
'pid' =>1,
),
'4'=> array(
'id' =>4,
'name' => 'aaa',
'pid' => 3,
),
'5'=> array(
'id' =>5,
'name' => 'aa2',
'pid' => 1,
),
);
 * @author    maple   <275804511@qq.com>
 */
function unlimitListTree($arr, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    $tree = array();

    foreach ($arr as $key => $value) {
        //主干结点
        if ($value[$pid] == $root) {
            $value[$child] = unlimitListTree($arr, $pk, $pid, $child, $value[$pk]);
            $tree[] = $value;
        }
    }

    return $tree;
}
function getConfig($name){
    $model = M('Site');
    $value = $model->field('value')->getByName($name);

    return htmlspecialchars_decode($value['value']);
}