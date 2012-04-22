<?php
@include_once("base.php");
class Gallery extends Base
{
	
function __construct()
   {
    parent::Base();
    $this->load->model('gallery_model');
    
    $this->data['Styles'] .= $this->AddStyle('fancy | gallery');

    $this->data['Js'] .= $this->AddJs('jquery.gallery | jquery.ifixpng | jquery.fancybox | function ');
   }

    
    /*****************************
     *  default action
     */
  
    
    
    function index()
    {

    	//$this->data['Album'] = $this->gallery_model->getAlbum();
    	$this->data['album'] = $this->gallery_model->getGallery();
        $this->data['Content']['text'] = $this->load->view($this->data['papka'].'/gallery', $this->data, true);
        $this->load->view('pageconstructor', $this->data);
        
    }

    
    
}