<?
$link = $this->data['CurentPage']['link'];


$UPID = $LMap[$sector];
//$UPID = $this->data['Catalog']['upId'];
$CUR = $TMap[$UPID][$sector];
//print_r($CUR);

if (!isset($CUR['child']) && isset($CUR['parent']['parent']))
	$Menu = $CUR['parent']['parent'];
elseif(isset($CUR['parent']))
	$Menu = $CUR['parent'];
else 
	$Menu = $CUR;
	
$data['CUR'] = $CUR;
if (isset($data['CUR']['child'])) {
	reset($data['CUR']['child']); 
	$data['CUR'] = current($data['CUR']['child']);}	
?>
<div style="margin-bottom:50px">
<?=$this->data['Content']['text'] = $this->load->view('block/sitepath.inc.php',$data)?>
</div>
<!--
<div style="float:left;padding-right:50px;border:0px #000 solid">

                                                	<ul>
<?php foreach ($Menu['child'] as $item):?>
	<?php if(!eregi($item['id'], $this->uri_string)):?>
		<li><a href="<?=$link.'/'.$item['id']?>"><?=$item['name']?></a></li>
	<?php else:?>
		<li><a class="active" href="<?=$link.'/'.$item['id']?>"><b><?=$item['name']?></b></a></li>
	<?php endif;?>
	<?php if(isset($item['child'])):?>
			<ul style="padding-left: 15px;">
		<?php foreach ($item['child'] as $subitem):?>
				<?php if(!eregi($subitem['id'],$this->uri_string)):?>
				<li><a  href="<?=$link.'/'.$subitem['id']?>"><?=$subitem['name']?></a></li>
				<?php else:?>
				<li><a  href="<?=$link.'/'.$subitem['id']?>"><b><?=$subitem['name']?></b></a></li>
				<?php endif;?>
		<?php endforeach;?>
		</ul>
	<?php endif;?>
<?php endforeach;?>
                                                	</ul>
 </div>
 -->

<div style="float:left; border:1px #000 solid">
<?php if ($Companys):?> 
 <?php foreach ($Companys as $Company):?>
 <div style="padding:5px; margin:5px; border:1px #000 solid">

 <b><?=$Company->title?><br></b>
 
 адресс: <?=$Company->address?><br>
 
 <?=$Company->content?>

 </div>
 <?php endforeach;?>
 <?php else:?>
<div style="margin:5px;">
по этому запросу нет результатов
</div>
<?php endif;?>

 </div>

	