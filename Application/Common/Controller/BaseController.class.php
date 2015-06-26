<?php
namespace Common\Controller;

use Org\Util\Rbac;
use Think\Controller;
use Think\Page;

/**
 *
 */
class BaseController extends Controller
{

    public function _initialize()
    {
        if (MODULE_NAME == "Admin") {
            $this->waitSecond = 2;
            $title = M('AdminNode')->where(array(
                'name' => CONTROLLER_NAME,
                'level' => "1",
            ))->find();
            $pid = $title['id'];
            $title = $title['title'];
            $sub_title = M('AdminNode')->where(array(
                'name' => ACTION_NAME,
                'pid' => $pid,
            ))->find();
            $sub_title = $sub_title['title'];
            if ($sub_title['title']) {
                $this->title = $title . ' / ' . $sub_title;
            } else {
                $this->title = $title;
            }

            //检查认证识别号
            if (!$_SESSION[C('USER_AUTH_KEY')] && CONTROLLER_NAME != 'Public') {
                //跳转到认证网关
                redirect(PHP_FILE . C('USER_AUTH_GATEWAY'));
            }
            // 用户权限检查
            if (C('USER_AUTH_ON') && !in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_MODULE')))) {
                if (!RBAC::AccessDecision()) {
                    // 没有权限 抛出错误
                    if (C('RBAC_ERROR_PAGE')) {
                        // 定义权限错误页面
                        redirect(C('RBAC_ERROR_PAGE'));
                    } else {
                        if (C('GUEST_AUTH_ON')) {
                            $this->assign('jumpUrl', PHP_FILE . C('USER_AUTH_GATEWAY'));
                        }
                        // 提示错误信息
                        $this->error(L('_VALID_ACCESS_'));
                    }
                }
            }
        } elseif (MODULE_NAME == "Home") {
            $webStat = M('site')->where(array('name' => 'status'))->getField('value');
            isset($webStat) ? '' : die(M('site')->where(array('name' => 'stop_notice'))->getField('value'));
            $this->title = M('site')->where(array('name' => 'title'))->getField('value');
            $this->keyword = M('site')->where(array('name' => 'keywords'))->getField('value');
            $this->description = M('site')->where(array('name' => 'description'))->getField('value');
            $topNav = M('nav')->where(array('type' => '顶部导航'))->select();
            $bottomNav = M('nav')->where(array('type' => '底部导航'))->select();
            $this->topNav = unlimitListTree($topNav);
            $this->bottomNav = unlimitListTree($bottomNav);
            //footer
            $this->copyright = M('site')->where(array('name' => 'copyright'))->find();
            $this->friendlink = M('friendlink')->select();
        }
    }

    protected function _list($model, $map, $sortBy = '', $asc = false, $relation = false)
    {
        //排序字段 默认为主键名
        if (isset($_REQUEST['_order'])) {
            $order = $_REQUEST['_order'];
        } else {
            $order = !empty($sortBy) ? $sortBy : $model->getPk();
        }
        //排序方式默认按照倒序排列
        //接受 sost参数 0 表示倒序 非0都 表示正序
        if (isset($_REQUEST['_sort'])) {
            $sort = $_REQUEST['_sort'] ? 'asc' : 'desc';
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }
        //取得满足条件的记录数
        $count = $model->where($map)->count();
        if ($count > 0) {
            // import("@.ORG.Util.Page");
            //创建分页对象
            if (!empty($_REQUEST['listRows'])) {
                $listRows = $_REQUEST['listRows'];
            } else {
                $listRows = '20';
            }
            $p = new Page($count, $listRows, '', 0);
            //分页查询数据
            if ($relation) {
                $voList = $model->relation(true)->where($map)->order("`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
            } else {
                $voList = $model->where($map)->order("`" . $order . "` " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
            }

            // echo $model->getlastsql();
            //分页跳转的时候保证查询条件

            /*foreach ($map as $key => $val) {
            if (!is_array($val)) {
            $p->parameter.= "$key=" . urlencode($val) . "&";
            }
            }*/
            //分页显示
            $page = $p->show();
            //列表排序显示
            $sortImg = $sort; //排序图标
            $sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
            $sort = $sort == 'desc' ? 1 : 0; //排序方式
            //模板赋值显示
            var_dump($voList);
            $this->assign('list', $voList);
            $this->assign('sort', $sort);
            $this->assign('order', $order);
            $this->assign('sortImg', $sortImg);
            $this->assign('sortType', $sortAlt);
            $this->assign("page", $page);
        }
        cookie('_currentUrl_', __SELF__);

        return;
    }

}
