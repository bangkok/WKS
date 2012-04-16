<?php
class Error extends Controller
{
	var $data;
	
	function __construct()
	{
		parent::MYAjax();
	}

	function index()
	{
		show_404('');		 
	}
}
?>