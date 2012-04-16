<?
class Config_model extends Model 
{ 
  function Config_model()  {   parent::Model();   }
   
   
  function getMap($id=0,$lang='no')
  {
  	$menu=false;
    	$menu2=array();
    	$i=0;
    	if($lang!='no'&&$lang!='all'):
		$this->db->select("map.id as id, 
		                   map.link as link, 
		                   sites.name as name");
		$this->db->join('sites', 'sites.mapsite = map.id');
	    $this->db->where("sites.lang" , $lang);		
		endif;
		
		$this->db->where("visible" , 'y');
		$this->db->where("sitemap" , 'y');
		//$this->db->where("upId" , $id);
		$this->db->orderby("map.upId" , 'asc');
		$this->db->orderby("map.sort" , 'asc');
		$query=$this->db->get('map');

        $result = $query->result();
        
        
        foreach ($result as $row){
        	$LMap[$row->id] =	$row->upId;
        }
        $this->data['LMap'] = $LMap;
        //print_r($LMap);
        
        foreach ($result as $row){
        	$item['id'] = $row->id;
        	$item['upId'] = $row->upId;
        	$item['name'] = $row->title;
        	$item['link'] =	'/'.$row->link;
        	if ($item['link'] == '//') $item['link'] = '/';
        	//$item['level'] = 0;
    		
        	$CurTMapItem = &$TMap[$item['upId']][$item['id']];
            if(!isset($TMap[$item['id']])) $TMap[$item['id']] = NULL;
            
            //адресс массива елементов upId которых = id => ['id']['child']
        	$item['child'] = &$TMap[$item['id']];
       		if(isset($row->menu1) && $row->menu1=='y')// Для главного меню
        		{$item['sort'] = $row->msort1; $TMap[0][]=&$CurTMapItem;}
        	$item['dom'] = &$TMap[$item['upId']];

        	$CurTMapItem = $item;
        	//if ($CurTMapItem['link'] == '/news') $CurTMapItem['child'] = $this->getNewsMenu(&$CurTMapItem); // присоединить меню новостей
        	
        	if(isset($LMap[$item['upId']])){
        		$CurTMapItem['parent'] = &$TMap[$LMap[$item['upId']]][$item['upId']];

			//$CurTMapItem['link'] = $CurTMapItem['parent']['link'].$CurTMapItem['link'];
			$CurTMapItem['link'] =	str_replace('//','/',$CurTMapItem['parent']['link'].$CurTMapItem['link']);
			//$CurTMapItem['level'] = $CurTMapItem['parent']['level']+1;
        	}
         }
        
        $TMap = array_diff($TMap, array(NULL));	// Удалить все пустые(NULL) элементы
        		
       //* сортировка главного меню
       $menu2 = &$TMap[0];
        $fl=true;
        $num = count($menu2)-1;
        while($fl)
        {$fl=false;
        	for ($i=0; $i<$num; $i++)
        		if($menu2[$i]['sort'] > $menu2[$i+1]['sort']){
        			$tmp = $menu2[$i]['sort'];
        			$menu2[$i]['sort'] = $menu2[$i+1]['sort'];
        			$menu2[$i+1]['sort'] = $tmp;
        			$fl=true;
        		}
        }
        //*/ //*
        
	 $TMap[1][2]['child']= &$TMap[0]; // Присоединить к ГЛАВНОЙ
       
       //$this->data['TMap'] = $TMenu; 
       // print_r($TMap);
        
       if ($id != 0)	return $TMap[$id];
       else 			return $TMap;
  }
  
  function MakeLink($TMenuItem, $lang='no')
  {
  	$CurItem = $TMenuItem;
  	$link='/';
 //  while (isset($CurItem['parent'])){echo $CurItem['link']."<br>";
   	$link .=  $CurItem['link'].$link;
   	$CurItem = &$CurItem['parent'];
 //  }
 	if (isset($CurItem['parent']))
    $link =  $CurItem['link'].'/'.$link;

   return $link;
  }
  
  

  function getNewsMenu($parent, $lang='no')
  {
	$newsmenu = array();	
	$this->db->where("sleep" , 'y');
	$this->db->orderby("sort" , 'asc');
	$query=$this->db->get('newsteams');

	$result = $query->result();
	
	foreach ($result as $row){
        $item['id'] = $row->id;
        $item['upId'] = $parent['id'];
        $item['name'] = $row->title;
        $item['link'] =	$parent['link'].'/'.$row->link;
        $item['dom'] =	&$parent['child'];
        $item['parent'] = &$parent;
        $newsmenu[]=$item;
	}
	//print_r($newsmenu);
	return $newsmenu;
  }
  
    function getCatalog($parent, $lang='no')
  {
	$catalog = array();	
	$this->db->where("sleep" , 'y');
	$this->db->orderby("sort" , 'asc');
	$query=$this->db->get('newsteams');

	$result = $query->result();
	
	foreach ($result as $row){
        $item['id'] = $row->id;
        $item['upId'] = $parent['id'];
        $item['name'] = $row->title;
        $item['link'] =	$parent['link'].'/'.$row->link;
        $item['dom'] =	&$parent['child'];
        $item['parent'] = &$parent;
        $catalog[]=$item;
	}
	//print_r($newsmenu);
	return $newsmenu;
  }	
  
    function getText($id, $table='text')
    {
        $result = false;
        $this->db->where('id', $id);
        $query = $this->db->get('map');
        $result=$query->row();

        
        $this->db->where('link', $result->link);
        $query = $this->db->get($table);
        
        if ($query->num_rows()>0)
        {
        	$result=$query->row();
//        print"<br>   ---------- ";
    //  print_r($result->text);
        	
        
        	return $result->text;
        }
        return '';
    }   

  
  
     
function Get_Page($uri='',$router,$lang='no'){
//	print"<br> --------- ".$this->uri->segment(1);
	  
  	  if($this->uri->segment(1)==''||$this->uri->segment(1)==$lang) $uri[1]='/';
  	  //print_r($router->fetch_class());
  	  
      //if(count($uri) == 0)          {$uri[0]='/';}
  	  
      //if(count($uri) == $k+1){
      //print"<br> ------- ".$k;
      //print"<br> ------- ".$this->uri->segment(1);
      //print"<br> ------- ".$uri[0];
      //print"<br> ------- ".$router->fetch_class();
     // print_r($uri);
        for($i = 1; isset($uri[$i]); $i++)
        {
        	//if($i==2&&isset($uri[$i-1])&&$uri[$i-1]=='/') $i
            $link = $uri[$i];
            //$query = "SELECT * FROM map WHERE link='".$link."' AND resource='".$router->fetch_class()."'";
       //print"<br>-------".$lang;
                
       if($lang!='no')     
         $this->db->select("map.id as id, 
		                   map.link as link, 
		                   sites.name as name,
		                   sites.html as html,
		                   sites.keywords as keywords,
		                   sites.description as description
		                   ");
        else   $this->db->select("*");
       
         
        if($lang!='no')	$this->db->join('sites', 'sites.mapsite = map.id');
        $this->db->where("visible" , 'y');
        
		$this->db->where("link" , $link);
		
	//	if($lang!='no')	$this->db->where("lang" , $lang);
		
		$this->db->where("resource" , $router->fetch_class());
        $result=$this->db->get('map');            
        //$result = $result->result();
            
            //$result = $this->db->query($query);
            if ($result->num_rows()>0)
            {   $page = $result->row_array();
            }
        }
        
    if (!empty($page)) return $page;
        else           show_404();
       //}
}        
     
     


function getPathById($id,$lang='no')
    {
        $path = array();
        
        $flag = true;
        $curr_id = $id;
        while($curr_id != 1 && $flag)
          { if($lang!='no'){
          	      $this->db->select("map.id as id, map.upId as upId, map.link as link, sites.name as name, sites.lang as lang");
          	      $this->db->join('sites', 'sites.mapsite = map.id');
          	      $this->db->where("lang" , $lang);
               }
            else  $this->db->select("*");
            
            
            $this->db->where("visible" , 'y');
            $this->db->where("map.id" , $curr_id);
            $this->db->orderby("sort" , 'asc');
            $record = $this->db->get('map');      

           if ($record->num_rows()>0)
            {
                $record = $record->row();
                $curr_id = $record->upId;
                $elem='';
                if($lang!='no')
                     $elem['name'] = $record->name;
                else $elem['name'] = $record->title;
                
                $elem['link']="/";if($record->link!='/') $elem['link'] .= $record->link;
                
                
                $this->db->where("visible" , 'y');
                $this->db->where("map.upId" , $curr_id);
                $record2 = $this->db->get('map');      

                if($record2->num_rows()>0){
                   $record2 = $record2->result();
                   $p=array();
                   foreach($record2 as $r):
                     $p['name']=$r->title;
                     $p['link']='/';
                     if($r->link!='/')
                     $p['link'] .= $r->link;
                     
                     $elem['child'][]=$p;
                   endforeach;
                }
             
                
                if (!empty($path))
                {
                  foreach ($path as &$v)
                    {
               	       if($record->link!='/') 
                                     $v['link'] = "/".$record->link.$v['link'];
                       if(!empty($v['child']))              
                       foreach($v['child'] as &$v2):
                           $v2['link'] = "/".$record->link.$v2['link'];
                       endforeach;
                                     
                                     //print"<br> ---- ".$v['link'];
                    }
                }
            array_unshift($path, $elem);
            //print"<br>-------<br>";
            //print_r($path);
            
            }
            else 
            {
                $flag = false;
            }
        }
        /*
        foreach ($path as &$v)
         {
          $v['link'] = '/'.$v['link'];
         }

        if($this->uri->segment(2)){
        	$this->db->where('link', '/');
        $record = $this->db->get('map');
        $record = $record->row();
        if($lang!='no')
             $elem['name'] = $record->name;
        else $elem['name'] = $record->title;

        $elem['link'] = $record->link;
        /*
        $elem['name']='Главная';
        $elem['link']='/';
        * /
        array_unshift($path, $elem);
        
        }*/
        return $path;
    }


   function getTitle($path,$title)
    {
        $Title='';
        if($title!='') $Title.=" ".$title." | ";
        foreach ($path as $p):
         if($p['link']!='/'&&$this->uri->segment(2)!=''||$this->uri->segment(2)==''):
           $Title.=" ".$p['name'];
           if(end($path)!=$p)  $Title.=" &raquo; ";
         endif;  
        endforeach;
        return $Title; 
    }
             
     
     
     
     
function fields(){
	$this->CI =& get_instance();
	$this->lang->load('forma',$this->db_session->userdata('lang'));
    // $this->CI->lang->load('forma');	
     return $this->CI->lang->language;
}


function auth(){
	$this->CI =& get_instance();
     $this->CI->lang->load('auth');	
     return $this->CI->lang->language;
}

     
     
     
     
 
  function getConfig()
    {
        $result = false;
        $query = $this->db->get('config');
        if ($query->num_rows()>0)
        {
            foreach ($query->result() as $r):
                $result[$r->name]=$r->value;
            endforeach;
        }
        return $result;
    }
    
    
  function isLang()
    {
        $result = false;
        $query = $this->db->get('lang');
        if ($query->num_rows()>0)
        {
            foreach ($query->result() as $l):
               if($this->uri->segment(1)==$l->lang) $result=true;
            endforeach;
        }
        return $result;
    }
    
  function Lang()
    {
    	$this->db->orderby('sort','asc');
        $query = $this->db->get('lang');
        return $query->result();
    }
    
    
    
    
    
    
 function LinkNoLang()
    {
        return preg_replace("/\/".$this->uri->segment(1)."/","",$_SERVER["REQUEST_URI"]);
    }
    

    
    
   function getConfigName($name,$lang='no')
    {
        $result = false;
        $this->db->where('name', $name);
        if($lang != 'no'&&$lang != 'all')
        $this->db->where('lang', $lang);
        $query = $this->db->get('config');
        if ($query->num_rows()>0)
        {
            $result = $query->row();
            $result = $result->value;
        }
        return $result;
    }

    
// =========================================    
function sendMsg($name, $mail, $txt){
	
$name = mb_convert_encoding($name, 'cp1251', 'utf8');

require_once APPPATH."libraries/swift/Swift.php";
require_once APPPATH."libraries/swift/Swift/Connection/SMTP.php";

$A_SMTP = "localhost";
$A_SMTP_port = "25";
$A_SMTP_user = "";
$A_SMTP_pass = "";
$A_admin_mail = $mail;
$A_admin_mail_CC =array($mail);
$A_admin_mail_From = $mail;
$A_language = "ru";


try {
   $smtp =& new Swift_Connection_SMTP($A_SMTP,$A_SMTP_port);
   $smtp->setUsername($A_SMTP_user);
   $smtp->setpassword($A_SMTP_pass);
   $swift =& new Swift($smtp);
   $message =& new Swift_Message($name);
   $message->attach(new Swift_Message_Part($txt, "text/plain", "base64", "UTF-8"));
   $message->headers->setLanguage($A_language);
   $recipients =& new Swift_RecipientList();
   $recipients->addTo($A_admin_mail);
   foreach ($A_admin_mail_CC AS $val)
       $recipients->addCc($val);
       
   $swift->send($message,$recipients, $A_admin_mail_From);
   $data['error']="Сообщение отослано.";
   return true;
  } 
        
catch (Swift_ConnectionException $e) {
   $data['error']="Cообщение не может быть отправлено."
   ." Пожалуйста, сообщите администратору сервиса по адресу<br />"
   ." <a href=\""
   .$A_admin_mail."\">"
   .$A_admin_mail."</a>"
   .'<div style="padding-top: 10px; font-weight: normal; font-size: 0.8em;"> ['."There was a problem communicating with SMTP: " . $e->getMessage().']</div>';
   return false;
  } 
        
catch (Swift_Message_MimeException $e) {
  $data['error']="Cообщение не может быть отправлено."
   ." Пожалуйста, сообщите администратору сервиса по адресу<br />"
   ." <a href=\""
   .$A_admin_mail."\">"
   .$A_admin_mail."</a>"
   .'<div style="padding-top: 10px; font-weight: normal; font-size: 0.8em;"> ['."There was an unexpected problem building the email:" . $e->getMessage().']</div>';
   return false;
  }
}
// =========================================

}    

?>