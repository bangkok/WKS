<?if(!empty($bcase)):?>
<?foreach ($bcase as $b):?>
<div>-&nbsp;<a title="<?=$b->name?>" href="/<?=$lang?>/opit/casestudy/show/<?=$b->id?>"><?=$b->name?> (<?=$b->dates?>)</a></div>
<?endforeach;
endif;?>