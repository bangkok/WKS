<!-- include js files -->
<?php
$Js['script']=	'<script type="text/javascript" src="/js/script.js"></script>';
$Js['jquery-1.4.2']='<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>';
$Js['jquery-1.6.1']='<script type="text/javascript" src="/js/jquery-1.6.1.min.js"></script>';
$Js['jquery-1.7.1']='<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>';

$Js['UI']='<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js" type="text/javascript"></script>';
$Js['blocks']='<script type="text/javascript" src="/js/blocks.js"></script>';


$Js['jquery.cycle']= '<script type="text/javascript" src="/js/jquery.cycle.all.2.74.js"></script>';
$Js['cycle']= '<script type="text/javascript">$.fn.cycle.defaults.speed   = 1500;$.fn.cycle.defaults.timeout = 6000; $(".Panorama").cycle({fx:\'fade\',delay:-4000});</script>';
$Js['cycle2']= '<script type="text/javascript">$.fn.cycle.defaults.speed   = 2500;$.fn.cycle.defaults.timeout = 1000; $(".Panorama").cycle({fx:\'fade\',delay:-4000});</script>';
$Js['nivo-slider']='<script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>';



$Js['menunav']="<script type=\"text/javascript\"> 
function menunav(th){
	$('.art-menu .l, .art-menu .r').css('top','0px'); 
	$('.art-menu .t').css('color','#DDE0DC');
	$(th).find('.l, .r').css('top','-58px');  
	$(th).find('.t').css('color','#0C0E0C'); 
}
</script>";

$Js['cssmenuhover']='<script type="text/javascript">  
function cssmenuhover(){
	if(!document.getElementById("cssmenu")) return;
	var lis = document.getElementById("cssmenu").getElementsByTagName("LI");
	for (var i=0;i<lis.length;i++){
		lis[i].onmouseover=function(){this.className+=" iehover";}
		lis[i].onmouseout=function() {this.className=this.className.replace(new RegExp(" iehover\\b"), "");}
}	}
if (window.attachEvent) window.attachEvent("onload", cssmenuhover);
</script>';


$Js['jquery.gallery']='<script type="text/javascript" src="/js/jquery.gallery.js"></script>';
$Js['jquery.ifixpng'] =	'<script type="text/javascript" src="/js/jquery.ifixpng.js"></script>';
$Js['jquery.fancybox']=	'<script type="text/javascript" src="/js/jquery.fancybox.js"></script>';
$Js['function']=	'<script type="text/javascript" src="/js/function.js"></script>';
$Js['swfobject']=	'<script type="text/javascript" src="/js/swfobject.js"></script>';
$Js['media']=	'<script type="text/javascript" src="/js/jquery.media.js"></script>';
$Js['zoomi']=	'<script type="text/javascript" src="/js/zoomi.js"></script>';
$Js['jquery.galleriffic']=	'<script type="text/javascript" src="/js/jquery.galleriffic.js"></script>';
$Js['jquery.opacityrollover']=	'<script type="text/javascript" src="/js/jquery.opacityrollover.js"></script>';
$Js['piroBox_packed']=	'<script type="text/javascript" src="/js/piroBox_packed.js"></script>';
$Js['jquery-pirobox']=	'<script type="text/javascript" src="/js/jquery-pirobox.js"></script>';
$Js['accordian.pack']=	'<script type="text/javascript" src="/js/accordian.pack.js"></script>';




$Js['gallery']=	'<script type="text/javascript" src="/js/gallery.js"></script>';


$Js['colorbox']=	'<script type="text/javascript" src="/js/jquery.colorbox.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
				$(".group1").colorbox({rel:"group1"});
			});
</script>
';

//$Js[]='';
?>
<!-- include js files -->

<!-- include css files -->
<?php
$Style['style']= '<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" />';
$Style['style.ie6']= '<!--[if IE 6]><link rel="stylesheet" href="/css/style.ie6.css" type="text/css" media="screen" /><![endif]-->';
$Style['style.ie7']= '<!--[if IE 7]><link rel="stylesheet" href="/css/style.ie7.css" type="text/css" media="screen" /><![endif]-->';

$Style['style_privateoffice']= '<link rel="stylesheet" href="/css/style_privateoffice.css" type="text/css" media="screen" />';



