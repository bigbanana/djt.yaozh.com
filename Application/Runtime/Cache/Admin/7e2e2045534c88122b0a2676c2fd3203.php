<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
	<title>系统管理首页</title>
	<link href='/public/css/sunjoin.css' rel='stylesheet' type='text/css'>
	<script type='text/javascript' src='/public/js/mymps.js'></script>
	<script type='text/javascript' src='/public/js/noerr.js'></script>
	<script language="javascript">
	var current_domain = '';
	</script>
	<script type="text/javascript" src="/public/js/messagebox.js"></script>
</head>
<body >
	<div class='bodytitle'>
		<div class='bodytitleleft'></div>
		<div class='bodytitletxt'>系统管理首页</div>
		<div class='bodytitleright'></div>
		<div class='iicon'>
			<a href='javascript:window.location.reload();'>刷新</a>
			<a href='javascript:history.back();'>后退</a>
			<a href='javascript:history.go(1);'>前进</a>
		</div>
	</div>
	<div class="clear"></div>
	<div style="margin-left:10px; margin-top:5px;margin-right:10px;"> 
		<div class="ccc2">
			<ul>
				您好! <font color="#FF6600"><strong><?php echo ($info["name"]); ?></strong></font>。您的IP是：<font color="#FF6600"><strong><?php echo ($info["last_login_ip"]); ?></strong></font>，管理员帐号是<font color="#FF6600"><strong><?php echo ($info["username"]); ?></strong></font>，管理员级别是<font color="#FF6600"><strong><?php if($info["id"] == 1): ?>超级管理员<?php else: echo ($info["role_name"]); endif; ?></strong></font>
			</ul>
		</div>
		<div id="sunjoin">
			<table cellspacing="0" cellpadding="0"  width="100%" align="center" class="vbm">
				<tr class="firstr">
					<td>相关信息统计</td>
					<!--<td width="30%"><b>系统公告</b></td>-->
				</tr>
				<tr bgcolor="#f5fbff">
					<td bgcolor="white" style="padding:10px" class="countstr">
						<div class="countsquare">
							<div class="a">信息◢</div>
							<div class="ab">
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/Supply/index';">供应<br><div class="c"><?php echo ($count["supply"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/Purchase/index';">求购<br><div class="c"><?php echo ($count["purchase"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/InquiryLog/all';">询价<br><div class="c"><?php echo ($count["inquiry_log"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/QuotesLog/all';">报价<br><div class="c"><?php echo ($count["quotes_log"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/Reporter/all';">举报<br><div class="c"><?php echo ($count["reporter"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/Feedback/all';">反馈<br><div class="c"><?php echo ($count["feedback"]); ?></div></a></div>
							</div>
						</div>
						<div class="countsquare">
							<div class="a">会员◢</div>
							<div class="ab">
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/User/index';">用户<br><div class="c"><?php echo ($count["member"]); ?></div></a></div>
								<div class="b"><a href="#" onclick="parent.framRight.location='/admin/Shop/all';">店铺<br><div class="c"><?php echo ($count["shop"]); ?></div></a></div>
							</div>
						</div>
						<div class="countsquare">
							<div class="a">认证 ◢</div>
								<div class="ab">
									<div class="b"><a href="#" onclick="parent.framRight.location='/admin/User/auth?type=2';">企业<br><div class="c"><?php echo ($count["auth_company"]); ?></div></a></div>
									<div class="b"><a href="#" onclick="parent.framRight.location='/admin/User/auth?type=1';">个人<br><div class="c"><?php echo ($count["auth_person"]); ?></div></a></div>
								</div>
							</div>
						</div>
						
					</td>
				</tr>
			</table>
		</div>
		<div id="sunjoin">
			<table cellspacing="0" cellpadding="0"  width="100%" align="center" class="vbm">
				<tr bgcolor="#f5fbff">
					<td width="15" bgcolor="#f5fbff" style="font-weight:bold">快捷操作</td>
					<td bgcolor="white" style="padding:15px;" class="other">
						<div class="mainnav">
							<ul>
								<li><a href="#" onclick="parent.framRight.location='/'"><img border="0" src="/public/images/default/home.gif">网站首页</a></li>
								<li><a href="#" onclick="parent.framRight.location='/admin/User/auth?status=0'"><img border="0" src="/public/images/default/user.png" alt="审核注册">认证审核</a></li>
								<li><a href="#" onclick="parent.framRight.location='/admin/Supply/index?type=1'"><img border="0" src="/public/images/default/tpc.png" alt="供应审核">供应审核</a></li>
								<li><a href="#" onclick="parent.framRight.location='/admin/Purchase/index?type=1'"><img border="0" src="/public/images/default/post.png">求购审核</a></li>
								<li><a href="#" onclick="parent.framRight.location='/admin/Shop/all'"><img border="0" src="/public/images/default/shop.png" height='36px'>店铺列表</a></li>
								<li><a href="#" onclick="parent.framRight.location='/admin/user/index'"><img border="0" src="/public/images/default/users.png" height='36px'>用户列表</a></li>
								<li><a href="/admin/index/clear" onclick='return window.confirm("会清除所有缓存，对服务器造成压力!\r考虑一会儿再回答吧：你还是确定要删除吗？");'><img border="0" src="/public/images/default/clear.png" height='36px'>清除缓存</a></li>
							</ul>
						</div>
					</td>
				</tr>
				<tr bgcolor="#f5fbff" style='display:none'>
					<td width="15" bgcolor="#f5fbff" style="font-weight:bold">常用操作</td>
					<td bgcolor="white" style="padding:15px;" class="other">
						<div>
							<span><input value="常用操作1" onclick="location.href=''" type="button" class="gray mini"></span>
							<span><input value="常用操作2" onclick="location.href=''" type="button" class="gray mini"></span>
							<span><input value="常用操作3" onclick="location.href=''" type="button" class="gray mini"></span>
						</div>
					</td>
				</tr>
				<tr bgcolor="#f5fbff"><td width="15" bgcolor="#f5fbff" style="font-weight:bold">服务器相关</td>
					<td bgcolor="white" style="padding:15px;" class="other">
					<?php
ob_start(); phpinfo(INFO_GENERAL); $phpinfo = array('phpinfo' => array()); if(preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)) foreach($matches as $match) if(strlen($match[1])) $phpinfo[$match[1]] = array(); elseif(isset($match[3])) $phpinfo[end(array_keys($phpinfo))][$match[2]] = isset($match[4]) ? array($match[3], $match[4]) : $match[3]; else $phpinfo[end(array_keys($phpinfo))][] = $match[2]; $phpinfo = $phpinfo['phpinfo']; unset($phpinfo[0]); unset($phpinfo[1]); unset($phpinfo['Configure Command']); ?>						
						<div><span>PHP Version:</span><?php echo PHP_VERSION;?></div>
						<?php foreach ($phpinfo as $key => $value) :?>
						<div style='border-top:1px solid #f6f6f6'><span><?=$key?>:</span><p style="display:table"><?=$value?></p></div>
						<?php endforeach;?>
					</td>
				</tr>
			</table>
		</div>   
		<div class="clear" style="height:10px"></div>
		<div class="copyright">
			<a href="javascript:scroll(0,0)" style="margin-left:10px;">至顶端↑</a>
		</div>
	</div>
</div>
</body>
</html>