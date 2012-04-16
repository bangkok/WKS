<?
@include_once("base.php");
class Construction extends Base {

	function __construct()
	{
		parent::Base();	
		
		//print_r($this->data['Menu']);
		//$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id'],'about');	
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
		//$this->data['template_file_path'] = "tpl/WKS_house_page.tpl";
	//	$this->data['Styles'] .= $this->AddStyle('style_WKS_house'); 
		
    		$this->load->view('pageconstructor', $this->data);
	}

	function production($link)
	{
		$this->data['Styles'] .= $this->AddStyle('proizvod');
		$this->data['Js'] .= $this->AddJs('zoomi_');
		$this->data['Content']['name'] = mb_convert_encoding('<p><span style="color:#5c932b">Современные дома строят только на фабрике!</span></p>',"UTF-8", 'cp-1251')
 .$this->data['Content']['name'];

     		$this->load->view('pageconstructor', $this->data);
	}

}
?>