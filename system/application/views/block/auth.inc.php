<sapn>Для партнеров</span>
<?php if(isset($auth['userData'])&&is_array($auth['userData'])):?>
       <p><font style="color:#000;">Здравствуйте, <a title="Профиль" href="/auth/profile" class="auth_a">
       		<?//=print_r($auth)?>
            <?=$auth['userData']['fio']?>
       </a></font></p>
       <div  style="font-size:11px; margin-top:5px;">
	    <a class="auth_a"  href="/auth/profile">Профайл</a>
		&nbsp;|&nbsp;
		<a class="auth_a"  href="/auth/logout">Выйти</a>
	</div>
    
<?else:?>
<form action="/auth/login" method="POST" id="login"><table>
  <tr><td> логин &nbsp;</td><td> 
<input type="text" name="login" value="" style="width:120px;font-size:12px;margin-bottom:5px;border:1px #e9f2c9 solid;"></td></tr>
  <tr><td > пароль &nbsp;</td><td> 
<input type="password" name="pass" value="" style="width:120px;font-size:12px;margin-bottom:5px;border:1px #e9f2c9 solid;"></td></tr>
  <tr><td> </td><td align="right" >
<input type="submit" value="Вход" class="art-button" name="send" style="border:none;background-color:#5c932b;color:#FFFFFF;margin-left:72px;">
</td></tr>

<tr><td colspan="2">
	<div  style="font-size:11px;margin-top:5px;">
	    <a  href="/auth/register">Регистрация</a>
		&nbsp;|&nbsp;
		<a href="/auth/forgot">Забыл пароль</a>
	</div>
</td></tr>

 </table></form>
<?endif;?>
<div style="border-top: 1px #5c932b solid; border-bottom: 1px #5c932b solid; width:180px; height:1px; float:right;margin:5px 0 0 0;"></div>

