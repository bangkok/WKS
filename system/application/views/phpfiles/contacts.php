<div style="width:100%; height:50px;">
     <div style="float:right;"><?=$adres?></div>
</div>


<div style="width:80%; margin-top:30px;">
<center><?=$message?></center>
<form name=send action="#add" method=post class="feedback">
 <table width=400 border=0 cellpadding=1 cellspacing=5>
 
 

<?// --------------------- Раздел Ф�&#65533;О --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->fio_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['fio']?>:</b></td>
	
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->fio?>"<?}?> style="width:100%;" type=text name=fio maxlength=90></td>
</tr>
<?// --------------------- Раздел Ф�&#65533;О --------------------------?>

<?// --------------------- Раздел mail -------------------------?>
<tr>
	<td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->mail_error?><?}?></td>
</tr>
<tr>
	<td> <b><?=$fields['mail']?>:</b></td>
	
	<td><input <?if($this->validation){?> value="<?=$this->validation->mail?>"<?}?> style="width:100%;" type=text name=mail size=50 maxlength=50></td>
</tr>
<?// --------------------- Раздел mail -------------------------?>

<?// --------------------- Телефон --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->phone_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['phone']?>:</b></td>
	
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->phone?>" <?}?> style="width:100%;" type=text name=phone maxlength=90></td>
</tr>
<?// --------------------- Телефон --------------------------?>

<?// --------------------- Опыт работы: ---------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->message_error?><?}?></td></tr>

<tr>
	<td id="window_mail_с_text" nowrap> <b><?=$fields['message']?>:</b></td>
	
	<td id="window_mail_с_text"><textarea rows="4"  style="width:100%;" name=message><?if($this->validation){?><?=$this->validation->message?><?}?></textarea></td>
</tr>
<?// --------------------- Опыт работы: ---------------------?>


<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>
<tr><td colspan="2" align="center" height="30" nowrap><?if($this->validation){?><?=$this->validation->captcha_error?><?}?></td></tr>


<tr>
	<td> <b><?=$fields['captcha']?>:</b></td>
	
	<td>
	  <table width="100%" border=0 cellpadding=1 cellspacing=0>
	  <tr>
	     <td valign="middle" width="50" nowrap><input style="width:40px;" type=text name=captcha size=15 maxlength=7></td>
	     <td width="120" valign="middle" nowrap><img style="margin:0 0 0 10px;" id="captchaI" src="/auth/captcha/"></td>
	     <td align="left"><a class="dalee" style="float:left;" href="#" alt="here" onclick="captchaJ(); return false;"><?=$fields['torenew']?></a></td>    
	     
	  </tr></table>
	</td>
</tr>
<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>

<tr>
	<th colspan=2 align="center"><input class="art-button" type=submit value="<?=$fields['submit']?>" name=send></th>
</tr>
</table>
</form>
</div>
<?//---- Поля заполнения -----------?>


