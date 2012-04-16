<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v2.3.0.21098
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    
    <meta name="keywords" content="$KEYWORDS$">
    <meta name="description" content="$DESCRIPTION$">
     
    <title>$TITLE$ </title>
$STYLES$
	
$JS$

$HEAD$
<script type="text/javascript">       
$SCRIPT TIME$

function move_clock(){ 
second++;
if (second == 60){
minute++;
second="00";
}
if (minute == 60) hour++;
if (minute == 60 || minute == 0) minute="00";
if (hour == 24) hour="00";
if (second+0 <= 9 && second != "00") second = "0" + second;
if (minute+0 <= 9 && minute != "00") minute = "0" + minute;
clock_screen = hour+":"+minute+":"+second; 
$("#date").text(clock_screen);
i++;
id = setTimeout("move_clock()",1000);
}
//move_clock();
</script> 

<body>
<div id="art-page-background-glare">
        <div id="art-page-background-glare-image"></div>
    </div>
    <div id="art-main">
        <div class="art-Sheet">
            <div class="art-Sheet-tl"></div>
            <div class="art-Sheet-tr"></div>
            <div class="art-Sheet-bl"></div>
            <div class="art-Sheet-br"></div>
            <div class="art-Sheet-tc"></div>
            <div class="art-Sheet-bc"></div>
            <div class="art-Sheet-cl"></div>
            <div class="art-Sheet-cr"></div>
            <div class="art-Sheet-cc"></div>
            <div class="art-Sheet-body">
            $MENU PATH$
<!--HEADER-->    
                <div class="art-Header">
                	<div class="Panorama" style=" position:absolute; left:0; width:600px;">$PANORAMA$
                	</div>
                <!--	<div style="position:relative; float:right; margin:0 10px 0 0; z-index:1000; border:0px  #fff solid"><a href="/"><img height="160" src="/img/gerb.jpg"> <div class="date" style="margin:3px 0 0 12px;"></a><center>$SCRIPT DATE$<br><span id="date" style="font: 14pt/12pt bold; color:#063; "></span></center></div> </div>
                -->	
                    <div class="art-Logo">
                        <h1 id="name-text" class="art-Logo-name">$Headline$</h1>
                        <div id="slogan-text" class="art-Logo-text">$Slogan Text$</div>   
                    </div>
                </div>
<!--END HEADER-->
<!--NAV-->
                <div class="art-nav">

                	<ul class="art-menu">
                	$MENU$
                	</ul>
                	$NAV PANEL$
                </div>
<!--END NAV-->
                
                
                <div class="art-contentLayout">
                    <div class="art-sidebar1">

$MENU BLOCK$
                    </div>
                   
 <div class="art-sidebar2">

$SHARES BLOCK-$
$WEATHER BLOCK-$
</div> 
                    
<!--CONTENT-->                    
                    <div class="art-content">
<!--POST-->
                        <div class="art-Post">
                            <div class="art-Post-body">
                        <div class="art-Post-inner">
                                        <h2 class="art-PostHeader">
                                           $HEADER$
                                        </h2>
                                        <div class="art-PostContent">
                                        
                                        $CONTENT$
                                     
                                        </div>
                                        <div class="cleared"></div>
                        </div>
                        
                        		<div class="cleared"></div>
                            </div>
                        </div>
<!--END POST-->  
                                  
<!--POST-->

<!--END POST-->
                    </div>
 
<!--END CONTENT-->


                    
                </div><!--  art-contentLayout-->
<!--FOOTER-->
                <div class="cleared"></div><div class="art-Footer">
                    <div class="art-Footer-inner">
                        <div class="art-Footer-text">
                        	<p>$FOOTER$</p >
                            <div class="copy"><p>$CONTENT COPY$</p></div>
                        </div>
                    </div>
                    <div class="art-Footer-background"></div>
                </div>
        		<div class="cleared"></div>
<!--END FOOTER-->
            </div> <!--       Sheet-body         -->
        </div><!--       Sheet         -->
        <div class="cleared"></div>
       <p class="art-page-footer">Разработано студией <a href="http://www.alternatives.com.ua/" target="_blank">АЛЬТЕРНАТИВА ВОЗМОЖНОСТЕЙ</a></p>
    </div><!--    main     -->

  
</body>
</html>
