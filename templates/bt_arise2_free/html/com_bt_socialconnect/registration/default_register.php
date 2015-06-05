<?php
/**
 * @package 	bt_socialconnect - BT Social Connect Component
 * @version		1.0.0
 * @created		October 2013
 * @author		BowThemes
 * @email		support@bowthems.com
 * @website		http://bowthemes.com
 * @support		Forum - http://bowthemes.com/forum/
 * @copyright	Copyright (C) 2013 Bowthemes. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
 
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
$captchaField ='';
?>
<div id="register" class="bt_social_register">
	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_bt_socialconnect&task=registration.register'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
	<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
		<?php $fields = $this->form->getFieldset($fieldset->name);?>
		
		<?php if (count($fields)):?>
			
			<fieldset>		
				<?php //if (isset($fieldset->label)):	?>
					<!--<div class=""><?php // echo JText::_($fieldset->label);?></div>-->
				<?php // endif;?>
			
				<div class="group_register">					
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('name'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('name'); ?></div>
					</div>
					<?php	$params = JComponentHelper::getParams('com_bt_socialconnect');	?>
					<?php	if($params->get('remove_user')): ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('email1'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('email1'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('email2'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('email2'); ?></div>
					</div>
					<?php else:?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('username'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('username'); ?></div>
					</div>
					<?php endif; ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('password1'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('password1'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('password2'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('password2'); ?></div>
					</div>
					<?php	if(!$params->get('remove_user')): ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('email1'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('email1'); ?></div>
					</div>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('email2'); ?></div>
						<div class="controls btl-input"><?php echo $this->form->getInput('email2'); ?></div>
					</div>
					<?php endif; ?>
					<?php foreach($fields as $field):?>
						<?php if(strtolower($field->type)=='captcha'){ $captchaField = $field; continue; } ?>
						<?php if ($field->hidden):?>
						<div class="control-group">
							<div class="controls btl-input">
							<?php echo $field->input;?>
							</div>
						</div>						
						<?php endif;?>
					
					<?php endforeach;?>
				
					<?php
						if (count($this->data->user_fields))
						{

							foreach ($this->data->user_fields as $key => $el)
							{	
								if($el->required){		
								
									$title =' class="hasTip required" for="user_fields_'.$el->alias.'"';
									$required ='class="validate-'.$el->alias.' required"  id="user_fields_'.$el->alias.'" aria-required="true" required="required"';
									$span ='<span class="star"> *</span>';
								}
								else{
									$title  ='';
									$required ='class="inputbox"';
									$span ='';
								}
								
								?>
								<div class="control-group">
								<div class="control-label"><label title="<?php echo strip_tags($el->description) ;?>" <?php echo $title;?>><?php echo Jtext::_($el->name); ?> <?php echo $span ;?></label></div>
								<div class="controls btl-input"> 	
										<?php 
											Bt_SocialconnectHelper::loadFieldData($el,$required);	
										  ?>
								</div>
								</div>
								<?php

							}
						}
						
					?>
				
				
					<!-- show captcha -->
						<?php if ($captchaField): ?>
												
						<div class="control-group">
							
								<div class="control-label"><?php echo $captchaField->label ;?></div>
							
							<div class="controls"><?php echo $captchaField->input;?></div>
						</div>	
						
						<?php endif;?>
				</div>
				
			</fieldset>
		<?php endif;?>
	<?php endforeach;?>

			<div class="btn-submit">
				<button type="submit" class="validate btn submitButton"><span><?php echo JText::_('JSUBMIT'); ?></span></button>			
				<a href="<?php echo JRoute::_('index.php?option=com_bt_socialconnect&task=registration.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><button type="button" class="btn"><?php echo JText::_('JCANCEL'); ?></button></a>

				<input type="hidden" name="option" value="com_bt_socialconnect" />
				<input type="hidden" name="task" value="registration.register" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>
</div>