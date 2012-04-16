<?php
@include_once("base.php");

class Main extends Base
{
    function __construct()
    {
        parent::Base();
    }
    
    function  index()
    {
/*
   	  if(''== $this->uri->uri_string()) {      
		$this->load->view('begin','');
		break;
   	  //	header("Location: /home");
		}
*/

	if( $this->uri->uri_string(1) == "/home"){
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle | nivo-slider');
		$this->data['Styles'] .= $this->AddStyle('nivo-slider_orman | nivo-slider');
	//$this->data['Content']['name'] = '';
	}

	if( $this->uri->uri_string(2) == "/home/about"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( eregi('/home/career',$this->uri->uri_string()) ){ 
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( $this->uri->uri_string(2) == "/home/partners"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( $this->uri->uri_string() == "/products/wall_panels"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_panels');
	}


 	if($this->uri->uri_string() == '/technology')
   	  	header("Location: /technology/about_taechnology");

 	if($this->uri->uri_string() == '/products')
   	  	header("Location: /products/wall_panels");

 	if($this->uri->uri_string() == '/construction')
   	  	header("Location: /construction/buld");

	if($this->uri->uri_string() == '/construction/buld')
		$this->data['Styles'] .= $this->AddStyle('style_WKS_buld');

	if($this->uri->uri_string() == '/technology/about_taechnology')
		$this->data['Styles'] .= $this->AddStyle('proizvod');
	if($this->uri->uri_string() == '/technology/constr_process')
		$this->data['Styles'] .= $this->AddStyle('proizvod');

/*
	if( $this->uri->uri_string(1) == "/media/tapinfo"){
		$this->data['Content']['name'] = '';
	}


	if( $this->uri->uri_string(1) == "/products/roof_trusses/roof_trusses_mitek"){
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle2');
	//$this->data['Content']['name'] = '';
	}
*/
	  
	if(''== $this->uri->uri_string())
		$this->load->view('begin','');
	else 
      $this->load->view('pageconstructor', $this->data);



    }
}
?>
