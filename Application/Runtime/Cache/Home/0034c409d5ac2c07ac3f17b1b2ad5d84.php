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
        <form action="#" target="_blank" class="search">
          <div class="to-input">
            <input class="text" type="text" />
            <a href="javascript:;" class="button"></a>
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
        	<h1><span class="title">会员权利</span><span class="en">MEMBER RIGHTS</span></h1>
            <div class="pp-p">
                <p>成为药智精英俱乐部会员，尊享以下八项会员权利。</p>
                <P>俱乐部秉承“整合资源，发展事业，共创辉煌”之理念，定期或不定期向俱乐部成员提供：项目路演，学术研讨，政策解读，企业诊断，游学考试，案例分析，项目对接等活动，为会员嫁接人脉、资金与项目、知识等资源。</P>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon2.png"></div>
                <div class="me-w">
                	<h3>项目路演</h3>
                    <P>定期邀请投资机构及优秀项目的企业针对自己的企业产品、发展的规划、融资计划进行项目路演分享。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon3.png"></div>
                <div class="me-w">
                	<h3>案例分析</h3>
                    <P>邀请知名专家、学者，评论分享医药行业时事，以及对企业营销、经营案例进行研讨；实现与医药企业管理实践者和资深行业顾问的对话与研讨。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon4.png"></div>
                <div class="me-w">
                	<h3>精英沙龙</h3>
                    <P>定期为会员组织沟通思想、分析快乐和成长心得的活动，旨在为会员提供一个轻松、愉快、非正式的互动及社交平台</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon5.png"></div>
                <div class="me-w">
                	<h3>学术研讨</h3>
                    <P>私密圈内前沿学术资讯、权威数据报告实时分享。邀请知名学术专家、精英学者，评论科研新动态，研讨学术风向标，以达到促进会员学术交流的，增长专业能力的目的。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon6.png"></div>
                <div class="me-w">
                	<h3>游学考察</h3>
                    <P>俱乐部致力于为会员构建终身学习的平台，由理事领队，每年招募俱乐部学员前往优秀典型企业、机构访问考察，通过在顶级商学院学习最前瞻的课程，共同剖析经典案例以及与知名智库、机构和专家学者的深度互动，帮助企业高级管理者更新系统知识，丰富视野，建立商业资源。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon7.png"></div>
                <div class="me-w">
                	<h3>政策解读</h3>
                    <P>精英聚首，共论医药行业政策晴雨。定期邀请国内权威专家，针对医药行业的最新政策动向进行剖析解读，让会员能实时把握政策脉搏，理智判断、正确选择。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon8.png"></div>
                <div class="me-w">
                	<h3>企业诊断</h3>
                    <P>针对会员企业定期或不定期召集具有丰富经营理论知识和实践经验的专家，对企业管理状况、经营状况和财务状况进行全面分析，发现存在的问题，并对问题深入研究，找到企业经营战略和经营管理问题背后的原因，从各个层面提供改进或解决建议。</P>
                </div>
            </div>
            <div class="me me-o">
            	<div class="me-img"><img src="/public/home/images/icon9.png"></div>
                <div class="me-w">
                	<h3>资金对接</h3>
                    <P>为会员优秀项目寻找商业合作伙伴，嫁接金融资源，对接项目资金支持。</P>
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
          <a href="http://mp.weixin.qq.com/s?__biz=MzAxODA5MTU3NQ==&mid=203896545&idx=7&sn=9241981401196ce48b35f9b37eeee09b#rd" target="_blank" title="微信"><img src="/public/home/images/weixin.png"></a>
          <a href="http://e.t.qq.com/yaozhcom" target="_blank" title="腾讯微博"><img src="/public/home/images/tencent.png"></a>
          <a href="http://user.qzone.qq.com/845146016/infocenter" target="_blank" title="QQ空间"><img src="/public/home/images/qq.png"></a>
        </div>    
      </div>
      <div class="ft-xx">
        <div class="fx-1">
          <span>会员部：1609316746</span>
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