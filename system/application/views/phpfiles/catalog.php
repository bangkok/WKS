<!--
<div style="float:left;margin-left:-20px; width:700px;">
-->

<?php if(isset($Houses) && !empty($Houses)):?>
<div><font size="3"><?=$Houses[0]->text?></font></div>

<div style="float:left;margin-left:-10px; margin-bottom:20px">
<?foreach($Houses as $house):?>
<?$house->houselink = str_replace(" ","_",$house->houselink)?>
<div style="margin:10px;float:left;">
<div class="hausdia" style="background-image: url('/typicalprojects_min/<?=$house->link?>/<?=$house->houselink?>/<?=$house->simagepath?>');">
<a href="/construction/typical_projects/house/<?=$house->id?>"><img src="/img/buttons/dot_clear.gif" width="200" height="189" border="0" /></img><br><span style="clear:left"><?=$house->title?></span></a>
</div>
</div>
<? endforeach;?>

</div>
<? endif;?>
<p></p>
<div style="clear:left; margin: 10px; width:700px; text-align:center"><?=$links ?></div>

