define('app.pages.kc',['jquery','app.ueditor'],function($,UE){
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

    }
  });

  return index;

});
