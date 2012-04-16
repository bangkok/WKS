<div>
<?$houselink = str_replace(" ","_",$houselink)?>
<?
if(isset($imagepath))
	echo "<div style=\"float:left;margin: 0 20px 5px 0; max-width:340px; background-image: url('/typicalprojects/".$link."/".$houselink."/".$imagepath."'); background-repeat: no-repeat;
 width:327px;height:247px;\">";

echo "<a href=\"/construction/typical_projects/house/".$id."/show\"><img style=\"width:327px;height:247px;\" src=\"/img/wks/haus_detail_TRANS.png\" ></img></a></div>";
//echo "<img style=\"width:327px;height:247px;\" src=\"/img/wks/haus_detail_TRANS_nolink.png\" ></img></div>";

if(isset($content))
//	echo "<div style=\"float:left;margin:5px 20px; padding:0 10px; BACKGROUND-COLOR: #e9f2c9;\">".$content."</div>";
	
?>

<table width="327" >
<tr><td width="327" height="13" style="background-image: url(/img/wks/hausdetailtopbg.jpg);background-repeat: no-repeat;"></td></tr>

<tr><td style="background-image: url(/img/wks/hausdetailbg.jpg);background-repeat: repeat-y; padding:0 0 0 20px;">


<span class="h3">Характеристики</span>
<img src="/img/wks/line281.gif" width="281" height="15">
<table style=" width:280px">
<?php if($size):?>
<tr><td>Общая расчетная площадь: </td><td width="140" align=right><?=$size?> м&sup2;</td></tr>
<?php endif;?>

<?php if($building_area):?>
<tr><td>Общая площадь застройки: </td><td align=right><?=$building_area?> м&sup2;</td></tr>
<?php endif;?>

<?///////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php if(false):?>
<?php if( $living_space):?>
<tr><td>Жилая площадь: </td><td align=right><?=$living_space?> м&sup2;</td></tr>
<?php endif;?>

<?php if($area_floor_1):?>
<tr><td>Площадь 1 этаж: </td><td align=right><?=$area_floor_1?> м&sup2;</td></tr>
<?php endif;?>

<?php if($area_floor_2):?>
<tr><td>Площадь 2 этаж: </td><td align=right><?=$area_floor_2?> м&sup2;</td></tr>
<?php endif;?>
<?php endif;?>
<?///////////////////////////////////////////////////////////////////////////////////////////////////?>


<?php if($storey):?>
<tr><td>Этажность: </td><td align=right><?=$storey?> <?if($storey == 1) echo "этаж"; else if($storey < 5) echo "этажа";?></td></tr>
<?php endif;?>

<?php if($roof_form):?>
<tr><td>Форма кровли: </td><td align=right><?=$roof_form?></td></tr>
<?php endif;?>



<?///////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php if(FALSE && ($cost1 || $cost1 || $cost3 || $cost4) ):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<?//php endif;?>

<?php if($cost1):?>
<!--<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>-->
<tr><td>«Самостоятельное строительство»: </td><td align=right><span class="cost">от <?=$cost1?> грн</span></td></tr>
<?php endif;?>


<?php if($cost2):?>
<!--<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>-->
<tr><td>«Стандарт»: </td><td align=right><span class="cost">от <?=$cost2?> грн</span></td></tr>
<?php endif;?>

<?php if($cost3):?>
<!--<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>-->
<tr><td>«Стандарт +»: </td><td align=right><span class="cost">от <?=$cost3?> грн</span></td></tr>
<?php endif;?>

<?php if($cost4):?>
<!--<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>-->
<tr><td>«Стандарт Макси»: </td><td align=right><span class="cost">от <?=$cost4?> грн</span></td></tr>
<?php endif;?>
<?php endif;?>
<?///////////////////////////////////////////////////////////////////////////////////////////////////?>

</table>


<?/*
if(isset($content))
	echo "<div>".$content."
<img src=\"/img/wks/line281.gif\" width=\"281\" height=\"15\"></div>";
*/?>

</td></tr>



<tr><td width="327" height="13" style="background-image: url(/img/wks/hausdetailbotbg.jpg);background-repeat: no-repeat;"></td></tr>

</table>

</div>
<div style="clear:left; padding-top:5px; FONT-SIZE:12px">


	 
      <div id="subsubnavbreit"> 
        <div id="subsubnavbreittop"></div>
        <div class="clsubsubnavbreit"> 
<!--
          <div style="width: 180px;"> <br><a href="#" target="FEopenLink" onclick="vHWin=window.open('fileadmin/elk/gr/keller/Ma136 keller.jpg','FEopenLink','menubar=0,scrollbars=0,toolbar=0,resizable=1,width=400,height=400');vHWin.focus();return false;">» Kellergrundriss</a></div>
          <div style="width: 240px;"><a href="index.php?id=fmhergebnis2&amp;hausserie=Magic&amp;haustyp=136">» Musterhäuser ansehen</a><br><a href="index.php?id=109">» Individuelles Finanzierungsangebot</a></div>
          <div style="width: 240px;"><a target="_blank" href="fileadmin/elk/preisl/at/MA_136_5P.pdf"><img src="fileadmin/elk/images/pdf.gif" width="19" border="0" height="16"> Preisliste</a><br><a target="_blank" href="fileadmin/elk/lb/at/lb_fh.pdf"><img src="fileadmin/elk/images/pdf.gif" width="19" border="0" height="16"> Liefer- und Leistungsbeschreibung</a><br></div>
-->

* Цены на комплекты домов на условиях пакета «Самостоятельное строительство» могут быть просчитаны индивидуально по запросу
заказчика.<br>
** Цены указанны без НДС (20%)<br>
*** Цены указаны без доставки комплектов домов по территории Украины

        </div>
        <div id="subsubnavbreitbot"></div>
      </div>


  
<?php if($plans):?><?php $plans = explode(",",$plans)?>
<?php foreach($plans as $plan):?>
<? if(file_exists("typicalprojects/".$link."/".$houselink."/".str_replace("-300","",trim($plan)))): ?>
<a style="margin:5px" target="_blank" href="/typicalprojects/<?=$link."/".$houselink."/".str_replace("-300","",trim($plan))?>">
<img style="max-width:450px;max-height:550px;" src="/typicalprojects/<?=$link."/".$houselink."/".trim($plan)?>">
</a>
<?php endif;?>
<?php endforeach;?>
<?php endif;?>

<p style="clear:left">
<a href="/construction/typical_projects/<?=$typeId?>"> << другие дома</a>
</p>
</div>




