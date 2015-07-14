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
<link rel="stylesheet" type="text/css" href="http://static.yaozh.com/css/app.css">
<link rel="stylesheet" type="text/css" href="/public/home/css/cb.css">
<script src="http://static.yaozh.com/js/app.js"></script>
<script>
	AJAXURL={
		'submitUrl' : "<?php echo U('index/apy');?>"
	};
  require([baseUrl+'/js/pages.js','jquery'],function(pages,$){
    pages.apy();
  });
</script>
</head>

<body>
<div class="main">
<!--top-->
      <div class="w t">
    <div class="top">
      <a class="logo" href="/" target="_blank" title="药智俱乐部"><img src="/public/home/images/logo.png"></a>
      <div class="to">
        <div id="nav" class="nav">
          <?php if(is_array($topNav)): foreach($topNav as $k=>$tn): ?><div class="item <?php if($k==0){echo 'first-item';} ?>"><a class="name" href="<?php echo $tn['url']; ?>"><?php echo ($tn['title']); ?></a>
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
        <form action="/index/search" target="_blank" class="search" id='search'>
          <div class="to-input">
            <input class="text" type="text" name='q' value="<?=I('get.q')?>" />
            <a href="javascript:$('#search').submit();" class="button"></a>
          </div>
        </form>
      </div>
    </div>
  </div>
<!--banner-->
   
  <div class="w intr attls">
    <div class="w1 int alss">
        <div class="al">
          <h2 class="al-sh2">成为俱乐部会员后您可以</h2>
          <div class="al-s">
            <span><i class="al-s-i1"></i>尊享私密会议</span>
            <span><i class="al-s-i2"></i>对话行业领袖</span>
            <span><i class="al-s-i3"></i>获取一手资讯</span>
            <span><i class="al-s-i4"></i>站位顶级圈层</span>
            <span><i class="al-s-i5"></i>猎获优质项目</span>
            <span><i class="al-s-i6"></i>嫁接资金支持</span>
          </div>
          <div class="dow">
            <h3>为您提供下载</h3>
            <a href="/public/home/person_apply_table.doc" target="_blank">药智精英俱乐部（个人会员）入会申请表</a>
            <a href="/public/home/company_apply_table.doc" target="_blank">药智精英俱乐部（企业会员）入会申请表</a>    
          </div>
        </div>
        <form class="attl" action="">
          <h2>入会申请</h2>
          <div class="submit">
            <h2>恭喜您,提交成功!</h2>
            <span>我们将在三个工作日内与您联系</span>
          </div>
          <div class="attl-button">
            <div class="bt">
              <i class="bt-i bt-i-name2"></i>
              <input class="input-c" name="name" value="" placeholder="姓名" required >
            </div>
          </div>
          <div class="attl-button">
            <div class="bt">
              <i class="bt-i bt-i-dwqc"></i>
              <input class="input-c" name="company" value="" placeholder="单位全称" required >
            </div>
          </div>
          <div class="attl-button">
            <div class="bt">
              <i class="bt-i bt-i-zw"></i>
              <input  name="position" value="" placeholder="职务" >
            </div>
          </div>
          <div class="attl-button">
            <div class="bt">
              <i class="bt-i bt-i-call"></i>
              <input  name="phone" value="" placeholder="联系电话" >
            </div>
          </div>
          <div class="attl-button">
            <button class="apply">立即申请</button>
          </div> 
        </form>
    </div>
  </div>
   
<!--foot-->
    <div class="side-bar">
    <a href="javascript:;" class="item go-top">
      <i class="fa"></i>
    </a>
    <a href="javascript:;" class="item go-bottom">
      <i class="fa"></i>
    </a>
  </div>
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
          <a href="http://mp.weixin.qq.com/s?__biz=MzAxODA5MTU3NQ==&mid=203896545&idx=7&sn=9241981401196ce48b35f9b37eeee09b#rd" target="_blank" title="微信"><img src="/public/home/images/weixin.png"></a>
          <a href="http://e.t.qq.com/yaozhcom" target="_blank" title="腾讯微博"><img src="/public/home/images/tencent.png"></a>
          <a href="http://user.qzone.qq.com/845146016/infocenter" target="_blank" title="QQ空间"><img src="/public/home/images/qq.png"></a>
        </div>    
      </div>
      <div class="ft-xx">
        <div class="fx-1">
          <span>会员部：<?php echo getConfig('contact_qq');?></span>
          <span>电子邮箱：<?php echo getConfig('contact_email');?></span>
          <span>电话：<?php echo getConfig('contact_tel');?></span>
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