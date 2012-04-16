<?php 
 if(!empty($Publication)):?>
 
 <div style=" padding:0px;margin-top:10px;clear:left;">
                <table cellpadding="0" cellspacing="0" border="0">
           	       <tr><td height="32" style="padding-left:0px; border:0px solid #000000;" nowrap><h2>| <?=$Publication->title?></h2><div class="date"><?= $Publication->dates?></div></td></tr>
                  <tr>
                       <td valign="top" style="padding-top:10px;">
                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                          		<td>
                          		 <?php if (!empty($Publication->image)):?>
                          		        <div class='image' style="float:left; margin:0 10px 10px 0px;"><a  href="<?= $link.$Publication->id?>" title="<?=$Publication->title?>">
                          		           <img src="/images/<?= $Publication->image?>.jpg"  title="<?=$Publication->title?>">
                          		        </a></div>
                          		 <?php endif;?>
                          		 <?if(!empty($Publication->text)):?><?=$Publication->text?><?endif;?>
                          		 <div style="margin-top:20px; font-size:12px;"><a href="<?=$link?>" title="<?=$lenta?>"><?=$lenta?></a></div>
                          	</td>
                           </tr>
                           </table>    
                       </td>
                    </tr>
                  </table> 
        </div>
 
 
 <?/*?>
            <div class="date"><span><?=$Publication->dates?></span></div>
            <div class="content">
            <?php if (!empty($Publication->image)):?>
                <div class='image'><img title="<?=$Publication->title?>" src="/images/<?= $Publication->image?>.jpg" ></div>
            <?php endif;?>
            <?=$Publication->content?>
           </div> 
   <?*/?>        
<?php else:?>
    <?=$no_info_num?>
    <div style="margin-top:20px; font-size:12px;"><a href="<?=$link?>" title="<?=$lenta?>"><?=$lenta?></a></div>
<?php endif;?>

<?//$this->load->view('tplfiles/comments/comments.tpl');?>
