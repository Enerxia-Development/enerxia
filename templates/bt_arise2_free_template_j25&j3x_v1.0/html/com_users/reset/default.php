<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="reset<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>
<div>	
	<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=reset.request'); ?>" method="post" class="form-validate">

		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
		<div><?php echo JText::_($fieldset->label); ?></div>		
		<fieldset>
			<div>
			<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
				<div><?php echo $field->label; ?></div>
				<div><?php echo $field->input; ?></div>
			<?php endforeach; ?>
			</div>
		</fieldset>
		<?php endforeach; ?>

		<div>
			<button type="submit" class="btl_submit"><?php echo JText::_('JSUBMIT'); ?></button>
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>
<div style="clear:both;"></div>	
</div>