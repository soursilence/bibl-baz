<?php
/*
* Plik: tmpl/default.php
*/
defined('_JEXEC') or die ('brak dostępu');
$links= "";
$licz = 0;
$item_arr = array();



 /*foreach ($res as $k => $v)
{	  
  $links .= '<a class="minigalerialink" href="?option=com_content&view=article&id='.$r->articleid.'" target="_self"><img src="'.$r->imglink.'" width="77" height="51" class="thumb" /></a>
';

  $item_arr[$licz]['link'] = $r->imglink;
  $item_arr[$licz]['id'] = $r->articleid;

$licz++;
}*/
?>
<script type="text/javascript">
ile = <?php echo count($res); ?>;
<?php /*var ktory = 1;
  jQuery.noConflict();
  (function($) {

    $(document).ready( function(){
      $(".next").click(function(){
      if(ktory<ile)
      ktory ++;
      else
      ktory=1;
        $(".minig_it").children().css("display", "none").filter(function (index) {
                  return index == (ktory-1);
                })
            .css("display", "block");
        return false;
      });
      $(".prev").click(function(){

      if(ktory==1)
      ktory = ile;
      else
      ktory--;
        $(".minig_it").children().css("display", "none").filter(function (index) {
                  return index == (ktory-1);
                })
            .css("display", "block");
        return false;
      });
    });
  })(jQuery);   */ ?>   
</script>
        	<div id="sidebar_section">
                <div class="head">
                  <div class="name">
                	    Фото
                  </div>
                    <div class="option">
                        <!--<a href="others.html#gallery" target="_self">
                    	   	 Фотогалерея >
                        </a>-->
                    </div>

                </div>
              <div class="gallery">
                <div class="repeat1">
                	<div class="prev">
                    	<a href="#">
                        	&lt;
                        </a>
                    </div>
		    <div class="minig_it">
		    <?php
                    //print_r($res);
                    $style = '';
                     foreach ($res as $k => $v)
{ ?>
               	      <div class="featured"<?php echo $style?>> <a id="minigaleriamf" href="?option=com_joomgallery&amp;func=viewcategory&amp;catid=<?php echo $k; ?>" target="_self">
			   <img src="<?php echo 'images/joomgallery/thumbnails/'.$v['path'].'/'.$v['img']; ?>" alt="<?php echo $v['imgtitle']; ?>" title="<?php echo $v['tit']; ?>" width="180" height="120" border="0" class="img-center" /></a>

                      </div>
                    <?php
		    $style = ' style="display: none;"';
		     } ?>
                    </div>
                    <div class="next">
                    	<a href="#">
                     		&gt;
                        </a>
                    </div>
                <!--  <div class="navi"> <?php
		 echo $links; ?>
	

                  </div>
                  <div class="mnext">
                    	<a href="?option=com_content&view=article&id=<?php echo $item_arr[0]['id']; ?>&Itemid=2" target="_self">
                        	&lt;
                        </a>
                    </div>  
                  	<div class="mprev">
                    	<a href="?option=com_content&view=article&id=<?php echo $item_arr[2]['id']; ?>&Itemid=2" target="_self">
                        	&gt;
                        </a>

                    </div>   
		    -->                                                       

                </div>
			</div>
                <div class="bottom">
                </div>            
            </div>


