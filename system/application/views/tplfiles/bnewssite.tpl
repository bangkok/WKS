<?
//print_r($barticles);
if(!empty($bnews)):?>
<?foreach ($bnews as $b):?>
<div><b><?=$b->name?> (<?=$b->dates?>)</b></div>
<div style="margin:10px 0 0 0;"> 
 <a style="float:left; margin:0 10px 10px 0;" href="/<?=$lang?>/opit/articles/show/<?=$b->id?>" title="<?=$b->name?>"><img src="/images/<?= $b->simg?>.jpg" alt="images"></a> <?=$b->stext?> 
</div>
<div style="margin:10px 0 0 0;"><a title="<?=$b->name?>" href="/<?=$lang?>/opit/articles/show/<?=$b->id?>"><?=$dalee?></a></div>
<?endforeach;
endif;?>