$Style['submenustyle']='<link rel="stylesheet" href="/css/submenustyle.css" type="text/css" media="screen" />';
$Style['submenustyle.ie6']='<!--[if IE 6]><link rel="stylesheet" href="/css/submenustyle.ie6.css" type="text/css" media="screen" /><![endif]-->';
$Style['cssmenu']= '<link rel="stylesheet" href="/css/cssmenu.css" type="text/css" media="screen" />';
$Style['blocks']= '<style type="text/css">
div.block{
	margin: 10px 10px 10px 0;
	box-shadow: 8px 0 10px rgba(0, 0, 0, 0.3);
	border-radius: 0 8px 0 30px;
}
div.block div.content{
	margin-bottom: 10px;
}
div.block div.content div.text{
	padding-left: 10px
}
div.block div.scroll{
	margin-top: 5px;
}
div.block div.naw div{
	padding: 0 10px;
}
</style>';

$Style['News-Block']='<style type="text/css">
.News-Block .image {float:left; margin:0 10px 0 0;width:50px}
.News-Block .dalee{float:right}
.News-Block .title{margin-bottom: 5px}
.News-Block .date{color:#00a650;font-weight: bold}
</style>';
$Style['page']= '<link rel="stylesheet" href="/css/page.css" type="text/css" media="screen" />';



$Style['fancy']= '<link rel="stylesheet" href="/css/fancy.css" type="text/css" media="screen" />';

$Style['basic']= '<link rel="stylesheet" href="/css/basic.css" type="text/css" media="screen" />';


$Style['style_WKS_projects']= '<link rel="stylesheet" href="/css/style_WKS_projects.css" type="text/css" media="screen" />'; 
$Style['style_WKS_buld']= '<link rel="stylesheet" href="/css/style_WKS_buld.css" type="text/css" media="screen" />';
$Style['style_WKS_about']= '<style type="text/css">#content_block{ BACKGROUND-IMAGE: url(/img/wks/ECOSE-Technology-technologies.jpg);}</style>'; 
$Style['style_WKS_house']= '<link rel="stylesheet" href="/css/style_WKS_house.css" type="text/css" media="screen" />'; 
$Style['style_WKS_panels']= '<link rel="stylesheet" href="/css/style_WKS_panels.css" type="text/css" media="screen" />'; 


$Style['proizvod'] = '<style type="text/css">#content_block{ BACKGROUND-IMAGE: url(/img/wks/ECOSE-Technology-FAQ-relise.jpg);} img.zoomi{width:120px; margin:3px 6px 3px 0px}</style>';
$Style['button']= '<link rel="stylesheet" href="/css/button.css" type="text/css" media="screen" />';

$Style['galleriffic-4']= '<link rel="stylesheet" href="/css/galleriffic-4.css" type="text/css" media="screen" />';
$Style['zoomi'] = '<style type="text/css"> img.zoomi{width:120px; margin:3px 6px 3px 0px}</style>';
$Style['pirobox']= '<link rel="stylesheet" href="/img/css_pirobox/pirobox.css" type="text/css" media="screen" />';

$Style['nivo-slider_default']= '<link rel="stylesheet" href="/css/nivo-slider/default.css" type="text/css" media="screen" />';
$Style['nivo-slider_pascal']= '<link rel="stylesheet" href="/css/nivo-slider/pascal.css" type="text/css" media="screen" />';
$Style['nivo-slider_orman']= '<link rel="stylesheet" href="/css/nivo-slider/orman.css" type="text/css" media="screen" />';
$Style['nivo-slider']= '<link rel="stylesheet" href="/css/nivo-slider/nivo-slider.css" type="text/css" media="screen" />';

$Style['home']= '<link rel="stylesheet" href="/css/accordion.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/roundedcorners.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/home.css" type="text/css" media="screen" />';

$Style['colorbox']= '<link rel="stylesheet" href="/css/colorbox/colorbox.css" type="text/css" media="screen" />';

$Style['UI']= '<link rel="stylesheet" href="/css/UI/jquery-ui-1.8.17.custom.css" type="text/css" media="all" />';

$Style[]= '';
?>
<!-- include css files -->

<?
$this->data['JsArray'] = $Js;
$this->data['StylesArray'] = $Style;
?>


