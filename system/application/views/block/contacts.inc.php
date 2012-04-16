<?if(!empty($Block)):?>
	<?if(!empty($Block['contacts'])):?>
	
                        <div class="art-Block">
                            <div class="art-Block-body">
                                        <div class="art-BlockHeader">
                                            <div class="l"></div>
                                            <div class="r"></div>
                                            <div class="art-header-tag-icon">
                                                <div class="t"><a href="<?=$Block['contacts']->link?>" title="<?=$Block['blocknamecontacts']?>"><?=$Block['blocknamecontacts']?></a></div>
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
                                                      <img src="/img/contact.jpg" alt="an image" style="margin: 0 auto;display:block;width:95%" />
                                                <br />
                                                                                                
                                                <?php if (!empty($Block['contacts']->text)):?>
                                                	<?=$Block['contacts']->text?>
                                                <?php endif;?>
                                                </div>
                                        		<div class="cleared"></div>
                                            </div>
                                        </div>
                        		<div class="cleared"></div>
                            </div>
                        </div>
                        
	<?endif;?>
<?endif;?>