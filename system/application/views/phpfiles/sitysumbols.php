<?if (!empty($SitySumbols)):?>
<? foreach ($SitySumbols as $item):?>
<div style=" margin:5px; float:left; padding:5px; border: 1px #000 solid; background-color:#e8eff1;">
<center><a href="<?=$item['link']?>"><img src="/images/<?=$item['img']?>.jpg" style="margin:5px 10px; height:120px;border: 0px"></a></center>
<br><b><?=$item['title']?></b>
<?=$item['text']?>
</div>
<?endforeach;?>
<?endif;?>