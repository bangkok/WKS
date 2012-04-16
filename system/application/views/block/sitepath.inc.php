<?
$put ='';
$i=0;
while (true){ 
	$block ='<li><a href="'.$CUR['link'].'">'.$CUR['name']."</a>";
	$block .='<ul >'."\n";
	foreach ($CUR['dom'] as $item){
		if ($CUR['id'] != $item['id']) $block .=  "\t".'<li><a href='.$item['link'].'>'.$item['name'].'</a></li>'."\n";}
	 $block .= '</ul></li>';
	if($i) $block .="<li class=\"ptichka\"> &raquo; </li>";
	$block .= "\n";
	$put = $block . $put;
	if (isset($CUR['parent']))$CUR = $CUR['parent']; else break;
$i++;
}
		
 echo $put = '<ul id="cssmenu">'. $put .'</ul>';

?>