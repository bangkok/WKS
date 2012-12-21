<h3><a href="#calc" class="calc">Калькулятор (нажми)</a></h3>

<?$border_color='#72b430';?>
<?$border_style = '3px '.$border_color.' solid'?>

<style type="text/css">
#calc{
	width:840px;
	color: <?=$border_color?>;
}
#calc .calc-block table{width:100%;}
#calc .calc-block table td{vertical-align: top;}
#calc table.half{width:100%;}
#calc table.half td{width:50%;}
#calc table.half td.first{padding-right: 5px; padding-left: 0px !important;}
#calc table.half td.last{padding-left: 5px; padding-right: 0px !important;}
#calc table.half td.bottom{border-top: <?=$border_style?>;}
#calc .item div{clear: both;}
#calc .item .fr{float:right;}
#calc .item .fr a{float: left}
#calc .header-top .item .fr a{float: right;}
#calc .item .fr a img {width: 16px; margin: 2px}

#calc .calc-block
{
	clear:both;
	position: relative;
	border: <?=$border_style?>;
	border-radius: 20px 20px 20px 20px;
	margin-top: 10px;
	font-size: 14px;
}


#calc .header-top .last,
#calc .wall .last
{
	width: 260px;
}

#calc .header-top{
	font-size:18px;
	text-align: center;
	border-bottom: <?=$border_style?>;
}
#calc .header-top .item>div{
	height:44px;
	padding: 5px 10px;
	text-align: left;
	border-right: <?=$border_style?>;
	border-top-right-radius: 20px;
}
#calc .header-top .last>div,
#calc .header-top .item,
#calc .calc-block .last
{
	border-right: 0 !important;
}

#calc .item .container{
	padding: 5px 8px;
}


#calc .item {
	border-right: <?=$border_style?>;
}


#calc .header{
	clear: both;
	border-bottom: <?=$border_style?>;
	padding: 5px;
	text-align: center;
	font-size:14px;
	font-weight:bold;
	color:#777;
}

#calc .header .subheader{
	font-size: 11px;
	font-weight: normal;
	text-align: left;
	padding: 5px 0 0 10px;
}

#calc .sub{
	margin-left:-10px;
	margin-right:-10px;
	margin-bottom: 3px;
	padding: 0 0 2px 0;
	border-bottom: 2px <?=$border_color?> solid;
}
#calc .top{
	margin-bottom: 3px;
	padding: 2px 0 2px 0;
	border-top: 2px <?=$border_color?> solid;
}

#calc .roof{
	/*width:800px;*/
}
#calc .roof .item{
	width: 50%;
	/*float:left;*/
}

#summ{
	min-height: 30px;
	text-align: left;
	margin: 10px;
}
#summ b{
	float: right;
	-height: 20px;
	vertical-align: middle;
	display: block;
	margin-left: 10px;
	-border: <?=$border_style?>;
	-border-radius: 10px 10px 10px 10px;
	-padding: 5px;
	font-size: 20px;
}

</style>


