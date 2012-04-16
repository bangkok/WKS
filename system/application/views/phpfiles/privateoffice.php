<form action="/privateoffice" method="POST" id="calc">
  <input type="text" name="house_width" value="<?php if(isset($_POST['house_width'])):?><?=$_POST['house_width']?><?php endif;?>"> Длина<Br>
  <input type="text" name="house_height" value="<?php if(isset($_POST['house_height'])):?><?=$_POST['house_height']?><?php endif;?>"> Ширина<Br>
  <input type="text" name="house_floor" value="<?php if(isset($_POST['house_floor'])):?><?=$_POST['house_floor']?><?php endif;?>"> Этажность<Br>
  <p><input type="submit" value="Посчитать"></p>
 </form>
<div>
<?php if (isset($total_size) && !empty($total_size)):?>
<p>
Площадь дома : <?=$total_size?> м<sup>2</sup>
</p>
<?php endif;?>
<?php if (isset($total_vol) && !empty($total_vol)):?>
<p>
Цена(ориентировочная) : <?=$total_vol?> $</sup>
</p>
<?php endif;?>
</div>

<? $str= 'кирилица'; for($i=0; $i<strlen($str); $i++) echo '%'.bin2hex($str[$i]);?>
