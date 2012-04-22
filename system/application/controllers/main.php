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

	if( $this->uri->uri_string() == "/home"){
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle | accordian.pack');
		$this->data['Styles'] .= $this->AddStyle('home');
		$this->data['template_file_path'] = "tpl/home_page.tpl";
	//$this->data['Content']['name'] = '';
	}

	if( in_array($this->uri->uri_string(), array(
		'/advantageWKS',
		'/technology',
		'/individual_building'
	)) ){
		$this->data['template_file_path'] = "tpl/list_page.tpl";
	}

	if( $this->uri->segment(1) == "list"){
		$this->data['template_file_path'] = "tpl/list_page.tpl";
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle');
	}

	if( $this->uri->uri_string() == "/test"){
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle | colorbox');
		$this->data['Styles'] .= $this->AddStyle('home | colorbox');

		$this->data['template_file_path'] = "tpl/test_page.tpl";
	}

	if( $this->uri->uri_string() == "/home/about"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( eregi('/home/career',$this->uri->uri_string()) ){ 
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( $this->uri->uri_string() == "/home/partners"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_about');
	}

	if( $this->uri->uri_string() == "/products/wall_panels"){
		$this->data['Styles'] .= $this->AddStyle('style_WKS_panels');
	}



 	if($this->uri->uri_string() == '/products')
   	  	header("Location: /products/wall_panels");

 	if($this->uri->uri_string() == '/construction')
   	  	header("Location: /construction/buld");

	if($this->uri->uri_string() == '/construction/buld')
		$this->data['Styles'] .= $this->AddStyle('style_WKS_buld');



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
