<?php
@include_once("base.php");

class Buld extends Base
{
    function __construct()
    {
        parent::Base();
    }
    
    function  index($packet='')
    { $packet = $this->uri->segment(3);
	/*if($this->uri->uri_string() == '/construction/buld')*/
		
	if($packet=='selfbuld' || $packet=='standart' || $packet=='standart+' || $packet=='maxi'){

		$this->data['Content']['packet'] = $packet;
		$this->data['Content']['text']= $this->load->view($this->data['papka'].'/buld', $this->data['Content'], true);
	}	

	$this->data['Styles'] .= $this->AddStyle('style_WKS_buld');
	$this->load->view('pageconstructor', $this->data);
    }
}
?>
