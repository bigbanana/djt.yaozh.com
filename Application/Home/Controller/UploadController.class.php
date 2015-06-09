<?php
/**
 * THINKPHP OSS上传类
 */
namespace Home\Controller;
use Think\Model;
use Common\Controller\BaseController;

class UploadController extends BaseController {
    public function _initialize() {
        parent::_initialize();
        $this->config = C('UPLOAD_CONFIG');
        //ACCESS_ID
        define('OSS_ACCESS_ID', C('OSS_ACCESS_ID'));
        //ACCESS_KEY
        define('OSS_ACCESS_KEY', C('OSS_ACCESS_KEY'));
        //是否记录日志
        define('ALI_LOG', C('ALI_LOG'));
        //自定义日志路径，如果没有设置，则使用系统默认路径，在./logs/
        //define('ALI_LOG_PATH',''));
        //是否显示LOG输出
        define('ALI_DISPLAY_LOG', C('ALI_DISPLAY_LOG'));
        //语言版本设置
        define('ALI_LANG', C('ALI_LANG'));
        //bucket设置
        define('BUCKET', C('BUCKET'));
        //bucket域名设置
        define('URL', C('URL'));
        require_once 'oss_php_sdk/sdk.class.php';
        $this->oss_sdk_service = new \ALIOSS();
        $this->bucket = BUCKET;
    }
    public function index() {
        $action = $_GET['action'];
        
        switch ($action) {
            case 'config':
                $result = json_encode($this->config);
                break;
                /* 上传图片 */
            case 'uploadimage':
                $result = $this->uploadimage();
                break;
                /* 列出图片 */
            case 'listimage':
                $result = $this->listimage();
                break;

            default:
                $result = json_encode(array(
                    'state' => '请求地址出错'
                ));
                break;
        }
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state' => 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }
    public function uploadimage() {
        $file = $_FILES[$this->config['imageFieldName']];
        $type = strtolower(substr($file['name'], strrpos($file['name'], '.')));
        if (in_array($type, $this->config["imageAllowFiles"]) === false) 
        return json_encode(array(
            'state' => '文件格式不允许'
        ));
        if ($file['size'] > $this->config["imageMaxSize"]) 
        return json_encode(array(
            'state' => '文件大小超出限制'
        ));
        //用户空间大小检测 todo
        //用户空间大小检测 todo end
        if(!$this->loginstatus&&!$_SESSION['authId']){
            $object = "default/".md5_file($file['tmp_name']). $type;
        }
        else{
            $object = ($_SESSION['authId']?"system_".$_SESSION['authId']:$this->uid) . '/' . md5_file($file['tmp_name']) . $type;            
        }
        $file_path = $file['tmp_name'];

        $response = $this->oss_sdk_service->get_object_meta($this->bucket, $object);

        if($response->status != 200){
            $response = $this->oss_sdk_service->upload_file_by_file($this->bucket, $object, $file_path);
            $is_newfile = true;
        }
        
        if ($response->status != 200) 
            return json_encode(array(
                'state' => '上传错误!'
            ));
        else {
            $return = array(
                "state" => 'SUCCESS',
                "url" => URL . $object,
                "title" => $file['name'],
                "original" => $file['name'],
                "type" => $type,
                "size" => $file['size']
            );
            if($_SESSION['authId'] == '' && $this->uid && $is_newfile){
                /*
                $data = array(
                    "title" => $return['title'],
                    "picurl"=>$return['url'],
                    "create_time"=>time(),
                    "user_id"=>$this->uid,
                    "size"=>$return['size']
                );
                M('ShopPhoto')->add($data);
                */
            }
            return json_encode($return);
        }
    }
    public function listimage() {
        $options = array(
            'delimiter' => '/',
            'prefix' => ($_SESSION['authId']?"system_".$_SESSION['authId']:$this->uid) . '/',
            'max-keys' => 100
        );
        // dump($options);
        $req = $this->oss_sdk_service->list_object($this->bucket, $options);
        // dump($req);
        if ($req->status != 200) 
        return json_encode(array(
            'state' => ' :( ，抱歉，没有找到图片！请重试一次！'
        ));
        $req = json_decode(json_encode((array)simplexml_load_string($req->body)) , true);
        
        // var_dump($req["Contents"]);

        if ($req["Contents"] == NULL) 
        return json_encode(array(
            'state' => ' :( ，抱歉，没有找到图片！请重试一次！'
        ));

        $files = array();
        if($req["Contents"][0]) {
            foreach ($req["Contents"] as $k => $v) {
                $files[] = array(
                    'url' => URL . $v['Key'],
                    'mtime' => strtotime($v['LastModified'])
                );
            };
        } else {
            $files[] = array(
                'url' => URL . $req["Contents"]['Key'],
                'mtime' => strtotime($req["Contents"]['LastModified'])
            );
        }
        

        // dump($files);

        $listSize = $this->config['imageManagerListSize'];
        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;
        $len = count($files);
        
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--) {
            $list[] = $files[$i];
        }
        //倒序
        /*for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
            $list[] = $list[$i];
        }*/
        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));
        
        return $result;
    }
    /*public function transfer() {
        $id = $_GET['id'];
        $w['id'] = array('gt','39843');
        $w['thumb'] = array('neq','');
        $item = M('Supply')->field('id,shop_id,thumb')->where($w)->limit($id-1,1)->select();
        $thumb = $item[0]['thumb'];
        $userinfo = M('Shop')->field('user_id')->getbyId($item[0]['shop_id']);
        $type = '.jpg';
        if($userinfo['user_id'] == null) $userinfo['user_id']=0;
        $file_path = str_replace('UploadFiles/', '/alidata/www/old.yaozh.com/yaozhishop/UploadFiles/', $thumb);
        if(!is_file($file_path)) {
            // die(M('Supply')->getlastsql());
            $nexturl = 'http://shop.yaozh.com/upload/transfer?id='.($id+1);
            echo '<meta http-equiv="refresh" content="1; url='.$nexturl.'" />';
            die();
        }
        $object = $userinfo['user_id'] . '/' . md5_file($file_path) . $type;

        $response = $this->oss_sdk_service->get_object_meta($this->bucket, $object);

        if($response->status != 200){
            $response = $this->oss_sdk_service->upload_file_by_file($this->bucket, $object, $file_path);
            $is_newfile = true;
        }
        
        if ($response->status != 200) {
            dump($userinfo['user_id']);
            dump($response);
            echo "上传失败".$file_path;
        }else {
            $return = array(
                "state" => 'SUCCESS',
                "url" => URL . $object,
                "title" => md5_file($file_path),
                "original" => md5_file($file_path),
                "type" => $type,
            );
            $supply = array(
                'id'=>$item[0]['id'],
                'thumb'=>$return['url']
                );
            M('Supply')->save($supply);
           
            dump($supply);
            $nexturl = 'http://shop.yaozh.com/upload/transfer?id='.($id+1);
            echo '<meta http-equiv="refresh" content="1; url='.$nexturl.'" />';
        }
    }*/
}
?>