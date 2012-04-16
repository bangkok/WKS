<?php
class Subitem_model extends Model
{
    /***********************************************
    * constructor
    */
    function Subitem_model()
    {
        parent::Model();
    }

    function getSubitem($pageID)
    {
 	
    	
    	$this->db->select("subitem.sleep as sleep, 
    						subitem.mapid as mapid,
    						 subitem.sort as sort, 
    						 subitem.text as text, 
    						 subitem.img as img, 
    						 subitem.link as link, 
    						 subitem.title as title");
		$this->db->join('map', 'subitem.mapid = map.id');
		
    	$this->db->where("sleep" , 'y');
		$this->db->where("mapid" , $pageID);
    	$this->db->orderby("sort" , 'asc');
    	$this->db->groupby("subitem.id");
    	
    	$query = $this->db->get('subitem');
    	
        $result = array();
        foreach ($query->result_array() as $SubItem){  //print_r($SubItem);
        	
        	$SubItem['link'] = $this->data['TMap'] [$this->data['LMap'][$SubItem['link']]] [$SubItem['link']] ['link'];
        	$result[] = $SubItem;
        }
    return $result;
    }
}
?>
