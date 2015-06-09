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
    <div class="w ">
    	<div class="w1 ">
        	<h1>药智精英俱乐部章程<span>CONSTITUTION</span></h1>
            <div class="constitution">
            	<h2><span>第一章</span>总则</h2>
                <div class="cns">
                	<h3>第一条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部名称：药智精英俱乐部（以下简称：俱乐部）。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第二条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部的性质：俱乐部是由医、药行业内的从业人员自愿组成，属于非营利性的服务机构。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第三条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部宗旨：遵守国家宪法、法律、法规以及社会道德风尚，以服务会员，专业精进，合作共赢为俱乐部宗旨。通过活动，开阔眼界、广交朋友、联络感情、交流信息、协调关系、增进友谊，促进同行经济事业发展。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第四条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>参与者通过药智医药精英俱乐部提供的平台资源共享, 提供业内适合的合作机会, 为参与者提供业内发展良机和创业整合资源。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第五条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部联络处：重庆市南岸区南城大道199号国际电子商务产业园8楼药智网。</li>
                        </ul>
                    </div>
                </div>	
                
                <h2><span>第二章</span>服 务</h2>
               	<div class="cns">
                	<h3>第六条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>组织会员开展各项联谊活动，加强同行相互了解和联系。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第七条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>宣传、解读国家的产业经济政策，传达、贯彻有关法律法规，分享最前沿的行业动态，促进会员在行业内的发展。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第八条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>协调会员间业务与资源交往，促进各地区医药产品购销与经营。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第九条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>组织开展技术咨询、技术培训、技术交流、技术转让和合作等技术服务；组织名产品评选、推介；组织重大科研项目和重要新成果的推介、推广，推广国内外新技术、新成果、新产品，促进本行业科技进步和技术创新。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第十条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>资源嫁接，沟通资源，互换资源，促进会员合作或职业发展。</li>
                        </ul>
                    </div>
                </div>  
                 <h2><span>第三章</span>会员</h2>
                 <div class="cns">
                	<h3>第十一条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部的会员分为团体会员与个人会员，申请加入必须具备下列条件：</li>
                            <li>（一）愿意遵守俱乐部的章程，自觉履行章程所规定的会员义务；</li>
                            <li>（二）有集体责任感，愿意为俱乐部和其它会员服务，能履行会员应尽的义务； </li>
                            <li>（三）个人会员： 医药行业机构、企业5年以上从业经历或医药行业机构、企业总监级别及以上职位；</li>
                            <li>（四）团体会员：依法取得本行业“生产许可证”、“经营许可证”和“营业执照”等证件。经开业登记且具有法人资格，从事医药生产、经营的企业、相关事业单位、团体及相关院校、科研机构和经济组织；</li>
                            <li>（五）品行诚信，心态开放，积极交流，共享资源。</li>
                        </ul>
                    </div>
                </div>
                <div class="cns">
                	<h3>第十二条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员入会程序：</li>
                            <li>（一）自愿申请或受邀入会或会员推荐；</li>
                            <li>（二）提交入会申请书;</li>
                            <li>（三）经理事会授权、秘书处审核通过，并发给同意吸收入会的有关通知和会员证书与会员卡。</li>
                        </ul>
                    </div>
                </div>  
                <div class="cns">
                	<h3>第十三条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员享有以下权利 ：</li>
                            <li>（一）获取相关信息资料的权利；</li>
                            <li>（二）本俱乐部的选举权、被选举权和表决权；</li>
                            <li>（三）出席会员大会，以及本俱乐部的其他的会员会议；</li>
                            <li>（四）获得本俱乐部服务的优先权和优惠权；</li>
                            <li>（五）对本俱乐部工作的批评建议权与监督权；</li>
                            <li>（六）对本俱乐部理事监督权与罢免理事的建议权；</li>
                            <li>（七）参加俱乐部组织的各种联谊活动的权利；</li>
                            <li>（八）获取俱乐部内刊的权利；</li>
                            <li>（九）推荐新会员的权利；</li>
                            <li>（十）入会自愿、退会自由。</li>
                        </ul>
                    </div>
                </div>  
                <div class="cns">
                	<h3>第十四条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员必须履行以下义务：</li>
                            <li>（一）遵守俱乐部的章程及行规行约，执行本俱乐部的决议；</li>
                            <li>（二）维护本俱乐部的合法权益与声誉；</li>
                            <li>（三）支持与积极参与俱乐部的各项活动；</li>
                            <li>（四）尽力完成俱乐部委托的（通常是来自常理会的）工作；</li>
                            <li>（五）向俱乐部提供详细准确的个人资料，并保守好俱乐部会员的相关资料；</li>
                            <li>（六）按规定交纳必需的费用；</li>
                            <li>（七）向俱乐部积极分享行业信息、报表、市场动态和先进经验等资料；</li>
                            <li>（八）交流和分享，接受俱乐部的专访和期刊的邀约；</li>
                            <li>（九）诚信与保密义务；</li>
                        </ul>
                    </div>
                </div>  
                <div class="cns">
                	<h3>第十五条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员退会应书面报告俱乐部，并交回会员证，会员卡在内所有会员凭证。会员如果一年内不参加本俱乐部的活动，不缴纳应相应的费用，视为自动退会。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第十六条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部入会自愿，退会自由。但会员有下列情况之一的，理事会授权秘书处讨论通过可以除名：</li>
                            <li>（一）团体成员中依法宣告破产或被撤销以及停业与主营业务发生重大变化的；</li>
                            <li>（二）不履行会员义务，经本俱乐部劝告拒不改正的；</li>
                            <li>（三）有损害本俱乐部名誉或违背本俱乐部宗旨行为的；</li>
                        </ul>
                    </div>
                </div>  
    
                 <h2><span>第四章</span>组织机构</h2>
                 <div class="cns">
                	<h3>第十七条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员大会，会员大会是俱乐部的最高权力机构，其主要职责是：</li>
                            <li>（一）制定和修改章程；</li>
                            <li>（二）选举与罢免理事、监事；</li>
                            <li>（三）审议理事会、监事会的工作报告和财务报告；</li>
                            <li>（四）审议会费的变动；</li>
                            <li>（五）审议并通过理事会、会员提交的议案；</li>
                            <li>（六）通过重要决议；</li>
                            <li>（七）决定重大变革和终止事宜；</li>
                            <li>（八）章程规定的其他职权；</li>
                            <li>（九）决定其他重大事宜；</li>
                        </ul>
                    </div>
                 </div> 
                 <div class="cns">
                	<h3>第十八条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员大会必须有2/3以上的会员出席方能召开，其决议须到会会员半数以上表决方能生效。</li>
                        </ul>
                    </div>
                 </div> 
                <div class="cns">
                	<h3>第十九条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>理事会是会员大会的执行机构，在会员大会闭会期间领导本俱乐部开展日常工作，对会员大会负责。每届任期两年，可连任。</li>
                        </ul>
                    </div>
                 </div> 
                 <div class="cns">
                	<h3>第二十条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>第二十条理事会是俱乐部的最高执行机构，主要工作职责是：</li>
                            <li>（一）执行会员大会的决议；</li>
                            <li>（二）选举和罢免会长、副会长、秘书长；</li>
                            <li>（三）聘请名誉会长、顾问；</li>
                            <li>（四）筹备召开会员大会；</li>
                            <li>（五）向会员大会报告工作和财务状况；</li>
                            <li>（六）定办事机构、分支机构、代表机构和实体机构的设立；</li>
                            <li>（七）提出下届理事会的候选人；</li>
                            <li>（八）领导本俱乐部各项机构开展工作；</li>
                            <li>（九）接受监事会提出的对本俱乐部违规问题的处理意见，提出解决办法并接受其监督；</li>
                            <li>（十）对本俱乐部章程修改进行表决，通过后报会员大会审议；</li>
                            <li>（十一）决定其他重大事项；</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十一条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>理事会必须有2/3以上理事出席方能召开，其决议须经到会理事半数以上表决通过方能生效。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十二条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>会员退会应书面报告俱乐部，并交回会员证，会员卡在内所有会员凭证。会员如果一年内不参加本俱乐部的活动，不缴纳应相应的费用，视为自动退会。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十三条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部设立常务理事会。常务理事会由理事会选举产生，在理事会闭会期间行使理事会的一、四、六、七、八项的职权，对理事会负责 。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十四条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>常务理事会必须有2/3以上理事出席方能召开，其决议须经到会理事半数以上表决通过方能生效。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十五条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>常务理事会至少半年召开一次会议；情况特殊时也可采用通讯形式召开。</li>
                        </ul>
                    </div>
                </div> 
                <div class="cns">
                	<h3>第二十六条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>名誉会长及高级顾问团，参与俱乐部发展运营等重大问题的论证，积极配合俱乐部工作，为俱乐部提供有关政策、技术、管理的意见与建议。</li>
                        </ul>
                    </div>
                 </div>
                 <div class="cns">
                	<h3>第二十七条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>本俱乐部的会长、副会长、秘书长必须具备下列条件：</li>
                            <li>（十一）决定其他重大事项；</li>
                            <li>（十一）决定其他重大事项；</li>
                            <li>（十一）决定其他重大事项；</li>
                            <li>（十一）决定其他重大事项；</li>
                            <li>（十一）决定其他重大事项；</li>
                        </ul>
                    </div>
                 </div>
                 <div class="cns">
                	<h3>第二十八条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>名誉会长及高级顾问团，参与俱乐部发展运营等重大问题的论证，积极配合俱乐部工作，为俱乐部提供有关政策、技术、管理的意见与建议。</li>
                        </ul>
                    </div>
                 </div>	
                 <div class="cns">
                	<h3>第二十九条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>名誉会长及高级顾问团，参与俱乐部发展运营等重大问题的论证，积极配合俱乐部工作，为俱乐部提供有关政策、技术、管理的意见与建议。</li>
                        </ul>
                    </div>
                 </div>
                 <div class="cns">
                	<h3>第三十条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>名誉会长及高级顾问团，参与俱乐部发展运营等重大问题的论证，积极配合俱乐部工作，为俱乐部提供有关政策、技术、管理的意见与建议。</li>
                        </ul>
                    </div>
                 </div>
                 <div class="cns">
                	<h3>第三十一条</h3>
                    <div class="cns-li">
                    	<ul>
                        	<li>名誉会长及高级顾问团，参与俱乐部发展运营等重大问题的论证，积极配合俱乐部工作，为俱乐部提供有关政策、技术、管理的意见与建议。</li>
                        </ul>
                    </div>
                 </div> 
                 <h2><span>第五章</span>资产管理</h2>
                 <h2><span>第六章</span>终止程序</h2>
                 <h2><span>第七章</span>附则</h2>
              
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