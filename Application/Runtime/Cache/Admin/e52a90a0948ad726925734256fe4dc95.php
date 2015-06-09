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
                            搜索符合条件的申请
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="background-color:#f1f5f8; width:40%">
                            开始时间
                        </td>
                        <td>
                            &nbsp;
                            <input name="start_time" class="text datepicker" value="<?php if(!empty($start_time)): echo date('Y-m-d',$start_time); endif; ?>" size="50">
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="background-color:#f1f5f8; width:40%">
                            截止时间
                        </td>
                        <td>
                            &nbsp;
                            <input name="end_time" class="text datepicker" value="<?php if(!empty($end_time)): echo date('Y-m-d',$end_time); endif; ?>" size="50">
                        </td>
                    </tr>
                    <tr bgcolor="#ffffff">
                        <td style="background-color:#f1f5f8; width:40%">
                            状态
                        </td>
                        <td>
                            &nbsp;
                            <select name="status">
                                <option value='' <?php if($status == ''): ?>selected<?php endif; ?>>
                                    >不限
                                </option>
                                <option value="0" <?php if($status == '0'): ?>selected<?php endif; ?>>
                                    >删除
                                </option>
                                <option value="1" <?php if($status == '1'): ?>selected<?php endif; ?>>
                                    >通过
                                </option>
                                <option value="2" <?php if($status == '2'): ?>selected<?php endif; ?>>
                                    >申请中
                                </option>
                                <option value="-1" <?php if($status == '-1'): ?>selected<?php endif; ?>>
                                    >未通过
                                </option>
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
            <form name='form1' method='post' action='<?php echo u("user/do_apply");?>' onSubmit='return checkSubmit();'>
                <table border="0" cellspacing="0" cellpadding="0" class="vbm">
                    <tr class="firstr">
                        <td width="30">选择</td>
                        <td width="30">编号</td>
                        <td>姓名</td>
                        <td width="300">单位</td>
                        <td>职务</td>
                        
                        <td>联系方式</td>
                        <td>提交时间</td>
                        <td width="30">审核状态</td>
                    </tr>
                    <tbody>
                    	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr align="center" bgcolor="white">
                            <td><input type='checkbox' name='ids[]' value='<?php echo ($vo["id"]); ?>' class='checkbox' id="<?php echo ($vo["id"]); ?>"></td>
                            <td><?php echo ($vo["uid"]); ?></td>
                            <td><a href="javascript:void(0);" onclick="javascript:;"><?php echo ($vo["name"]); ?></a></td>
                            <td><a href="javascript:void(0);" onclick="javascript:;"><?php echo ($vo["company"]); ?></a></td>
                            <td><a href="javascript:void(0);" onclick="javascript:;"><?php echo ($vo["position"]); ?></a></td>
                            <td><a href="javascript:void(0);" onclick="javascript:;"><?php echo ($vo["phone"]); ?></a></td>
                            <td><?php echo date('Y-m-d H:i',$vo['add_time'])?></td>
                            <td><a href="javascript:;">
                                <?php switch($vo["status"]): case "0": ?>删除<?php break;?>
                                    <?php case "1": ?>通过<?php break;?>
                                    <?php case "2": ?>申请中<?php break;?>
                                    <?php default: endswitch;?>
                            </a></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                    <tr bgcolor="#ffffff" height="28">
                        <td style="border-right:1px #fff solid;">
                            <input type="checkbox" id="checkall" onClick="CheckAll(this.form)"
                            class="checkbox" />
                        </td>
                        <td colspan="10">
                                <b>
                                    设为->
                                </b>
                                <input name='status' value='0' type='radio'>
                                    删除
                                <input name='status' value='1' type='radio'>
                                    通过
                                <input name='status' value='2' type='radio'>
                                    申请中
                                <input name='status' value='-1' type='radio'>
                                    未通过
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