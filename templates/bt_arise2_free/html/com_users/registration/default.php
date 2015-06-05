<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="registration register_page joomla-register-form <?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php endif; ?>

	<div class="register_wapper row">
		<div class="col-md-6 col-xs-12 col-sm-6 register_form">
			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
		<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
			<?php $fields = $this->form->getFieldset($fieldset->name);?>
			<?php if (count($fields)):?>
				<fieldset>
				<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend.
				?>
					<div class="heading_login_page" style="margin-bottom:15px;"><?php echo JText::_($fieldset->label);?></div>
				<?php endif;?>
					<div>
				<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
					<?php if ($field->hidden):// If the field is hidden, just display the input.?>
						<?php echo $field->input;?>
					<?php else:?>
						<div class="control-group">
							<div class="control-label"><?php echo $field->label; ?></div>
							<?php if (!$field->required && $field->type!='Spacer'): ?>
								<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
							<?php endif; ?>
						
						<div class="register-fields-input"><?php echo ($field->type!='Spacer') ? $field->input : "&#160;"; ?></div>
						</div>
					<?php endif;?>
				<?php endforeach;?>
					</div>
				</fieldset>
			<?php endif;?>
		<?php endforeach;?>
				<div class="btn-submit">
					<button type="submit" class="validate"><?php echo JText::_('JREGISTER');?></button>
					
					<a class="cancel_button" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>">
						<button type="button" class="cancel_button"><?php echo JText::_('JCANCEL'); ?></button>
					</a>
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="registration.register" />
					<?php echo JHtml::_('form.token');?>
				</div>
			</form>
		</div>



		<div class="col-md-6 col-xs-12 col-sm-6">
			<div class="register_inner">
				
				<div class="module_on_register">
						<?php 
						$modules = JModuleHelper::getModules('module_on_register');
						foreach ( $modules as $mod) {	
						/*	if($mod->module = "mod_bt_googlemaps"){ */		
								echo  JModuleHelper::renderModule ($mod, array('style'=>'xhtml'));
						/*	} */
						}
						?>
					  
					</div>
			
			</div>
		</div>
	<div style="clear:both; float:none;height:0;"></div>
	</div>

	

</div>

