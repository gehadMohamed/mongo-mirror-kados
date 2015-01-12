<?php
/**
 * Deck to store tasks out of the matrix dashboard
 *
 * PHP versions 4 and 5
 *
 * @category Scripts
 * @package  DashBoardItemManagement
 * @author   Charles Santucci <charles@santucci.fr>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * */
 
 ?>
<div class="deck"><?php
  if (count($deckItemsArray)==0)
  {
    echo $text_deck_is_empty;
  }
  for ($k=0;$k<count($deckItemsArray);$k++)
  {?>
      <div class="note_deck <?php echo $deckItemsArray[$k]['color'];?>" style="width:<?php echo $itemWidth;?>px;" onMouseOut="javascript:hideNoteDeck();" onMouseOver="javascript:showNoteDeck();">
	     <div class="item-header" >
		  <span class="deck_header-left"><a href="<?php echo $targetFileAction.'&remove_from_deck='.$deckItemsArray[$k]['parent_id'];?>" ><img src="<?php echo $pathImages.'app/plus.png';?>" border="0"></a></span>
		  <span class="deck_postit_id"><?php echo $firstColumnObjectTag.$deckItemsArray[$k]['display_number'];?></span>
		  <span class="deck_postit_header-right"><?php 
		    if (isset($firstColumnFunctionForHeaderStamp))
			{
		      call_user_func($firstColumnFunctionForHeaderStamp,array($deckItemsArray[$k]['parent_id'],$deckItemsArray[$k]['header_stamp'],false,$boardFinalStatusTag,'')); 
			}
            else
            {
              echo htmlspecialchars($deckItemsArray[$k]['header_stamp']);
            }?></span>	
            <span class="clearright"></span>
		 </div>
		 <div class="deck_postit_text" style="width:<?php echo ($itemWidth-$itemWidthBodyMargin);?>px;height:<?php echo ($itemHeight-$itemHeightBodyMargin);?>px;"><?php echo make_clickable(nl2br(htmlspecialchars($deckItemsArray[$k]['text'])));?></div>
	     <div class="deck_item-footer">
		    <span class="deck_postit_footer-left"><?php 
			if (isset($deckItemsArray[$k]['infoBottomLeft']))
			{
		      if (isset($firstColumnFunctionForBottomLeft)) 
			  { 
			    call_user_func($firstColumnFunctionForBottomLeft,$deckItemsArray[$k]['infoBottomLeft']);
			  }
			  else
			  {
			    echo $deckItemsArray[$k]['infoBottomLeft'];
			  }
			} ?>
			</span>
		    <span class="deck_postit_footer-right"><?php 
		  	if (isset($deckItemsArray[$k]['infoBottomRight']))
			{
		      if (isset($firstColumnFunctionForBottomRight)) 
			  { 
			    call_user_func($firstColumnFunctionForBottomRight,$deckItemsArray[$k]['infoBottomRight']);
			  }
			  else
			  {
			    echo $deckItemsArray[$k]['infoBottomRight'];
			  }
			} ?>				
			</span>
		 </div>			 
	  </div><?php
	}?>
</div>
<div class="clearleft"></div>

<script>
hideNoteDeck();
</script>