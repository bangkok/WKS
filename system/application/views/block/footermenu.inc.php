<?php
foreach ($TMenu1 as $item) {
	if(stristr($this->uri->uri_string(), $item['link']) && 1 == count($this->uri->segments)) $footer_link .= $item['name'].' | ';
	else $footer_link .= '<a href="'.$item['link'].'">'.$item['name'].'</a> | ';
}
echo $footer_link = substr($footer_link, 0, -3);
//$footer_text = $footer_link;
?>