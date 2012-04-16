<?//print_r($album->result());
if(!empty($album)):?>
<div style="zoom:1; border:0px solid #000000; overflow:hidden; /*height:500px;*/">

<?$i=0;foreach ($album->result() as $f):

   if($i==0):$i++;?>
      <div style="margin:0 0 10px 0;"><?//=$Album[$f->album]->text?></div>
 <?endif?>
    <div class="g_block">
     
      <?if($f->name!=''):?>
      	<a class="gtega" rel="fancy-tour" href="/images/<?=$f->img?>.jpg" title="<?=$f->name?>"><img src="/images/<?=$f->imgsmall?>.jpg"><br><?=$f->name?></a>
      <?else:?>
      	<a class="gtega" rel="fancy-tour" href="/images/<?=$f->img?>.jpg"><img src="/images/<?=$f->imgsmall?>.jpg"></a>
      <?endif;?>
 </div>
<?endforeach?>
<?endif?>

</div>