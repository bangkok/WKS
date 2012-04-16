<div id="block_avtor" style="margin:10px 0 30px 0; padding:3px; border:1px solid #cccccc;">
      <center><h3><?=$this->lang->line('name_block')?></h3></center>

      
<?if(empty($_SESSION['auth']['login'])):?>      
      <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
             <td valign="top">
                  <form name=feed method=post action="/<?=$lang?>/auth/login">
                     <table width="100%" cellpadding="3" cellspacing="0" border="0">
                       <tr>
                         <td width="50%" style="padding-left:5px;" >
                            <input style="width:100%" type=text name=login value="E-mail" onfocus="if(this.value == 'E-mail') this.value=''" onblur="if(this.value=='') this.value = 'E-mail'">
                         </td>
                         <td style="padding-right:5px;">
                            <input style="width:100%" name=pass value="Пароль" onfocus="if(this.value == 'Пароль') {this.value=''; this.type='password';}" onblur="if(this.value=='')           {this.value = 'Пароль'; this.type='text';}" >
                         </td>
                       </tr>
                       <tr>
                       <td align="left" colspan="2" valign="top" style="padding:5px 0 0 0;">
                        <table width="100%" cellpadding="3" cellspacing="0" border="0"><tr>
                         <td>
				           <a class="reg" title="зарегистрироваться" href="/<?=$lang?>/auth/register">зарегистрироваться</a><br>
				           <a class="reg" title="забыли пароль?" href="/<?=$lang?>/auth/forgot">забыли пароль?</a>
				         </td>  
                         <td align="right" valign="top" style="padding-right:4px;">
                           <input title="войти" class="kl" type="submit" value="войти" name=send>
 			             </td>
			            </tr></table>
				       </td>
                      </tr>
			      </table>	
		         </form>
	       </td>
	    </tr>
      </table>
<?else:?>
    <div style="margin:10px 0 0 0;"><b><?=$blrauthtext['block_auth_user']?>, <?=$_SESSION['auth']['fio']?></b></div>
    <div style="font-size:10px; margin:10px 0 0 0;"><a href="/<?=$lang?>/auth/profile"><?=$blrauthtext['profile']?></a></div>
    <div style="font-size:10px;"><a href="/<?=$lang?>/auth/logout"><?=$blrauthtext['exit']?></a></div>
<?endif;?>
</div>      