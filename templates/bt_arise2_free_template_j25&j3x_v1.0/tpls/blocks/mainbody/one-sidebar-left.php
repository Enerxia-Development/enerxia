<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Mainbody 2 columns: sidebar - content
 */
?>
<div id="t3-mainbody" class="t3-mainbody">
	<div class="t3-mainbody-inner">
		<div class="container">
			<div class="container-inner">
				
				<?php if ($this->countModules('breadcrumbs')) { ?>
					<div class="breadcrumbs">
						<div class="breadcrumbs-inner">
							<jdoc:include type="modules" name="<?php $this->_p('breadcrumbs') ?>" style="none" />
						</div>
					</div>
				<?php } ?>
				
				
				<div class="row">

					
					<!-- SIDEBAR LEFT -->
					<div class="t3-sidebar t3-sidebar-left col-xs-12 col-sm-4 col-md-3 <?php $this->_c($vars['sidebar']) ?>">
						<div class="t3-sidebar-inner">
							<jdoc:include type="modules" name="<?php $this->_p($vars['sidebar']) ?>" style="T3Xhtml" />
						</div>
					</div>
					<!-- //SIDEBAR LEFT -->
					
					
							<?php if ($this->countModules('content-mass-top')) { ?>
								<div class="content-mass-top col-xs-12 col-sm-8 col-md-9 <?php $this->_c('content-mass-top') ?>">
									<div class="content-mass-top-inner">
										<jdoc:include type="modules" name="<?php $this->_p('content-mass-top') ?>" style="T3Xhtml" />
									</div>
								</div>
							<?php } ?>
							
							
					<!-- MAIN CONTENT -->
					<div id="t3-content" class="t3-content col-xs-12 col-sm-8 col-md-9 ">
						<div class="t3-content-inner">
							<?php if($this->hasMessage()) : ?>
							<jdoc:include type="message" />
							<?php endif ?>
							<jdoc:include type="component" />
						</div>
					</div>
					<!-- //MAIN CONTENT -->

					

				</div>
			</div>
		</div>
	</div>
</div> 