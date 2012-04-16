<?if(!empty($Content['pathsites'])):?>
   <div id="pathtop"><ul>
       <?$i=0;foreach ($Content['pathsites'] as $m):$i++;?>
          <li onmouseout="return display('menu_child<?=$i?>');" onmouseover="return display('menu_child<?=$i?>');">
             <a href="<?=$m['link']?>" title="<?//=$m['name']?>"><?=$m['name']?></a>
               <?if(!empty($m['child'])){?>
                  <div class="display_off" id="menu_child<?=$i?>">
                    <div id="pathsiteschild">
                     <?foreach ($m['child'] as $m1):if($m['link']!=$m1['link']):?>
                        <div id="pathsiteschildzapis">
                            <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0"><tr><td>
                                <a href="<?=$m1['link']?>"><?=$m1['name']?></a>
                            </td></tr></table>
                        </div>
                        <div id="pathsiteschildline"><table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0"><tr><td></td></tr></table></div>
                     <?endif;endforeach;?>
                    </div>
                   </div>
                <?}?>
               </li>
               <?if(end($Content['pathsites'])!=$m):?>
                 <li>&nbsp;&raquo;&nbsp;</li>
               <?endif;?>  
             
          <?endforeach;?>
      
   </ul></div>
<?endif;?>