<div style="display: none">
<div id="calc" class="art hidden">
	<div class="calc-block">
		<div class="header-top" name="header">
			<table><tr>
			<td name="item_1" class="item first"><div><img src="/img/wks/calc/econom.jpg"><span class="fr">
				<input value="knauf" name="header" type="radio"><br><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a></span></div></td>
			<td name="item_2" class="item"><div><img src="/img/wks/calc/withknauf.jpg"><span class="fr">
				<input value="woodprime" name="header" type="radio"><br><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a></span></div></td>
			<td name="item_3" class="item"><div><img src="/img/wks/calc/woodprime.jpg"><span class="fr">
				<input value="fundermax" name="header" type="radio"><br><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a></span></div></td>
			<td name="item_4" class="item last"><div><img src="/img/wks/calc/fundermax.jpg"><span class="fr">
				<input value="ekonom" name="header" type="radio"><br><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a></span></div></td>
			</tr></table>
		</div>

		<div class="header">Выберите толщину стен</div>
		<div class="wall" name="wall">
			<table><tr>
				<td name="item_1" class="item first"><div class="container">
					<div>ES-160 <b>170 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="ES160" type="radio"></span></div>
					<div>EP-200 <b>220 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="EP200" type="radio"></span></div>
					<div>E-ISO+ <b>265 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="EISO" type="radio"></span></div>
				</div></td>
				<td name="item_2" class="item"><div class="container">
					<div>MS-175 <b>183 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="MS175" type="radio"></span></div>
					<div>MP-225 <b>233 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="MP255" type="radio"></span></div>
					<div>ISO+ &nbsp;&nbsp;&nbsp;&nbsp;<b>278 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="ISO" type="radio"></span></div>
				</div></td>
				<td name="item_3" class="item"><div class="container">
					<div>FS-175 <b>190 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="FS175" type="radio"></span></div>
					<div>FS-255 <b>240 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="FS255" type="radio"></span></div>
					<div>F-ISO+ <b>285 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="FISO" type="radio"></span></div>
				</div></td>
				<td name="item_4" class="item last" ><div class="container">
					<div>L-175 <b>215 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="Ll75" type="radio"></span></div>
					<div>L-255 <b>265 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="L225" type="radio"></span></div>
					<div>L-ISO+<b>310 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="wall" value="LISO" type="radio"></span></div>
				</div></td>
			</tr></table>
		</div>
	</div>

	<div class="calc-block">
		<div class="roof" name="roof">
			<div class="header">Выберите систему деревянной кровли</div>
			<table><tr>
				<td class="item first last"><div class="container">
					<div><b>Деревянные кровельные фермы MiTek<b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="roof" value="KF145" type="radio"></span></div>
					<div><b>Кровельные панели высокой заводской готовности WKS<b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="roof" value="KP200" type="radio"></span></div>
				</div></td>
			</tr></table>
		</div>
	</div>

	<table class="half"><tr>
		<td class="first">
			<div class="calc-block">
				<div class="header">Выберите систему внутренних перегородок</div>
				<table><tr>
					<td class="item first"><div class="container">MR-125 <b>120 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="inwall" value="MR125" type="radio"></span></div></td>
					<td class="item last"><div class="container">MR-150 <b>170 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="inwall" value="MR150" type="radio"></span></div></td>
				</tr><tr>
					<td colspan="2" class="item first last bottom">
						<div class="container">Межэтажные перекрытия DP-230<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
							<input name="DP230" type="checkbox"></span></div></td>
				</tr>
				</table>
			</div>
		</td>

		<td class="last">
			<div class="calc-block">
				<div class="header">Выберите высоту фундаментной плиты
					<div class="subheader">
						Внимание! Фундаментные плиты WKS Futura предназначены для ровных<br>
						участков с незначительными ландшафтными неровностями.
					</div>
				</div>
				<table><tr>
					<td class="item first"><div class="container">FUTURA <b>300 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="foundation" value="F300" type="radio"></span></div></td>
					<td class="item last"><div class="container">FUTURA <b>600 мм</b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
						<input name="foundation" value="F600" type="radio"></span></div></td>
				</tr></table>
			</div>
		</td>
	</tr></table>

	<div class="calc-block">
		<div class="header">Монтаж базового комплекта</div>
		<table><tr>
			<td class="item first last"><div class="container">
				<div><b>Воспользоваться квалифицированной услугой монтажа WKS Fertighaus<b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="mounting" value="m_wks" type="radio"></span></div>
				<div><b>Смонтирую сам под наблюдением инжинера WKS Fertighaus<b><span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="mounting" value="m_self" type="radio"></span></div>
			</div></td>
		</tr></table>
	</div>

	<div class="calc-block">
		<div class="header">Опциональные предложения</div>
		<table><tr>
			<td class="item first"><div class="container">
				<div class="header sub">Вставить окна</div>
				<div>
					<span class="fr"><a href="#" target=_blanck>
						<img src="/img/wks/calc/pdf.jpg"></a>
						<input name="windows" value="white" type="radio">
					</span>
					Металлопластиковые <br>энергосберигающие белые
				</div>
				<div>
					<span class="fr"><a href="#" target=_blanck>
						<img src="/img/wks/calc/pdf.jpg"></a>
						<input name="windows" value="laminated" type="radio">
					</span>
					Металлопластиковые <br>энергосберигающие ламинированные
				</div>

			</div></td>
			<td class="item" nowrap><div class="container">
				<div class="header sub">Вставить двери</div>
				<div>Двери входные<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="doors" value="entrance" type="radio"></span></div>
				<div>Двери межкомнатные<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="doors" value="interior" type="radio"></span></div>

				<div class="header sub top">Смонтировать потолок</div>
				<div>ГКЛ потолки<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="ceiling" value="gkl" type="radio"></span></div>
				<div>Натяжные потолки<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="ceiling" value="stretch" type="radio"></span></div>
			</div></td>
			<td class="item"><div class="container">
				<div class="header sub">Смонтировать кровлю</div>
				<div>При выборе кровельных ферм MiTek<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="m_roof" value="r_mitek" type="radio"></span></div>
				<div>При выборе кровельных панелей WKS<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="m_roof" value="r_wks" type="radio"></span></div>
			</div></td>
			<td class="item last" nowrap><div class="container">
				<div class="header sub">Сделать фасад</div>
				<div>Декоративный фасад<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="facade" value="decorative" type="radio"></span></div>
				<div>Клинкерная плитка<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="facade" value="clay_tiles" type="radio"></span></div>
				<div>Фасад Tikkurila<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="facade" value="tikkurila" type="radio"></span></div>
				<div>Фасад Fundermax<span class="fr"><a href="#" target=_blanck><img src="/img/wks/calc/pdf.jpg"></a>
					<input name="facade" value="fundermax" type="radio"></span></div>
			</div></td>
		</tr></table>
	</div>

	<div class="calc-block">
		<div id="summ">0</div>
	</div>
	<p></p>
