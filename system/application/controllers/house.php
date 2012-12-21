<?
@include_once("base.php");
class House extends Base {

	function __construct()
	{
		parent::Base();	
		//print_r($this->data['Menu']);
		//$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id'],'about');	
	}
	
	function _remap()
    {
	    if($link = $this->uri->segment(5)){
	    	if(method_exists($this, $link)) $this->$link($this->uri->segment(4),$this->uri->segment(6));
	    	else $this->index($this->uri->segment(4),$this->uri->segment(5));
	    }
	    else $this->index($this->uri->segment(4),$this->uri->segment(5));
    
     /*
     
      if(eregi('symbol',$this->uri->uri_string()))
           $this->symbol($link,$this->uri->segment($i-1),$this->uri->segment(3));
      elseif(eregi('stat',$this->uri->uri_string()))
           $this->stat($link,$this->uri->segment($i-1),$this->uri->segment(3));
      else $this->index($link,$this->uri->segment($i-1),$this->uri->segment(3));
     */
    }

	function index($link, $show='')
	{
	if(!$link){ header("Location: /construction/typical_projects"); return 0;}
		if('test' == $link){
			$link=11;
			$this->data['Styles'] .= $this->AddStyle('style_WKS_house | colorbox | home | buttons');
			$this->data['Js'] .= $this->AddJs('function');
		}else{

			$this->data['Styles'] .= $this->AddStyle('style_WKS_house | colorbox | home | buttons');
		}
		$this->data['Js'] .= $this->AddJs('colorbox | buttons');

		$this->load->model('catalog_model');
		$this->data['House'] = $this->catalog_model->getHouse($link);

	//print_r($this->data['House'][0]);

		$this->data['Content']['title'] .= $this->data['House'][0]->title;
		$this->data['Content']['text'] = $this->load->view($this->data['papka'].'/house.php',$this->data['House'][0], true);
	
		$this->data['Content']['name'] = $this->data['House'][0]->title;
     		$this->load->view('pageconstructor', $this->data);
	}
	
	function show($house, $img='')
	{
	
	$this->data['Styles'] .= $this->AddStyle('basic- | galleriffic-4');
	$this->data['Js'] .= $this->AddJs('jquery.galleriffic | jquery.opacityrollover ');
	
		if(!$house || !is_numeric($house)){ header("Location: /construction/typical_projects"); return 0;}
		$this->load->model('catalog_model');
		$this->data['House'] = $this->catalog_model->getHouse($house);
		
		$this->data['Content']['title'] .= $this->data['House'][0]->title;
		$this->data['Content']['name'] = $this->data['House'][0]->title;
		$this->data['Content']['text'] = $this->load->view($this->data['papka'].'/house-gallery.php',$this->data['House'][0], true);
	
     		$this->load->view('pageconstructor', $this->data);
	}

}
?>