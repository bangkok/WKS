<?php
//print_r($News);
 if(!empty($News)):?>
<style type="text/css">
div.news{wifth:100%;margin: 0 15px}
.news .image img{width:100px; clear:left; margin:5px 15px 0 0;}
.news .image1 img{clear:left; margin:5px 15px 10px 0;}
.news .image, .news .image1{float:left}
table.news {background-color: #FFE}
table.news td {border-top: 1px solid #777;}
.news h4{margin: 5px 0;}
.news .date{color:#00a650;font-weight: bold}
.news .dalee{float:right;margin-bottom:5px;margin-top:-5px;}
</style>


<center><table border=0 class="news" cellpadding=0 cellspacing=0>



<?php foreach($News as $key => $n): ?>
    <?//print_r($n)?>
<? if(!$key):?>
<tr><td valign="top" align="left" style="border:none">
<div class="news">

		<?php if (!empty($n->image)):?>
               	<div class="image1"><a href="<?=$link.$n->id?>" title="<?=$n->title?>"><img src="/images/<?= $n->image?>.jpg"  title="<?=$n->title?>"></a></div>
        <?php endif;?>
<div class="title"><h4><a href="<?= $link.$n->id?>"><?=$n->title?></a></h4></div>
<div class="date"><?= $n->dates?></div>
			<div class="content">           
              <?=$n->content?>
              	
           </div>
</div>
</td></tr>   
 
<?php else:?>   
    <tr><td  valign="top" align="left"> 
      <div class="news">
      	<div class='image'>
          <?php if (!empty($n->imagesmall)):?>
                <a href="<?=$link.$n->id?>" title="<?=$n->title?>"><img src="/images/<?= $n->imagesmall?>.jpg"  title="<?=$n->title?>"></a>
          <?php endif;?>
      	</div>
            <div class="title"><h4><a href="<?= $link.$n->id?>"><?=$n->title?></a></h4></div>
            
            
            <div class="content">           
              <?=$n->anons?>     <div class="date"><?= $n->dates?></div>     
              <?if(!empty($Block['dalee'])):?>
             		<div class="dalee"><a href="<?=$link.$n->id?>" title="<?=$Block['dalee']?>"><?=$Block['dalee']?></a></div>
          	  <?endif;?> 
           </div>
            
         </div>
           </td></tr>
           
<?php endif;?>            
    <?endforeach;?>
</table></center>    
    <?php $this->load->view('tplfiles/pagination.tpl');?>
<?php else:?>
    <p class='inform'>
        <?=$no_info_all?>
    </p>
    
<?php endif;?>