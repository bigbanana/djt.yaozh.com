(function( factory ) {
  if ( typeof define === "function" && define.amd ) {
    define('jquery.bdShare',['jquery','underscore','jquery.widget'],factory);
  } else {
    factory( jQuery,_,widget );
  }
}(function($,_,widget){

  var BDShare = function(opt){
    this.options = $.extend(true,{},arguments.callee.options,opt);
    this.$el = $(opt.el);
    this.init();
  }

  $.extend(BDShare.prototype,{
    init : function(){
      var that = this;
      this.$el.wrap('<span class="bdsharebuttonbox"></span>');
      this.$el.attr('data-cmd','more');
      this.$wrap = this.$el.parent();
      require(['http://bdimg.share.baidu.com/static/api/js/share.js'],function(){});
    }
  });
  $.extend(BDShare,{});

  widget.install('bdShare',BDShare);

  return BDShare

}));