<div style="width:80%; margin-top:10px; clear:left;">
<center><?=$message?></center>
<form name=send action="#add" method=post>
 <table width=60% border=0 cellpadding=1 cellspacing=5 class="table">
  
<?// --------------------- Раздел ФИО --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->fio_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['fio']?>:</b></td>
	
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->fio?>"<?}?> style="width:100%;" type=text name=fio maxlength=50></td>
</tr>
<?// --------------------- Раздел ФИО --------------------------?>


<?// --------------------- Раздел mail -------------------------?>
<tr>
	<td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->mail_error?><?}?></td>
</tr>
<tr>
	<td> <b><?=$fields['mail']?>:</b></td>
	
	<td><input <?if($this->validation){?> value="<?=$this->validation->mail?>"<?}?> style="width:100%;" type=text name=mail  maxlength=50></td>
</tr>
<?// --------------------- Раздел mail -------------------------?>

<?// --------------------- Телефон --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->phone_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['phone']?>:</b></td>
	
	<td width="100%"><input <?if($this->validation){?> value="<?=$this->validation->phone?>" <?}?> type=text name=phone size=14 maxlength=14></td>
</tr>
<?// --------------------- Телефон --------------------------?>




<?// --------------------- Раздел Логин -------------------------?>
<tr>
	<td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->login_error?><?}?></td>
</tr>
<tr>
	<td> <b><?=$fields['login']?>:</b></td>
	
	<td><input <?if($this->validation){?> value="<?=$this->validation->login?>"<?}?> style="width:100%;" type=text name=login size=16 maxlength=16></td>
</tr>
<?// --------------------- Раздел Логин -------------------------?>

<?// --------------------- 1 Пароль --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap><?if($this->validation){?><?=$this->validation->pass1_error?><?}?></td></tr>
<tr>
	<td nowrap> <b><?=$fields['pass1']?>:</b></td>
	
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

<?// --------------------- Раздел Код активации --------------------------?>
<tr><td valign="bottom" colspan="2" align="center" nowrap></td></tr>
<tr>
	<td nowrap> <b>Сообщение:</b></td>
	
	<td width="100%"><textarea  cols="45" rows="5" name=mess></textarea></td>
</tr>
<?// --------------------- Раздел Код активации --------------------------?>

<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>
<tr><td colspan="2" align="center" height="30" nowrap><?if($this->validation){?><?=$this->validation->captcha_error?><?}?></td></tr>


<tr>
	<td> <b><?=$fields['captcha']?>:</b></td>
	
	<td>
	  <table width="100%" border=0 cellpadding=1 cellspacing=0>
	  <tr>
	     <td valign="middle" width="50" nowrap><input style="width:40px;" type=text name=captcha size=15 maxlength=7></td>
	     <td width="120" valign="middle" nowrap><img style="margin:0 0 0 10px;" id="captchaI" src="/auth/captcha"></td>
	     <td align="left"><a class="dalee" style="float:left;" href="#" alt="here" onclick="captchaJ(); return false;"><?=$fields['torenew']?></a></td>    
	     
	  </tr></table>
	</td>
</tr>
<?// --------------------- Раздел kcaptcha есть еще в забыли пароль -----?>

<tr>
	<td></td>
	<td align="left" style="padding-top:10px"><input class="art-button" type=submit value="<?=$fields['submit']?>" name=send></td>
	
</tr>
</table>
</form>
</div>
<?//---- Поля заполнения -----------?>








<?/*





<div style="margin-top: 10px; margin-left: 20px;">
	<div>
	<form id="registerAjax" action="<?=base_url()?>auth/registration" method="POST">
		<div><?=$regMsg?></div>	
	
		<div><?=$this->validation->name_error;?></div>
		<div>Ф�?О:</div>
		<div><input type="text" name="name" value="<?=$this->validation->name;?>" /></div>

		<div><?=$this->validation->username_error;?></div>
		<div>�?мя пользователя:</div>
		<div><input type="text" name="username" value="<?=$this->validation->username;?>" /></div>
		
		<div><?=$this->validation->password_error;?></div>
		<div>Пароль:</div>
		<div><input type="password" name="password" value="" /></div>
		
		<div>Повтор пароля:</div>
		<div><input type="password" name="password2" value="" /></div>
		
		<div><?=$this->validation->email_error;?></div>
		<div>Email:</div>
		<div><input type="text" name="email" value="<?=$this->validation->email;?>" /></div>

		<div><?=$this->validation->tel_error;?></div>
		<div>Контактный телефон:</div>
		<div><input type="text" name="tel" value="<?=$this->validation->tel;?>" /></div>
		
		<div><?=$this->validation->code_error;?></div>
		<div>Код:</div>
		<div>
			<img id="registerCaptAjax" src="<?=base_url()?>auth/captcha/<?=rand(0, 999999999)?>" height="50" width="100" title="Клик для замены" /><br />
			<input type="text" value="" maxlength="16" name="code" />
		</div>
		<div>
			<input type="submit" name="sub" value="Зарегистрироваться" />
		</div>
	</form>
	</div>
</div>

*/?>