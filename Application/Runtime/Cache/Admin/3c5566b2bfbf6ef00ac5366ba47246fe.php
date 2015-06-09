<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>系统后台</title>
		<meta name="robots" content="noindex,nofollow">
		<link href="/public/css/login.css" rel="stylesheet" />
		<script type="text/javascript" src="/public/js/login.js"></script>
	</head>

<body>
	<div class="topbg">
		<span class="left"><a href="#" target="_blank">访问网站首页</a></span>
		<span class="right"><a href="#" onClick="var strHref=window.location.href;this.style.behavior='url(#default#homepage)';this.setHomePage('');" style="cursor: hand">设为首页</a> <a href="#" onClick="collect();">加入收藏</a></span>
	</div>
	<div class="wrap">
		<h1>后台管理中心</h1>
		<form name="Login" action="#" method="post" onSubmit="return CheckForm();">
            <input name="do" value="login" type="hidden">
			<div class="login">
				<ul>
					<li>
						<input class="input" required name="username" type="text" placeholder="帐号" title="管理员帐号" />
					</li>

					<li>
						<input class="input" type="password" required name="password" placeholder="密码" title="管理员密码" />
					</li>
				</ul>
				<button type="submit" name="submit" class="btn">登录管理</button>
			</div>
		</form>
	</div>
</body>
</html>