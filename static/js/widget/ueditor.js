(function( factory ) {
  if ( typeof define === "function" && define.amd ) {
    define('jquery.ueditor',['jquery','jquery.widget','app.ueditor','underscore','backbone'],factory);
  } else {
    factory( jQuery,widget,UE,_,Backbone );
  }
}(function($,widget,UE,_,Backbone){
  var num = 0;
  var UEditor = function(opt){
    this.options = $.extend(true,{},arguments.callee.options,opt);
    this.$el = $(opt.el);
    //实例化元素必须为textarea
    if(this.$el[0].tagName.toLowerCase() != "textarea") return;
    this.init();
  }

  $.extend(UEditor.prototype,{
    init : function(){
      num++;
      _.extend(this,Backbone.Events);
      this.id = this.$el[0].id;
      this.id = this.id || 'jquery_ueditor_'+num;
      this.$el.attr('id',this.id);
      this.editor = UE.getEditor(this.id);
      this.on('all',function(){
        console.log(arguments);
      });
    }
  });
  $.extend(UEditor,{
    options: {}
  });

  widget.install('ueditor',UEditor);

  return UEditor

}));

