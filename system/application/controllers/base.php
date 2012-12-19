<?php
include_once(APPPATH."libraries/base.php");
class Base extends Base1
{  function Base()
    {  parent::Base1();
    
    $this->load->model('config_model');
    $this->load->model('news_model');
	$this->load->model('panorama_model'); 

	$this->load->view('head.inc.php','', true);
	$this->data['Styles'] = $this->AddStyle('style | page | UI | blocks');
	$this->data['Js'] = $this->AddJs('jquery | menunav- |  UI | blocks');
	
	
	$this->data['auth']['userData']=$this->db_session->userdata('auth');
	if(!$this->uri_string = $this->uri->uri_string()) $this->uri_string = '/';

	
//======================= Карта ============================	
	$this->data['TMap'] = $this->config_model->getMap();	
	//$this->data['TMap'][57] = $this->config_model->getNewsMenu(&$this->data['TMap'][1][57]);
	//$this->data['TMap'][1][57]['child'] = &$this->data['TMap'][57];
	/*
	$this->data['TMap'][58] = $this->config_model->getCatalog(&$this->data['TMap'][56][58]);
	$this->data['TMap'][56][58]['child'] = &$this->data['TMap'][58];
	*/
//======================= Карта ============================


//======================= Контетн ============================
//*    
    $this->data['Content'] = $this->config_model->Get_Page($this->uri->segment_array(),$this->router,$this->data['lang']);
    $this->data['Content']['name']=$this->data['Content']['title'];
   // print_r( $this->data['Content']);
        
    $this->data['Content']['sitepath'] = $this->config_model->getPathById($this->data['Content']['id'],$this->data['lang']);
    

    
    $this->data['Content']['copy']=$this->config_model->getConfigName('copy', $this->data['lang']);
    $this->data['Content']['slogan']=$this->config_model->getConfigName('slogan', $this->data['lang']);
    $this->data['Content']['title']=$this->config_model->getConfigName('title', $this->data['lang']);
//   */ 
  
//*       
    //==== TITLE =========
    $title=$this->data['Content']['title'];
    $this->data['Content']['title']=$this->config_model->getTitle($this->data['Content']['sitepath'],$title);
    //==== TITLE =========
//   */

//* 
    //==== KEYWORDS DESCRIPTION ======
if($this->data['Content']['keywords']=='')
      $this->data['Content']['keywords']=$this->config_model->getConfigName('keywords',$this->data['lang']);
if($this->data['Content']['description']=='')
      $this->data['Content']['description']=$this->config_model->getConfigName('description',$this->data['lang']);
    //==== KEYWORDS DESCRIPTION ======
//	*/

//*
$this->data['Content']['text']=$this->config_model->getText($this->data['Content']['id']);    
//   */

//======================= Контетн ============================

//======================= Шапка ============================
	$panorama = $this->panorama_model->getPanorama($this->data['Content']['id']);
	shuffle($panorama);
	$this->data['Panorama'] = $panorama;  //[rand(0,count($panorama)-1)]
//======================= Шапка ============================


//======================= Меню ===============================
//* 
$this->data['Menu'] = &$this->data['TMap'][1];
$this->data['CurentPage'] = &$this->data['TMap'][$this->data['Content']['upId']][$this->data['Content']['id']];
//print_r($this->data['TMenu']);
//   */
//======================= Меню ===============================

//======================= Блок ===============================
//* 

$this->lang->load('block');
// левый блок

$this->data['Block']['blocknamenews']=$this->lang->line('blocknamenews');
$this->data['Block']['dalee']=$this->lang->line('dalee');
$this->data['Block']['news'] = $this->news_model->getPublicBlock('news');//table
//$this->data['Block']['blocklinknews']='/news/show/';
$this->data['Block']['blocklinknews2']='/news';

$this->data['Block']['blocknamepress']=$this->lang->line('blocknamepress');
$this->data['Block']['press'] = $this->news_model->getPublic('press',$this->config_model->getConfigName('kolblockpress')); //table
$this->data['Block']['blocklinkpress']='/press/show/';
$this->data['Block']['blocklinkpress2']='/press/';
//   */
  
//*  
// правый блок
$this->data['Block']['blocknameportfolio']=$this->lang->line('blocknameportfolio');
$this->data['Block']['link']=$this->lang->line('link');
//$this->data['Block']['portfolio'] = $this->portfolio_model->getPublicBlock('portfolio'); //table
if(!empty($this->data['Block']['portfolio'])):
$this->data['Block']['portfolio']->link3='/portfolio';
endif;

$this->data['Block']['blocknamecontacts']=$this->lang->line('blocknamecontacts');
$this->data['Block']['contacts']->text = $this->config_model->getConfigName('contacts');
if(!empty($this->data['Block']['contacts'])):
   $this->data['Block']['contacts']->link='/contacts';
endif;
//   */
  
  
/*  
// умные фразы
$this->data['Mudrost']= $this->mudrost_model->getValue(1);

$this->data['Baner']['sideright']=$this->baner_model->getValue(1);

//   */
//======================= Блок ===============================

//*  
$this->data['papka']    = 'phpfiles';
$this->data['tplpapka'] = 'tplfiles';
$this->data['template_file_path'] = "tpl/page.tpl";

//print"<br> ----- ";
 //  print_r($this->data['auth']);
//print"<br> ----- ";


  }

  
function _remap(){
	//print$metod;
	$this->index();
    }


    
    
function captcha()
    { // print "<br> --------- ";
        $this->load->library('kcaptcha');
        $this->db_session->set_userdata('captcha', $this->kcaptcha->getKeyString());
        exit;
        
    }    
   
function check_captcha($str)
    {
        if ($str !== $this->db_session->userdata('captcha'))
        {
        	//$this->lang->load('forma',$this->db_session->userdata('lang'));
        	$this->CI =& get_instance();
        	$this->lang->load('validation',$this->db_session->userdata('lang'));
        	//print_r($this->CI->lang->language->required);
            //$this->validation->set_message('check_captcha', 'Не правильно заполнено поле \'<b>Код на картинке</b>\'');
            $this->validation->set_message('check_captcha', $this->CI->lang->language['code']);
            
            return false;
        }
        else
        {
            return true;
        }
    }
    
    
   function trf()
    {
    	$t=$this->uri->segment(3);
        $f = $this->uri->segment(4);
        $id = $this->uri->segment(5);
        $x = $this->uri->segment(6);
        $y = $this->uri->segment(7);

        $this->load->plugin('trf');

         create_image_resized($t, $f, $id, $x, $y, $this);

        exit;
    }
    
    
	function AddStyle($styleString)
	{	
		if(isset($this->data['StylesArray'])) 
			$dataStyle = $this->data['StylesArray'];
		else return false;
		
		$stylesArray = explode('|',$styleString);
		$styleString = '';
		foreach ($stylesArray as $style)
		{
			$style = trim($style);
			if(isset($dataStyle[$style]))
			$styleString .= $dataStyle[$style]."\n";
		}
		return $styleString;
	}
	function AddJs($jsString)
	{	
		if(isset($this->data['JsArray'])) 
			$dataJs = $this->data['JsArray'];
		else return false;
		
		$jsArray = explode('|',$jsString);
		$jsString = '';
		foreach ($jsArray as $js)
		{
			$js = trim($js);
			if(isset($dataJs[$js]))
			$jsString .= $dataJs[$js]."\n";
		}
		return $jsString;
	}
    
}
?>
