define('news.utils',['jquery','utils','jquery.dbNoData'],function($,utils,DbNoData){

  utils.nodata = function(opt){
    if($.type(opt) == "object"){
      opt = $.extend({},opt);
    }else{
      opt = {msg:opt}
    }
    opt.el = $('<div></div>');
    new DbNoData(opt);
    return opt.el;
  }

  return utils;

});