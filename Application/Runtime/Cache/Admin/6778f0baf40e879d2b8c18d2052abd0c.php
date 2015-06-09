<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf8'>
	<link rel="stylesheet" type="text/css" href="/public/css/menu.css" />
	<script type="text/javascript" src="/public/js/ShowLeft.js"></script>
	<script type="text/javascript" src="/public/js/mymps_noerr.js"></script>
	<script type="text/javascript">
	function sethighlight(n) {
		var lis = document.getElementsByTagName('a');
		for(var i = 0; i < lis.length; i++) {
			lis[i].className = '';
		}
		this.className = 'hover';
	}
	</script>
</head>
<body>
<div class="admin_menu"><a href="/" target="_blank" class="home">网站首页</a><a href="#" onClick="parent.location='/index.php/admin/'" id="admin">后台首页</a></div>
	<div id="my_menu" class="sunjoin">
		<?php if(is_array($left_menus)): foreach($left_menus as $k=>$vo): ?><dl id="<?php echo ($vo["name"]); ?>"<?php if($k > 0): ?>style='display:none'<?php endif; ?>>
			<span class="wname"><?php echo ($vo["title"]); ?></span>
			<?php if(is_array($vo["_child"])): foreach($vo["_child"] as $key=>$vo1): ?><div>
				
				<span><?php echo ($vo1["title"]); ?></span>
				<?php if(is_array($vo1["_child"])): foreach($vo1["_child"] as $key=>$vo2): ?><a href="javascript:void(0);" onClick="sethighlight();this.className='hover';parent.framRight.location='/admin/<?php echo ($vo1["name"]); ?>/<?php echo ($vo2["name"]); ?>';"  ><?php echo ($vo2["title"]); ?></a><?php endforeach; endif; ?>
				
			</div><?php endforeach; endif; ?>
		</dl><?php endforeach; endif; ?>
	</div>
</body>
</html>