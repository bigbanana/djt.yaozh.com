        $(function(){
            var obj = document.form_mymps.getElementsByTagName('input');
            var checkbox = new Array();
            var changebox = new Array();
            $(obj).each(function(){

                if($(this).attr('type')=='checkbox'){
                    var cbox_id = $(this).attr('id');
                    checkbox[cbox_id] = $(this).is(':checked'); 
                }
            });
            // console.log(checkbox);
            $("#form_mymps").submit(function(){
                
                $(obj).each(function(i,val){
                    if($(this).attr('type')=='checkbox'){
                        var cgbox_id = $(this).attr('id');
                        if(cgbox_id){
                            changebox[cgbox_id] = $(this).is(':checked');
                            if(checkbox[cgbox_id] == $(this).is(':checked')){
                                $("#"+cgbox_id).attr('disabled',true);
                            }
                            else{
                                if($(this).is(':checked')){
                                    var value = 1;
                                }
                                else{
                                    var value =0;
                                }
                                var content = "<input type='hidden' name='status["+cgbox_id+"]' value="+value+">";
                                $("#sunjoin").append(content);
                            } 
                        }
                    }
                    else if($(this).val()==this.defaultValue){
                        $(this).attr('disabled',true);
                    }
                });
                // console.log(changebox);
                return true;
            })
        }); 