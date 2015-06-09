function CheckForm(){
	if(document.Login.username.value==""){
		alert("请输入管理员帐号！");
		document.Login.username.focus();
		return false;
	}
	if(document.Login.password.value == ""){
		alert("请输入密码！");
		document.Login.password.focus();
		return false;
	}
}

function collect(){
   var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac') != -1?'Command/Cmd':'CTRL';
   try{
      if(document.all){                   //IE类浏览器
         try{  
            window.external.toString();   //360浏览器不支持window.external，无法收藏
            window.alert("360浏览器等不支持主动加入收藏。\n\n您可以尝试通过浏览器菜单栏 或快捷键 ctrl+D 试试。");
         }catch (e){
            try{
               window.external.addFavorite(window.location, document.title);
            }catch (e){
               window.external.addToFavoritesBar(window.location, document.title);  //IE8
            }
         }
      }else if(window.sidebar){           //firfox等浏览器
         window.sidebar.addPanel(document.title, window.location, "");
      }else{
         alert('您可以尝试通过快捷键' + ctrl + ' + D 加入到收藏夹~');
      }
   }catch(e){
      window.alert("因IE浏览器存在bug，添加收藏失败！ ");
   }
}