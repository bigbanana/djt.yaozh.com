(function( factory ) {
  if ( typeof define === "function" && define.amd ) {
    define('jquery.insertImg',['jquery','jquery.widget','underscore','news.ueditor'],factory);
  } else {
    factory( jQuery,widget,_,UE );
  }
}(function($,widget,_,UE){
  var init,DD;
  init = $.Deferred();
  DD = {};
  
  $(function(){
    var $el,id,editor,imgDialog;
    id = "um-upload-box"
    $el = $('<div id="'+id+'" style="display:none;"></div>');
    $(document.body).append($el);
    editor = UE.getEditor(id);
    editor.ready(function(){
      imgDialog = editor.getDialog('insertimage');

      editor.addListener('beforeInsertImage', function(name, list){
        if(!DD.target) return;
        DD.target.insertImage(list);
        DD.close();
      });
      $.extend(DD,{
        target: null,
        open: function(target){
          this.target = target;
          imgDialog.render();
          imgDialog.open();
        },
        close: function(){
          this.target = null;
        }
      });
      init.resolve();
    });
  });

  var InsertImg = function(opt){
    this.options = $.extend(true,{},arguments.callee.options,opt);
    this.$el = $(opt.el);
    this.$target = $(this.options.target || this.$el.parent());
    init.done($.proxy(this.init,this));
  }

  $.extend(InsertImg.prototype,{
    init: function(){
      var that = this;
      this.$el.on('click',function(e){
        e.stopPropagation();
        e.preventDefault();
        DD.open(that);
      });
      this.$el.on('insertImg',$.proxy(this._insertImage,this));
      if(!!this.options.default){
        var defaults = this.options.default.split(',');
        defaults = $.map(defaults,function(item,index){
          return {
            src: item
          }
        });
        this.insertImage(defaults);
      }
    },
    insertImage: function(list){
      this.$el.trigger('insertImg',{list:list});
    },
    _insertImage: function(event,data){
      var that = this;
      that.$target.children('.insert-img').remove();
      $.each(data.list,function(index,item){
        var $img;
        if(!!that.options.max && index>=that.options.max) return;
        $img = $(that.template({item:item,options:that.options}));
        that.$target.append($img);
      });
    },
    template: _.template([
      '<span class="insert-img">',
        '<img src="<%= item.src %>">',
        '<input type="hidden" name="<%= options.name %>" value="<%= item.src %>">',
      '</span>'
    ].join(''))
  });
  $.extend(InsertImg,{
    options: {
      name: "img",
      target : "",
      max: 0,
    }
  });

  widget.install('insertImg',InsertImg);

  return InsertImg

}));

