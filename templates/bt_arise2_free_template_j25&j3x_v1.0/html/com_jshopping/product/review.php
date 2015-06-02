<?php defined('_JEXEC') or die(); ?>
<?php if ($this->allow_review){?>
		
		
		<div class="jShopReviewList">
			<div class="review_title"><?php print _JSHOP_REVIEWS?></div>
				<?php foreach($this->reviews as $curr){?>
					<div class="review_item">
					<div class="reviewItemHeader">
						<span class="review_user"><?php print $curr->user_name?></span>
						<!--<span class='review_time'><?php print formatdate($curr->time);?></span>-->
						<span class='review_time'>
							<?php echo JText::_('JSHOP_DETAIL_REVIEW_ITEM_POSTED'); ?>
							<?php echo JHTML::_('date', $curr->time , JText::_('d.m.Y')); ?>
						</span>
						<?php if ($curr->mark) {?>
							<div class="review_mark"><?php print showMarkStar($curr->mark);?></div>
						<?php } ?> 
					</div>
					<div class="review_text"><?php print nl2br($curr->review)?></div>
					
					</div>
				<?php }?>
		
			<?php if ($this->display_pagination){?>
				<div class="jshop_pagination">
					<div class="pagination"><?php print $this->pagination?></div>
				</div>
			<?php }?>
		</div>
	
    <?php if ($this->allow_review > 0){?>
        <?php JHTML::_('behavior.formvalidation'); ?> 
        <div class="review_title reviewForm"><?php print _JSHOP_ADD_REVIEW_PRODUCT?></div>
        <form action="<?php print SEFLink('index.php?option=com_jshopping&controller=product&task=reviewsave');?>" name="add_review" method="post" onsubmit="return validateReviewForm(this.name)">
        <input type="hidden" name="product_id" value="<?php print $this->product->product_id?>" />
        <input type="hidden" name="back_link" value="<?php print jsFilterUrl($_SERVER['REQUEST_URI'])?>" />
        <?php echo JHtml::_('form.token');?>
        <div id="jshop_review_write" >
			<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="jShopReviewField jShopReviewUsername">
								<input placeholder="<?php print _JSHOP_REVIEW_USER_NAME?>" type="text" name="user_name" id="review_user_name" class="inputbox" value="<?php print $this->user->username?>"/>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="jShopReviewField jShopReviewEmail">
								<input placeholder="<?php print _JSHOP_REVIEW_USER_EMAIL?>" type="text" name="user_email" id="review_user_email" class="inputbox" value="<?php print $this->user->email?>" />
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="jShopReviewField jShopReviewMessage">
								<textarea placeholder="<?php print _JSHOP_REVIEW_REVIEW?>" name="review" id="review_review" class="jshop inputbox"></textarea>
							</div>
						</div>
						<div class="col-xs-12">
							<div>
							<span class="reviewFormRateItem"><?php print _JSHOP_REVIEW_MARK_PRODUCT?></span>
								<?php for($i=1; $i<=$this->stars_count*$this->parts_count; $i++){?>
									<input name="mark" type="radio" class="star {split:<?php print $this->parts_count?>}" value="<?php print $i?>" <?php if ($i==$this->stars_count*$this->parts_count){?>checked="checked"<?php }?>/>
								<?php } ?>
							</div>
						</div>
						<?php print $this->_tmp_product_review_before_submit;?>
			
			</div>
			
            <div class="jShopReviewSubmitButton">
               
                <div>
                    <input type="submit" class="button validate" value="<?php print _JSHOP_REVIEW_SUBMIT?>" />
                </div>
            </div>
        </div>
        </form>
    <?php }else{?>
        <div class="review_text_not_login"><?php print $this->text_review?></div>
    <?php } ?>
<?php }?>