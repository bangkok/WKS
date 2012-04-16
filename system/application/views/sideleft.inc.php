<div class="art-Block">
                            <div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                            <div class="l"></div>
                                            <div class="r"></div>
                                            <div class="art-header-tag-icon">
                                                <div class="t">Меню</div>
                                            </div>
                                        </div><div class="art-BlockContent">
                                            <div class="art-BlockContent-tl"></div>
                                            <div class="art-BlockContent-tr"></div>
                                            <div class="art-BlockContent-bl"></div>
                                            <div class="art-BlockContent-br"></div>
                                            <div class="art-BlockContent-tc"></div>
                                            <div class="art-BlockContent-bc"></div>
                                            <div class="art-BlockContent-cl"></div>
                                            <div class="art-BlockContent-cr"></div>
                                            <div class="art-BlockContent-cc"></div>
                                            <div class="art-BlockContent-body">
                                                <div>

<div class="block"><?$this->load->view('menuleft.inc.php',$this->data);?></div>



</div>
                                        		<div class="cleared"></div>
                                            </div>
                                        </div>
                        		<div class="cleared"></div>
                            </div>
                        </div>



<?if(!empty($Block)):?>

                                                              
<?if(!empty($Block['textnews'])&&is_array($Block['textnews'])):?>
<div class="art-Block">
                            <div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                            <div class="l"></div>
                                            <div class="r"></div>
                                            <div class="art-header-tag-icon">
                                                <div class="t">  
                                                
                                                <div class="block_name"><a style="text-decoration:none;" href="<?=$Block['anews']?>"><?=$Block['namenews']?></a></div>
                                                
                                                
                                                
                                                </div>
                                            </div>
                                        </div><div class="art-BlockContent">
                                            <div class="art-BlockContent-tl"></div>
                                            <div class="art-BlockContent-tr"></div>
                                            <div class="art-BlockContent-bl"></div>
                                            <div class="art-BlockContent-br"></div>
                                            <div class="art-BlockContent-tc"></div>
                                            <div class="art-BlockContent-bc"></div>
                                            <div class="art-BlockContent-cl"></div>
                                            <div class="art-BlockContent-cr"></div>
                                            <div class="art-BlockContent-cc"></div>
                                            <div class="art-BlockContent-body">
                                                <div>


<div class="block">

 
  
<div ><a  href="<?=$Block['anews']."/show/".$Block['textnews'][0]->id?>"><?=$Block['textnews'][0]->title?></a><span class="date1"> | <?=$Block['textnews'][0]->dates?></span></div>  
   <?if($Block['textnews'][0]->imgblock):?>
            <div class='public_image' ><a  href="<?=$Block['anews']."/show/".$Block['textnews'][0]->id?>" title="<?=$Block['textnews'][0]->imgblock?>">
              <img src="/images/<?= $Block['textnews'][0]->imgblock?>.jpg"  title="<?=$Block['textnews'][0]->title?>">
            </a></div>
   <?endif;?>
  
   
   <div ><a href="<?=$Block['anews']."/show/".$Block['textnews'][0]->id?>"><?=$Block['textnews'][0]->anons?> >></a></div>
</div>


</div>
                                        		<div class="cleared"></div>
                                            </div>
                                        </div>
                        		<div class="cleared"></div>
                            </div>
                        </div>
<?endif;?>





<?if(!empty($Block['textarticles'])&&is_array($Block['textarticles'])):?>

<div class="art-Block">
                            <div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                            <div class="l"></div>
                                            <div class="r"></div>
                                            <div class="art-header-tag-icon">
                                                <div class="t">
                                                
                                                   <div class="block_name"><a style="text-decoration:none;" href="<?=$Block['aarticles']?>"><?=$Block['namearticles']?></a></div>
                                                
                                                </div>
                                            </div>
                                        </div><div class="art-BlockContent">
                                            <div class="art-BlockContent-tl"></div>
                                            <div class="art-BlockContent-tr"></div>
                                            <div class="art-BlockContent-bl"></div>
                                            <div class="art-BlockContent-br"></div>
                                            <div class="art-BlockContent-tc"></div>
                                            <div class="art-BlockContent-bc"></div>
                                            <div class="art-BlockContent-cl"></div>
                                            <div class="art-BlockContent-cr"></div>
                                            <div class="art-BlockContent-cc"></div>
                                            <div class="art-BlockContent-body">
                                                <div>



<div class="block">

     <?foreach ($Block['textarticles'] as $p):?>
       <div style="margin-top:15px;"><a href="<?=$Block['aarticles']."/show/".$p->id?>"> <?=$p->title?></a></div>
  <?endforeach;?>
</div>




</div>
                                        		<div class="cleared"></div>
                                            </div>
                                        </div>
                        		<div class="cleared"></div>
                            </div>
                        </div>
<?endif;?>


<?/*if(!empty($Block['press'])&&is_array($Block['press'])):?>
<div class="block">
	<div class="block1"><a href="<?=$Block['blocklinkpress2']?>" title="<?=$Block['blocknamepress']?>"><h2><?=$Block['blocknamepress']?></h2></a></div>
	<div class="block2"><ul class="block">
	    <?php foreach ($Block['press'] as $pr):?>
            <li class="liblock"><h3><a href="<?= $Block['blocklinkpress'].$pr->id?>" title="<?=$pr->title?>">
                <?=$pr->title?>
             </a></h3></li>
        <?php endforeach;?>
	</ul></div>
	<div class="block3"></div>
</div>
<?endif;*/?>
<?endif;?>