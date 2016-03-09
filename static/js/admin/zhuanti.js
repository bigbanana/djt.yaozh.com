define('news.admin.zhuanti',['jquery','underscore','backbone.epoxy','queryString','utils',
  'jquery.loading','jquery.insertImg','jquery.preon'
  ],function($,_,backbone,queryString,utils){

  var URI = {
    removeModule:'/admin/Zhuanti/removeModule'
  }

  _.extend(window.top, Backbone.Events);

  function index(){

  }

  function edit(){
    $(function(){
      var $layoutManager,createLabel;
      $layoutManager = $(".layout-manager");

      $layoutManager.on('click','.label',function(){
        var $this;
        $this = $(this);
        $.get($this.attr('href'),function(res){
          $this.remove();
        });
        return false;
      });
      window.top.on('appendModule',function(obj){
        var $tr,$label;
        $tr = $layoutManager.find('[data-wz='+obj.wz+']');
        $label = $(createLabel(obj));
        $tr.children().eq(1).append($label);
      });
      createLabel = _.template([
        '<a href="/Admin/Zhuanti/outModule?<%= paramString %>" class="btn btn-xs btn-orange mr5 label">',
          '<span><%= name %> </span>',
          '<i class="fa"></i>',
        '</a>'
      ].join(''));

    });
  }

  function appendModule(){
    $(function(){
      var $table;
      $table = $('table.table');

      $table.on('click','.add',function(){
        var $trj,$this,obj,params;
        $this = $(this);
        $tr = $(this).closest('tr');
        params = queryString.parse(queryString.extract($this.attr('href')));

        $.get($this.attr('href'),function(res){
          if(res == -1){
            utils.error('添加失败');
            return false;
          }

          $.extend(params,{
            mid: res
          });

          params.paramString = queryString.stringify(params);
          params.name = $tr.children().eq(1).text();
          window.top.trigger('appendModule',params);
          utils.error('添加成功');
        });
        return false;

      });

    });
  }

  function editModule(){
    $(function(){
      var serialize,$form,$content,$box;
      $form = $('#edit-content');
      $content = $('input[name="content"]',$form);
      $box = $form.children('.ui-box');
      $form.on('submit',function(){
        $content.val(encodeURIComponent($content.val()));
      });
      serialize = {
        defaults: function(){
          $form.preon('submit',function(){
            var data,$names;
            $names = $box.find('[name]:not(iframe)');
            data = $names.not('.edui-default [name]').serializeObject();
            $names.prop('disabled',true);
            $content.val(JSON.stringify(data));
          });
        },
        listDefaults: function(baseObj){
          var $editDialog,$insertimg;
          $editDialog = $('.edit-dialog');
          $editDialog.dialog($.extend({
            title: "编辑",
            height: 420,
            modal: true,
            autoOpen: false,
            onClose: function(){
              bindEditModel();
            }
          },$editDialog.data()));
          $editDialog.on('click','.submit',function(){
            $editDialog.dialog('close');
          });
          var ItemModel = Backbone.Epoxy.Model.extend({
            defaults: baseObj,
            computeds: {
              cid: function(){
                return this.cid;
              }
            }
          });
          var ItemView = Backbone.Epoxy.View.extend({
            el: $('.item-tpl').html(),
            bindings: "data-bind",
            initialize: function(){
              var model = this.model;
              this.$el.on('click','.edit',function(){
                bindEditModel(model);
                $editDialog.dialog('open');
              });
              this.$el.on('click','.del',function(){
                model.destroy();
              });
            }
          });
          var ListCollection = Backbone.Collection.extend({
            model: ItemModel
          });
          var ListView = Backbone.Epoxy.View.extend({
            el: $form.find('table').eq(0),
            itemView: ItemView,
            initialize: function(){
              var that = this;
              this.collection.on('change destroy',function(){
                $content.val(JSON.stringify(that.collection.toJSON()));
              });
            }
          });

          var EditView = Backbone.Epoxy.View.extend({
            el: $editDialog,
            bindings: "data-bind"
          });

          var list = new ListView({collection:new ListCollection(JSON.parse($content.val()||'[]'))});
          var backModel = new ItemModel();
          var editView = new EditView({model:backModel});
          $('.add-item').on('click',function(){
            var model = new ItemModel();
            list.collection.add(model);
            bindEditModel(model);
            $editDialog.dialog('open');
          });

          function bindEditModel(model){
            model = model || backModel;
            editView.removeBindings();
            editView = new EditView({model:model});
          }
          /*
          $insertimg = $editDialog.find('.insertimg');
          $insertimg.each(function(){
            var $this;
            $this = $(this);
            $this.insertImg($.extend({
              max:1
            },$this.data()));
          }).on('insertImg',function(event,data){
            var $this,srcs;
            $this = $(this);
            srcs = $.map(data.list,function(item){
              return item.src;
            });
            $this.siblings('[data-bind]').val(srcs[0]).trigger('keyup');
          });*/

        },
        editor: function(){
          this.defaults();
        },
        banner: function(){
          this.defaults();
        },
        baomin: function(){
          this.defaults();
        },
        jiabing: function(){
          var baseObj = {name: "",label: "",head: "",summary: "",subject: ""}
          this.listDefaults(baseObj);
        },
        news: function(){
          var baseObj = {title: "",thumb: "",link: "",summary: ""}
          this.listDefaults(baseObj);
        }
      }

      serialize[$form.data('serialize')]();
      $form.loading('hide');
    });
  }

  $.extend(index,{
    edit: edit,
    appendModule: appendModule,
    editModule: editModule
  });
  return index;

});
