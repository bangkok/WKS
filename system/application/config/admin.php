<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
	Admin configuration file
*/

if ($_SERVER['HTTP_HOST'] == 'alternatives.loc')
{
	$config["A_SMTP"] = "localhost";
	$config["A_SMTP_port"] = "25";
	$config["A_SMTP_user"] = "";
	$config["A_SMTP_pass"] = "";
	$config["A_admin_mail"] = "sachukanton@gmail.com";
	$config["A_admin_mail_CC"] =array("sachukanton@gmail.com");
	$config["A_admin_mail_From"] = "sachukanton@gmail.com";

	$config["A_language"] = "russian";
	
}
else
{
	$config["A_SMTP"] = "localhost";
	$config["A_SMTP_port"] = "25";
	$config["A_SMTP_user"] = "";
	$config["A_SMTP_pass"] = "";
	$config["A_admin_mail"] = "sachukanton@gmail.com";
	$config["A_admin_mail_CC"] =array("sachukanton@gmail.com");
	$config["A_admin_mail_From"] = "sachukanton@gmail.com";
	$config["A_language"] = "russian";
}

?>
