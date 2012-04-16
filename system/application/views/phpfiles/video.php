
<?php if(isset($Video)): foreach ($Video as $v):?>
<div style="margin-bottom:100px">
   <div style="margin-bottom:10px"><h2 style="font-size:20px;"><?=$v->name?></h2></div>
   <div style="font-size:16px;"><?=$v->text?></div>
   <div style="margin-top:20px;"><a class="media" href="/img-2/video/<?=$v->video?>"></a></div>
 </div>  
<?php endforeach;endif;?>
