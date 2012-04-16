<?

class Main_model extends Model
{
	var $title  	 	= '';
	var $description 	= '';
	var $link    		= '';

	function __construct()
	{
		parent::Model();
		$this->db->query('SET NAMES utf8');
	}
	
	
 function Get_Page($uri='',$router){
  	//  $this->init_datab();
  	  if(count($uri) <= 1){$uri[2]='/';}
      if(count($uri) != 1){
        for($i = 2; isset($uri[$i]); $i++)
        {   
            $link = $uri[$i];
            
            //$query = "SELECT * FROM map WHERE link='".$link."' AND resource='".$router->fetch_class()."'";
            	$this->db->select("map.id as id, 
		                   map.link as link, 
		                   sites.name as name,
		                   sites.html as html,
		                   sites.keywords as keywords,
		                   sites.html as description
		                   ");
		$this->db->join('sites', 'sites.mapsite = map.id');
		$this->db->where("visible" , 'y');
		$this->db->where("link" , $link);
		$this->db->where("lang" , $uri[1]);
		$this->db->where("resource" , $router->fetch_class());
		
		$result=$this->db->get('map');
            
            
            
            //$result = $this->db->query($query);
            if ($result->num_rows()>0)
            {   $page = $result->row();
            
            }
            
        }
        
    if (!empty($page)) return $page;
       // else           show_404();
       }
}    	
	
	
	
	
	function getLevel($metod,$resource,$lang)
	{
		$query = $this->db->getwhere('map', array('resource' => $resource,'link' => $metod));
		$res = $query->first_row();
		
		$query1 = $this->db->getwhere('sites', array('mapsite' => $res->id,'lang' => $lang));

		$res = $query1->first_row();
		return $res;
	}
	
	function get_up_level($level)
	{
		$query = $this->db->getwhere('map', array('id' => $level, 'visible' => 'y', 'hidden' => 'n'));

		$res = $query->first_row();

		return $res;
	}

	
 
	
	
	
	
	
	
	
	
	
	
	
	function get_news_sub_menu()
	{
		$query = $this->db->query("SELECT id, title FROM rsscatalog WHERE upId=1 AND view='y' ORDER BY prior");
		
		$result = $query->result();
		if ($query->num_rows() > 0)
		foreach ($result as $key => $row)
		{
			$row->link = "get/p/".$row->id;
			$row->numSubMenu = 0;
			$row->img = "";
		}
		return $result;
	}
	
	function get_favorite_submenu()
	{
		$query = $this->db->query("SELECT clid, clmm, clnm FROM rncl WHERE clshf='y' AND clsh='y' ORDER BY cldi");
		
		$result = $query->result();
		
		return $result;		
	}
	
	function get_favorite_submenu_by_part($str)
	{
		$query = $this->db->query("SELECT clid, clnm FROM rncl WHERE clmm='$str' AND clmm<>clid AND cl2m='' AND clsh='y' ORDER BY cldi");
		
		$result = $query->result();
		
		return $result;		
	}
	
	function getCharValues($chid)
	{
	}
	
	function getRooms()
	{
		$q = "SELECT characteristics_value.*"
            ." FROM 
            	characteristics_name, characteristics_value"
            ." WHERE 
            	characteristics_name.marker = 'rooms'
            	AND characteristics_name.id_char = characteristics_value.id_char
            	ORDER BY `ord`";
		
		$query = $this->db->query($q);
		
		$result = $query->result();
//		var_dump($result);
		
		return $result;
	}
	
	
	function getCollages()
	{
		$q = "SELECT *"
            ." FROM 
            	collages"
            ." ORDER BY place";
		
		$query = $this->db->query($q);
		
		$result = $query->result();
		
		$res = array();
		foreach ($result as $val)
		{
			$res[$val->place] = $val;
		}
//		var_dump($result);
		
		return $res;
	}
}

?>