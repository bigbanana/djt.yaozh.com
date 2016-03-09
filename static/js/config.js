require.config({
  shim: {
    "app.ueditor": {
      deps: [
        'css!/static/thirdparty/ueditor/themes/default/css/ueditor.css',
        '/static/thirdparty/ueditor/ueditor.config.js'
      ],
      exports: 'UE'
    }
  },
  paths: {
    //lib
    "app.utils": "/static/js/lib/utils",
    "app.mobile": "/static/js/lib/mobile",
    "app.ueditor": "/static/thirdparty/ueditor/ueditor.all",
    //admin
    
    //page
    "app.pages.develop": "/static/js/pages/develop",
    "app.pages.faq": "/static/js/pages/faq",
    "app.pages.kc": "/static/js/pages/kc",

    //widgets
    "jquery.ueditor": "/static/js/widget/ueditor",
    "jquery.insertImg": "/static/js/widget/insertImg",
    "jquery.bdShare": "/static/js/widget/bdShare",

    //小动画widgets
    "jquery.dbNoData": "/static/js/widget/dbNoData",

    //template
    "app.template.usamarket": "/static/js/template/usamarket"
  }
});