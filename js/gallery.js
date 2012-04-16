$(document).ready(function(){

<!--Настройки для варианта, когда кнопки навиг. расположены поверх фото -->

	$('.thumbs').piroBox({
			border: 10,
			borderColor : '#222', 
			mySpeed: 500, 
			bg_alpha: 0.5,
			cap_op_start : 0.4,
			cap_op_end: 0.8,
			pathLoader : '#000 url(/img/css_pirobox/ajax-loader.gif) center center no-repeat;', 
			gallery : '.gallery_in li a', 
			gallery_li : '.gallery_in li', 
			next_class : '.next_in',
			previous_class : '.previous_in'
	});	

<!--Настройки для варианта, когда кнопки навиг. расположены за фото-->
	$('.thumbs').piroBox({
	
			border: 1, 
			mySpeed: 700,
			borderColor : '#444',  
			bg_alpha: 0.5,
			cap_op_start : 0.4,
			cap_op_end: 0.8,
			pathLoader : '#000 url(/img/css_pirobox/ajax-loader.gif) center center no-repeat;', 
			gallery : '.gallery li a', 
			gallery_li : '.gallery li',
			single : '.single  a',
			next_class : '.next',
			previous_class : '.previous'
	});	
});
