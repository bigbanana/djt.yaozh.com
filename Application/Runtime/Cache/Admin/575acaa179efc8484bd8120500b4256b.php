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
<div id="sunjoin">
	<div class="mpstopic-category">
        <div class="panel-tab">
            <ul class="clearfix tab-list">
                <li><a href="?type=0"<?php if($type == 0): ?>class="current"<?php endif; ?>>全部</a></li>
                <li><a href="?type=1"<?php if($type == 1): ?>class="current"<?php endif; ?>>顶部导航</a></li>
                <li><a href="?type=2"<?php if($type == 2): ?>class="current"<?php endif; ?>>底部导航</a></li>
            </ul>
        </div>
	</div>
<table border="0" cellspacing="0" cellpadding="0" class="vbm">
	<tbody>
		<tr class="firstr">
			<td width="60">ID</td>
			<td>URL</td>
			<td>标题</td>
			<!-- <td>condition</td> -->
			<td>Type</td>
			<td>排序</td>
			<td width='100'>操作</td>
		</tr>
	</tbody>
	<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr bgcolor="white">
			<td align="left"><?php echo ($vo["id"]); ?></td>
			<td align="left"><?php echo ($vo["url"]); ?></td>
			<td align="left"><?php echo ($vo["title"]); ?></td>
			<!-- <td align="left"><?php echo ($vo["condition"]); ?></td> -->
			<td align="left"><?php echo ($vo["type"]); ?></td>
			<td align="left"><?php echo ($vo["sort"]); ?></td>
			<td align="center"><a href="<?php echo U('Nav/edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a> | <a href="<?php echo U('Nav/delete');?>?id=<?php echo ($vo["id"]); ?>" onclick='return confirm("确定删除吗？")'>删除</a></td>
		</tr>
		<?php if($vo['_child'] != ''): if(is_array($vo['_child'])): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr bgcolor="white">
				<td align="left">&nbsp;&nbsp;<?php echo ($v["id"]); ?></td>
				<td align="left"><?php echo ($v["url"]); ?></td>
				<td align="left">----<?php echo ($v["title"]); ?></td>
				<!-- <td align="left"><?php echo ($vo["condition"]); ?></td> -->
				<td align="left"><?php echo ($v["type"]); ?></td>
				<td align="left"><?php echo ($v["sort"]); ?></td>
				<td align="center"><a href="<?php echo U('Nav/edit');?>?id=<?php echo ($vo["id"]); ?>">编辑</a> | <a href="<?php echo U('Nav/delete');?>?id=<?php echo ($vo["id"]); ?>" onclick='return confirm("确定删除吗？")'>删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>

</div>
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