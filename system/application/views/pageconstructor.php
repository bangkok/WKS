<?
//$path_template_file = "tpl/page.tpl";
$path_template_file = $this->data['template_file_path'];
$path_menu_file = "tpl/menu.txt";
//$path_content_files = "p/";
$footer_link='';

$script_time = 'var i=0
var second = '.date('s').'
var minute = '.date('i').'
var hour = '.date('G');


$data_text = date('d.m.Y').', ';
switch(date('l'))
{
case 'Sunday':
     $data_text .= 'Вс.';
   break;
case 'Monday':
     $data_text .= 'Пн.';
   break;
case 'Tuesday':
     $data_text .= 'Вт.';
   break;
case 'Wednesday':
     $data_text .= 'Ср.';
   break;
case 'Thursday':
     $data_text .= 'Чт.';
   break;
case 'Friday':
     $data_text .= 'Пт.';
   break;
case 'Saturday':
     $data_text .= 'Сб.';
   break;
}

//print_r($this->data['Content']);

$ID = $this->data['Content']['id'];
$UPID = $this->data['Content']['upId'];
$CUR['CUR'] = $TMap[$UPID][$ID];


/*
 $put ='';
//echo $put .=  '<a href='.$CUR['link'].'>'.$CUR['name'].'</a>';


$i=0;
while (true){
	$block ='<li><a href="'.$CUR['link'].'">'.$CUR['name']."</a>";
//	if($i) $block .= "\t > \t";
	$block .='<ul >'."\n";
	foreach ($CUR['dom'] as $item){
		if ($CUR['id'] != $item['id']) $block .=  "\t".'<li><a href='.$item['link'].'>'.$item['name'].'</a></li>'."\n";}
	 $block .= '</ul></li>';
	if($i) $block .="<li class=\"ptichka\"> > </li>";
	$block .= "\n";
	$put = $block . $put;
	if (isset($CUR['parent']))$CUR = $CUR['parent']; else break;
$i++;
}
		
 $put = '<ul id="cssmenu">'. $put .'</ul>';


*/


   	  	//var_dump($SubMenu); 
  foreach ($Menu as $item) {
	if($item['link'] == $this->uri_string || @eregi($item['link'] , $this->uri_string) && $item['link']!='/') $footer_link .= '<a href="'.$item['link'].'"><b>'.$item['name'].'</b></a> | ';
  	else $footer_link .= '<a href="'.$item['link'].'">'.$item['name'].'</a> | ';
}
$footer_link = substr($footer_link, 0, -3);
$footer_text = $footer_link; 	
 
 $shares_block = $this->load->view('block/shares.inc.php', $this->data, true); 	  	
$Panorama_html= '';
foreach ($Panorama as $foto) $Panorama_html .= "\n<div class=\"art-Header-jpeg\" style=\"background-image: url('/images/$foto.jpg')\"></div>";

//@$SubItems_text = $this->load->view($this->data['papka'].'/subitems.php',$this->data['SubItems'], true);

//@$SitySumbols_text = $this->load->view($this->data['papka'].'/sitysumbols.php',$this->data['SitySumbols'], true);

$Content_text = $Content['text'];//.$SubItems_text.$SitySumbols_text;
if (!$Content_text) $Content_text = "<p>Сраница редактируется</p>";

$pattern[] = '$HEAD$';			$replacement[] = '     <link rel="icon" type="image/png" href="/img/favicon.png" />
';//$this->load->view('googlecode.inc.php','',true);
$pattern[] = '$Headline$';		$replacement[] = 'WKS House';
$pattern[] = '$Slogan Text$';	$replacement[] = '';

$pattern[] = '$HEADER$';		$replacement[] = $Content['name'];

$pattern[] = '$PANORAMA$';		$replacement[] = $Panorama_html;

///*
$pattern[] = '$MENU$';			$replacement[] = $this->load->view('block/menutop.inc.php',$this->data['Menu'], true);

$pattern[] = '$NAV PANEL$';		$replacement[] = $this->load->view('block/menutopblock.inc.php',$this->data['Menu'], true);

//$pattern[] = '$MENU BLOCK$';	$replacement[] = $this->load->view('block/menu.inc.php',$this->data['TMap'], true);

$pattern[] = '$MENU PATH$';		$replacement[] = $this->load->view('block/sitepath.inc.php',$CUR, true);

$pattern[] = '$CONTENT$';		$replacement[] = $Content_text;

$pattern[] = '$TITLE$';			$replacement[] = $Content['title'];
$pattern[] = '$DESCRIPTION$';	$replacement[] = $Content['description'];
$pattern[] = '$KEYWORDS$';		$replacement[] = $Content['keywords'];

$pattern[] = '$LEFT BLOCKS$';	$replacement[] = '';
$pattern[] = '$CONTACTS BLOCK$';$replacement[] = '';//$contact_block;

//$pattern[] = '$SHARES BLOCK$';	$replacement[] = $shares_block;
//$pattern[] = '$WEATHER BLOCK$';	$replacement[] = $this->load->view('block/weather.inc.php',$CUR, true);

$pattern[] = '$LENG$';	$replacement[] = "";
$pattern[] = '$AUTH$';	$replacement[] = $this->load->view('block/auth.inc.php',$this->data, true);

//$pattern[] = '$TOP LINKS$';	$replacement[] = $top_links;
//$pattern[] = '$LEFT LINKS$';	$replacement[] = $left_links;
//$pattern[] = '$RIGHT LINKS$';	$replacement[] = $right_links;

//$pattern[] = '$DOWN LINKS$';	$replacement[] = $down_links;
//$pattern[] = '$REDIRECT$';	$replacement[] = $redirect_text;
$pattern[] = '$SCRIPT TIME$';	$replacement[] = $script_time;
$pattern[] = '$SCRIPT DATE$';	$replacement[] = $data_text;

//$pattern[] = '$HOME$';		$replacement[] = $home_text;
$pattern[] = '$FOOTER$';		$replacement[] = $footer_text;
$pattern[] = '$CONTENT COPY$';	$replacement[] = $Content['copy'];
$pattern[] = '$STYLES$';		$replacement[] = $this->data['Styles'];//$styles_text;
$pattern[] = '$JS$';			$replacement[] = $this->data['Js'];//$js_text;
//*/

$page	=	GetFile($path_template_file);	
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