<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ($title); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?>" />
<meta name="description" content="<?php echo ($description); ?>" />
<script>
	window.config = {
		baseUrl : 'http://static.yaozh.com/js'
	}
	var baseUrl = '/public/home';
</script>
<link rel="stylesheet" type="text/css" href="/public/home/css/cb.css">
<script src="http://static.yaozh.com/js/app.js"></script>
<script>
  require([baseUrl+'/js/pages.js'],function(pages){
    pages.share();
  });
</script>
<!--[if IE 6]> 
<script src="JS/IE6.js"></script>
<script>
	DD_belatedPNG.fix('a,li,h3,span,img,png,div,label,b,i');
</script>
<![endif]-->
</head>

<body>
<div class="main">
<!--top-->
      <div class="w t">
    <div class="top">
      <a class="logo" href="#" target="_blank" title="药智俱乐部"><img src="/public/home/images/logo.png"></a>
      <div class="to">
        <div id="nav" class="nav">
          <?php if(is_array($topNav)): foreach($topNav as $k=>$tn): ?><div class="item <?php if($k==0){echo 'first-item';} ?>"><a class="name" href="<?php if($tn['_child'][0]!='') echo 'javascript:;'; else echo $tn['url']; ?>"><?php echo ($tn['title']); ?></a>
            <?php if($tn['_child'][0] != ''): ?><div class="subnav">
                <div class="arrow">
                  <i class="arrow-top"></i>
                  <i class="arrow-bottom"></i>
                </div>
                <ul>
                <?php if(is_array($tn['_child'])): foreach($tn['_child'] as $key=>$tnc): ?><li><a href="<?php echo ($tnc['url']); ?>" class="sname"><?php echo ($tnc['title']); ?></a></li><?php endforeach; endif; ?>
                </ul>
              </div><?php endif; ?> 
            </div><?php endforeach; endif; ?>
        </div>
        <div class="search">
          <div class="to-input">
            <input class="text" type="text" />
            <a href="javascript:;" class="button"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--banner-->
	<div class="banner2">
    	<img src="<?php echo ($banner); ?>">
    </div>
    <div class="w intr">
    	<div class="w1 int intss ">
        	<div class="map"><a href="club.html">首页</a>><a href="club-news.html" >新闻</a>><span><?php echo ($detail['title']); ?></span></div>
            <div class="detail">
            	<h1><?php echo ($detail['title']); ?></h1>
                <h2>作者：<?php echo ($detail['author']); ?>　|　时间：<?php echo date('Y-m-d',$detail['create_time']);?> |　来自:<?php echo ($detail['refer_url']); ?><span class="de-span">分享到：
                <a class="de1" href="javascript:;" title="新浪微博"></a><a class="de2" href="javascript:;" title="微信"></a><a class="de3" href="javascript:;" title="腾讯微博"></a><a class="de4" href="javascript:;" title="人人网"></a></span></h2> 
                <div class="de-p">
                    <?php echo ($detail['content']); ?>
                </div>
            </div>
            
        </div>
    </div>
     
<!--foot-->
	  <div class="w foot">
    <div class=" w1 ft">
      <div class="ft-r">
        <div class="fts">
          <ul>
            <?php if(is_array($bottomNav)): foreach($bottomNav as $k=>$bn): ?><li><a href="<?php echo ($bn['url']); ?>"><?php echo ($bn['title']); ?></a><span><?php if(count($bottomNav)!=($k+1)) echo '|'; ?></span></li><?php endforeach; endif; ?>
          </ul> 
        </div>
        <?php echo (htmlspecialchars_decode($copyright['value'])); ?>
        <div class="lik">
          <a href="http://weibo.com/yaozh008" target="_blank" title="新浪微博"><img src="/public/home/images/sina.png"></a>
          <a href="http://e.t.qq.com/yaozhcom" target="_blank" title="微信"><img src="/public/home/images/weixin.png"></a>
          <a href="http://user.qzone.qq.com/845146016/infocenter" target="_blank" title="腾讯微博"><img src="/public/home/images/tencent.png"></a>
          <a href="http://mp.weixin.qq.com/s?__biz=MzAxODA5MTU3NQ==&mid=203896545&idx=7&sn=9241981401196ce48b35f9b37eeee09b#rd" target="_blank" title="QQ空间"><img src="/public/home/images/qq.png"></a>
        </div>    
      </div>
      <div class="ft-xx">
        <div class="fx-1">
          <span>客服QQ：1609316746</span>
          <span>电子邮箱：1609316746@qq.com</span>
          <span>电话：023-62988285-8005</span>
        </div>
        <div class="fps">
          友情链接：
          <?php if(is_array($friendlink)): foreach($friendlink as $key=>$fl): ?><a href="<?php echo ($fl['content']); ?>" target="_blank"> <?php echo ($fl['name']); ?> </a><?php endforeach; endif; ?>
        </div>  
      </div> 
    </div>
  </div> 		
</div>
</body>
</html>