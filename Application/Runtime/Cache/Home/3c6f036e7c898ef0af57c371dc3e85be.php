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
<link rel="stylesheet" type="text/css" href="/public/home/css/cb.css?v=1.1.2">
<script src="http://static.yaozh.com/js/app.js"></script>
<script>
  require([baseUrl+'/js/pages.js'],function(pages){
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
	<div class="banner2">
    	<img src="<?php echo ($banner); ?>">
    </div>
    <div class="w intr">
    	<div class="w1 int ">
            <p class="lct_img"><img src="/public/home/images/lct_img.jpg"></p>
        </div>
        <div class="w1 int ">
        	<h1><span class="title">入会资格申请手续</span></h1>
            <p>（1）申请加入本俱乐部的单位及个人，须如实填写<a class="cl-blue" href="/index/apy.html">《药智精英俱乐部入会申请表》</a></p>
            <P>（2）单位团体会员：填写<a class="cl-blue" href="/index/apy.html">《药智精英俱乐部（团体会员）入会申请表》</a>，一式两份，并加盖单位公章，并附上法人代表照片、及加盖公章的营业执照复印件1份。</P>
            <P>（3）个人会员：填写<a class="cl-blue" href="/index/apy.html">《药智精英俱乐部（个人会员）入会申请表》</a>，并加盖单位公章（若有本俱乐部两位会员推荐可不需加盖公章），一式两份，同时附上个人照片与身份证复印件一份。</P>
            <P>（4）上述入会申请文件可在药智俱乐部领取、登录药智精英俱乐部网站下载或电话垂询会员部索取。</P>
        </div>
          <div class="w1 int intx ">
        	<h1><span class="title">入会资格审核取得</span></h1>
            <p>（1）申请单位或个人将填写好的《申请表》以及俱乐部要求相关资料递交药智俱乐部秘书处。</p>
            <P>（2）俱乐部对申请单位所报送资料的真实性进行审核。</P>
            <P>（3）资格审核合格后，<span class="int-aa" >俱乐部秘书处将会电话通知申请单位联系人/申请人，并将已审核通过的申请表回传一份至申请单位/申请人，以作入会凭证；</span></P>
            <P>（4）申请单位签署《协议书》，即表明会员同意并遵守“药智精英俱乐部”的相关规定和要求；</P>
            <P>（5）申请单位按规定交纳会费。<span class="int-aa" >（本年度入会会员免收会费）</span></P>
            <P>（6）申请单位在交纳会费达到俱乐部指定账户之日起，便成为本俱乐部正式会员；</P>
            <P>（7）俱乐部将向正式会员发放资格证书、会员手册；</P>
            <P>（8）有效期：会员资格有效期限与会费年度一致。</P>
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