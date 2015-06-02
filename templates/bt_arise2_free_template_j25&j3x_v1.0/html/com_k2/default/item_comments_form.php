<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<h3><?php echo JText::_('K2_LEAVE_A_COMMENT') ?></h3>

<?php //if($this->params->get('commentsFormNotes')): ?>
<!--<p class="itemCommentsFormNotes">
	<?php //if($this->params->get('commentsFormNotesText')): ?>
	<?php //echo nl2br($this->params->get('commentsFormNotesText')); ?>
	<?php //else: ?>
	<?php //echo JText::_('K2_COMMENT_FORM_NOTES') ?>
	<?php //endif; ?>
</p> -->
<?php //endif; ?>

<form action="<?php echo JURI::root(true); ?>/index.php" method="post" id="comment-form" class="form-validate">
	<div class="row">
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="inputField fieldName">
				<!--<label class="formName" for="userName"><?php //echo JText::_('K2_NAME'); ?> *</label>-->
				<input class="inputbox" type="text" name="userName" id="userName" value="<?php echo JText::_('K2_ENTER_YOUR_NAME'); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_('K2_ENTER_YOUR_NAME'); ?>';" onfocus="if(this.value=='<?php echo JText::_('K2_ENTER_YOUR_NAME'); ?>') this.value='';" />
			</div>
		</div>
		
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="inputField fieldEmail">
				<!--<label class="formEmail" for="commentEmail"><?php //echo JText::_('K2_EMAIL'); ?> *</label>-->
				<input class="inputbox" type="text" name="commentEmail" id="commentEmail" value="<?php echo JText::_('K2_ENTER_YOUR_EMAIL_ADDRESS'); ?>" onblur="if(this.value=='') this.value='<?php echo JText::_('K2_ENTER_YOUR_EMAIL_ADDRESS'); ?>';" onfocus="if(this.value=='<?php echo JText::_('K2_ENTER_YOUR_EMAIL_ADDRESS'); ?>') this.value='';" />
			</div>
		</div>
		
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="inputField fieldWebsite">
				<!--<label class="formUrl" for="commentURL"><?php // echo JText::_('K2_WEBSITE_URL'); ?></label>-->
				<input class="inputbox" type="text" name="commentURL" id="commentURL" value="<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>"  onblur="if(this.value=='') this.value='<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>';" onfocus="if(this.value=='<?php echo JText::_('K2_ENTER_YOUR_SITE_URL'); ?>') this.value='';" />
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="inputField fieldMessage">
				<!--<label class="formComment" for="commentText"><?php //echo JText::_('K2_MESSAGE'); ?> *</label>-->
				<textarea rows="20" cols="10" class="inputbox" onblur="if(this.value=='') this.value='<?php echo JText::_('K2_ENTER_YOUR_MESSAGE_HERE'); ?>';" onfocus="if(this.value=='<?php echo JText::_('K2_ENTER_YOUR_MESSAGE_HERE'); ?>') this.value='';" name="commentText" id="commentText"><?php echo JText::_('K2_ENTER_YOUR_MESSAGE_HERE'); ?></textarea>
			</div>
		</div>
			
			<?php if($this->params->get('recaptcha') && ($this->user->guest || $this->params->get('recaptchaForRegistered', 1))): ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<label class="formRecaptcha"><?php echo JText::_('K2_ENTER_THE_TWO_WORDS_YOU_SEE_BELOW'); ?></label>
					<div id="recaptcha"></div>
				</div>	
			<?php endif; ?>
					

	</div>					

						

						
					<div class="buttonSubmitComment">
						<input type="submit" class="button" id="submitCommentButton" value="<?php echo JText::_('K2_SUBMIT_COMMENT'); ?>" />
						<span id="formLog"></span>
						<div class="clr"></div>
					</div>
						<input type="hidden" name="option" value="com_k2" />
						<input type="hidden" name="view" value="item" />
						<input type="hidden" name="task" value="comment" />
						<input type="hidden" name="itemID" value="<?php echo JRequest::getInt('id'); ?>" />
						<?php echo JHTML::_('form.token'); ?>
	
</form>
