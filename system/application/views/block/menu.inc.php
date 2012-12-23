<style type="text/css">
.art-BlockMenu {font-weight: bold;}
.art-BlockMenu a{letter-spacing: 0px; font-weight: normal;}
.art-BlockMenu ul li a{font-size:11px; }
.art-BlockMenu a.active(color: #000000;)
</style>

<?
$ID = $this->data['Content']['id'];
$UPID = $this->data['Content']['upId'];
$CUR = $TMap[$UPID][$ID];

if (!isset($CUR['child']) && isset($CUR['parent']['parent']))
	$Menu = $CUR['parent']['parent'];
elseif(isset($CUR['parent']))
	$Menu = $CUR['parent'];
else 
	$Menu = $CUR;
//print_r($Menu);


?>
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
                                            <div class="art-header-tag-icon">
                                                <div class="t"><?=$Menu['name']?></div>
                                            </div>
                                        </div><div class="art-BlockContent">
                                            <div class="art-BlockContent-body">
                                                <div>

                                                	<ul class="art-BlockMenu">
<?php foreach ($Menu['child'] as $item):?>
	<?php if(/*!eregi(*/$item['link'] !=  $this->uri_string):?>
		<li><a href="<?=$item['link']?>"><?=$item['name']?></a></li>
	<?php else:?>
		<li><a class="active" href="<?=$item['link']?>"><b><?=$item['name']?></b></a></li>
	<?php endif;?>
	<?php if(isset($item['child'])):?>
			<ul style="padding-left: 15px;">
		<?php foreach ($item['child'] as $subitem):?>
				<?php if(!stristr($this->uri_string, $subitem['link'])):?>
				<li><a  href="<?=$subitem['link']?>"><?=$subitem['name']?></a></li>
				<?php else:?>
				<li><a  href="<?=$subitem['link']?>"><b><?=$subitem['name']?></b></a></li>
				<?php endif;?>
		<?php endforeach;?>
		</ul>
	<?php endif;?>
<?php endforeach;?>
                                                	</ul>
                                                </div>
                                                
                                               <div class="cleared"></div>
                                            </div>
                                        </div>
                        		<div class="cleared"></div>
                            </div>
                        </div>