</div>
</div>


<script type="text/javascript">
	$.fn.getParent = function(selector) {
		var elem = this;
		while( elem && !elem.parent(selector).length ){elem = elem.parent()}
		return elem ? elem.parent(selector) : elem;
	}
	$.fn.setDisabled = function(){
		//this.attr("disabled", true);
		this.parent('span').addClass('disabled');
		return this;
	}
	$.fn.setEnabled = function(){
		//this.attr("disabled", false);
		this.parent('span').removeClass('disabled');
		return this;
	}

	function is_checked(name){
		return calc.find("input[name="+name+"]:checkbox, input[value="+name+"]:radio").attr('checked');
	}

	function onHeaderItemChange(e){
		var target = $(e.target);
		target.attr("checked", true);
		var name = target.getParent('[name^="item"]').attr('name');

		wall.find(".item[name="+name+"]").find("input:checkbox, input:radio").setEnabled();

		wall.find(".item[name!="+name+"]").find("input:checkbox, input:radio").setDisabled();

	}

	function onWallItemChange(e){
		var target = $(e.target);
		target.attr("checked", true);
		var name = target.getParent('[name^="item"]').attr('name');

		header.find(".item[name="+name+"]").find("input:checkbox, input:radio").each(function(){
			if( !$(this).attr('checked') ){
				$(this).attr('checked',true);
				if( 'radio' == $(this).attr('type') ){
					header.find("input:radio").removeAttr("ch");
					$(this).attr('ch',true);
				}
				$(this).change();
			}
		});

	}

	function onCalcItemClick(e){
		var target = $(e.target);

		if( 'radio' == target.attr('type') ){
			if( target.attr('ch') ){

				target.removeAttr("ch");
				target.attr('checked',false);
				target.change();
				target.attr('checked',false);

			}else{
				calc.find('input[name="'+target.attr('name')+'"][ch]').removeAttr("ch");
				target.attr('ch',true);
			}
		}

		summ(cost);
	}

	function summ(cost){

		var summ = 0;
		var str = '';

		for( cost_key in cost){

			if( is_checked(cost_key) ){

				if('undefined' == typeof cost[cost_key][0] ){
					var sstr = '';
					sstr += '(&nbsp;';
					for(key in cost[cost_key]){
						if( !cost[cost_key][key][2] || is_checked(cost[cost_key][key][2]) ){
							summ += cost[cost_key][key][0] * cost[cost_key][key][1];
							sstr += cost[cost_key][key][0] + 'x' + cost[cost_key][key][1] + '&nbsp;+&nbsp;';
						}
					}
					sstr = sstr.substr(0, sstr.length-13) + '&nbsp;)&nbsp;+ ';
				}else{
					summ += ssumm = cost[cost_key][0] * cost[cost_key][1];
					ssumm && (str += cost[cost_key][0] + 'x' + cost[cost_key][1] + '&nbsp;+ ');
				}
			}
		}
		str += sstr ? sstr : '';
		str = str.substr(0, str.length-8);

		var result = '<b>'+(summ?'= ':'')+sdf_FTS(summ,2,' ')+' грн'+'</b>' + str;

		$('#summ').html(result);

//console.log(summ);
		return summ;
	}
//====================================================================================

var price = {
	'wall':{
		'knauf':{
			'MS175':	1042.60,
			'MP255':	1105.00,
			'ISO':		1209.00
		},
		'woodprime':{
			'FS175':	895.00,
			'FS255':	959.40,
			'FISO':		1057.55
		},
		'fundermax':{
			'Ll75':		846.51,
			'L225':		889.93,
			'LISO':		998.47
		},
		'ekonom':{
			'ES160':	750.85,
			'EP200':	811.89,
			'EISO':		891.17
		}
	},
	'roof':{
		'KF145':	6582.06,
		'KP200':	561.27
	},
	'inwall':{
		'MR125':	391.37,
		'MR150':	536.54
	},
	overlap:{
		'DP230':		543.94
	},
	'foundation':{
		'F300':		700,
		'F600':		1100
	},
	'mounting':{
		'wks':{
			'wall':		30,
			'inwall':	30,
			'overlap':	30,
			'roof':	{
				'KF145':	55,
				'KP200':	30
			}
		},
		'self':	5000
	},
	'optional':{
		'windows':{
			'white':		0,
			'laminated':	0
		},
		'doors':{
			'entrance':		0,
			'interior':		0
		},
		'ceiling':{
			'gkl':			0,
			'stretch':		0
		},
		'm_roof':{
			'r_mitek':		0,
			'r_wks':		0
		},
		'facade':{
			'decorative':	0,
			'clay_tiles':	0,
			'tikkurila':	155,
			'fundermax':	0
		}


	}
}

