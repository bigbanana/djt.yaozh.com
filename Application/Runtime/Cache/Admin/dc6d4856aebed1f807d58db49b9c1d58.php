<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <title><?php echo ($title); ?></title>
        <link href='/public/css/sunjoin.css' rel='stylesheet' type='text/css'>
        <script language="javascript">
		var current_domain = '';
		</script>
        <script type="text/javascript" src="/public/js/messagebox.js"></script>
        <link rel="stylesheet" href="//lib.sinaapp.com/js/jquery-ui/1.10.2/themes/cupertino/jquery-ui.min.css">
        <link rel="stylesheet" href="//lib.sinaapp.com/js/jquery-ui/1.10.2/themes/cupertino/jquery.ui.theme.css">
        <script src="//lib.sinaapp.com/js/jquery/1.10.2/jquery-1.10.2.min.js"></script>
        <script src="//lib.sinaapp.com/js/jquery-ui/1.10.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/public/js/mymps.js"></script>
        <script type="text/javascript" src="/public/js/titlealt.js"></script>
    </head>
    <body>
        <div class='bodytitle'>
            <div class='bodytitleleft'></div>
            <div class='bodytitletxt'><?php echo ($title); ?></div>
            <div class='bodytitleright'></div>
            <div class='iicon'>
                <a href='javascript:window.location.reload();'>刷新</a>
                <a href='javascript:history.back();'>后退</a>
                <a href='javascript:history.go(1);'>前进</a>
            </div>
        </div>
        <div class="clear"></div>
        <div style="margin-left:10px; margin-top:5px;margin-right:10px;">
            <div id="sunjoin">
            <script language="javascript" src="/public/js/vbm.js"></script>
            <form action="" method="get">
                <table border="0" cellspacing="0" cellpadding="0" class="vbm">
                    <tr class="firstr">
                        <td colspan="2">
                            搜索符合条件的会员
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="background-color:#f1f5f8; width:40%">
                            用户名(username)
                        </td>
                        <td>
                            &nbsp;
                            <input name="username" class="text" value="<?php echo I('get.username');?>">
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="background-color:#f1f5f8; width:40%">
                            所属用户组
                        </td>
                        <td>
                            &nbsp;
                            <select name="role_id">
                                <option value=''>
                                    >不限组别
                                </option>
                                <?php if(is_array($role)): foreach($role as $key=>$vo): if($vo['id'] != 1): ?><option value="<?php echo ($vo['id']); ?>" <?php if($vo[id] == $role_id): ?>selected<?php endif; ?>>
                                        <?php echo ($vo['name']); ?>
                                    </option><?php endif; endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <center>
                    <input type="submit" value="提 交" class="sunjoin large" />
                </center>
                <div class="clear" style="margin-bottom:5px">
                </div>
            </form>
            <form name='form1' method='post' action='<?php echo u('user/do_action');?>' onSubmit='return checkSubmit();'>
                <table border="0" cellspacing="0" cellpadding="0" class="vbm">
                    <tr class="firstr">
                        <td width="30">选择</td>
                        <td width="30">编号</td>
                        <td>用户名</td>
                        <td width="300">用户组</td>
                        <td>上次登陆IP</td>
                        <td>注册时间</td>
                        <td>上次登录</td>
                        <td width="30">编辑</td>
                    </tr>
                    <tbody>
                    	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr align="center" bgcolor="white">
                            <td><input type='checkbox' name='ids[]' value='<?php echo ($vo["uid"]); ?>' class='checkbox' id="<?php echo ($vo["uid"]); ?>"></td>
                            <td><?php echo ($vo["uid"]); ?></td>
                            <td><a href="javascript:void(0);" onclick="javascript:;"><?php echo ($vo["username"]); ?></a></td>
                            <td><?php if($vo["role_name"] == ''): ?>普通用户<?php else: echo ($vo["role_name"]); ?>&nbsp;&nbsp;&nbsp;<?php if($vo["deadline"] > time()): ?>[过期时间：<?php echo (date('Y-m-d',$vo["deadline"])); ?>]<?php else: ?>已过期<?php endif; endif; ?></td>
                            <td><a href="javascript:setbg('查看IP所在地',600,405,'http://ip.cn/index.php?ip=<?php echo ($vo["lastloginip"]); ?>')" title="点击查看注册地"><?php echo ($vo["lastloginip"]); ?></a></td>
                            <td><?php echo date('Y-m-d H:i',$vo['regdate'])?></td>
                            <td><?php echo date('Y-m-d H:i',$vo['lastlogintime'])?></td>
                            <td><a href="javascript:;">详情</a></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                    <tr bgcolor="#ffffff" height="28">
                        <td style="border-right:1px #fff solid;">
                            <input name="checkall" type="checkbox" id="checkall" onClick="CheckAll(this.form)"
                            class="checkbox" />
                        </td>
                        <td colspan="10">
                                <b>
                                    转为->
                                </b>
                                <?php foreach ($role as $k => $v): ?>
                                <label for='<?php echo ($k+1); ?>'>
                                    <input name='change_role' value='<?php echo ($v["id"]); ?>' type='radio' id='<?php echo ($k+1); ?>'>
                                    <?php echo ($v["name"]); ?>
                                </label>    
                                <?php endforeach ?>
                                <hr style="height:1px; border:1px #c5d8e8 solid;" />
                                <b>
                                    过期时间->
                                </b>
                                <label for="deadline">
                                    <input name="deadline" class="datepicker" value="0" size='10' style='text-align:center'><font color="red">*</font>
                                </label>
                        </td>
                    </tr>
                </table>
                <center>
                    <input type="submit" value="提 交" class="sunjoin large" />
                </center>
            </form>
            <div class="pagination">
                <?php echo ($page); ?>
            </div>
	        </div>
	</div>
    <div class="clear" style="height:10px"></div>
    <div class="copyright">
        <a href="javascript:scroll(0,0)" style="margin-left:10px;">至顶端↑</a></div>
    </div>

	<script>
    if($( ".datepicker" ).length) {
        $(function() {
            $( ".datepicker" ).each(
                function(){
                    $(this).datepicker({
                        dateFormat: 'yy-mm-dd',
                    });
                }
            );
        });
        $(function($){  
            $.datepicker.regional['zh-CN'] = {  
                closeText: '关闭',  
                prevText: '<上月',  
                nextText: '下月>',  
                currentText: '今天',  
                monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],  
                monthNamesShort: ['一','二','三','四','五','六','七','八','九','十','十一','十二'],  
                dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],  
                dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
                dayNamesMin: ['日','一','二','三','四','五','六'],  
                weekHeader: '周',  
                dateFormat: 'yy-mm-dd',  
                firstDay: 1,  
                isRTL: false,  
                showMonthAfterYear: true,  
                yearSuffix: '年'};  
            $.datepicker.setDefaults($.datepicker.regional['zh-CN']);  
        });
    }
	
    
	</script>
    <style>
        #ui-datepicker-div{z-index: 1000 !important;}
    </style>
</body>
</html>