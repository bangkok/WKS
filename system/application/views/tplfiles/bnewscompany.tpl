<?if(!empty($bnews)):?>
<?foreach ($bnews as $b):?>
<div>-&nbsp;<a title="<?=$b->name?>" href="/<?=$lang?>/news/newscompany/show/<?=$b->id?>"><?=$b->name?> (<?=$b->dates?>)</a></div>
<?endforeach;
endif;?>