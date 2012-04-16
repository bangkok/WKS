<?class Faq_model extends Model 
   {function Faq_model()
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
    
function Record($mail,$fields,$lang)
  { 
  $name = "SITE ".$_SERVER['HTTP_HOST']." | FAQ";
  $text_mail = "Вопрос: ";

  
  $sql="INSERT INTO faq VALUES(''";   
// ------------------------------
if(isset($_POST['fio'])){
  $text_mail=$text_mail."\r\n\r\n- Ф.И.О: ".$_POST['fio']."\r\n";  
  //$sql=$sql.",'".$_POST['fio']."'"; 
  }
// ------------------------------

// ------------------------------    
if(isset($_POST['mail'])){ 
  $text_mail .= "- E-mail: ".$_POST['mail']."\r\n";
//  $sql=$sql.",'".$_POST['mail']."'";
  }
// ------------------------------

// ------------------------------    
if(isset($_POST['message'])){
  $text_mail .= "- Вопрос: ".$_POST['message']."\r\n";
  $sql=$sql.",'".$_POST['message']."'";
  }
// ------------------------------

 $sql=$sql.",'','".$lang."','','".date("Y-m-d H:i:s")."','n')";  
 
 
if(isset($sql)&&$this->db->query($sql)
  &&$this->config_model->sendMsg($name, $mail, $text_mail)
	        ) 
		   return '<div class="report_yes" >'.$fields['alertyes'].'</div>';
    else   return '<div class="report_no" >'.$fields['alertno'].'</div>';
	}       
       
       
     
function GetValue($col = 0, $from = 0, $lang)
    { 
      $this->db->where('sleep', 'y');
      $this->db->where('lang', $lang);
      if ($col != 0&&$from>=0)   $this->db->limit($col, $from);
      $this->db->orderby('sort','asc');
      $this->db->orderby('date','desc');
      $query=$this->db->get('faq');
   	  if($query->num_rows()<1) return false;
      return $query->result();
    }
}
?>