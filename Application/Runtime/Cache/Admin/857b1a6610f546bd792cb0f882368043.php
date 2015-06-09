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
  <form method=post  name="form1" action="" onSubmit="return CheckSubmit();">
        <table border="0" cellspacing="0" cellpadding="0" class="vbm">
            <tr class="firstr">
              <td width="50">名称</td>
              <td width="80">标记</td>
              <td>内容</td>
              <td>说明</td>
            </tr>
            <?php foreach ($list as $i => $vo) : ?>
            <tr align="center" bgcolor="#f5fbff">
                <td><?=$vo['title']?></td>
                <td><?=$vo['name']?></td>
                <td>
<?php switch ($vo['type']) { default: case 'input': echo '<input type="text" class="text" name="'.$vo['name'].'" value="'.$vo['value'].'">'; break; case 'textarea': echo '<textarea name="'.$vo['name'].'" cols="" rows="10" style="height: 50px; width: 90%;">'.$vo['value'].'</textarea>'; break; case 'radio': if($vo['value'] == 0) echo '<input type="radio" name="'.$vo['name'].'" value="0" checked="checked">关闭 <input type="radio" name="'.$vo['name'].'" value="1">开启'; else echo '<input type="radio" name="'.$vo['name'].'" value="0" >关闭 <input type="radio" name="'.$vo['name'].'" value="1" checked="checked">开启'; break; } ?>

                    
                </td>
                <td><?=$vo['description']?></td>
            </tr>
            <?php endforeach;?>
        </table>
  <center><input type="submit" value="提 交" style='float:left;margin-left:165px' class="sunjoin large"/><input type="button" style='float:left;margin-left:5px' onclick="window.location.href='/admin/site/add'" value="新增配置" class="sunjoin large"></center>
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