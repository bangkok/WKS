<div id="service">

<?
if (isset($links))
foreach ($links as $val)
{
	?>
		<div class="srv">
			<div class="head">
				<div class="title">
					<a href="/articles/service/<?=$val ?>"><?=$arts[$val]->title ?></a>
				</div>
				<div class="icon">
					<?if ($arts[$val]->img != 0) {?>
						<img src="/images/<?=$arts[$val]->img ?>.jpg" width="35" height="35" border="0" />
					<?} ?>				
				</div>
			</div>
			<div class="text">
				<?=$arts[$val]->anons ?>
			</div>
		</div>
	<?
}
?>
</div>
<div style="clear: left;"></div>