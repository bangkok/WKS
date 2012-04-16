
<?if(!empty($Baner1)){?>
<div style="margin-top:0px">

<?
//print_r($Baner1);

    foreach ($Baner1 as $f):if($f->mbaner==1):
          ?><div align="center" ><a <?if($f->window_open=='y'){?> target="_blank"<?}?> title="<?=$f->title?>" href="<?=$f->href?>"><?
                 if($f->flashrol=='y'){?>
                 <??>
                       <script language="javascript">
                         	if (AC_FL_RunContent == 0) {alert("This page requires AC_RunActiveContent.js.");} else {
                         	AC_FL_RunContent(
                         	     'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
                         	     'src', '/images/<?=$f->id_object?>.swf',
                         	     'quality', 'high',
                         	     'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
                         	     'align', 'middle',
                         	     'play', 'true',
                         	     'loop', 'true',
                         	     'scale', 'showall',
                         	     'wmode', 'window',
                         	     'devicefont', 'false',
                         	     'id', '/images/<?=$f->id_object?>',
                         	     'name', 'logo',
                         	     'menu', 'true',
                         	     'allowFullScreen', 'false',
                         	     'allowScriptAccess','sameDomain',
                         	     'movie', '/images/<?=$f->id_object?>.swf',
                         	     'salign', ''
                         	    ); //end AC code		
                         	}
                       </script>
                       
                       <noscript>
                       <??>
                         <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" id="logo" align="middle">
                         <param name="allowScriptAccess" value="sameDomain" />
                         <param name="allowFullScreen" value="false" />
                         <param name="movie" value="" />
                         <param name="quality" value="high" />
                         <embed src="/images/<?=$f->id_object?>.swf" quality="high" name="jihji" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash"  />
                         </object>
                       <??>	
                      </noscript>
                <??>
                <?}
                else{?><img alt="Банер" src="/images/<?=$f->id_object?>.jpg"><?}
                ?></a></div><?
      endif;endforeach;
 ?></div>
<?}?>
















