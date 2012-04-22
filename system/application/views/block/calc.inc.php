<?$border_color='#5c932b';?>
<?$border_style = '3px '.$border_color.' solid'?>

<style type="text/css">
#calc{
	width:700px;
	color: <?=$border_color?>;
}
#calc .calc-block table{width:100%;}
#calc .calc-block table td{vertical-align: top;}
#calc table.half{width:100%;}
#calc table.half td{width:50%;}
#calc table.half td.first{padding-right: 5px;}
#calc table.half td.last{padding-left: 5px;}
#calc .item div{clear: both;}
#calc .item .fr{float:right;}

#calc .calc-block
{
	clear:both;
	border: <?=$border_style?>;
	border-radius: 20px 20px 20px 20px;
	margin-top: 10px;
	font-size: 14px;
}


#calc .header-top .item,
#calc .wall .item
{
	/*width: 180px;*/
	/*float:left;*/
}

#calc .header-top{
	font-size:18px;
	text-align: center;
	border-bottom: <?=$border_style?>;
}
#calc .header-top .item{
	padding: 5px 10px;
	text-align: left;
	border-right: <?=$border_style?>;
	border-top-right-radius: 20px;
}
#calc .header-top .last,
#calc .calc-block .last
{
	border-right: 0 !important;
}

#calc .item {
	padding: 5px 10px;
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
#calc .sub{
	margin-left:-10px;
	margin-right:-10px;
	margin-bottom: 3px;
	padding: 0 0 2px 0;
	border-bottom: 1px <?=$border_color?> solid;
}
#calc .top{
	margin-bottom: 3px;
	padding: 2px 0 2px 0;
	border-top: 1px <?=$border_color?> solid;
}

#calc .roof{
	/*width:800px;*/
}
#calc .roof .item{
	width: 50%;
	/*float:left;*/
}

</style>




<div id="calc">
	<div class="calc-block">
		<div class="header-top" name="header">
			<table><tr>
			<td><div name="item_1" class="item first">Эконом <span class="fr"><input type="checkbox"></span></div></td>
			<td><div name="item_2" class="item">Эконом <span class="fr"><input type="checkbox"></span></div></td>
			<td><div name="item_3" class="item">Эконом <span class="fr"><input type="checkbox"></span></div></td>
			<td><div name="item_4" class="item last">Эконом <span class="fr"><input type="checkbox"></span></div></td>
			</tr></table>
		</div>

		<div class="header">Выберите толщину стен</div>
		<div class="wall" name="wall">
			<table><tr>
				<td name="item_1" class="item first">
					<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 3<span class="fr"><input type="checkbox"></span></div>
				</td>
				<td name="item_2" class="item">
					<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 3<span class="fr"><input type="checkbox"></span></div>
				</td>
				<td name="item_3" class="item">
					<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 3<span class="fr"><input type="checkbox"></span></div>
				</td>
				<td name="item_4" class="item last" >
					<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
					<div>Стена 3<span class="fr"><input type="checkbox"></span></div>
				</td>
			</tr></table>
		</div>
	</div>

	<div class="calc-block">
		<div class="roof" name="roof">
			<div class="header">Выберите систему деревянной кровли</div>
			<table><tr>
				<td class="item first last">
					<div><b>Деревянные кровельные фермы MiTek<b><span class="fr"><input type="checkbox"></span></div>
					<div><b>Кровельные панели высокой заводской готовности WKS<b><span class="fr"><input type="checkbox"></span></div>
				</td>
			</tr></table>
		</div>
	</div>

	<table class="half"><tr>
		<td class="first">
			<div class="calc-block">
				<div class="header">Выберите систему внутренних перегородок</div>
				<table><tr>
					<td class="item first"><div>Стена 1<span class="fr"><input type="checkbox"></span></div></td>
					<td class="item last"><div>Стена 1<span class="fr"><input type="checkbox"></span></div></td>
				</tr></table>
			</div>
		</td>

		<td class="last">
			<div class="calc-block">
				<div class="header">Выберите высоту фундаментной плиты</div>
				<table><tr>
					<td class="item first"><div>Стена 1<span class="fr"><input type="checkbox"></span></div></td>
					<td class="item last"><div>Стена 1<span class="fr"><input type="checkbox"></span></div></td>
				</tr></table>
			</div>
		</td>
	</tr></table>

	<div class="calc-block">
		<div class="header">Монтаж базового комплекта</div>
		<table><tr>
			<td class="item first last">
				<div><b>Воспользоваться квалифицированной услугой монтажа WKS Fertighaus<b><span class="fr"><input type="checkbox"></span></div>
				<div><b>Смонтирую сам под наблюдением инжинера WKS Fertighaus<b><span class="fr"><input type="checkbox"></span></div>
			</td>
		</tr></table>
	</div>

	<div class="calc-block">
		<div class="header">Опциональные предложения</div>
		<table><tr>
			<td class="item first">
				<div class="header sub">Вставить окна</div>
				<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 2<span class="fr"><input type="checkbox"></span></div>

			</td>
			<td class="item">
				<div class="header sub">Вставить двери</div>
				<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 2<span class="fr"><input type="checkbox"></span></div>

				<div class="header sub top">Смонтировать потолок</div>
				<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
			</td>
			<td class="item">
				<div class="header sub">Смонтировать кровлю</div>
				<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
			</td>
			<td class="item last" >
				<div class="header sub">Сделать фасад</div>
				<div>Стена 1<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 2<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 3<span class="fr"><input type="checkbox"></span></div>
				<div>Стена 4<span class="fr"><input type="checkbox"></span></div>
			</td>
		</tr></table>
	</div>

</div>



<script type="text/javascript">
	function disableAllBodes(){
		wall.find("input:checkbox").attr("disabled", true);
	}
	function enableAllBodes(){
		wall.find("input:checkbox").attr("disabled", false);
	}
	function enableWallItem(name){
		wall.find(".item[name="+name+"] input:checkbox").attr("disabled", false);
	}
	function uncheckOtherWallItem(name){
		wall.find(".item[name!="+name+"] input:checkbox").removeAttr("checked");
	}

	function onHeaderItemChange(e){
		var target = $(e.target);
		var name = target.parent('.item').attr('name');

		if( target.attr("checked") ) {
			enableWallItem(name);
			uncheckOtherWallItem(name);
			header.find("input:not(:checked)").attr("disabled", true);
		} else {
			disableAllBodes();
			header.find("input:not(:checked)").attr("disabled", false);
		}
	}

	function onWallItemChange(e){
		var target = $(e.target);
		var name = target.parent('.item').attr('name');

		if( target.attr("checked") ) {
			wall.find(".item[name="+name+"] input:not(:checked)").attr("disabled", true);
		} else {
			disableAllBodes();
			wall.find(".item[name="+name+"] input:not(:checked)").attr("disabled", false);
		}
	}
//====================================================================================
	var calc = $('#calc');
	var header = calc.find("[name=header]");
	var wall = calc.find("[name=wall]");

	disableAllBodes();
	header.find("input:checkbox").change(function(e){onHeaderItemChange(e)});
	wall.find("input:checkbox").change(function(e){onWallItemChange(e)});

</script>