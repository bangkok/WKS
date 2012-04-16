<?php
@include_once("base.php");

class News extends Base
{
 function __construct()
   {
    parent::Base();
    $this->load->library('pagination');
    $this->load->model('viewconfig_model');
   }

function _remap()
    {
     $link=''; $fl=true;
     for($i=1;$fl&&$this->uri->segment($i);$i++){
        $link.="/".$this->uri->segment($i);
        if(eregi('page',$this->uri->segment($i+1))||
           eregi('show',$this->uri->segment($i+1)))    $fl=false;
        }
      if(eregi('show',$this->uri->uri_string()))
           $this->show ($link,$this->uri->segment($i-1),$this->uri->segment($i+1));
      else $this->index($link,$this->uri->segment($i-1),$i+1);

    }
   

    
    
function index($link,$table,$str)
    {  //  echo '<br>'.$link.'<br>';echo $table.'<br>';echo $str;   
      $this->data['cnt'] = $this->news_model->getCntNews($table);

      if(empty($this->data['cnt'])){
           $this->lang->load('news');
           $this->data['no_info_all']=$this->lang->line('no_info_all');
      }

      $this->data['per_page']=$this->config_model->getConfigName('news_lenta');
      $config=$this->viewconfig_model->getNumPage(base_url().$link."/page/",$str,$this->data['cnt'],$this->data['per_page']);
      $this->pagination->initialize($config);
      $this->data['links'] = $this->pagination->create_links();
 
      $this->data['News'] = $this->news_model->getPublic($table, $this->data['per_page'], $this->uri->segment($str));
      $this->data['link']=$link."/show/";
      $this->data['Content']['text'] = $this->load->view($this->data['papka'].'/news', $this->data, true);

      if(isset($this->data['News'][0]->TeamTitle)) {
      		$this->data['Content']['title'] .= ' &raquo; '.$this->data['News'][0]->TeamTitle;
      		$this->data['Content']['name'] = $this->data['News'][0]->TeamTitle;
      }
  
      $this->load->view('pageconstructor', $this->data);
    }
    
    
function show($link,$table,$id)
    {  //'<br>'.$link.'<br>';echo $table.'<br>';echo $id;
//------------ N id и линк на страннице -------------
    	$this->data['news'] = $this->news_model->getNewsById($id,$table); 
        $this->data['link']=$link;    
//------------ N id и линк на страннице -------------
//------------ Подключаются языковые тексты ---------
            if(eregi('publication',$this->uri->uri_string()))
             $this->lang->load('publications'); 
       else if(eregi('press/',$this->uri->uri_string()))
             $this->lang->load('press'); 
       else  $this->lang->load('news'); 
//------------ Подключаются языковые тексты ---------
//------------ Контент новости ----------------------
     if(isset($this->data['news']->TeamTitle)) {
      		$this->data['Content']['title'] .= '&nbsp;|&nbsp;'.$this->data['news']->TeamTitle;
      		$this->data['Content']['name'] = $this->data['news']->TeamTitle;
      }

       if(!empty($this->data['news'])){
          $this->data['Content']['name'].="&nbsp;|&nbsp;".$this->data['news']->title;
          $this->data['Content']['title'].=" &raquo; ".$this->data['news']->title;
          array_push( $this->data['Content']['sitepath'], array('link'=>$link.'/'.$this->data['news']->id, 'name'=>$this->data['news']->title));
         }
        else  $this->data['no_info_num']=$this->lang->line('no_info_num').$id;
        $this->data['lenta']=$this->lang->line('lenta');
        $this->data['origin']=$this->lang->line('origin');
//------------ Контент новости ----------------------


       // $this->data['id']=$id;
        /*
//        include_once("forma/comment1.php");    // ����� ��� �����������
// ========================= ����������� =====================       
$this->load->model('comments_model'); 
$why='press';
include_once("forma/recordcom.php");   // ��� ����� ����� ����� ������������ � ������ �����������
include_once("forma/comment1.php");    // ����� ��� �����������
$this->data['Comment']=$this->comments_model->Comment($id,$why);    
// ========================= ����������� =====================
        */

if ($this->input->post('send')){
	$this->data['t']=1;
    $rules['name'] = "required|max_length[50]";
    $rules['message'] = "required|max_length[500]";
    $rules['captcha'] = "required|callback_check_captcha";

    // set validation rules
     $this->validation->set_rules($rules);
    // set field names for validation
     $fields['name'] = "'Имя'";
     $fields['message'] = "'Текст сообщения'";
     $fields['captcha'] = "'Подтверждающий код'";
    // set field name
     $this->validation->set_fields($fields);
    // check validation
    
     if($this->validation->run() == true)
       {#all ok
       	 $this->data['t']=2;
         $this->konf_model->addComment($id, $this->validation->name, $this->validation->message);
         $this->db_session->set_userdata('captcha', '');
         $show_message[] = "Ваше сообщение успешно добавлено";
       }
     else{
         $show_message[]  = $this->validation->name_error;
         $show_message[]  = $this->validation->message_error;
         $show_message[]  = $this->validation->captcha_error;
         //print($this->validation->captcha_error);
        }
     $this->data['show_message'] = $show_message;
    }
    //$this->data['comments'] = $this->konf_model->getCommentsByProductId($id);
    //$this->data['content'] = $this->load->view('onenews', $this->data, true);
    $this->data['Content']['text'] = $this->load->view($this->data['papka'].'/onenews', $this->data, true);
    
   /// print_r($this->data['comments']);
        
        
        $this->load->view('pageconstructor', $this->data);    	
    }
    
    
    
function date($t, $y='',$m='',$d=''){
	
	    $this->data['Calendar']= $this->calendar_model->getValue('/news/date',$y,$m);
    
	    $this->load->library('pagination');

        $config['base_url'] = base_url().'/news/page/';
        $this->data['per_page'] = $config['per_page'] = 10; #news per page
        $this->data['cnt'] = $this->news_model->getCntNews(); #count news
        $config['total_rows'] = $this->data['cnt'];
        $config['num_links'] = 5;
        $config['uri_segment'] = 4;
        $config['first_link'] = '&laquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = "следующая &#8594;";
        $config['prev_link'] = "&#8592; предыдущая";
        $config['cur_tag_open'] = '<span class="select">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="link">';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        //$num = $this->uri->segment(3);

        // load templates
        $this->data['links'] = $this->pagination->create_links();
        
        $this->data['news'] = $this->news_model->getNewsDate($config['per_page'], '', $y,$m,$d);
        
        $this->data['content'] = $this->load->view('news', $this->data, true);
	
	
	
	$this->load->view('layout', $this->data);
}    
    
}
?>