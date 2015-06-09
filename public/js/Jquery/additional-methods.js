/*!
 * jQuery Validation Plugin v1.13.2-pre
 *
 * http://jqueryvalidation.org/
 *
 * Copyright (c) 2015 Jörn Zaefferer
 * Released under the MIT license
 */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {
		define( ["jquery", "./jquery.validate"], factory );
	} else {
		factory( jQuery );
	}
}(function( $ ) {

/**
 * 英文和空格
 */
$.validator.addMethod('enCode',function(value,element,param){
  return this.optional(element) || !/[^a-zA-Z]/.test(value);
},$.validator.format("请输入英文字符"));

/**
 * 中文和空格
 */

$.validator.addMethod('zhCode',function(value,element,param){
  return this.optional(element) || /^[\u2E80-\u9FFF\s]+$/.test(value);
},$.validator.format("请输入中文字符"));

/**
 * 手机号码
 */
$.validator.addMethod('mobile',function(value,element,param){
  return this.optional(element) || /^\+?(86)?-?1\d{10}$/.test(value);
},$.validator.format("请输入正确的手机号码"));

/**
 * 固定电话(加区号)
 */
$.validator.addMethod('phone',function(value,element,param){
  return this.optional(element) || /^(\d{3,4}-?)?\d{8}$/.test(value);
},$.validator.format("请输入固定电话号码"));

}));