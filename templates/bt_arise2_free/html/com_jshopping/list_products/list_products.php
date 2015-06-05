<?php defined('_JEXEC') or die();

 ?>
<div class="jshop list_product" id="comjshop_list_product">
	<div class="row">
	<?php foreach ($this->rows as $k=>$product){?>
		
			<div  class="col-md-4 col-sm-6 col-xs-12">
				<div class="block_product">
					<?php include(dirname(__FILE__)."/".$product->template_block_product);?>
				</div>
			</div>
			
		<?php }?>
		
	</div>
</div>