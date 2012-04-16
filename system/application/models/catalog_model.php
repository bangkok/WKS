<?
class Catalog_model extends Model 
{ 
  function Catalog_model()  {   parent::Model();   }
   
   
  function getCatalog($id=0, $lang='no')
  {
  	$menu=false;
    	$menu2=array();
    	$i=0;
    	/*
    	if($lang!='no'&&$lang!='all'):
			$this->db->select("catalog.id as id, 
			                   sites.title as title");
			$this->db->join('sites', 'sites.mapsite = company.id');
		    $this->db->where("sites.lang" , $lang);		
		endif;*/
		
		$this->db->where("visible" , 'y');
		$this->db->orderby("upId" , 'asc');
		$this->db->orderby("sort" , 'asc');
		
		$query=$this->db->get('catalog');

        $result = $query->result();
        
        
        foreach ($result as $row){
        	$LMap[$row->id] =	$row->upId;
        }
        $this->data['Catalog']['LMap'] = $LMap;
        //print_r($LMap);
        
        foreach ($result as $row){
        	$item['id'] = $row->id;
        	$item['upId'] = $row->upId;
        	$item['name'] = $row->title;
        	$item['link'] = '/construction/typical_projects/'.$row->id;//опционально
    		
        	$CurTMapItem = &$TMap[$item['upId']][$item['id']];
            if(!isset($TMap[$item['id']])) $TMap[$item['id']] = NULL;
            
            //адресс массива елементов upId которых = id => ['id']['child']
        	$item['child'] = &$TMap[$item['id']];
       		if(isset($row->menu1) && $row->menu1=='y')// Для главного меню
        		{$item['sort'] = $row->msort1; $TMap[0][]=&$CurTMapItem;}
        	$item['dom'] = &$TMap[$item['upId']];

        	$CurTMapItem = $item;

        	if(isset($LMap[$item['upId']])){
        		$CurTMapItem['parent'] = &$TMap[$LMap[$item['upId']]][$item['upId']];
        		
           // $CurTMapItem['link'] = $CurTMapItem['parent']['link'].$CurTMapItem['link'];
			//$CurTMapItem['level'] = $CurTMapItem['parent']['level']+1;
        	}
         }
        
        $TMap = array_diff($TMap, array(NULL));	// Удалить все пустые(NULL) элементы
        		
       //* сортировка главного меню

       
       //$this->data['TMap'] = $TMenu; 
       // print_r($TMap);
        
       if ($id != 0)	
       		if (isset($TMap[$id])) 
       			return $TMap[$id];
       		else 
       			return $TMap[$LMap[$id]];
       else 			return $TMap;
  }
  
  function recCompanysSql($CUR)
  {
  	$sql = ' OR catalog.upId = '.$CUR['id'];
	foreach ($CUR['child'] as $item)	
		if(isset($item['child'])) $sql .= $this->recCompanysSql($item);
	return $sql;
  }	
  
  function getCompanys($sector=1, $from =0, $lang='no')
  {
//$time = microtime();
//*/		
		$col = $this->data['per_page'];
		
		$TMap = &$this->data['Catalog']['TMap'];
		$LMap = &$this->data['Catalog']['LMap'];
		if(isset($LMap[$sector])) $CUR = $TMap[$LMap[$sector]][$sector];
		else $CUR = $TMap[$LMap[1]][1];

		$this->data['Catalog']['name'] = $CUR['name'];		

		$sql = 'houses.id as id, houses.title as title, houses.simagepath as simagepath, houses.content as content, houses.houselink as houselink, catalog.link as link, catalog.link_min as link_min, catalog.text as text
			FROM houses, catalog
			WHERE (catalog.visible = "y" AND houses.sleep = "y") AND 
				(houses.typeId = catalog.id AND houses.typeId = '.$CUR['id'].')
				GROUP BY houses.title';
	
		$this->db->select(''.$sql);

		$this->db->limit($col, $from);
		$query=$this->db->get('');
		$result = $query->result();
		
         return $result;
  	
  }

  function getHouse($id=0, $lang='no')
  {

	$sql = '*, houses.id as id, houses.typeId as typeId, houses.title as title, houses.imagepath as imagepath, houses.content as content, houses.houselink as houselink, catalog.link as link
		FROM houses, catalog
		WHERE (catalog.visible = "y" AND houses.sleep = "y") AND 
			(houses.typeId = catalog.id AND houses.id = '.$id.')';

	$this->db->select(''.$sql);

	
	$query=$this->db->get('');
	$result = $query->result();
	
        return $result;
  	
  }


      function getCntHouses($typeId)
    {
        $this->db->select('count(*) as cnt');
        $this->db->where('houses.sleep','y');
	  $this->db->where('houses.typeId', $typeId);
        $result =  $this->db->get('houses');
        $res =  $result->row();
        return $res->cnt;
    }      
  
// =========================================

}    

?>