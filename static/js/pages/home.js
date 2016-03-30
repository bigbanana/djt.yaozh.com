define('app.pages.home',['jquery'],function($){
  function home(){

  }

  function slider(el){
    var interval;
    var speed = 1000;
    var $el = $(el);
    var $panels = $el.children();
    var $control = $('<div class="control"></div>');
    $panels.each(function(i){
      $control.append('<a href="javascript:;"></a>');
    });
    $el.append($control);
    $control.on('click','a',function(){
      var $this = $(this);
      var index = $this.index();
      $this.addClass('active').siblings('.active').removeClass('active');
      $panels.eq(index).addClass('active').stop(true).animate({opacity:1},speed)
      .siblings('.active').removeClass('active').stop(true).animate({opacity:0},speed);
    });
    $el.on('mouseenter mouseleave',function(e){
      clearInterval(interval);
      if(e.type=='mouseleave'){
        interval = setInter();
      }
    });
    function setInter(){
      return setInterval(function(){
        var index = $control.children('.active').index();
        var target = (index+1)%$panels.length;
        $control.children().eq(target).trigger('click');
      },3000);
    }
    interval = setInter();
    $control.children().eq(0).addClass('active');
    $panels.eq(0).css({opacity:1})
    $panels.filter(':gt(0)').css({opacity:0});
  }

  $.extend(home,{
    home: function(){
      /**
       * banner
       */
      $(function(){
        var $banner = $('.banner');
        slider($banner);
      });
    }
  });

  return home;

});
