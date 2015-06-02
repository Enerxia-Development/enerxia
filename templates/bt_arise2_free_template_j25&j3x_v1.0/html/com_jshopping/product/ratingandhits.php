<?php defined('_JEXEC') or die(); ?>
<?php if ($this->allow_review || $this->config->show_hits){?>
	<div>
		<?php if ($this->config->show_hits){?>
		<div class="productHit"><span><?php print _JSHOP_HITS?><span><?php print $this->product->hits;?></div>
		<?php } ?>
		
		<?php if ($this->allow_review){?>
		<div class="productVote"><span class="textLeft"><?php echo JText::_('JSHOP_REVIEW'); ?></span>
		<span class="splitTextLeft">:</span>
		<div class="productAverageRating"><?php print showMarkStar($this->product->average_rating);?></div>
		
		</div>
		<?php } ?>
	</div>
<?php } ?>