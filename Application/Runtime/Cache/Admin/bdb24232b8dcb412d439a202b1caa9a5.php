<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link href="/public/css/head.css" rel="stylesheet" type="text/css">
<title>Administrator's Control Panel</title>
<script type="text/javascript" src="/public/js/menu.js"></script>
<script>
var menus = new Array(<?php echo ($menus_id); ?>);
function togglemenu(id) {
	if(parent.framLeft) {
		for(k in menus) {
			if(parent.framLeft.document.getElementById(menus[k])) {
				parent.framLeft.document.getElementById(menus[k]).style.display = menus[k] == id ? '' : 'none';
			}
		}
	}
}
function sethighlight(n) {
	var lis = document.getElementsByTagName('li');
	for(var i = 0; i < lis.length; i++) {
		lis[i].id = '';
	}
	lis[n].id = 'menuon';
}
var framRight=window.parent.window.document.getElementById("framRight"); 
</script>

<style>
body {
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	background-color:#EAF7FF;
	margin:0;
	padding:0;
	overflow:visible;
}

img{ padding:0; margin:0}
li{ list-style:none;}
</style>
</head>
<body class="top" onLoad="sethighlight('0')">
	<div class="logonav">
	<div class="logo"><img src="/public/images/bglogo.png" border="0" alt="管理后台"/>后台管理系统</div>
	<div class="nav">
		<?php if(is_array($menus)): foreach($menus as $key=>$vo): if($key == 0): ?><li class="home"><a href="#" class="home" onclick=sethighlight('<?php echo ($key); ?>');togglemenu('<?php echo ($vo["name"]); ?>');return false; target=><?php echo ($vo["title"]); ?></a></li>
			<?php else: ?>
				<li class="<?php echo ($vo["name"]); ?>"><a href="#" class="<?php echo ($vo["name"]); ?>" onclick=sethighlight('<?php echo ($key); ?>');togglemenu('<?php echo ($vo["name"]); ?>');return false; target=><?php echo ($vo["title"]); ?></a></li><?php endif; endforeach; endif; ?>
		<li class="more"><a href="javascript:;" class="more" onClick="framRight.contentWindow.setbg('功能菜单',680,550,'/admin/index/all');">全 部&nbsp;</a></li>
	</div>
	<div class="user_info"><span>欢迎回来，</br><font color="#fff"><?php echo $_SESSION['username'];?></font> </span><span class="user_exit"><a href="/admin/public/logout" style="text-decoration:underline;" target="_top">[注销]</a></span></div>
	</div>
<!-- 	<div class="afterlogonav ">
		<div class="left1"><a href="/" target="_blank">网站首页</a></div>
		<div class="left2"><a href="#" onClick="parent.framRight.location='/index.php/admin/index/right'">后台首页</a></div>
		
	</div> -->
</body>
</html>