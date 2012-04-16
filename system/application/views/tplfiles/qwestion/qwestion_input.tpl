
<?
//print_r($fields);
//print"<br> ----- ".$fields['fio'];
?>

<form name=send action="#addcoments" method=post>
<center><?=$message?></center>
<table width="50%" border=0 cellpadding=1 cellspacing=5>
 
 
<tr>
	<td></td>
	<td class="palka" nowrap>|</td>
	<td width=100%><?=$fields['poleobkzap']?></td>
</tr>


<?// --------------------- Раздел ФИО --------------------------?>
<tr><td valign="bottom" colspan="3" align="center" nowrap><?if($this->validation){?><?=$this->validation->fio_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['fio']?>:</b></td>
	<td class="palka" nowrap></td>
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->fio?>"<?}?> style="width:100%;" type=text name=fio maxlength=90></td>
</tr>
<?// --------------------- Раздел ФИО --------------------------?>

<?// --------------------- Раздел mail -------------------------?>
<tr>
	<td valign="bottom" colspan="3" align="center" nowrap><?if($this->validation){?><?=$this->validation->mail_error?><?}?></td>
</tr>
<tr>
	<td> <b><?=$fields['mail']?>:</b></td>
	<td class="palka" nowrap></td>
	<td><input <?if($this->validation){?> value="<?=$this->validation->mail?>"<?}?> style="width:100%;" type=text name=mail size=50 maxlength=50></td>
</tr>
<?// --------------------- Раздел mail -------------------------?>

<?// --------------------- Опыт работы: ---------------------?>
<tr><td valign="bottom" colspan="3" align="center" nowrap><?if($this->validation){?><?=$this->validation->message_error?><?}?></td></tr>

<tr>
	<td id="window_mail_с_text" nowrap> <b><?=$fields['qwestion']?>:</b></td>
	<td class="palka" nowrap></td>
	<td id="window_mail_с_text"><textarea rows="4"  style="width:100%;" name=message><?if($this->validation){?><?=$this->validation->message?><?}?></textarea></td>
</tr>
<?// --------------------- Опыт работы: ---------------------?>


<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>
<tr><td colspan="3" align="center" height="30" nowrap><?if($this->validation){?><?=$this->validation->captcha_error?><?}?></td></tr>


<tr>
	<td> <b><?=$fields['captcha']?>:</b></td>
	<td class="palka" nowrap></td>
	<td width="100%">
	  <table width="100%" border=0 cellpadding=1 cellspacing=0>
	  <tr>
	     <td width="100%" valign="middle">
	       <input style="width:100%;" type=text name=captcha size=15 maxlength=7>
	     </td>
	     <td valign="middle">
	       <img style="float:left; margin:0 0 0 10px;" id="captchaI" src="/contacts/captcha">
	     </td>  
	     <td valign="middle">
	       <div style="float:left; margin:0 0px 0 5px;"><a class="dalee" href="#" alt="here" onclick="captchaJ(); return false;"><?=$fields['torenew']?></a></div>
	     </td>
	  </tr></table>
	</td>
</tr>
<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>

<tr>
	<th colspan=3 align="center"><input class="kl" type=submit value="<?=$fields['submit']?>" name=send></th>
</tr>
</table>



<?/*?>
<table width="100%" cellpadding="2" cellspacing="10" border="0">
   <tr><td colspan="3" align="center">
     <span id="report_yes" style="font-size:14px;">
     <?php if(isset($show_message) && count($show_message)>0):?>
               <?php foreach ($show_message as $msg):?>
               <?= $msg?>
               <?php endforeach;?>
      <?php endif;?>
     </span>
   </td></tr>

  <tr>
    <td><b>Имя:</b></td>
    <td class="palka" nowrap></td>
    <td width="100%"><input name="name" size="40" maxlength="40" value="<?= (isset($this->validation->name))&&($t!=2) ? $this->validation->name : ''?>"/></td>
  </tr>


  <tr>
    <td><b>Текст комментария:</b></td>
    <td class="palka" nowrap></td>
    <td><textarea cols="50" rows="5" name="message"><?= (isset($this->validation->message))&&($t!=2) ? $this->validation->message : '' ?></textarea></td>
  </tr>
  


<tr>
	<td colspan="3" nowrap><?
	      //if(isset($capth)){?><?//=$capth?><?//}
	?></td>
</tr>

<tr>
	<td> <b><?if($lang=='en'){?>Code on a picture:<?} else if($lang=='ua'){?>Код на картинке:<?} else{?>Код на картинке:<?}?></b></td>
	<td class="palka" nowrap></td>
	<td>
	  <table width="100%" border=0 cellpadding=1 cellspacing=0>
	  <tr>
	     <td width="45%" valign="middle">
	       <input style="width:100%;" type=text name="captcha" size=15 maxlength=7>
	     </td>
	     <td valign="middle">
	     <img style="float:left; margin:0 0 0 10px;" id="captchaI" src="/contacts/captcha" title="Код">
	     <div style="float:left; margin:20px 0px 0 10px;">
	       <a class="dalee" href="/<?//=?>" alt="here" onclick="captchaJ(); return false;" style="color:#40b125; font-size:10px;">
	         <?if($lang=='en'){?>to renew<?}
	         else if($lang=='ua'){?>обновить<?}
	         else{?>обновить<?}?>
	       </a>
	     </div>
	     </td>
	  </tr></table>
	</td>
</tr>



<tr>
	<th colspan=3 align="center"><input class="kl" type=submit value="<?if($lang=='en'){?>To send<?}else{?>Отправить<?}?>" name=send></th>
</tr>
  
</table>
<?*/?>

 </form>

