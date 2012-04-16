<?php
class Base1 extends Controller
{
    var $data;
    private $resource =  null;
    private $priviledge = null;

    // роль которая используется если роль пользователья не определена
    protected $default_role = 'guest';


    function Base1()
    {
        parent::Controller();
        
        $this->load->model('config_model');
       // $this->config->load('admin');
       $this->router =& load_class('Router');
       
       $this->_log_check();
       $this->_access_check();

       session_start();
       
       if ($this->router->fetch_method() != 'trf'
       // && $this->router->fetch_method() != 'captcha'
        )
        {
            $this->initializeBase();
        }
       else   $this->trf();
    }

    
    function initializeBase()
    {
        //$this->data['lang'] = $this->db_session->userdata('lang');
        
        ///if(!$this->db_session->userdata('lang'))
		      $this->db_session->set_userdata('lang', 'no');
		//$this->data['lang'] = $this->db_session->userdata('lang');
		
	//	if($this->config_model->isLang()) 
		 //  header("location:/".$this->db_session->userdata('lang').$this->uri->uri_string());
		   //header("location:/".$this->db_session->userdata('lang').$this->uri->uri_string());
		   //print"<br> ------- ".$this->db_session->userdata('lang')." --- ".$this->uri->uri_string();
	///	else
		//   $this->db_session->set_userdata('lang', $this->uri->segment(1));
        
        
       $this->data['lang'] = $this->db_session->userdata('lang');		   
		   
        
        
        
        
        // FIX it. Move to DB
       // $this->data["keywords"] = "";

        // FIX it. Move to DB
        //$this->data["description"] = "";


        //		$l_lang['r'] = array(
        //			'Вы авторизованы как:',
        //			'Выйти',
        //			'Войти'
        //		);
        //		$l_lang['u'] = array(
        //			'Ви авторизовані як:',
        //			'Вийти',
        //			'Увійти'
        //		);
        //		$l_lang['e'] = array(
        //			'You are authorized as:',
        //			'Logout',
        //			'Login'
        //		);
        //		$this->data['l_auth'] = $l_lang[$this->data['lang']];

        //		$this->data['catalog'] = $this->main_model->getRooms();
        //		$this->data['curRoom'] = $this->uri->segment(3, 0);
        $this->data["msg"] = '';

        //		if ($this->uri->segment(2, '') != 'compare')
        //			$this->data['decor'] = true;
        //		else
        //			$this->data['decor'] = false;

        //		$this->data['advert'] = $this->load->view('advert.inc.php', $this->data, TRUE);
        //		$this->data['menu'] = $this->load->view('menu.inc.php', $this->data, TRUE);
        //		$this->data['footmenu'] = $this->load->view('footmenu.inc.php', $this->data, TRUE);
        //		$this->data['logo'] = $this->load->view('logo.inc.php', $this->data, TRUE);
        //		$this->data['userinfo'] = $this->load->view('userinfo.inc.php', $this->data, TRUE);
        //
        //		$this->data['basketData'] = $this->order_model->getBasket();
        //		$this->data['basket'] = $this->load->view('basket.inc.php', $this->data, TRUE);
        //		$this->data['basketJS'] = $this->load->view('js/basket.inc.php', $this->data, TRUE);
    }

  

