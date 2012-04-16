<?
@include_once("base.php");
class About extends Base {

	function __construct()
	{
		parent::Base();	
		
		//print_r($this->data['Menu']);;;
		$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id'],'about');	
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
//		echo "ABOUT";
		$this->data['Styles'] .= $this->AddStyle('blocks');
		$this->load->model('subitem_model');
		$data['SubItems'] = $this->subitem_model->getSubitem($this->data['Content']['id']);
		$this->data['Content']['text'] .= $this->load->view($this->data['papka'].'/subitems.php',$data, true);
		
    	$this->load->view('pageconstructor', $this->data);
	}
	
	function symbol($link)
	{
//		echo "SYMBOL";
		if ($link == 'sytes'){
			$this->load->model('sitysumbol_model');
			$data['SitySumbols'] = $this->sitysumbol_model->getSitysumbols();
			$this->data['Content']['text'] = $this->load->view($this->data['papka'].'/sitysumbols.php',&$data, true);
		}
       $this->load->view('pageconstructor', $this->data);
	}
	
	function stat($link)
	{
//   	echo "STAT";
      $this->load->view('pageconstructor', $this->data);
	}
		
	function architecture($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}
	
	function history($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}
	
	function famous_people($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}
	
	function calendar($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}
	
	function fotos($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}
	
	function guests($link)
	{
      $this->load->view('pageconstructor', $this->data);
	}

}
?>