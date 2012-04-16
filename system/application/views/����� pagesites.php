<?$this->load->view('head.inc.php',$this->data);?>

   <div id="container">
       <div style="height:3px; background-color:#005399;  "></div>
       <div id="header">
         <div id="logo"><a href="/"><img src="/img/design/logo.jpg"></a></div>
       </div>
       <div style="height:3px; background-color:#005399;  "></div>
       <?/*<div id="pathsites"><?$this->load->view('pathsites.inc.php', $this->data)?></div>*/?>
       
       
       <div id="wrapper">
              <div id="content">
       	       <div id="namecontent"><h1><?=$Content['name']?></h1></div>
               <div id="textcontent"><?=$Content['text']?></div>
              </div>
       </div>       
       
       

       <?/*<div id="rightblock"><?$this->load->view('sideright.inc.php', $this->data)?></div>*/?>
       
       <div id="leftblock"><?$this->load->view('sideleft.inc.php', $this->data)?></div>
       
       <div id="footer"><?$this->load->view('bottom.inc.php', $this->data)?></div>
   </div>

   
<div  id="slogan"><?=$Content['slogan']?></div>
<div  id="contacts"><?=$Content['contacts']?></div>
   
<?$this->load->view('footer.inc.php',$this->data);?>   
 
