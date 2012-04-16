<?php
class Gallery_model extends Model
{
    /***********************************************
    * constructor
    */
    function Gallery_model()
    {
        parent::Model();
    }

    function getGallery()
    {
        $query = "SELECT * FROM gallery WHERE sleep = 'y' Order by sort asc, ad asc ";
        return $this->db->query($query);
    }
    
    function getAlbum()
    {
        $query = "SELECT * FROM album WHERE sleep = 'y' Order by sort asc, ad asc ";
        
        $query=$this->db->query($query);
        if($query->num_rows() == 0) return false;
        $m=array(); 
        foreach ($query->result() as $q):
           $m[$q->id]=$q;
        endforeach;
        
        
        return $m;
    }
    

    
    
    
}
?>