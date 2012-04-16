<?class Video_model extends Model 
   {function Video_model()
       {parent::Model();}

       
       
    function getCnt($lang)
    {
        $this->db->select('count(*) as cnt');
        $this->db->where('sleep','y');
        $this->db->where('lang',$lang);
        $result =  $this->db->get('faq');
        $res =  $result->row();
        return $res->cnt;
    }      
    
   
     
function GetValue($col = 0, $from = 0, $lang)
    { 
      $this->db->where('sleep', 'y');
      //$this->db->where('lang', $lang);
      if ($col != 0&&$from>=0)   $this->db->limit($col, $from);
      $this->db->orderby('sort','asc');
      $query=$this->db->get('video');
   	  if($query->num_rows()<1) return false;
      return $query->result();
    }
}

?>