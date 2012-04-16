<?
@include_once("base.php");
class Busines extends Base {

	function __construct()
	{
		parent::Base();	
		
		//print_r($this->data['Menu']);
	//	$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id'],'about');	
	}
	
	function _remap()
    {
	    if($link = $this->uri->segment(2)){
	    	if(method_exists($this, $link)) $this->$link($this->uri->segment(3),$this->uri->segment(4));
	    	else $this->index();
	    }
	    else $this->index();
	    
    }

	function index()
	{
//		echo "Busines";
		$this->data['Js'] .= $this->AddJs('jquery.cycle | cycle | nivo-slider');
		$this->data['Styles'] .= $this->AddStyle('nivo-slider_orman | nivo-slider');

    	$this->load->view('pageconstructor', $this->data);
	}
	
	function kurses()
	{
//		echo "kurses";

		$this->data['Content']['text'] .= $this->load->view($this->data['papka'].'/kurses.php','', true);

		
    	$this->load->view('pageconstructor', $this->data);
	}
	
		function sprav($sector=1, $comp=0)
	{
//		
		if(!$sector)$sector = 2;
		$this->data['Catalog']['sector'] = $sector;
		$this->data['Catalog']['comp'] = $comp;
		
		$this->load->model('catalog_model');
		$this->data['Catalog']['TMap'] = $this->catalog_model->getCatalog();
		$this->data['Catalog']['Companys'] = $this->catalog_model->getCompanys($sector);
		
/*		
		$data['CUR'] = $this->data['Catalog']['TMap'][$this->data['Catalog']['LMap'][$sector]][$sector];
		if (isset($data['CUR']['child'])) {
			reset($data['CUR']['child']); 
			$data['CUR'] = current($data['CUR']['child']);}
	//	$this->data['Content']['text'] = $this->load->view('block/sitepath.inc.php',$data, true);
*/
		$this->data['Content']['text'] .= $this->load->view($this->data['papka'].'/catalog.php',$this->data['Catalog'], true);
		
		
		
		//print_r($this->data['Catalog']['Companys']);
		//print_r($this->data['Catalog']['TMap']);
		//print_r($this->data['LCatalog']);
		
		
		
		//$this->data['TMap'][58] = $this->data['Catalog']['TMap'][1];
		//$this->data['TMap'][56][58]['child'] = &$this->data['TMap'][58];
		/*
		foreach ($this->data['Catalog']['TMap'] as $key => $value) {$str='';
			foreach ($value as $key2 => $value2) {$str .= '['.$key2."],";}
				echo '['.$key."] => ".$value.' ( '.$str." )<br>";}
		*/
    	$this->load->view('pageconstructor', $this->data);
	}



}
?>