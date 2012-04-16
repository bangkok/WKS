<?
@include_once("base.php");
class Sytes extends Base {

	function __construct()
	{
		parent::Base();	
		
		
		$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id'],'about');
	}
/*	
	function _remap()
    {
    if($link = $this->uri->segment(2)) $this->$link($this->uri->segment(3));
    else $this->index();
    
  
    }
*/
	function index()
	{
		//echo "sytes";
      $this->load->view('pageconstructor', $this->data);
	}
	

}
?>