<?$this->load->view($papka.'/filtr', $this->data);?>

<?$this->load->view($tplpapka.'/colpagination.tpl', $this->data);?>

<?if(!empty($Product)):
if(isset($par['np'])):foreach ($Product as $p):?>
        <div style="float:left; "><h2><?=$p->name?></h2></div>
        <div style="float:left; margin:20px 0 5px 0;" >
        <?if($p->img!=0):?>
          <div style="float:left; padding:2px; margin:0 10px 10px 0px;  border:0px solid #b10000;">
             <img src="/images/<?=$p->img?>.jpg" alt="<?=$p->name?>">
          </div>
        <?endif;?>  
        <?=$p->text?>
        </div>
<?endforeach;





else:

   foreach ($Product as $p):if($p->text!=''):?>
     <div class="product_okno">
      <div style="margin:5px;">
        <h2><a href="/products/np/<?=$p->id?>"><?=$p->name?></a></h2>
        
        <?if($p->simg!=0):?>
          <div style="float:left; padding:0 30px 20px 10px; border:0px solid #abb976;">
             <a title="<?=$p->name?>" href="/products/id/<?=$p->id?>"><img src="/images/<?=$p->simg?>.jpg" alt="<?=$p->name?>"></a>
          </div>
        <?endif;?>  
         <?=$p->text?>
        </div>
      </div>
   
   <?endif;	endforeach;
   
   
   
endif;

$this->load->view($tplpapka.'/pagination.tpl', $this->data);
endif;?>