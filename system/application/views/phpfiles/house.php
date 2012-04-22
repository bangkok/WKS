<div>
<?$houselink = str_replace(" ","_",$houselink)?>

<?if(isset($imagepath)){ $img_path="/typicalprojects_max/".$link."/".$houselink."/".$imagepath;?>

	<img src="<?=$img_path?>" id="img" style="float:left;margin: 0 20px 5px 0;" width=674>
	<div id="image" style="display:none; float:left;margin: 0 20px 5px 0; background-image: url(<?=$img_path?>); background-repeat: no-repeat;">
	<a href="/construction/typical_projects/house/<?=$id?>/show">

	<table id="round" style="display: none">
		<tr>
			<td width=40 height="40" style="background: url(/img/wks/round/tl.png) left ;background-repeat: no-repeat;">&nbsp;</td>
			<td width=* height="40" style="background: url(/img/wks/round/t.png) top;">&nbsp;</td>
			<td width=40 height="40" style="background: url(/img/wks/round/tr.png) right;background-repeat: no-repeat;">&nbsp;</td>
		</tr>
		<tr>
			<td width="40" style="background: url(/img/wks/round/l.png) left ;"></td>
			<td></td>
			<td width="40" style="background: url(/img/wks/round/r.png) right ;"></td>
		</tr>
		<tr>
			<td width=40 height="40" style="background: url(/img/wks/round/bl.png) left ;background-repeat: no-repeat;">&nbsp;</td>
			<td width=* height="40" style="background: url(/img/wks/round/b.png) bottom;">&nbsp;</td>
			<td width=40 height="40" style="background: url(/img/wks/round/br.png) right;background-repeat: no-repeat;">&nbsp;</td>
		</tr>
	</table>
	</a></div>
	<?/*
	<div style="width:327px;height:247px; background:
	url(/img/wks/round/tl.png) top left no-repeat,
	url(/img/wks/round/tr.png) top right no-repeat,
	url(/img/wks/round/bl.png) bottom left no-repeat,
	url(/img/wks/round/br.png) bottom right no-repeat,
	url(/img/wks/round/t.png) top repeat-x,
	url(/img/wks/round/b.png) bottom repeat-x,
	url(/img/wks/round/l.png) left repeat-y,
	url(/img/wks/round/r.png) right repeat-y;
	">
	</div>
	*/?>

	<script type="text/javascript">
	$("#img").load(function(){
		//console.log($(this).width());
		//console.log($(this).height());
		$(this).hide();
		$('#round').width($(this).width());
		$('#round').height($(this).height());
		$('#round').show();
		$('#image').width($(this).width());
		$('#image').height($(this).height());
		$('#image').show();
	});
	</script>

<?}?>


<table width="327" >
<tr><td width="327" height="13" style="background-image: url(/img/wks/hausdetailtopbg.jpg);background-repeat: no-repeat;"></td></tr>

<tr><td style="background-image: url(/img/wks/hausdetailbg.jpg);background-repeat: repeat-y; padding:0 0 0 20px;">

<span class="h3">Характеристики</span>
<?//<img src="/img/wks/line281.gif" width="281" height="15">?>
<div style="height: 20px"></div>
<table style=" width:280px; font-size: 12px;">

<?php if($size):?>
<tr><td>Внешние размеры здания: </td><td width="120" align=right><?=$size?> м</td></tr>
<?php endif;?>

<?php if( $living_space):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<tr><td>Общая расчетная площадь: </td><td align=right><?=$living_space?> м&sup2;</td></tr>
<?php endif;?>

<?php if($area_floor_1):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<tr><td>Площадь 1 этаж: </td><td align=right><?=$area_floor_1?> м&sup2;</td></tr>
<?php endif;?>

<?php if($area_floor_2):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<tr><td>Площадь 2 этаж: </td><td align=right><?=$area_floor_2?> м&sup2;</td></tr>
<?php endif;?>

<?php if($roof_form):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<tr><td>Наклон крыши / <br>высота стен <?=$area_floor_2 ? '2эт':'мансарды'?>: </td><td align=right><?=$roof_form?> см</td></tr>
<?php endif;?>

