<style type="text/css">
.date{color:#00a650;font-weight: bold}
</style>
<?php 
 if(!empty($news)):?>

            <div class="date"><span><?=$news->dates?></span></div>
<div  style="float:left;/*padding: 5px 15px 5px 10px;background-color: #FFE*/">
            <div class="content">
            <?php if (!empty($news->image)):?>
                <div class='image' style="float:left;margin:0 10px 5px 0"><img title="<?=$news->title?>" src="/images/<?= $news->image?>.jpg" ></div>
            <?php endif;?>
            <?=$news->content?>
           </div> 
</div>

		<?php if (!empty($news->origin)):?>
               <div class='origin' style="margin-top:20px; font-size:14px; float:left"><?=$origin?>: <a href="<?=$news->origin?>" title="<?=$news->origin?>" target="_blank"><?= strtok(str_ireplace('http://','',$news->origin),'/')?></a></div>
		<?php endif;?>
<?php else:?>
    <?=$no_info_num?>
<?php endif;?>

<?//$this->load->view('tplfiles/comments/comments.tpl');?>
<div style="margin-top:20px; font-size:14px;float:right"><a href="<?=$link?>" title="<?=$lenta?>"><?=$lenta?></a></div>