var reflash = false, messageboxloadcomplete = false;
if (document.all) {
	window.attachEvent('onload', SetMessageboxLoadComplete);
}else {
	window.addEventListener('load', SetMessageboxLoadComplete, false);
}
function SetMessageboxLoadComplete() {
	messageboxloadcomplete = true;
}
var sctimer; var tempwidth = 0, tempheight = 0, temppate = 1, speedrate = 24, interval_id = 0;
var newdiv = document.createElement("div"); 
var sdiv = document.createElement("div");
var contentdiv = document.createElement("div");
var Globle_width = 0, Globle_height = 0, Globle_src = '', Globle_title = '', Globle_Str = '', Globle_width_p = 0, Globle_height_div1 = 0;

document.writeln('<style type="text/css">body{font-family:Arial;}#blackbg{position:fixed;_position:absolute;}a.close{ background-image:url('+current_domain+'/public/images/close.gif); margin-top:10px; background-repeat:no-repeat; background-position:0 0;float:right;width:18px;height:18px;display:block; overflow:hidden} a.close:hover{text-decoration:none;background-position:0 -18px;}');
document.writeln('#blackcontentOuter{zoom:1; position:fixed!important;position:absolute;left:50%;top:45%;_top:expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(50 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100));}</style>');

function setbg(boxtitle, pwidth, pheight, psrc, showclose) {
	var show = 'true';
	if (showclose && showclose == 'false') { 
		show = 'false';
	}
	if (!messageboxloadcomplete) {
		window.clearInterval(interval_id);
		interval_id = window.setInterval("setbg('" + boxtitle + "', " + pwidth + "," + pheight + ", '" + psrc + "','" + show + "')", 200);
		return;
	}
	//ShowSelectAll(false, _myMessageBox.HideIDs);
	window.clearInterval(interval_id);
	/*if (GetCookieValue("UserID") == "") reflash = true;*/
	_myMessageBox.InitMsgDivData();
	Globle_title = "<font style='font-size:13px;'>"+boxtitle+"</font>";
	Globle_width = pwidth;Globle_height = pheight;
	Globle_src = psrc;Globle_width_p = Globle_width - 22;
	Globle_height_div1 = Globle_height + 38;
	Globle_Str = '<div style=""><div id="messageboxframecontainer" style="display:none;width:' + Globle_width + 'px; height:38px ;padding:10px; background:#dddddd;border-radius: 7px; -moz-border-radius: 7px;filter:alpha(opacity=50); -moz-opacity:0.4; -kHTML-opacity: 0.4; opacity: 0.4; position:absolute; top:0; left:0; z-index:1"></div><div id="__messageboxback" style=" width:' + Globle_width + 'px;position:absolute; top:10px; left:10px; background:#FFF; z-index:1000;"><p id="messageboxclosebutton" style="text-align:left; display:none; background:#FFF; width:' + Globle_width_p + 'px; height:38px; line-height:38px; border-bottom:1px #eee solid; color:#336699; font-family:microsoft yahei; margin:0 10px; font-weight:bold;">' + (show == 'true' ? '<a href="javascript:closeopendiv();" class="close" title="关闭窗口">&nbsp;&nbsp;</a></font></a>' : '') + Globle_title + '</p><iframe id="_myMessageBoxFrame" onload="_myMessageBox.ResizeIframe()" scrolling="no" src="' + Globle_src + '" frameborder="0" height="0" width="' + Globle_width + '"></iframe></div></div>';
	_myMessageBox.scroolMsgeffect();
	}
function closeopendiv() { 

	contentdiv.style.width = '10px'; 
	contentdiv.style.height = '10px'; 
	contentdiv.innerHTML = ""; 
	Globle_width = 0, Globle_height = 0, Globle_src = '', Globle_title = '', Globle_Str = ''; 
	tempwidth = 0, tempheight = 0, temppate = 1, contentdiv.style.display = "none"; 
	newdiv.style.display = "none"; 
}
var _myMessageBox = {HideIDs:'',ResizeIframe: function() {try {var _frame = document.getElementById("_myMessageBoxFrame");var height = 0, width = 0;var f = document.getElementById("messageboxframecontainer");var closebutton = document.getElementById("messageboxclosebutton");try {_frame.height = 0;width = Math.max(_frame.contentWindow.document.documentElement.scrollWidth, _frame.contentWindow.document.body.scrollWidth);height = Math.max(_frame.contentWindow.document.documentElement.scrollHeight, _frame.contentWindow.document.body.scrollHeight);}catch (e) { }if (height > 0) {Globle_height = height;Globle_height_div1 = Globle_height + 38;Globle_width = width; Globle_width_p = Globle_width - 22;}contentdiv.style.width = Globle_width + "px"; contentdiv.style.height = Globle_height + "px"; contentdiv.style.margin = "-" + Globle_height / 2 + "px 0px 0px -" + Globle_width / 2 + "px";_frame.width = Globle_width;_frame.height = Globle_height;closebutton.style.width = Globle_width_p + "px";closebutton.style.display = "inline-block";f.style.width = Globle_width + "px";f.style.height = _myMessageBox.setheightauto(Globle_height_div1) + "px";f.style.display = "block";document.getElementById('__messageboxback').style.width = Globle_width + "px";document.getElementById("messageboxclosebutton").style.display = "inline-block";} catch (e1) { }},getMsgDivHeight: function() { var a = document.body.scrollHeight; var b = window.screen.height; return a > b ? a : b; },InitMsgDivData: function() { newdiv.id = "blackbg"; newdiv.style.display = "none"; newdiv.style.zIndex = '99990'; newdiv.style.backgroundColor = "#ffffff"; newdiv.style.filter = "alpha(opacity=30)"; newdiv.style.opacity = 0.3; newdiv.style.display = "block"; newdiv.style.top = "0px"; newdiv.style.left = "0px"; newdiv.style.width = "100%"; newdiv.style.height = _myMessageBox.getMsgDivHeight() + "px"; contentdiv.id = "blackcontentOuter"; contentdiv.style.display = "none"; contentdiv.style.zIndex = '99991'; contentdiv.style.width = '10px'; contentdiv.style.height = '10px'; contentdiv.style.margin = '-5px 0px 0px -5px'; contentdiv.style.backgroundColor = ""; document.body.appendChild(newdiv); document.body.appendChild(contentdiv); },scroolMsgeffect: function() { contentdiv.style.display = "block"; _myMessageBox.scroolMsgdiv(); },getiecopy: function() {var bro = navigator.userAgent.toLowerCase();if (/msie/.test(bro)) return bro.match(/msie ([\d.]*);/)[1];},setheightauto: function(input) {if (document.all) { if (_myMessageBox.getiecopy() < 7.0) return input + 3; }return input;},scroolMsgdiv: function() {tempwidth = Globle_width;tempheight = Globle_height;contentdiv.innerHTML = Globle_Str;contentdiv.style.width = tempwidth + "px";contentdiv.style.height = tempheight + "px";contentdiv.style.margin = "-" + tempheight / 2 + "px 0px 0px -" + tempwidth / 2 + "px";}};function ShowSelectAll(show, sID) {var sList = document.getElementsByTagName("select");if (sID && sID != '') {sID = "|" + sID + '|';}if (sList && sList.length > 0) {for (var i = 0; i < sList.length; i++) {if (sID && sID != '') {if (sList[i].id && sList[i].id != '' && sID.indexOf('|' + sList[i].id + '|') >= 0) {continue;}}if (show) {sList[i].style.display = 'inline';}else {sList[i].style.display = 'none';}}}}