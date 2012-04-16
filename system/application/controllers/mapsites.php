<?php
@include_once("base.php");

class Mapsites extends Base
{
 function __construct()
   {
    parent::Base();
    
   }

function index()
    {//var_dump($this->data['TMenu1']);
      
      $this->data['Content']['text'] = $this->load->view($this->data['papka'].'/mapsites', $this->data, true);
      $this->load->view('pageconstructor', $this->data);
    // print_r($this->data['Menu']);	
    }

}
?>