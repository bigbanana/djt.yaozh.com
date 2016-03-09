define('app.pages.faq',['jquery','app.ueditor'],function($,UE){
  function index(){

  }

  $.extend(index,{
    detail: function(){
      var ue = UE.getEditor('comment-textarea',{
        toolbars: [['undo','redo','|','bold','italic','underline','|','fontsize','removeformat','insertorderedlist','insertunorderedlist','|','link','unlink','|','selectall','cleardoc','horizontal','fullscreen']]
      });
    }
  });

  return index;

});
