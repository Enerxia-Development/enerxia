<?php
/**
 * @package 	mod_bt_contentslider - BT ContentSlider Module
 * @version		1.4
 * @created		Oct 2011

 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2012 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 *
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
if($modal){JHTML::_('behavior.modal');}
$document = JFactory::getDocument();
if(count($list)>0){?>
<div id="btcontentslider<?php echo $module->id; ?>" style="width:<?php echo $moduleWidthWrapper;?>" class="bt-cs-accordion bt-cs<?php echo $moduleclass_sfx? ' bt-cs'.$params->get('moduleclass_sfx'):'';?>">

	<?php 
		if( trim($params->get('content_title')) ){
	?>
	<h3>
		<?php if($params->get('content_link')) {?>
			<a href="<?php echo $params->get('content_link');?>"><span><?php echo $params->get('content_title') ?> </span></a>
		<?php } else { ?>
			<span><?php echo $params->get('content_title') ?> </span>                    
		<?php   }?>
	</h3>
	<?php } ?>
	
	<div class="bt-cs-wrapper">
		<?php 
		foreach($pages as $list){
			foreach($list as $row){
		?>
			<div class="bt-item">
				<a class="bt-item-title" href="<?php echo $row->link?>"><?php echo $row->title_cut ?></a>
				<div class="bt-item-wrapper">
					<div class="bt-item-thumbnail" style="<?php if ($align_image != 'center') {echo 'float: ' . $align_image . ';'; echo 'margin-' . ($align_image == 'left' ? 'right' : 'left') . ': 5px;';}else{echo 'text-align: center';}?> ">
						<a target="<?php echo $openTarget; ?>" class="bt-image-link<?php echo $modal? ' modal':''?>" title="<?php echo $row->title;?>" href="<?php echo $modal?$row->mainImage:$row->link;?>" title="<?php echo $row->title?>" >
							<img <?php echo $imgClass ?>  src="<?php echo $row->thumbnail; ?>" alt="<?php echo $row->title?>"  style="width:<?php echo $thumbWidth ;?>px;" />
						</a> 
					</div>
					<div class="bt-item-content" style="<?php if ($align_image != 'center') {echo 'float: ' . $align_image . ';';}?>">
						<?php if( $show_category_name ): ?>
							<?php if($show_category_name_as_link) : ?>
						<a class="bt-category" target="<?php echo $openTarget; ?>" title="<?php echo $row->category_title; ?>" href="<?php echo $row->categoryLink;?>">
							<?php echo $row->category_title; ?>
						</a>
						<?php else :?>
						<span class="bt-category"> <?php echo $row->category_title; ?> </span>
						<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if( $showAuthor || $showDate ): ?>
						<div class="bt-extra">
						<?php if( $showAuthor ): ?>
							<span class="bt-author"><?php 	echo JText::sprintf('BT_CREATEDBY' ,
							JHtml::_('link',JRoute::_($row->authorLink),$row->author)); ?>
							</span>
							<?php endif; ?>
							<?php if( $showDate ): ?>
							<span class="bt-date"><?php echo JText::sprintf('BT_CREATEDON', $row->date); ?>
							</span>
							<?php endif; ?>
						</div>
						<?php endif; ?>
						
						<?php if( $show_intro ): ?>
						<div class="bt-introtext">
						<?php echo $row->description; ?>
						</div>
						<?php endif; ?>

						<?php if( $showReadmore ) : ?>
						<div class="readmore">
							<a target="<?php echo $openTarget; ?>"
								title="<?php echo $row->title;?>"
								href="<?php echo $row->link;?>"> <?php echo JText::_('READ_MORE');?>
							</a>
						</div>
						<?php endif; ?>
					</div>
					<div style="clear:both"></div>
				</div>
			</div>
		<?php 
			}
		}?>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var isProcessing = false;
			$('.bt-cs-accordion .bt-item').each(function(index){
				$(this).find('.bt-item-wrapper').hide();
			});
			$('.bt-cs-accordion .bt-item').eq(0).addClass('actived').find('.bt-item-wrapper').show();
			$('.bt-cs-accordion .bt-item-title').click(function(){
				if(isProcessing || $(this).parent().hasClass('actived')) return false;
				else{
						isProcessing = true;
						$('.bt-cs-accordion .bt-item.actived').removeClass('actived').find('.bt-item-wrapper').slideUp(300);
						$(this).parent().addClass('actived').find('.bt-item-wrapper').slideDown(300, function(){isProcessing = false;});
				}
				return false;
			});
			
		});
	</script>
</div>
<?php 

}
else
{ 
	echo '<div>No result...</div>'; 
} ?>