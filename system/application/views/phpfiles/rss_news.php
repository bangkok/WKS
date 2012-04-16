<?php echo '<'.'?xml version="1.0" encoding="utf-8" ?'.'>';?>


<rss version="2.0">
<??>
	<channel>

		<title>ТРЕНИНГОВАЯ КОМПАНИЯ SHIFT</title>

		<link>http://www.shift.dp.ua</link>

		<description>RSS Новости</description>

		<copyright>Copyright 2008, shift.dp.ua</copyright>


		<?php if(isset($news)&&count($news)>0) foreach($news as $v):?>

		<item>

			<title>Новость <?= $v->dates?></title>

			<link><?=base_url().$link.$v->id?></link>

			<description>

			<![CDATA[
			
			<b><?=$v->title?></b>
			 <img align="left" src="/images/<?=$v->imagesmall?>.jpg" title="<?=$v->title?>">
			<?=$v->anons?>
			     
			]]>

			</description>

			<pubDate><?= $v->dates?></pubDate>

		</item>

		<?php endforeach;?>

	</channel>
<??>
</rss>

