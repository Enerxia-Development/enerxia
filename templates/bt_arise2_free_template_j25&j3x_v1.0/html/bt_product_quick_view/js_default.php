<?php echo $jshoppingJS;?>
<div id="btpqv-wrapper">
	<div class="left-side">
		<div class="product-image">
			<img src="<?php echo $jshopConfig->image_product_live_path . '/' . (isset($product->image) ? $product->image : $product->product_full_image)?>" alt="<?php echo $product->{'name_' . $language->getTag()}?>"/>
		</div>
	</div>
	<div class="right-side">
		<h4 class="product-name"><?php echo $product->{"name_" . $language->getTag()}?></h4>
		<form action="<?php echo SEFLink('index.php?option=com_jshopping&controller=cart&task=add',1)?>" method="post">
			<input type="hidden" name="to" id='to' value="cart" />
			<input type="hidden" name="product_id" id="product_id" value="<?php echo $product->product_id?>" />
			<input type="hidden" name="category_id" id="category_id" value="<?php echo $categoryId?>" />
			<?php if($this->params->get('show_price', 1)){?>
			<div class="btpqv-row product-price">
				<span class="textLeft"><?php echo JText::_('BTPQV_PRICE')?></span><span class="splitTextLeft">:</span>
				<span id="block_price"><?php print formatprice($product->getPriceCalculate())?></span>
			</div>
			<?php }?>
			<?php if($this->params->get('show_rating', 1)){
			$count = floor($jshopConfig->max_mark / $jshopConfig->rating_starparts);
			$width = $count * $this->params->get('start_width', 13);
			$rating = $product->average_rating;
			?>
			<div class="btpqv-row">
				<span class="textLeft"><?php echo JText::_('BTPQV_RATING')?></span>	<span class="splitTextLeft">:</span>
				<span class="btpqv-row-rating">
					<span class="product-rating">
					<?php if (empty($rating) || $rating === 0){?>
						<span style="width: <?php echo $width?>px;" title="<?php echo JText::_('BTPQV_RATING_UNRATE')?>" class="ratingbox" style="display:inline-block;">
					<?php }else{
						$width_active = intval($rating * $this->params->get('start_width', 13) / $jshopConfig->rating_starparts);
					?>
						<span style="width: <?php echo $width?>px;" title="<?php echo JText::_("RATING") . ' ' . $rating . '/' . $jshopConfig->max_mark ?>" class="ratingbox" style="display:inline-block;">
							<span class="" style="width: <?php echo $width_active?>px"></span>
					<?php }?>
						</span>
					</span>
				
			
				</span>
			</div>
			<?php }?>
			<?php if($this->params->get('show_short_desc', 1)){?>
			<div class="btpqv-row">
			<?php echo $product->{'short_description_' . $language->getTag()}?>
			</div>
			<?php }?>
			
			<?php if($this->params->get('show_add_to_cart', 1) && $this->params->get('show_cart_attrs', 0)){?>
			<div class="btpqv-row">
				<?php if (count($product->attributes)){?>
				<div class="product-attributes">
					<?php foreach($product->attributes as $attribute){?>
						<?php if ($attribute->grshow){?>
						<div class="product-attribute-group"><?php print $attribute->groupname?></div>
						<?php }?>
					
						<div class="product-attribute">
							<span class="textLeft"><?php print $attribute->attr_name?></span><span class="splitTextLeft">:</span>
							<span class="attribute-description"><?php print $attribute->attr_description;?></span>
							<span class="attribute-input">
								<?php print $attribute->selects?>
							</span>
						</div>
					<?php }?>
					
				</div>
		
				<?php }?>
				<?php if (count($product->freeattributes)){?>
				<div class="product-free-attributes">
					<?php foreach($product->freeattributes as $freeattribute){?>
					<div class="product-attribute">
						<span class="textLeft"><?php echo $freeattribute->name;?></span> <?php if ($freeattribute->required){?><span>*</span><?php }?></span>
						<span class="splitTextLeft">:</span>
						<span class="freeattribute-description"><?php print $freeattribut->description;?></span>
						<span class="freeattribute-field"><?php echo $freeattribute->input_field;?></span>
					</div>
					<?php }?>
					<?php if ($product->freeattribrequire) {?>
					<div class="requiredtext">* <?php print _JSHOP_REQUIRED?></div>
					<?php }?>
				</div>
				<?php }?>
			</div>	
			<?php }?>
			<?php if($this->params->get('show_add_to_cart', 1) || ($this->params->get('show_add_to_whislist', 1))){?>
			<div class="btpqv-row">
				<?php if($this->params->get('show_add_to_cart', 1)){?>
				<input type="number" name="quantity" id="quantity" onkeyup="reloadPrices();" class="inputbox" value="1" />
				<input type="submit" class="button" id="btpqv-add-to-cart" value="<?php echo _JSHOP_ADD_TO_CART?>" onclick="jQuery('#to').val('cart');" />
				<?php }?>
				<?php if( $this->params->get('show_add_to_whislist', 1) && $jshopConfig->enable_wishlist){?>
				<input type="submit" class="button" id="btpqv-add-to-whistlist" value="<?php echo _JSHOP_ADD_TO_WISHLIST?>" onclick="jQuery('#to').val('wishlist');" />
				<?php }?>
			</div>
			<?php }?>
			<?php if($this->params->get('show_category', 1) && isset($category)){?>
			
			<div class="btpqv-row product-category">
				<span class="textLeft"><?php echo JText::_('BTPQV_CATEGORY')?></span></span><span class="splitTextLeft">:</span>
				<span><?php echo $category->name?></span>
			</div>			
			<?php }?>
			<?php if($this->params->get('show_quantity', 1)){?>
			<div class="btpqv-row">
				<span class="textLeft"><?php echo JText::_('BTPQV_QUANTITY')?></span></span><span class="splitTextLeft">:</span>
				<span><?php echo intval($product->product_quantity)?></span>
			</div>
			<?php }?>
			
			<?php
			$shareButtons = $this->params->get('share_buttons', array());  
			if(count($shareButtons)){?>
			<div class="btpqv-row social-share">
				<span class="textLeft"><?php echo JText::_('BTPQV_SHARE')?></span><span class="splitTextLeft">:</span>
				<span>
					<?php if(in_array('facebook', $shareButtons)){?>
				 	<a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($product->link)?>"></a>
				 	<?php }?>
				 	<?php if(in_array('twitter', $shareButtons)){?>
					<a class="twitter" href="https://twitter.com/share?text=<?php echo urlencode($product->product_name . '.' . $product->product_s_desc)?>&url=<?php echo urlencode($product->link)?>" target="_blank"></a>
					<?php }?>
					<?php if(in_array('google', $shareButtons)){?>
					<a class="google" target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode($product->link)?>"></a>
					<?php }?>
				</span>
			</div>
			<?php }?>
			
		</form>
	</div>
	<div style="clear:both;"></div>
</div>
