<?
//print_r($barticles);
if(!empty($barticles)):?>
<?foreach ($barticles as $b):?>
<div><b><?=$b->name?> (<?=$b->dates?>)</b></div>
<div style="margin:10px 0 0 0;"><?=$b->stext?></div>
<div style="margin:10px 0 0 0;"><a title="<?=$b->name?>" href="/<?=$lang?>/opit/articles/show/<?=$b->id?>"><?=$dalee?></a></div>
<?endforeach;
endif;?>