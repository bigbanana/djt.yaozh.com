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
	<script language=javascript>
	$(function(){

		function CheckSubmit(){
			if(document.form1.url.value==""){
				alert('栏目标题请控制在2个字节以上!');
				document.form1.url.focus();
				return false;
			}
			if(document.form1.title.value==""){
				alert('请输入栏目标题！');
				document.form1.title.focus();
				return false;
			}
		}
		var config = {
			'getNav' : "<?php echo U('getNav');?>"
		}
		$.ajaxSetup({
			dataFilter:function(res){
				return $.parseJSON(res);
				// return res;
			}
		})
		var Controller ={};
		Controller.showPid = function(element){
			$.post(config.getNav,{type:element.value},function(res){
				var html = [	'<tr bgcolor="#f5fbff" >',
									'<td width="50px" align="right">父节点</td>',
									'<td colspan="3">',
										'<select name="pid" id="pid">'
								].join('');
				var option = '<option value=0>无</option>';
				$(res).each(function(i,item){
					option += '<option value="'+item.id+'" >'+item.title+'</option>'; 
				})
				html = html + option + ['</select>','</td>','</tr>'].join('');
				$(element).parents('tr').next('tr').remove();
				$(element).parents('table').append(html);
			});
		}
		$('#type').on('change',function(){
			Controller.showPid(this);
		}).trigger('change');
	})
	</script>
<form method=post name="form1" action="" onSubmit="return CheckSubmit();">
	<table border="0" cellspacing="0" cellpadding="0" class="vbm">
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">URL</td>
			<td colspan="3"><input name="url" id="url" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">标题</td>
			<td colspan="3"><input name="title" id="title" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">排序</td>
			<td colspan="3"><input name="sort" id="sort" type="text" class="text" value="500" size="50"> <font color="red">*</font></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">Type</td>
			<td colspan="3">
				<select name="type" id="type">
					<option value="顶部导航" selected="selected">顶部导航</option>
					<option value="底部导航">底部导航</option>
				</select>
			</td>
		</tr>
	</table>
	<center><input type="submit" value="提 交" style="float:left;margin-left:70px" class="sunjoin large"/><input type="button" style="float:left;margin-left:5px" onclick="history.back()" value="返 回" class="sunjoin large"></center>
</form>
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