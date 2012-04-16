<div style="width:80%; margin-top:10px; clear:left;">
<center><?=$message?></center>
<form name=send action="#add" method=post>
 <table width=60% border=0 cellpadding=1 cellspacing=5 class="table">
  

 <?// --------------------- Раздел Логин -------------------------?>
<tr>
	<td> <b><?=$fields['login']?>:</b></td>
	<td><b><?=$auth['login']?></b></td>
</tr>
<?// --------------------- Раздел Логин -------------------------?>
 
 
 <?// --------------------- Раздел ФИО --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->fio_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['fio']?>:</b></td>
	
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->fio?>"<?}?> style="width:100%;" type=text name=fio maxlength=90></td>
</tr>
<?// --------------------- Раздел ФИО --------------------------?>


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



<tr><td valign="bottom" height="20" colspan="2" align="center" nowrap></td></tr>
<tr><td valign="bottom" class="palkag"  colspan="2" align="center" nowrap></td></tr>

<?// --------------------- 1 Пароль --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->pass1_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['newpass']?>:</b></td>
	
	<td width="100%"><input type="password"  value="" style="width:100%;" type=text name=pass1 maxlength=90></td>
</tr>
<?// --------------------- 1 Пароль --------------------------?>


<?// --------------------- 2 Пароль --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->pass2_error?><?}?></td></tr>
<tr>
	<td> <b><?=$fields['pass2']?>:</b></td>
	
	<td width="100%"><input  type="password"  value=""  style="width:100%;" type=text name=pass2 maxlength=90></td>
</tr>
<?// --------------------- 2 Пароль --------------------------?>


<tr>
	<th colspan=2 align="center"><input class="art-button" type=submit value="<?=$fields['submit']?>" name=send></th>
</tr>
</table>
</form>
</div>