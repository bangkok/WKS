<?
@include_once("base.php");
class Media extends Base {

	function __construct()
	{
		parent::Base();	
		
	}
	
	function _remap()
    {
	    if($link = $this->uri->segment(2)){
	    	if(method_exists($this, $link)) $this->$link($this->uri->segment(3));
	    	else $this->index();
	    }
	    else $this->index();
    
     /*
     
      if(eregi('symbol',$this->uri->uri_string()))
           $this->symbol($link,$this->uri->segment($i-1),$this->uri->segment(3));
      elseif(eregi('stat',$this->uri->uri_string()))
           $this->stat($link,$this->uri->segment($i-1),$this->uri->segment(3));
      else $this->index($link,$this->uri->segment($i-1),$this->uri->segment(3));
     */
    }

	function index()
	{
	//	echo "template_file_path";
	//	//$this->data['template_file_path'] = "tpl/WKS_house_page.tpl";
	//	$this->data['Styles'] .= $this->AddStyle('style_WKS_house'); 

   	  if('/media'== $this->uri->uri_string())
   	  	header("Location: /media/video");

		
    		$this->load->view('pageconstructor', $this->data);
	}

	function gallery($link)
	{ 
		$this->data['Styles'] .= $this->AddStyle('pirobox');
		$this->data['Js'] = $this->AddJs('jquery-pirobox | piroBox_packed | menunav- | gallery | gaq');
     		$this->load->view('pageconstructor', $this->data);
	}

}
?>