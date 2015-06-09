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
<script language='javascript'>
function CheckSubmit()
{
	if(!document.form1.title.value&&!document.form1.news_id.value)
	{
   		document.form1.title.focus();
   		alert("请填写文章标题或要药智新闻id");
   		return false;
	}

	return true;
}
</script>
<form method=post  name="form1" action="<?php echo U('news/add');?>" onSubmit="return CheckSubmit();">
	<input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
	<table border="0" cellspacing="0" cellpadding="0" class="vbm">
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">文章标题： </td>
		  <td colspan="3"> <input name="title" type="text" class="text" value="<?php echo ($info['title']); ?>" size="50"></td>
		</tr>
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">关联药智新闻id： </td>
		  <td colspan="3"> <input name="news_id" type="text" class="text" value="<?php echo ($info['news_id']); ?>" size="50"></td>
		</tr>
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">作者： </td>
		  <td colspan="3"> <input name="author" type="text" class="text" value="<?php echo ($info['author']); ?>" size="50"></td>
		</tr>
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">来源： </td>
		  <td colspan="3"> <input name="refer_url" type="text" class="text" value="<?php echo ($info['refer_url']); ?>" size="50"></td>
		</tr>
		<tr bgcolor="#f5fbff" >
			<td width="12%" align="right">图片：</td>
			<td colspan="3">
				<input id="upload" name='pic_title' type="hidden" style='width: 300px' value="<?php echo ($info['pic_title']); ?>" />
                <div id="myeditor" class="edui-default" style="display: none;"></div>
                <input type="button" id='image' value='上传图片'/>
			</td>
		</tr>
		<tr id="previewtr">
			<td width="12%" align="right"></td>
			<td colspan="3"><img <?php if($info['pic_title'] == ''): ?>src="/public/images/pview.gif" <?php else: ?> src="<?php echo ($info['pic_title']); ?>"<?php endif; ?> id="preview" style='max-height:200px'/></td>
		</tr>
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">img_alt： </td>
		  <td colspan="3"> <input name="img_alt" type="text" class="text" value="<?php echo ($info['img_alt']); ?>" size="50"></td>
		</tr>
		<tr bgcolor="#f5fbff" >
		  <td width="12%" align="right">是否上首页： </td>
		  <td colspan="3"> <input name="is_top" type="radio" value="1" <?php if($info['is_top'] == 1): ?>checked<?php endif; ?>>是<input name="is_top" type="radio" value="0" <?php if($info['is_top'] == 0): ?>checked<?php endif; ?>>否</td>
		</tr>
	</table>
	<div style="margin-top:3px;">
		描述：
		<textarea name="description" id="ueditor_contents2" cols="" style='height:100px;width:50%'><?php echo ($info['description']); ?></textarea>
	</div>
	<div style="margin-top:3px;">
		内容：
		<textarea name="content" id="ueditor_contents" cols="" rows="10" style='height:500px;width:100%'><?php echo ($info['content']); ?></textarea>
	</div>
	<center>
		<input type="submit" value="提 交" class="sunjoin large"/>
	</center>
</form>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript">
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
    window.UEDITOR_HOME_URL = "/public/ueditor/";
    ue1 = UE.getEditor('ueditor_contents');
    ue2 = UE.getEditor('ueditor_contents2');
</script>

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