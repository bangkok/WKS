<div id="menu">
	<?
//	echo $curRoom;
	if ($curRoom == '999999')
	{
	?>
	<div class="sa"><a href="/catalog/all">Весь каталог</a></div>
	<?	
	}
	else
	{
	?>
	<div class="s"><a href="/catalog/all">Весь каталог</a></div>
	<?
	}
	
	$i = 0;
	foreach ($catalog as $val)
	{
		$i++;
		if ($i <= 9)
		{
			if ($curRoom != $val->id_value)
			{
			?>
	<div class="ns"><a href="/catalog/room/<?=$val->id_value?>"><?=$val->value_ru?></a></div>
			<?	
			}
			else
			{
			?>
	<div class="nsa"><a href="/catalog/room/<?=$val->id_value?>"><?=$val->value_ru?></a></div>
			<?
			}
		}
	}?>
	<div style="clear: left; height: 0px; line-height: 0px;"></div>
</div>