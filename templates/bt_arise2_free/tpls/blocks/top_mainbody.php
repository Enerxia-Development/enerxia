

















<?php if ($this->countModules('top_mainbody')) : ?>
	<div id="top_mainbody" class="top_mainbody <?php $this->_c('top_mainbody') ?>">
		<div class="top_mainbody_inner">
			<div class="container">
				<div class="top_mainbody_container_inner">
					<jdoc:include type="modules" name="<?php $this->_p('top_mainbody') ?>" style="raw" />
				</div>	
			</div>
		</div>
	</div>
<?php endif; ?>