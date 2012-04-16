<?php
@include_once("base.php");

class Text extends Base
{
	function __construct()
	{
		parent::Base();
	}
	
	
	function index()
	{
		$this->load->view('pagesites', $this->data);
	}
}
?>