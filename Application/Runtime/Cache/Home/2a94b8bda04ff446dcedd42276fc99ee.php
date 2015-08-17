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
    pages.index();
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
  <div class="banner">
    <div class="sliderbox">
      <?php if(is_array($banner)): foreach($banner as $key=>$bn): ?><a target="_blank" href="<?php echo ($bn['link']); ?>"><img src="<?php echo ($bn['pic']); ?>" ></a><?php endforeach; endif; ?>
    </div>
    <a href="javascript:;" class="fa arrow-left"></a>
    <a href="javascript:;" class="fa arrow-right"></a>
  </div>
<!--Notification-->
  <div class="w">
    <div class="not w1">
      <div class="nots">
        <a href="<?php echo U('index/active');?>" class="nis ni-1"><i class="i"></i></a>
        <h2>俱乐部活动</h2>
        <div class="noe">
          <ul class="circle">
            <?php if(is_array($last_active)): foreach($last_active as $key=>$la): if($key == 0): ?><div class="first-item">
                <a class="text-overflow" href="<?php echo U('index/newsDetail',array('id'=>$la['id']));?>" title="<?php echo ($la['title']); ?>"><?php echo ($la['title']); ?></a>
                <p class="summary"><?php echo (mb_substr(strip_tags(htmlspecialchars_decode($la['description'])),0,36)); ?> <a class="cl-blue" href="<?php echo U('index/newsDetail',array('id'=>$la['id']));?>">[详细]</a></p>
              </div>
            <?php elseif($key < 4): ?>
              <li><a href="<?php echo U('index/newsDetail',array('id'=>$la['id']));?>" title="<?php echo ($la['title']); ?>"><?php echo ($la['title']); ?></a></li><?php endif; endforeach; endif; ?>
          </ul>
          <!-- <p>
            <a href="/index/active.html">More</a>
          </p> -->
        </div>
      </div>
      <div class="nots nots2">
        <a href="<?php echo U('index/news');?>" class="nis ni-2"><i class="i"></i></a>
        <h2>俱乐部新闻</h2>
        <div class="noe">
          <ul class="circle">
            <?php if(is_array($last_news)): foreach($last_news as $key=>$ln): if($key == 0): ?><div class="first-item">
                <a class="text-overflow" href="<?php echo U('index/newsDetail',array('id'=>$ln['id']));?>" title="<?php echo ($ln['title']); ?>"><?php echo ($ln['title']); ?></a>
                <p class="summary"><?php echo (mb_substr(strip_tags(htmlspecialchars_decode($ln['description'])),0,36)); ?> <a class="cl-blue" href="<?php echo U('index/newsDetail',array('id'=>$la['id']));?>">[详细]</a></p>
              </div>
            <?php elseif($key < 4): ?>
              <li><a href="<?php echo U('index/newsDetail',array('id'=>$ln['id']));?>" title="<?php echo ($ln['title']); ?>"><?php echo ($ln['title']); ?></a></li><?php endif; endforeach; endif; ?>
          </ul>
        </div>
      </div>
      <div class="nots">
        <a href="<?php echo U('index/apply');?>" class="nis ni-3"><i class="i"></i></a>
        <h2>入会流程</h2>
        <div class="noe">
          <ul style="margin-left:60px;">
            <li><a href="<?php echo U('index/member');?>" target="_blank" title="俱乐部会员八项权益">俱乐部会员八项权益</a></li>
            <li><a href="<?php echo U('index/apply');?>" target="_blank" title="俱乐部入会流程">俱乐部入会流程</a></li>
            <li><a href="<?php echo U('index/apy');?>" target="_blank" title="俱乐部入会申请">俱乐部入会申请 <img src="/public/home/images/hot.gif" alt=""></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!--Introduction-->
  <div class="w intr intrs" style="padding:20px 0;">
    <div class="w1 int p-p">
      <div class="p-left">
        <h1><span class="title" style="background:#f9f9fa;">俱乐部简介</span></h1>
        <h2>INTRODUCTION OF THE CLUB</h2>
        <div class="p-x">
          <p>药智精英俱乐部由大健康产业的专业技术精英及企业家、银行家组成的非营利性的服务组织,秉承“整合资源，发展事业，共创辉煌”之理念，定期或不定期向俱乐部成员提供：项目路演，学术研讨，政策解读，企业诊断，游学考试，案例分析，项目对接等活动。</p>
          <P>俱乐部为会员嫁接人脉资源，发挥“情义圈、智慧谷、资源库”的桥梁和纽带作用。俱乐部会员均为拥有大健康产业专业素养和丰富经验的圈层精英，
    致力于为促进资源共享、深化医疗卫生体制改革、推动行业发展、实现医药经济的整体腾飞而贡献力量。</P>
        </div>
      </div>
      <div class="p-img custom-animate1">
        <img class="placeimg" src="/public/home/images/imgxx.png">
        <div class="panel">
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="label yellow" data-rotation="10" data-height="50">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="30" data-height="20">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="50" data-height="40">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="74" data-height="20">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="94" data-height="70">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="114" data-height="10">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="134" data-height="60">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="154" data-height="18">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="178" data-height="40">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="200" data-height="16">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="218" data-height="70">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="238" data-height="10">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="258" data-height="50">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="278" data-height="10">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="298" data-height="20">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label yellow" data-rotation="324" data-height="68">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>
          <div class="label green" data-rotation="344" data-height="20">
            <div class="rec"></div>
            <div class="dot"></div>
          </div>

          <div class="text" style="left: 274px;top: 5px;">项目路演</div>
          <div class="text" style="left: 390px;top: 86px;">企业诊断</div>
          <div class="text" style="top: 220px;left: 440px;">案例分析</div>
          <div class="text" style="top: 390px;left: 430px;">精英沙龙</div>
          <div class="text" style="left: 220px;top: 460px;">资金对接</div>
          <div class="text" style="top: 380px;left: 60px;">学术研讨</div>
          <div class="text" style="left: 10px;top: 250px;">游学考察</div>
          <div class="text" style="left: 40px;top: 70px;">政策解读</div>
        
        </div>
      </div>
    </div>
  </div>
<!--Member-->
  <div class=" w mbr">
    <div class="w1 mb">
      <h1><span class="title">俱乐部领导风采</span> <span class="en">LEADERS OF THE CLUB</span></h1>
      <div class="mbs">
        <?php foreach ($users as $user): ?>
        <a href="/index/user/id/<?php echo ($user["id"]); ?>" target="_blank">
          <div class="mbs-x">
            <div class="img">
              <img src="<?php echo ($user["pic_title_cycle"]); ?>@1e_140w_140h_1c_0i_1o_90Q_1x.jpg">
            </div>
            <h3><?php echo ($user["name"]); ?></h3>
            <h4>（<?php echo ($user["duty"]); ?>）</h4>
            <div class="mbs-x-span ">
              <span><?php echo ($user["duty2"]); ?></span>
            </div>
          </div>
        </a>
        <?php endforeach ?>
      </div>
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