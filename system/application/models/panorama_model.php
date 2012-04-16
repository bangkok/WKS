<?php
class Panorama_model extends Model
{
    /***********************************************
    * constructor
    */
    function Panorama_model()
    {
        parent::Model();
    }

    function getPanorama($pageID)
    {
    	$query = "SELECT photoID, weight FROM panorama WHERE panorama.weight != 0 AND (panorama.pageID = 0 OR panorama.pageID = $pageID)";
        $query2 = $this->db->query($query);
        
        foreach ($query2->result_array() as $photoID){
        	for($i=0;$photoID['weight'] > $i; $i++)
        		$result[] = $photoID['photoID'];
        }
    	return $result;
    }
}
?>