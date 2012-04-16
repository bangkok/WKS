<?if (!empty($SubItems)):?>
<center><table border=0 class="blocks" cellpadding=0 cellspacing=0>
<tr><td style="border:none; padding-left:15px; 	background-color: #FFE;" colspan=2>
<b>Разделы</b>
</td></tr>
<? foreach ($SubItems as $item):?>
<tr><td width=60>
<a href="<?=$item['link']?>"><img src="/images/<?=$item['img']?>.jpg"></a>
</td><td  valign="top"><div>
<a href="<?=$item['link']?>"><b><?=$item['title']?></b></a>
<p><a href="<?=$item['link']?>"><?=$item['text']?></a></p>

</div></a></td></tr>
<?endforeach;?>
</table></center>

<?endif;?>