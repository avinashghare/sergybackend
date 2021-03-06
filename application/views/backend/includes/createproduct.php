<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewproduct'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Product Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createproductsubmit');?>" enctype= "multipart/form-data">
			  
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">type</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="type" value="<?php echo set_value('type');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">url</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">price</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="price" value="<?php echo set_value('price');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">json</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">usergenerated</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="usergenerated" value="<?php echo set_value('usergenerated');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">productattributejson</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="productattributejson" value="<?php echo set_value('productattributejson');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">details</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="details" value="<?php echo set_value('details');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('category[]',$category,set_value('category'),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a category..." multiple');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewproduct'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>