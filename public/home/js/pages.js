define(['jquery','TweenMax','browser','jquery.validate','jquery.waypoints','jquery.sliderbox'],function($,TweenMax,browser){

  (function(){
    var start = {top : 10,opacity:'0'};
    var end = {top:44,opacity:1};

    $("#nav").on('mouseenter','>.item',function(){
      var $this = $(this);
      var $subnav = $this.find('>.subnav');
      $subnav.stop().css({display:'block'}).animate(end,200);
    });
    $("#nav").on('mouseleave','>.item',function(){
      var $this = $(this);
      var $subnav = $this.find('>.subnav');
      $subnav.stop().animate(start,200,function(){
        $subnav.css({display:'none'});
      });
    });

    $('.banner').sliderbox({
      fx:{
        duration:500
      },
      createControl : function($this,i){
        return $('<a href="javascript:;"><img src="'+$this.attr('src')+'" /></a>');
      }
    });

  })();

  function share_s_weibo(url,title){
    var url ="http://v.t.sina.com.cn/share/share.php?url="+encodeURIComponent(window.location.href)+"&title="+document.title;
    window.open(url);
  }
  function share_t_weibo(url,title){
      var url ="http://v.t.qq.com/share/share.php?url="+encodeURIComponent(window.location.href)+"&title="+document.title;
      window.open(url);
  }
  function share_qzone(url,title){
      var url ="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+encodeURIComponent(window.location.href)+"&title="+document.title;
      window.open(url);
  }
  function share_renren(url,title){
      var url ="http://share.renren.com/share/buttonshare?link="+encodeURIComponent(window.location.href)+"&title="+document.title;
      window.open(url);
  }

  function share(){
    $('.de1').click(function(){
      share_s_weibo();
    });
    $('.de2').click(function(){
      // share_s_weibo();
    });
    $('.de3').click(function(){
      share_t_weibo();
    });
    $('.de4').click(function(){
      share_renren();
    });
  }

  function customAnimate1(){
    /**
     * t1
     */
    var tl = new TimelineMax();
    var $ints = $('.intrs');
    var $animate = $('.custom-animate1');
    var $panel = $animate.find('.panel');
    $animate.find('.placeimg').hide();
    var $circles = $panel.find('.circle');
    var $label = $panel.find('.label');
    var $text = $panel.find('.text');
    TweenMax.set($circles.eq(2),{scale:0.3,opacity:1});
    TweenMax.set($circles.eq(1),{scale:0.55,opacity:1});
    TweenMax.set($circles.eq(0),{scale:0.9,opacity:1});
    $label.each(function(){
      var $this = $(this);
      var data = $this.data();
      var r = 126,rotation = parseFloat(data.rotation) || 0;
      var x = Math.sin(rotation*Math.PI/180)*r;
      var y = -Math.cos(rotation*Math.PI/180)*r;
      TweenMax.set($this,{x:x,y:y,height:data.height,rotation:rotation,transformOrigin:"50% 100%"});
    });
    TweenMax.set($text,{opacity:1});

    tl.staggerFrom($circles,0.6,{scale:0.1,opacity:0,ease:Power4.easeOut},0.1);
    tl.staggerFrom($label,0.2,{height:0,opacity:0,ease:Back.easeOut},0.08,"-=0.5");
    tl.staggerFrom($text,0.4,{top:"+=10",opacity:0,ease:Power4.easeOut},0.15,"-=1");
    tl.pause();
    /**
     * t2
     */
    var textTimeline = new TimelineMax();
    var $h1 = $('.p-left h1');
    var $h2 = $h1.next();
    var $text = $('.p-x p');
    textTimeline.staggerFrom($h1.add($h2),0.3,{autoAlpha:0,left:"+=100",ease:Back.easeOut},0.05);
    $text.each(function(){
      var $this = $(this);
      var texts = $this.text().split("");
      $this.empty();
      $.each(texts, function(index, val) {
        if(val === " "){
          val = "&nbsp;";
        }
        var $letter = $("<span/>", {
          id : "txt" + index
        }).addClass('txt').html(val).appendTo($this);

        $letter.css({"position":"relative","display":"inline-block"});
      });
      textTimeline.staggerFrom($this.find('.txt'), 0.6, {scale:4, autoAlpha:0,  rotationX:-180,  transformOrigin:"100% 50%", ease:Back.easeOut}, 0.01);
    });
    textTimeline.pause();

    $ints.waypoint({
      handler:function(direction){
        if(direction == "down"){
          tl.reverse();
          textTimeline.reverse();
        }else if(direction == "up"){
          tl.restart();
          textTimeline.restart();
        }
      },
      offset:'0'
    });
    $ints.waypoint({
      handler:function(direction){
        if(direction == "down"){
          tl.restart();
          textTimeline.restart();
        }else if(direction == "up"){
          tl.reverse();
          textTimeline.reverse();
        }
      },
      offset:'bottom-in-view'
    });


    $panel.on('click',function(){
      var progress = tl.progress();
      var pause = tl.paused();
      if(progress == 1){
        tl.reverse();
      }else if(progress == 0){
        tl.restart();
      }else if(!pause){
        tl.pause();
      }else{
        tl.resume();
      }
    });


    $panel.css({'visibility':'visible'});
  }

  function index(){
    if(browser>8){
      customAnimate1();
    }
  }

  function apy(){
    var $attl = $(".attl");
    var validator = $attl.validate();
    $attl.on('submit',function(){
      if(!validator.form()){
        return false;
      }else{
        $.post(AJAXURL.submitUrl,$attl.serialize(),function(data){
          $submit = $('.submit');
          $('.submit h2').html(data['info']);
          if(!data['stat']){
            $submit.find('span').html('');
            $submit.addClass('submit-false');
          }else{
            $submit.find('span').html('我们将在三个工作日内与您联系');
            $submit.addClass('submit-success');
          }
          $submit.show();
          var closeT = setTimeout(function() {$submit.hide();}, 2000);
        },'json')
      }
      return false;
    });
  }

  return {
    index:index,
    apy:apy,
    share:share
  }
});
