require(['jquery','utils'],function($,utils){

  /**
   * 设置dialog默认尺寸
   */
    require(['jquery.dialog'],function(Dialog){
      $.extend(Dialog.options,{
        width: 600,
        height: 520
      });
    });

  /**
   * 设置默认时间格式
   */
  require(['jquery.datepicker'],function(Datepicker){
    Datepicker.options.dateFormat = "yy-mm-dd";
    Datepicker.options.changeYear = true;
  });

  /**
   * body ready
   */
  $(function(){

    var $body = $(document.body);

    /**
     * 表单clearInput清除功能
     */
    
    require(['jquery.clearInput'],function(){
      $('.main>.search-tab input[type=text]:not([data-widget=datepicker])').clearInput();
    });

    /**
     * 侧边栏
     */
    require(['sidebar','jquery.widget'],function(Sidebar){
      var sidebar = new Sidebar();
      sidebar.$el.widget();
    });

    function updateNum($target,number){
      var $target = $($target);
      var num = parseInt($target.text())||0;
      num+=number;
      $target.text(num||'');
    }

  }); 

});


/**
 * 手机兼容
 */
require(['device'],function(device){
  if(device.mobile()){
    require(['news.mobile'],function(){});
  }
});