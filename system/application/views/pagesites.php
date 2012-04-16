
<?
$path_template_file = "tpl/page.tpl";
$path_menu_file = "tpl/menu.txt";
//$path_content_files = "p/";
$footer_link='';


/*
$menu = '<ul class="art-menu">';
foreach ($TMenu1 as $item) {
	$menu .='<li><a href="'.$item['link'].'"';
	if(eregi($item['link'],$this->uri->uri_string())) $menu .=' class=" active"';
	$menu .='><span class="l"></span><span class="r"></span><span class="t">'.$item['name'].'</span></a></li>';
}
$menu .= '</ul>';
*/

$menu = $this->load->view('block/menutop.inc.php',$this->data, true);






//$header_text = $pages['head'][$p];
//$title_text = 'MobilMoika.dp.ua - '.$header_text.'. Продажа автомойки, готовые мобильные автомойки, продажа автомобильных моек, автономная мойка.';
$footer_text = $footer_link.$this->load->view('footer.inc.php',$this->data, true);
//$this->load->view('sideright.inc.php',$this->data);

$page	=	GetFile($path_template_file);	

//$contact_block = $this->load->view('block/contacts.inc.php',$this->data['Block']['contacts'], true);
$menu_block = $this->load->view('block/menu.inc.php', array($menu), true);
$shares_block = $this->load->view('sideleft.inc.php', $this->data, true);
//$this->load->view('block/shares.inc.php', $this->data, true);


$pattern[] = '$HEADER$';		$replacement[] = $this->load->view('head.inc.php',$this->data, true);
$pattern[] = '$MENU$';			$replacement[] = $menu;
$pattern[] = '$CONTENT NAME$';		$replacement[] = $Content['name'];
$pattern[] = '$CONTENT$';		$replacement[] = $Content['text'];

$pattern[] = '$TITLE$';			$replacement[] = $Content['title'];
$pattern[] = '$DESCRIPTION$';	$replacement[] = $Content['description'];
$pattern[] = '$KEYWORDS$';		$replacement[] = $Content['keywords'];

$pattern[] = '$LEFT BLOCKS$';	$replacement[] = '';
//$pattern[] = '$CONTACTS BLOCK$';	$replacement[] = $contact_block;
$pattern[] = '$MENU BLOCK$';	$replacement[] = 	$menu_block;
$pattern[] = '$SHARES BLOCK$';	$replacement[] = 	$shares_block;


//$pattern[] = '$TOP LINKS$';	$replacement[] = $top_links;
//$pattern[] = '$LEFT LINKS$';	$replacement[] = $left_links;
//$pattern[] = '$RIGHT LINKS$';	$replacement[] = $right_links;

//$pattern[] = '$DOWN LINKS$';	$replacement[] = $down_links;
//$pattern[] = '$REDIRECT$';	$replacement[] = $redirect_text;
//$pattern[] = '$SCRIPT$';		$replacement[] = $script_text;
//$pattern[] = '$HOME$';		$replacement[] = $home_text;
$pattern[] = '$FOOTER$';		$replacement[] = $footer_text;

$page = str_replace($pattern,	$replacement,	$page);
echo $page;



function	GetFile($path_file)
{	if(file_exists($path_file)){
		$handle_file	= fopen($path_file, "r");
		$text	= fread ($handle_file, filesize ($path_file));
		fclose($handle_file);}
return	$text;
}
?>
 
