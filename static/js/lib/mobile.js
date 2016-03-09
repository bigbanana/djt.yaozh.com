define('news.mobile',['jquery',"fastclick","TweenMax"],function($,FastClick,TweenMax){
  require(['jquery.pagination'],function(Pagination){
    $.extend(Pagination.options,{
      edges : 0,
      displayEdges : 0
    });
  });
  $(function() {
    FastClick.attach(document.body);

  });

  

});
