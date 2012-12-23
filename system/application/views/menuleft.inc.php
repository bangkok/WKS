<ul style="padding:0px;"><?if(!empty($Menu))foreach ($Menu as $m):
   if(!stristr($this->uri->uri_string(), $m['link'])):?>
     <li class="menuleftelem">
       <a class="menuleft" href="<?=$m['link']?>" title="<?=$m['name']?>"><?=$m['name']?></a>
         <?if(!empty($m['child'])):?>
           <ul class="menuleftchild"><?
              foreach ($m['child'] as $m1):?>
               <li><?if(!stristr($this->uri->uri_string(), $m1['link'])):
                   ?><a class="menuleft2" href="<?=$m1['link']?>" title="<?=$m1['name']?>"><?=$m1['name']?></a><?
                     else:?><span class="menuleftakt2"><?=$m1['name']?></span><?endif;
                   ?></li><?
              endforeach;
          ?></ul><?
          endif;
   else:?>
       <li class="menuleftelem">
         <span class="menuleftakt"><?=$m['name']?></span>
            <?if(!empty($m['child'])):?>
              <ul class="menuleftchild"><?
              foreach ($m['child'] as $m1):?>
               <li><?if(!stristr($this->uri->uri_string(), $m1['link'])):
                   ?><a class="menuleft2" href="<?=$m1['link']?>" title="<?=$m1['name']?>"><?=$m1['name']?></a><?
                     else:?><span class="menuleftakt2"><?=$m1['name']?></span><?endif;
                   ?></li><?
              endforeach;
             ?></ul><?
            endif;
   endif;?>
    </li>
   <?endforeach;?>
</ul>

