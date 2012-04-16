<?php
class Sitysumbol_model extends Model
{
    /***********************************************
    * constructor
    */
    function Sitysumbol_model()
    {
        parent::Model();
    }

    function getSitysumbols()
    {
 	
 /*   	
    	$this->db->select("sitysumbol.sleep as sleep, 
    						 sitysumbol.sort as sort, sitysumbol.text as text, sitysumbol.img as img, 
    						 sitysumbol.title as title");
		$this->db->join('map', 'subitem.mapid = map.id');
*/
		
    	$this->db->where("sleep" , 'y');
    	$this->db->orderby("sort" , 'asc');
    	
    	$query = $this->db->get('sitysumbol');
    	
        $result = array();
        foreach ($query->result_array() as $SitySumbol){  //print_r($SubItem);
        	$SitySumbol['link'] = $this->data['TMap'] [$this->data['LMap'][$SitySumbol['link']]] [$SitySumbol['link']] ['link'];
        	$result[] = $SitySumbol;
        }
    return $result;
    }
}
?>
