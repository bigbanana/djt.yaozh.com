define('app.pages.kc',['jquery','backbone'],function($,Backbone){
  function index(){

  }

  $.extend(index,{
    detail: function(){
      var $comment = $('.kc-comment');
      var $form = $('.comment-form',$comment);
      var $stars = $('.stars',$form);

      $stars.on('mouseenter','.fa',function(){
        var $this = $(this);
        var $pres,$nexs;
        $pres = $this.prevAll('.fa').add($this);
        $nexs = $this.nextAll('.fa');
        $stars.find('input').val($pres.length);
        $pres.text('');
        $nexs.text('');
      });

      var $countdown = $('.countdown');
      var $nums = $countdown.find('.num span');
      var time = $countdown.data('time');

      setInterval(function(){
        var arr = [];
        var stime = ENV.getServerTime();
        var space = time-stime.getTime();
        arr.push(parseInt(space/86400000));
        space = space%86400000;

        arr.push(parseInt(space/3600000));
        space = space%3600000;

        arr.push(parseInt(space/60000));
        space = space%60000;

        arr.push(parseInt(space/1000));

        $nums.each(function(index,item){
          var i = parseInt(index/2);
          var j = index%2;
          var num = arr[i];
          var n = [parseInt(num/10),num%10];
          var $item = $(item);
          $item.text(n[j]);
        });

      },1000);

      var router = new Backbone.Router();
      var $kctabTitle = $(".kctab-title");
      router.route('comment','comment',function(){
        $kctabTitle.children().eq(3).trigger('click');
      });
      Backbone.history.start();

    }
  });

  return index;

});
