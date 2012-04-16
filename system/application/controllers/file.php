<?php
class File extends Controller {

	function index()
	{
	}
    function  trf()
    {
    	$t=$this->uri->segment(3);
        $f = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $x = $this->uri->segment(6);
        $y = $this->uri->segment(7);

        $this->load->plugin('trf');

         create_image_resized($t, $f, $id, $x, $y, $this);

        //exit;
    }
}
?>