var size={// ПЕРЕПРОВЕРИТЬ!!!!!
	'orp':	<?=floatval(str_replace(',','.',$living_space))?>,	//общая площадь дома
	'wex':		<?=floatval(str_replace(',','.',$panel_ex))?>,	//Стеновые панели наружные
	'win':		<?=floatval(str_replace(',','.',$panel_in))?>,	//Стеновые панели внутренние
	'overlap':	<?=floatval(str_replace(',','.',$overlap ? $overlap : $living_space))?>,	//Панели перекрытия
	'roof':		<?=floatval(str_replace(',','.',$size_roof)) / 40?>	//Объем кровли
}

var cost = {
	'MS175':	[price.wall.knauf.MS175,		size.wex],
	'MP255':	[price.wall.knauf.MP255,		size.wex],
	'ISO':		[price.wall.knauf.ISO,			size.wex],
	'FS175':	[price.wall.woodprime.FS175,	size.wex],
	'FS255':	[price.wall.woodprime.FS255,	size.wex],
	'FISO':		[price.wall.woodprime.FISO,		size.wex],
	'Ll75':		[price.wall.fundermax.Ll75,		size.wex],
	'L225':		[price.wall.fundermax.L225,		size.wex],
	'LISO':		[price.wall.fundermax.LISO,		size.wex],
	'ES160':	[price.wall.ekonom.ES160,		size.wex],
	'EP200':	[price.wall.ekonom.EP200,		size.wex],
	'EISO':		[price.wall.ekonom.EISO,		size.wex],
	'KF145':	[price.roof.KF145,				size.roof],
	'KP200':	[price.roof.KP200,				size.roof],
	'MR125':	[price.inwall.MR125,			size.win],
	'MR150':	[price.inwall.MR150,			size.win],
	'DP230':	[price.overlap.DP230,			size.overlap],
	'F300':		[price.foundation.F300,			size.orp],
	'F600':		[price.foundation.F600,			size.orp],
	'm_self':	[price.mounting.self,			1],
	'm_wks':	{
		'm_wall':	[price.mounting.wks.wall,		size.wex],
		'm_inwall':	[price.mounting.wks.inwall,		size.win],
		'm_overlap':[price.mounting.wks.overlap,	size.overlap],
		'm_KF145':	[price.mounting.wks.roof.KF145,	size.overlap, 'KF145'],
		'm_KP200':	[price.mounting.wks.roof.KP200,	size.overlap, 'KP200']
	},
	'white':		[price.optional.windows.white,		0],
	'laminated':	[price.optional.windows.laminated,	0],
	'entrance':		[price.optional.doors.entrance,		0],
	'interior':		[price.optional.doors.interior,		0],
	'gkl':			[price.optional.ceiling.gkl,		0],
	'stretch':		[price.optional.ceiling.stretch,	0],
	'r_mitek':		[price.optional.m_roof.r_mitek,		0],
	'r_wks':		[price.optional.m_roof.r_wks,		0],
	'decorative':	[price.optional.facade.decorative,	size.wex],
	'clay_tiles':	[price.optional.facade.clay_tiles,	size.wex],
	'tikkurila':	[price.optional.facade.tikkurila,	size.wex],
	'fundermax':	[price.optional.facade.fundermax,	size.wex]
}


	var calc = $('#calc');
	var header = calc.find("div[name=header]");
	var wall = calc.find("div[name=wall]");

$(document.body).ready(function(){

	header.find("input:checkbox, input:radio").change(function(e){ onHeaderItemChange(e); });
	wall.find("input:checkbox, input:radio").change(function(e){ onWallItemChange(e); });

	calc.find("input:checkbox:checked").each(function(){ $(this).attr('ch',true); });
	calc.find("input:checkbox, input:radio").click(function(e){ onCalcItemClick(e); });
	//calc.find("input:checkbox, input:radio").click( function(){ summ(cost); });
	summ(cost);
});
</script>

