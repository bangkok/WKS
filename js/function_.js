$(document).ready(function(){
    $('img[@src$=.png]').ifixpng();
  //  $('.display_on_').toggleClass("display_off");

    $(".gtega").fancybox();
    $('a.media').media();
    $(".gtega").fancybox({
        'zoomSpeedIn':  0, 
        'zoomSpeedOut': 0, 
        'overlayShow':  true,
        'allowScriptAccess': always,
        'autostart':true,
        'allowFullScreen':true
      });

    //$('a.media').media();

//    display('comments');
  });
	 

 