    function _sendAdminMsg($subj, $txt)
    {
        $subj = $_SERVER['HTTP_HOST']."/".$subj."/ - ".date("Y-m-d H:i:s");
        $subj = mb_convert_encoding($subj, 'cp1251', 'utf8');

        require_once APPPATH."libraries/swift/Swift.php";
        require_once APPPATH."libraries/swift/Swift/Connection/SMTP.php";

        //Start Swift
        try {
            $smtp =& new Swift_Connection_SMTP($this->config->item('A_SMTP'), $this->config->item('A_SMTP_port'));
            $smtp->setUsername($this->config->item('A_SMTP_user'));
            $smtp->setpassword($this->config->item('A_SMTP_pass'));

            $swift =& new Swift($smtp);

            //Create the message
            $message =& new Swift_Message($subj);
            $message->attach(new Swift_Message_Part($txt, "text/plain", "base64", "UTF-8"));

            $message->headers->setLanguage("ru");
            $message->headers->setCharset("cp1251");

            $recipients =& new Swift_RecipientList();
            $recipients->addTo($this->config->item('A_admin_mail'));
            //Use addCc()
            foreach ($this->config->item('A_admin_mail_CC') AS $val)
            $recipients->addCc($val);

            //echo $message->headers->build();

            //Now check if Swift actually sends it
            $swift->send($message, $recipients, $this->config->item('A_admin_mail_From'));
            $data['error']="Сообщение отослано.";
            return true;
        } catch (Swift_ConnectionException $e) {
            $data['error']="Cообщение не может быть отправлено."
            ." Пожалуйста, сообщите администратору сервиса по адресу<br />"
            ." <a href=\""
            .$this->config->item('A_admin_mail')."\">"
            .$this->config->item('A_admin_mail')."</a>"
            .'<div style="padding-top: 10px; font-weight: normal; font-size: 0.8em;"> ['."There was a problem communicating with SMTP: " . $e->getMessage().']</div>';
            return false;
        } catch (Swift_Message_MimeException $e) {
            $data['error']="Cообщение не может быть отправлено."
            ." Пожалуйста, сообщите администратору сервиса по адресу<br />"
            ." <a href=\""
            .$this->config->item('A_admin_mail')."\">"
            .$this->config->item('A_admin_mail')."</a>"
            .'<div style="padding-top: 10px; font-weight: normal; font-size: 0.8em;"> ['."There was an unexpected problem building the email:" . $e->getMessage().']</div>';
            return false;
        }
    }

    function _code_check($str)
    {
        $cap = $this->db_session->userdata('captcha_keystring');
        if (strtolower($str) != strtolower($cap))
        {
            $this->validation->set_message('_code_check', '%s не совпадает с отображенным на картинке');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    // if user not logined go to login
    function _log_check()
    {
        $this->load->model('auth_model');

        $this->data["authed"] = false;

        $user = $this->db_session->userdata('auth');
 //       echo "111111111";
//print_r($user);
//print_r($this->auth_model->isUser($user["login"], $user["pass"]));

        if ($user["login"] != "" && $user["pass"] != ""
        && $this->auth_model->isUser($user["login"], $user["pass"]))
        {
            $this->data["authed"] = true;
            $this->default_role = $groups = $this->auth_model->getUserGroups($user["login"]);
            $this->data['auth']["mail"] = $user["mail"];
            $this->data['auth']["userData"] = $this->auth_model->getUser($user['login']);
            $this->data['auth']["logDate"] = $user["logDate"];
            //print_r( $this->default_role);
        }
        else
        {
            $this->default_role = array('guest');
        }

        // update activity
/*        $log = $this->db_session->userdata('logDate');
        if (isset($log) && $log != "")
        {
            $this->db_session->sess_update();
        }
        else
        {
            $this->db_session->set_userdata('log',date("Y-m-d H:i:s"));
        }
*/
    }

  /***************************************
    
    
    /**
	 * Enter description here...
	 *
	 */
    function _access_check()
    {
        $this->load->model('auth_model');

        // Получаем наш объект из хелпера
        $acl = $this->auth_model->initialization_Acl();
//print_r($acl);
        // обращаемся по ссылке к роутеру для последующего доступа к методам
        $router =& load_class('Router');
        

        // при помощи методов роутера  определяем ресурс и action и устанавливаем их в переменные
        $this->resource = $router->fetch_class();
        $this->priviledge = $router->fetch_method();
        
       // print_r( $this->default_role);

        ///print_r($router);
        // здесь получаем инфу о пользователе и устанавливем её в $default_role
        $allowed = false;
        foreach ($this->default_role as $val)
        {
            try
            {
            	//print"< br> -- ".$this->resource;
            	//print"< br> -- ".$this->priviledge;

                if($acl->isAllowed($val, $this->resource, $this->priviledge))
                {
                    $allowed = true;
                }
            }
            catch(Exception $e)
            {
            }
        }

        if (!$allowed) $this->accessDeny();
       
    }

    /**
	 * Enter description here...
	 *
	 */
    
    
    function accessDeny()
    {
        $user = $this->db_session->userdata('auth');
        
		//header("Location: /");
        echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /></head><base>Доступ <strong>",$user["login"],"</strong> к странице запрещен.</base></html>";
        exit;
    }

}
?>
