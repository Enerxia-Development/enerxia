

















<?php if ($this->countModules('bt_slideshow')) : ?>
	<div id="bt_slideshow" class="bt_slideshow <?php $this->_c('bt_slideshow') ?>">
		<div class="bt_slideshow_inner">
			<div class="container">
				<div class="slideshow_container_inner">
					<jdoc:include type="modules" name="<?php $this->_p('bt_slideshow') ?>" style="raw" />
				</div>	
			</div>
		</div>
	</div>
<?php endif; ?>