<?//var_dump($Menu);
//$Menu = $TMenu[1];
    

$menu = '';$i=0;
foreach ($Menu as $item)
{
	$menu .="\n".'<li onMouseOver="menunav(this); $(\'.art2-menu\').hide();';
	if(isset($item['child'])||$item['link']=='/') {$i++;
						$menu .='$(\'#sub'.$i.'\').show();';}
	$menu .= '">
	
	<A 
href="'.$item['link'].'">'.$item['name'].'</A>';
/*
	<a href="'.$item['link'].'"';
	if($item['link'] == $this->uri_string || eregi($item['link'] , $this->uri_string) && $item['link']!='/') $menu .=' class=" active"';
	$menu .='><span class="l"></span><span class="r"></span><span class="t">'.$item['name'].'</span></a>';*/

/*
		if(!empty($item['child'])){
		$menu .= "\n\t".'<ul>';
		foreach($item['child'] as $item1){
			$menu .= "\n\t\t".'<li><a href="'.$item1['link'].'">'.$item1['name'].'</a>';
			
			
			if(!empty($item1['child'])){
				$menu .= "\n\t".'<ul>';
				foreach($item1['child'] as $item2){
					$menu .= "\n\t\t".'<li><a href="'.$item2['link'].'">'.$item2['name'].'</a>'.'</li>';
				}
				$menu .="\n\t".'</ul>'."\n";
			}
			
			
			$menu .='</li>';
		}
		$menu .="\n\t".'</ul>'."\n";
	}
*/	
	
	$menu .='</li>';
}
echo '<ul class="menu"> '.$menu." </ul>";
?>
