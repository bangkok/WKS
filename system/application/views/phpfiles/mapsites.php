<?//print_r($MenuLeft);
if(!empty($Menu)):$i=0; foreach ($Menu as $m):$i++;?>
       <div style="padding-left:5px; margin-top:8px;"><a style="font-size:18px;" href="<?=$m['link']?>" title="<?//=$m['name']?>"><?=$i?>. <?=$m['name']?></a></div>
         <?if(!empty($m['child'])):$j=0;
              foreach ($m['child'] as $m1):$j++;?>
                   <div style="padding-left:25px;margin-top:2px;"><a  style="font-size:14px;" href="<?=$m1['link']?>" title="<?//=$m1['name']?>"><?=$i?>.<?=$j?>. <?=$m1['name']?></a></div>
                       <?if(!empty($m1['child'])):$z=0;
                             foreach ($m1['child'] as $m2):$z++;?>
                                 <div style="padding-left:50px;"><a  style="font-size:12px;" href="<?=$m2['link']?>" title="<?//=$m2['name']?>"><?=$i?>.<?=$j?>.<?=$z?>. <?=$m2['name']?></a></div><?
                             endforeach;
                         endif;
             endforeach;
          endif;
endforeach;
endif;?>



