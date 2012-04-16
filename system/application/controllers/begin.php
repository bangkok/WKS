<?php
@include_once("base.php");

class Begin extends Base
{
    function __construct()
    {
        parent::Base();
    }
    
    function  index()
    {
	  
      $this->load->view('begin','');
    }
}
?>
