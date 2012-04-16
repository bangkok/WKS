<div style="margin:50px 0 10px 0;">

   <div id="comments_line" style="padding:2px;" onclick="strelka('strela'); return  display('comments');">
     <div id="strela"><?=$lfaq['zquestion']?> &#8595;</div>
   </div>
   
   <div  id="comments" class="display_on">
     <div style="margin:5px 0 0 0;"><?$this->load->view($tplpapka."/qwestion/qwestion_input.tpl",$this->data);?></div>
   </div>  

</div>

