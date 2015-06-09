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
    <div class="w intr" id="hope">
    	<div class="w1 int intr-p">
        	<h1>俱乐部愿景<span>CLUB VISION</span></h1>
            <p>成为大健康产业领袖的精神家园</p>
            <P>成为大健康产业精英的成长摇篮</P>
            <P>成为中国大健康产业最具影响力的非营利机构之一</P>
        </div>
    </div>
     <div class="w intr">
    	<div class="w1 int intr-p">
        	<h1>俱乐部宗旨<span>CLUB AIMS</span></h1>
            <p>专业精进，合作共赢</p>
        </div>
    </div>
    
<!--Introduction-->
	<div class="w intr" id="introduction">
    	<div class="w1 int">
        	<h1>俱乐部简介<span>CLUB PROFILE</span></h1>
            <p>药智精英俱乐部是由药智网和高圣生物医药发起组建，由大健康产业的专业技术精英及企业家、银行家组成的非营利性的服务组织。秉承“整合资源，发展事业，共创辉煌”之理念，定期或不定期向俱乐部成员提供：项目路演，学术研讨，政策解读，企业诊断，游学考试，案例分析，项目对接等活动。</p>
            <P>俱乐部为会员嫁接人脉资源，发挥“情义圈、智慧谷、资源库”的桥梁和纽带作用。俱乐部会员均为拥有大健康产业专业素养和丰富经验的圈层精英，
致力于为促进资源共享、深化医疗卫生体制改革、推动行业发展、实现医药经济的整体腾飞而贡献力量。</P>
        </div>
    </div>
    
    <div class="w intr" id="structure">
    	<div class="w1 int intr-p">
        	<h1>组织架构图<span>ORGANIZATION CHART</span></h1>
            <p class="zzjg"><img src="/public/home/images/img_lct.jpg"></p>
        </div>
    </div>
<!--Member-->
	<div class=" w mbr">
        <div class="w1 mb">
          <h1>会员介绍<span>MEMBER PROFILE</span></h1>
          <div class="mbs">
            <div class="mbs-x">
              <div class="img">
                <img src="/public/home/images/cimg2.png">
              </div>
              <h3>于明德</h3>
              <h4>（名誉会长）</h4>
              <div class="mbs-x-span ">
                <span>中国医药企业管理协会、中国医药企业家协会会长。长期从事药品生产、流通管理工作。曾任辽宁省阜新制药厂、中药厂技术科长、厂长；阜新市医药总公司总经理、市医药管理局局长；辽宁省医药管理局副局长、局长；国家医药管理局财务与流通司司长；国家经济贸易委员会医药司司长、经济运行局副局长；国家发展与改革委员会经济运行局副局长；现任北京医药集团公司名誉董事长；医药经济报首席专家；国家发展改革委员会生物医药专家委员会副主任；国家科技部国家重大专项专家委员会专家。</span>
              </div>
            </div>
            <div class="mbs-x">
              <div class="img">
                <img src="/public/home/images/cimg6.png">
              </div>
              <h3>刘忠良</h3>
              <h4>（名誉会长）</h4>
              <div class="mbs-x-span ">
                <span>浙江维康药业有限公司董事长、中国医药物资协会执行会长兼秘书长。深耕医药行业多年，拥有丰富的理论与实践经验，与中国医药行业圈内人士、相关政府部门与机构关系良好，影响力强，善于资源嫁接整合，在业界有很高的知名度与号召力。</span>
              </div>
            </div>
            <div class="mbs-x mbs-c">
              <div class="img"><img src="/public/home/images/cimg3.png"></div>
              <h3>房志武</h3>
              <h4>（高级顾问）</h4>
              <div class="mbs-x-span ">
                <span>国务院医改专家咨询委员会委员，西安交通大学管理学院特聘教授，美国JCJ国际医院认证联合委员会中国总干事。多年来深入参与中美两国的医改管理和医改工作，是国务院办公室多项“十二五”医改重点研究课题的负责人。在美国多家大型医疗集团及医药相关产业有近20年工作经验，曾在世界百强企业美国Express Scripts（ESI）集团单人5年副总裁。</span>
              </div>  
            </div>
            <div class="mbs-x">
              <div class="img">
                <img src="/public/home/images/cimg4.png">
              </div>
              <h3>保育钧</h3>
              <h4>（高级顾问）</h4>
              <div class="mbs-x-span ">
                <span>中华民营企业联合会会长、国务院参事室特派研究员、中国（私）营经济研究会会长、中国民生研究院高级顾问、中国中小企业协会顾问委员会主任委员、中国交通运输协会快件运输分会高级指导委员会委员、中国企业国际发展协会名誉会长、中国劳动学会顾问、北京大学中国软实力课题组终身顾问、利安达会计师事务所有限责任公司高级顾问、中华民营企业联合会会长，品牌中国产业联盟副主席。</span>
              </div>  
            </div>
            <div class="mbs-x">
              <div class="img">
                <img src="/public/home/images/cimg5.png">
              </div>
              <h3>欧伦全</h3>
              <h4>（会长）</h4>
              <div class="mbs-x-span ">
                <span>药智网营销中心总经理，国内资深营销专家，医药行业权威金牌讲师之一。具有丰富的行业从业经验，曾担任过主治医师、重庆鹏鑫药业总经理、龙维制药有限公司（法人）总经理等职务，具有内外审从业资格。深耕医药行业，擅长资源整合，在业内拥有庞大的人脉资源与业界美誉度。</span>
              </div>  
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