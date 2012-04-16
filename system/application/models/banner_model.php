<?
class Banner_model extends Model 
{
   function Banner_model()
    {
        parent::Model();
    }
    
function getValue($num){ 
	
	$query="Select * FROM banerm";
	$query.=" WHERE ";
	$query.=" id = '".$num."' ";
	$query=$this->db->query($query);
	
	//print"<br> ----- ";
	
	if($query->num_rows() > 0 ) {$query=$query->result();$kol=$query[0]->kol;}
    else                        return false;

    //print"<br> ----- ";
    
   $query="Select * FROM baner";
   $query.=" WHERE ";
   $query.=" sleep = 'y' ";
   if(!$this->uri->segment(1)) 
     $query.=" AND sleep_1p='y' ";
     
   $query.=" AND date_start <= '".date("Y-m-d")."' ";
   $query.=" AND date_close >= '".date("Y-m-d")."' ";
   $query.=" AND mbaner = '".$num."' ";
   $query.=" ORDER BY RAND() ";
   $query.=" LIMIT ".$kol."";
   $query=$this->db->query($query);
 
if($query->num_rows()>0){
 $menu=array();    
 foreach ($query->result() as $b):
   $menu[]=$b;
   $this->db->where('id', $b->id);
   $this->db->update('baner', array('kol' => ($b->kol+1))); 
endforeach;
}
else return false;

return $menu;
}

}
?>