<?///////////////////////////////////////////////////////////////////////////////////////////////////?>
<?php if(false):?>

<?php if(FALSE && $building_area):?>
<tr><td colspan=2><img src="/img/wks/line281.gif" width="281" height="15"></td></tr>
<tr><td>Общая расчетная площадь: </td><td align=right><?=$building_area?> м&sup2;</td></tr>
<?php endif;?>

<?php if(FALSE && $storey):?>
<tr><td>Этажность: </td><td align=right><?=$storey?> <?if($storey == 1) echo "этаж"; else if($storey < 5) echo "этажа";?></td></tr>
<?php endif;?>

<?php endif;?>
<?///////////////////////////////////////////////////////////////////////////////////////////////////?>



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
<!--
* Цены на комплекты домов на условиях пакета «Самостоятельное строительство» могут быть просчитаны индивидуально по запросу
заказчика.<br>
** Цены указанны без НДС (20%)<br>
*** Цены указаны без доставки комплектов домов по территории Украины
-->
        </div>
        <div id="subsubnavbreitbot"></div>
      </div>



<?/*php if($plans):?><?php $plans = explode(",",$plans)?>
<?php foreach($plans as $plan):?>
<? if(file_exists("typicalprojects_min/".$link."/".$houselink."/".str_replace("-300","",trim($plan)))): ?>
<a class="group1" style="margin:5px" target="_blank" href="/typicalprojects_max/<?=$link."/".$houselink."/".str_replace("-300","",trim($plan))?>">
<img style="max-width:450px;max-height:550px;" src="/typicalprojects_min/<?=$link."/".$houselink."/".trim($plan)?>">
</a>
<?php endif;?>
<?php endforeach;?>
<?php endif;*/?>


<?php if(/*FALSE && */ (2 == $typeId or 3 == $typeId or 4 == $typeId) and $plans):?><?php $plans = explode(",",$plans); $i=1;?>
<?php foreach($plans as $plan):?>
<? if(file_exists("typicalprojects_min/".$link."/".$houselink."/".str_replace("-300","",trim($plan)))): ?>

<div class="box showhouse margin" style="padding-top: 0px; padding-bottom: 0px; ">
			<b style="margin-left: 0px; margin-right: 0px;  background-color: #FFF; margin-bottom: -5px;" class="niftycorners">
				<b class="r1 b_radius"></b>
				<b class="r2 b_radius"></b>
				<b class="r3 b_radius"></b>
				<b class="r4 b_radius"></b>
			</b>
		      <table cellpadding="0" cellspacing="0" border="0">
		        <tbody><tr>
		          <td class="img" style="height: 120px;">
				  	<div class="wrapper" style="width: 160px; height: 120px; ">
						  <div class="tl"></div>
						  <div class="tr"></div>
						  <div class="bl"></div>
						  <div class="br"></div>
						 <a class= "group1" href="/typicalprojects_max/<?=$link."/".$houselink."/".str_replace("-300","",trim($plan))?>">
				  			<img alt="Grundrisse" title="Grundrisse" src="/typicalprojects_min/<?=$link."/".$houselink."/".trim($plan)?>" width="160" height="120">
						</a>
					</div>
				  </td>
		        </tr>
		        <tr>
		          <td class="link"><h2 style="" class="sIFR-replaced"><span class="sIFR-alternate" id="sIFR_replacement_2_alternate">
				  	План <?=$i++?>-го этажа
				  </span></h2></td>
		        </tr>
		      </tbody></table>
		    <b class="b_background_t niftycorners">
				<b class="r4 b_radius"></b>
				<b class="r3 b_radius"></b>
				<b class="r2 b_radius"></b>
				<b class="r1 b_radius"></b>
			</b>
		</div>

<?php endif;?>
<?php endforeach;?>
<?php endif;?>

<div style="clear:both"></div>
<?if('test'==$this->uri->segment(4))$this->load->view('block/calc.inc.php');?>

<p style="clear:left">
<a href="/construction/typical_projects/<?=$typeId?>"> << другие дома</a>
</p>
</div>




