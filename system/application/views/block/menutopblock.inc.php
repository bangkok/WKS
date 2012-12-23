<? 
//print_r($this->uri_string);
$menu = '';
$i=0;
/*
<ul class="menu"><li class="leaf first"><a href="/applications-mineral-wool" title="">Glass and rock mineral wool</a></li>
<li class="leaf"><a href="/wood-panels-sustainability" title="A step change in sustainability for Wood Based Panels">Wood based panels</a></li>
<li class="leaf last"><a href="/ecose-technology-other-applications" title="Other applications">Other applications</a></li>
</ul>
*/
foreach ($Menu as $iMenu)
{if (count($iMenu['child']) < 1) continue;
$i++;
$menu .="\n".'<ul class="art2-menu" id="sub'.$i.'"'; 
if(!(stristr($this->uri_string, $iMenu['link']) && $iMenu['link'] !='/')) $menu .=' style="display: none;"';
$menu .='>';
$j=0;
	foreach ($iMenu['child'] as $item) {$j++;
		$menu .="\n\t".'<li class="leaf">';
		/*if ($j!= 1) $menu .='&nbsp;&nbsp;|&nbsp;&nbsp;';*/
		$menu .='<A href="'.$item['link'].'">'.$item['name'].'</A>';
		
		$menu .='</li>';
	}
$menu .="\n".'</ul>'."\n";	
}
echo $menu;
?>
