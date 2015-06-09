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
	function CheckSubmit(){
		if(document.form1.adv_id.value==""){
			alert('请选择广告位!');
			document.form1.url.focus();
			return false;
		}
		if(document.form1.title.value==""){
			alert('请输入广告名称！');
			document.form1.title.focus();
			return false;
		}
	}
	</script>
<form method='post' name="form1" action="" onSubmit="return CheckSubmit();">
	<table border="0" cellspacing="0" cellpadding="0" class="vbm">
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">广告位</td>
			<td colspan="3">
				<select name="adv_id" id="adv_id">
					<option value="">请选择广告位</option>
					<?php foreach ($place as $key => $value): ?>
						<option value="<?=$value['id']?>"><?=$value['title']?> (<?=$value['width']?> X <?=$value['height']?>)</option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">名称</td>
			<td colspan="3"><input name="title" id="title" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">内容</td>
			<td colspan="3">
				<input id="upload" name='pic' type="hidden" style='width: 300px' value="" />
                <div id="myeditor" class="edui-default" style="display: none;"></div>
                <input type="button" id='image' value='上传图片'/>
			</td>
		</tr>
		<tr id="previewtr">
			<td width="50px" align="right"></td>
			<td colspan="3"><img src="/public/images/pview.gif" id="preview" style='max-height:200px'/></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">URL</td>
			<td colspan="3"><input name="link" id="url" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr>
		<!-- <tr bgcolor="#f5fbff" >
			<td width="50px" align="right">开始时间</td>
			<td colspan="3"><input name="start_time" id="start_time" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="50px" align="right">结束时间</td>
			<td colspan="3"><input name="end_time" id="end_time" type="text" class="text" value="" size="50"> <font color="red">*</font></td>
		</tr> -->
	</table>
	<center><input type="submit" value="提 交" style="float:left;margin-left:70px" class="sunjoin large"/><input type="button" style="float:left;margin-left:5px" onclick="history.back()" value="返 回" class="sunjoin large"></center>
</form>
<script type="text/javascript">
//这个是图片上传的，网上还有附件上传的
    (function($) {
        var image = {
            editor: null,
            init: function(editorid, keyid) {
                var _editor = this.getEditor(editorid);
                _editor.ready(function() {
                    // _editor.hide();
                    _editor.addListener('beforeInsertImage', function(t, args) {
                        $("#" + keyid).val(args[0].src);
                        $("#preview").attr('src',args[0].src);
                    });
                });
            },
            getEditor: function(editorid) {
                this.editor = UE.getEditor(editorid);
                return this.editor;
            },
            show: function(id) {
                var _editor = this.editor;
                //注意这里只需要获取编辑器，无需渲染，如果强行渲染，在IE下可能会不兼容（切记）
                //和网上一些朋友的代码不同之处就在这里
                $("#" + id).click(function() {
                    var image = _editor.getDialog("insertimage");
                    image.render();
                    image.open();
                });
            },
            render: function(editorid) {
                var _editor = this.getEditor(editorid);
                _editor.render();
            }
        };
        $(function() {
            image.init("myeditor", "upload");
            image.show("image");
        });
    })(jQuery);
</script>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.all.min.js"> </script>
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