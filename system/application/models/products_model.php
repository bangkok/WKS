<?class Products_model extends Model 
   {function Products_model()
       {parent::Model();}

       
       
 function GetValueMenu($Menu)
    { 
      $this->db->where('sleep', 'y');
      $this->db->where('upId', 0);
      $this->db->orderby('sort','asc');
      $query=$this->db->get('products');
   	  if($query->num_rows()>1):
   	    foreach ($Menu as &$m):
   	         if(eregi('product',$m['link'])):
   	         	  foreach ($query->result() as $q):
   	         	    //print_r($m); 
   	         	    $m1=array();
   	         	    $m1['name']=$q->name;
   	         	    $m1['link']="/products/show/".$q->id;
   	         	    if($q->img!=0&&$q->img!=false)
   	         	            $m1['icon']="/images/".$q->img.".jpg";
   	         	    $m['child'][]=$m1;
   	         	  endforeach;
   	         endif;
   	     endforeach;
   	  endif;
      return $Menu;
    }       
       
       
       
function getRightMenu(){
  	$q = "SELECT id, upID, name, text"
        ." FROM  products"
        ." WHERE sleep='y' ORDER BY sort ASC";

        $query = $this->db->query($q);
        $result = $query->result();

        $menu = array();
         $menu1=&$menu;
          $i=1;$k=1;
        while($i!=0){$i=0;
        	if(isset($menu1[0]))
        	 {
        	   foreach ($menu1 as &$m): // гоняем по кругу верхнее меню
        	   /*
                    print"<br><br> ---- ";
        	        print_r($menu);
        	        print"<br> ---- ".$k;
        	        print"<br>id ---- ".$m['id']."----".$m['flag'];
        	    */
        	        	   
        	      if($m['flag']==1):$i++; // проверяем верхнее меню на подменю сразу известно
        	         //print"<br>---- Я попал --- "; 
        	         $j=0;
        	         if(isset($m['child'])&&count($m['child'])>0):$j=1;
        	            foreach ($m['child'] as $row): //есть ли в подменю не фалс
        	 	            if($row['flag']) $j=0;
        	 	        endforeach;
        	 	     endif;
        	 	     
        	 	     if($j==0): 
        	             foreach ($result as $row): // гоняем по кругу всю выборку из таблицы
        	                $flag=true;
        	                if(isset($m['child'])&&count($m['child'])>0)
        	                   foreach ($m['child'] as $m2):
        	                      if($m2['id']==$row->id) {$flag=false;$j++;}
        	                   endforeach;
        	                   
        	                if($m['id']==$row->upID&&$flag): // проверяем на подменю
        	 	                 //print"<br>2.id ---- ".$m['id']." ---- ".$row->id;
        	 	               $m['child'][]=array('name' => $row->name, 'id'=>$row->id, 'flag'=>1, 'child'=>array());
        	 	               if($row->text!=''&&$row->name!='') $m['text']=true;
        	 	               $j++;
        	 	            endif;
         	 	         endforeach;
        	 	     else:$j=0;endif;
        	 	     
        	 	     if($j==0) {$m['flag']=0;}  // говорим что дальше нельзя, подменю нет
        	 	     else if($m['flag']==1) {$menu1=&$m['child'];$k++; break;} //говорится что есть подменю и заходим в него 
        	      endif;
        	   endforeach; 	
             }
        	else 
        	 {
        	 	foreach ($result as $row):
        	 	  if($i==$row->upID):
        	 	    $menu1[]=array('name' => $row->name, 'id'=>$row->id, 'flag'=>1, 'child'=>array());
        	 	  endif;  
        	 	endforeach;$i++;
        	 }
        	 
        	 if($k!=1&&$i==0){$k=1;$menu1=&$menu;$i++;}
        	 
        }
  return $menu;
}

       
       


function getMenuProducts2(){
  	$q = "SELECT id, upID, name"
        ." FROM  products"
        ." WHERE sleep='y' ORDER BY sort Desc ";

        $query = $this->db->query($q);
        $result = $query->result();
  return $result;
}

       
       
       
       
       
       
       
        
function Param($par,$no)
  {
  	for($i=1;$this->uri->segment($i)!='';$i++){
        if($this->uri->segment($i)==$par&&$this->uri->segment($i+1)!=''&&
            (
              is_numeric($this->uri->segment($i+1))||
              $par=='search'||
              $par=='sort'&&($this->uri->segment($i+1)=='asc'||$this->uri->segment($i+1)=='desc')
            )
        
          )
          return $this->uri->segment($i+1);
      }
    
  	return $no;
  	
  }
  

  
  
  
  
function GetProduct ($text,$nk,$np,$search,$sort,$v,$page){
	
	$query = " SELECT *";
	$query .=" FROM products"; 
    $query .=" WHERE sleep='y' ";
    if($text=='yes') $query .=" AND text != '' ";
    $groupby =" GROUP BY "; $gr=0;

//----------------------------------------------------------    
    if($np!='no'):
      // print"<br> ----- np";
	   $query .=" AND id = '".$np."' ";
	   $query=$this->db->query($query);
	   return $query->result();
    else:
//----------------------------------------------------------
      // print"<br> ----- !np";
//-----------------------------------------
       if($search!='no'):
                $score = 0; // relevance
                $mode = " IN BOOLEAN MODE ";
                $wharr = explode(" ", $search);
                $w = ""; foreach ($wharr AS $whname) $w .= " ".trim($whname)."* ";
             //   print"<br> --- ".$w;
                //$query2=" (";
                $query2=" (";
                $query2.=" ((MATCH (name) AGAINST ('".$w."'".$mode.") )) + ";
                $query2.=" ((MATCH (text) AGAINST ('".$w."'".$mode.") )) ";
                $query2 .= " ) > ".$score;
                //$query2 .= " ) ";
                
               $query .= " AND ( (".$query2.") OR ( name LIKE '%".$search."%' OR text LIKE '%".$search."%' ) )";
                //$query .= " AND ( (name LIKE '%".$search."%') OR (text LIKE '%".$search."%') ) ";
            //    print"<br> ----- релевантеый поиск";
                //print"<br> ----- ".$query;
       else:
          //      print"<br> ----- !search";
       endif;
//-----------------------------------------

//-----------------------------------------
       if($nk!='no'):
            if(is_array($nk)):
                
            	$query2 = " SELECT *";
            	$query2 .=" FROM products"; 
            	$query2 .=" WHERE sleep='y' ";
            	$query2=$this->db->query($query2);
            	$query2=$query2->result();
            	
            	foreach ($query2 as $q):if($q->text!=''):
            	  $B[$q->id][]=$q->upId;
            	endif;endforeach;
            	
            	foreach ($query2 as $q):if(isset($B[$q->id])):
            	$i=1;
            	while($i!=0):$i=0;
            	   foreach ($query2 as $q2):if($q2->id==end($B[$q->id])):$i++;
            	    $B[$q->id][]=$q2->upId;
            	   endif;endforeach; 
            	endwhile;  
            	endif;endforeach;
            	
  
//------------ запись текстовых эдементов если пред all ----
                foreach ($query2 as $q):
                  $z=0;
                  for ($j=0;$j<count($nk);$j++):
                     if($z==1&&$nk[$j]!='all'){$z=0;
                     if(!isset($A)):
                        $query3 = " SELECT *";
                        $query3 .=" FROM products"; 
                        $query3 .=" WHERE sleep='y' AND id = '".$nk[$j]."'";
                        $query3=$this->db->query($query3);
                        $query3=$query3->result();
                        $A=array();
                     endif;   
                     if($query3[0]->name==$q->name)  $A["'".$q->name."'"]=1;
                     }
                     if($nk[$j]=='all')        $z=1;
                  endfor; 
            	endforeach;
//------------ запись текстовых эдементов если пред all ----
            	
                $i=0;
                foreach ($query2 as $q):
                
                  $k=0;$z=0;
                  for ($j=0;$j<count($nk);$j++):
                     if($nk[$j]!='all'&&(isset($B[$q->id])&&isset($B[$q->id][(count($B[$q->id])-($j+2))])&&$B[$q->id][(count($B[$q->id])-($j+2))]==$nk[$j]||
                                         isset($A["'".$q->name."'"])
                                        )||
                        $nk[$j]=='all')   $k++;
                  endfor; 
                
                  if($k==count($nk)):
                     if($i==0){$query .= " AND ( ";$i++;}
                     else      $query .= " OR ";
                     if(!isset($A["'".$q->name."'"])) $query .= " id = '".$q->id."' ";
                     else                             $query .= " upId = '".$q->id."' ";  
                        
            	  endif;
            	endforeach;
            	if($i!=0): $query .= " ) "; endif;
            	
 
            else:
               $query .= " AND upId = '".$nk."' AND text = '' ";
            endif;  
        else:
       endif;
//-----------------------------------------
    
    endif;
//----------------------------------------------------------    

if($gr>0) $query .= $groupby;
if($sort!='no')  $query .= " ORDER BY name ".$sort;

if($page!="no")
$query .= " LIMIT ".$page.", ".$v;

//print"<br> ----- ".$page;

//print"<br> ----- ".$v;
//print($query);


 // print"<br> ----- ".$query;
$query=$this->db->query($query);
return $query->result();


  return 0;	
}


 function getNew ($col){
	$query   = " SELECT *";
	$query  .= " FROM product   "; 
	$query  .= " WHERE sleep='y' AND sleepnew = 'y' ";
	$query  .= " ORDER BY ad asc ";
	$query  .= " LIMIT ".$col; 
 
$query=$this->db->query($query);
return $query->result();



 }



}?>