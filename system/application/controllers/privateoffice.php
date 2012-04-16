<?php
@include_once("base.php");

class Privateoffice extends Base
{
    function __construct()
    {
        parent::Base();
    }
    
    function  index()
    {
    $this->load->model('auth_model');
    $this->data['Privateoffice']->a=0;
    //print_r($_POST);
    if (isset($_POST['house_width']) && !empty($_POST['house_width'])) $house_width = $_POST['house_width'];
    if (isset($_POST['house_height']) && !empty($_POST['house_height'])) $house_height = $_POST['house_height'];
    if (isset($_POST['house_floor']) && !empty($_POST['house_floor'])) $house_floor = $_POST['house_floor'];
    
    if ((isset($house_width) && !empty($house_width)) && (isset($house_height) && !empty($house_height)))
    $this->data['Privateoffice']->total_size = $house_width * $house_height;
    if ((isset($house_width) && !empty($house_width)) && (isset($house_height) && !empty($house_height)) && (isset($house_floor) && !empty($house_floor)))
    $this->data['Privateoffice']->total_vol = $house_width * $house_height * (160 * $house_floor);
	  
	$this->data['Content']['text'] = $this->load->view($this->data['papka'].'/privateoffice.php',$this->data['Privateoffice'], true);  
	  


	//$this->data['Styles'] = $this->AddStyle('style_privateoffice');
	//$this->data['Js'] = $this->AddJs('menunav');
	$this->data['template_file_path'] = "tpl/page_privateoffice.tpl";

      $this->load->view('pageconstructor', $this->data);
    }
}
?>
