<?php
class Viewconfig_model extends Model
{
    /***********************************************
     * constructor
     */
    function Viewconfig_model()
    {
        parent::Model();
    }
    
    function getNumPage($url,$uri,$cnt,$per_page)
    {
    	
    	$config['base_url'] = $url;
        $config['per_page'] = $per_page; 
        
        $config['total_rows'] = $cnt;
        $config['num_links'] = 2;
        $config['uri_segment'] = $uri;
        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = "следующая &#8594;";
        $config['prev_link'] = "&#8592; предыдущая";
        $config['cur_tag_open'] = '<span class="config_numpage_page">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = '<span class="config_numpage_tag">';
        $config['num_tag_close'] = '</span>';
           	
    	
    	
        return $config;
    }
    
}
?>
