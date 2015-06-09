<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			all nodes
		</title>
		<style type="text/css">
		body{background-color:white; font-size:12px; margin:0px; padding:0px; color:#666;min-height: 420px} 

		ul{ margin:0; padding:2px 0;}
		li{ padding-left:5px; list-style:none!important}
		.div{float:left; height:200px; margin:10px 5px 10px 20px; _margin:10px 4px 10px 20px; width:83px;}
		a{ color:#06c; text-decoration:none; }
		a:hover{ color:#06c; text-decoration:underline; }
		dl{ margin:0; padding:0; }

		.h{ margin:0; font-weight:bold; padding:2px 5px; line-height:20px; font-size:13px}

		.r{ font-weight:bold; padding:2px 5px; overflow:hidden}
		.list{ border-right:1px #eee solid}
		</style>
	</head>
	<body>
		<?php if(is_array($all_nodes)): foreach($all_nodes as $k=>$vo): ?><div class="div">
			<div class="h <?php if($k != 5): ?>list<?php endif; ?>">
				<?php echo ($vo["title"]); ?>
			</div>
			<dl class=" <?php if($k != 5): ?>list<?php endif; ?>" id="<?php echo ($vo["name"]); ?>">
				<?php if(is_array($vo["_child"])): foreach($vo["_child"] as $key=>$vo1): ?><ul>
					<li style="list-style: none; display: inline">
						<div class="r">
							<?php echo ($vo1["title"]); ?>
						</div>
					</li>
					<?php if(is_array($vo1["_child"])): foreach($vo1["_child"] as $key=>$vo2): ?><li><a href="/admin/<?php echo ($vo1["name"]); ?>/<?php echo ($vo2["name"]); ?>" target="framRight"><?php echo ($vo2["title"]); ?></a></li><?php endforeach; endif; ?>
				</ul><?php endforeach; endif; ?>
			</dl>
		</div><?php endforeach; endif; ?>
	</body>
</html>