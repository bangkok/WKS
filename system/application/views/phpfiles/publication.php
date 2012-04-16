<?if(!empty($Publication)&&count($Publication)>0):?>
   <?foreach($Publication as $p):
    //if($Publication[0]==$p):?>
     <table width="100%" cellpadding="0" cellspacing="10" border="0" style="border:1px solid #0093dd; margin-bottom:15px;"><tr><td>
        <h2><a href="<?=$link.$p->id?>"><?=$p->title?></a></h2>
        <div class="date"><?= $p->dates?></div>
        <div>
         <?php if (!empty($p->imagesmall)):?>
            <div class='public_image' style="float:left; margin:5px 10px 10px 0;"><a  href="<?= $link.$p->id?>" title="<?=$p->title?>">
              <img src="/images/<?= $p->imagesmall?>.jpg"  title="<?=$p->title?>">
             </a></div>
         <?php endif;?>
         <?if(!empty($p->anons)):?><?=$p->anons?><?endif;?>
        </div>
     </td></tr></table>
    
  
<?php endforeach; 
 $this->load->view($tplpapka.'/pagination.tpl');
else:?>
    <p class='inform'>
        <?//=$no_info_all?>
        <?if(isset($lenta)):?><div style="margin-top:20px; font-size:12px;"><a href="<?=$link2?>" title="<?=$lenta?>"><?=$lenta?></a></div><?endif;?>
    </p>
<?//php endif; 
endif;?>








<?/*
 if(!empty($Publication)):?>
    <?php foreach($Publication as $p): ?>

    <div style="border:0px solid #000000; padding:0px;margin-top:10px;clear:left;">
        <h2><a href="<?=$link.$p->id?>"><?=$p->title?></a></h2>
        <div class="date"><?= $p->dates?></div>
        <div id="textcontent">
         <?php if (!empty($p->imagesmall)):?>
            <div class='image' style="float:left; margin:5px;"><a  href="<?= $link.$p->id?>" title="<?=$p->title?>">
              <img src="/images/<?= $p->imagesmall?>.jpg"  title="<?=$p->title?>">
             </a></div>
         <?php endif;?>
           <?if(!empty($p->anons)):?><?=$p->anons?><?endif;?>
         </div>
     </div>
    
    <?endforeach;?>

<?php $this->load->view($tplpapka.'/pagination.tpl');?>    
    
<?php else:?>
    <p class='inform'>
        <?=$no_info_all?>
        <?if(isset($lenta)):?><div style="margin-top:20px; font-size:12px;"><a href="<?=$link2?>" title="<?=$lenta?>"><?=$lenta?></a></div><?endif;?>
    </p>
<?php endif;*/?>
