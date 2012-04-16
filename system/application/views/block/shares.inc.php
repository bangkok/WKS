<?if(!empty($Block['news'])):?>
							<div class="art-Block">
 <div class="art-Block-tl"></div>
                            <div class="art-Block-tr"></div>
                            <div class="art-Block-bl"></div>

                            <div class="art-Block-br"></div>
                            <div class="art-Block-tc"></div>
                            <div class="art-Block-bc"></div>
                            <div class="art-Block-cl"></div>
                            <div class="art-Block-cr"></div>
                            <div class="art-Block-cc"></div>
                            <div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                            <div class="l"></div>
                                            <div class="r"></div>
                                            <div class="art-header-tag-icon-">
                                                <div class="t"><a href="<?=$Block['blocklinknews2']?>" title="<?=$Block['blocknamenews']?>"><?=$Block['blocknamenews']?></a></div>
                                            </div>
                                            
                                        </div>
<div class='News-Block'><?php foreach ($Block['news'] as $nw):?>
<div style="width:100%; hieght:1px; border-top:1px #775 solid"></div>
                                        <div class="art-BlockContent">
                         
                                            <div class="art-BlockContent-body">
                                            
		<div id='News<?=$nw->id?>'>
		
		     <?php   if (!empty($nw->imgblock)):?>  
                <div class='image'><a href="<?='/news/show/'.$nw->id?>" title="<?=$nw->title?>"><img src="/images/<?= $nw->imgblock?>.jpg"  title="<?=$nw->title?>"></a></div>
              <?php endif;?>
              
              
	      <div class="title"><b><a href="<?='/news/show/'.$nw->id?>"><?=$nw->title?></a></b></div>
	      
          <div class="content">         

              <?/*=$nw->anons*/?>
          </div>
           
          <?if(!empty($Block['dalee'])):?>
             <div class="dalee"><a href="<?='/news/show/'.$nw->id?>" title="<?=$Block['dalee']?>"><?=$Block['dalee']?></a></div>
          <?endif;?>  
          <div class="date"><?=$nw->dates?></div>
		</div>       
		    
	
                                        		<div class="cleared"></div>
                                            </div>
                                        </div>
<? endforeach;?>
<div style="width:100%; hieght:1px; border-top:1px #775 solid"></div>
</div> 

                        		<div class="cleared"></div>
                        		</div>
 							</div>
<?endif;?>

