<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
use Org\Util\Rbac;

class PublicController extends BaseController {
    public function index() {
        $this->display();
    }
    public function login() {
        if (IS_POST) {
            if (empty($_POST['username'])) {
                $this->error('帐号错误！');
            } elseif (empty($_POST['password'])) {
                $this->error('密码必须！');
            }
            //生成认证条件
            $map = array();
            // 支持使用绑定帐号登录
            $map['username'] = $_POST['username'];
            $map["status"] = array(
                'gt',
                0
            );
            $authInfo = RBAC::authenticate($map);
            //使用用户名、密码和状态的方式进行认证
            if (false === $authInfo) {
                $this->error('帐号不存在或已禁用！');
            } else {
                if ($authInfo['password'] != md5(md5($_POST['password']))) {
                    $this->error('密码错误！');
                }
                $_SESSION[C('USER_AUTH_KEY') ] = $authInfo['id'];
                $_SESSION['username'] = $authInfo['username'];
                $_SESSION['name'] = $authInfo['name'];
                $_SESSION['last_login_time'] = $authInfo['last_login_time'];
                $_SESSION['last_login_ip'] = $authInfo['last_login_ip'];
                $_SESSION['login_count'] = $authInfo['login_count'];
                if ($authInfo['username'] == 'administrator') {
                    $_SESSION['administrator'] = true;
                }
                //保存登录信息
                $User = M('Admin');
                $ip = get_client_ip();
                $time = time();
                $data = array();
                $data['id'] = $authInfo['id'];
                $data['last_login_time'] = $time;
                $data['login_count'] = array(
                    'exp',
                    'login_count+1'
                );
                $data['last_login_ip'] = $ip;
                $User->save($data);
                // 缓存访问权限
                RBAC::saveAccessList();
                $this->success('登录成功！', __APP__ . '/admin');
            }
        } else {
            $this->display();
        }
    }
    // 用户登出
    public function logout() {
        if(isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_destroy();
            $this->success('登出成功！','/admin/public/login/');
        }else {
            $this->error('已经登出！');
        }
    }
}
