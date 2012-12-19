<?php
@include_once("base.php");


class Contacts extends Base
{
 function __construct()
   {
    parent::Base();
    $this->load->model('contacts_model');
    $this->load->library('validation');
   }

function _remap(){
	if(strstr($this->uri->uri_string(),'captcha'))
		$this->captcha();
	elseif($link = $this->uri->segment(2)){
		if(method_exists($this, $link)) $this->$link();
		else $this->index();
	}else $this->index();
}

function index(){
	$_SERVER['HTTP_HOST'];
	$sub = str_replace("wks.com.ua","", $_SERVER['HTTP_HOST']);
	$sub = str_replace("www.","", $sub);
	$sub = str_replace(".","", $sub);
	if( $sub != "" )
	{
		$this->db->where('id', $this->data['Content']['id']);
        $query = $this->db->get('map');
        $row=$query->row();
		$link = $row->link."-".$sub;
		$this->data['Content']['text'] = $this->config_model->getTextByLink($link);
	}
	$this->load->view('pageconstructor', $this->data);
}

function feedback() {
	
    $this->data['message']='';
    $this->load->helper(array('form', 'url'));
    //$this->load->library('validation');
    $this->lang->load('forma',$this->data['lang']);
    $this->lang->load('validation',$this->data['lang']);

	$this->data['Js'] .= $this->AddJs('function');
    
    
	// fields verify
	$rules['fio']     = "trim|required|alpha|min_length[3]|max_length[50]|xss_clean";
	$rules['mail']    = "trim|required|valid_email";	
	$rules['phone']   = "numeric|min_length[5]|max_length[15]";
    $rules['message'] = "trim|required|min_length[3]|max_length[500]";
    $rules['captcha'] = "required|callback_check_captcha";

    $fields2=$this->config_model->fields();    
    $this->data['fields']=$fields2;
    $fields['fio'] =     "'<b>".$fields2['fio']."</b>'";
	$fields['mail'] =    "'<b>".$fields2['mail']."</b>'";
    $fields['phone'] =   "'<b>".$fields2['phone']."</b>'";	
    $fields['message'] = "'<b>".$fields2['message']."</b>'";
    $fields['captcha'] = "'<b>".$fields2['captcha']."</b>'";
    
    
    
    
    
    $this->validation->set_fields($fields);
    $this->validation->set_rules($rules);
   
    $this->validation->set_error_delimiters('<div class="report_form">', '</div>');
    
    if ($this->validation->run() != FALSE && $this->input->post("send") != "")
    { 
 	  $this->data['message']=$this->contacts_model->Record($this->config_model->getConfigName('mail','all'),$this->data['fields']);
 	  $this->validation=false;
    }
	$this->data['adres']=$this->config_model->getConfigName('adres',$this->data["lang"]); 	
    //$this->data['contacts']=$this->config_model->getConfigName('contacts',$this->data["lang"]);
    $this->data['Content']['text'] = $this->load->view($this->data['papka'].'/contacts', $this->data, true);
    $this->load->view('pageconstructor', $this->data);
    
  }

}?>
