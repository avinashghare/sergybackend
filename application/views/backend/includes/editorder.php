<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 order Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editordersubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
						
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">User</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('user',$user,set_value('user',$before->user),'id="select2"class="chzn-select form-control" 	data-placeholder="Choose a user..."');
					?>
				  </div>
				</div>
				
						
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">address1</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address1" value="<?php echo set_value('address1',$before->address1);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">address2</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address2" value="<?php echo set_value('address2',$before->address2);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">city</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">state</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="state" value="<?php echo set_value('state',$before->state);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before->pincode);?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">contactno</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="contactno" value="<?php echo set_value('contactno',$before->contactno);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">country</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="country" value="<?php echo set_value('country',$before->country);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingaddress1</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingaddress1" value="<?php echo set_value('shippingaddress1',$before->shipaddress1);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingaddress2</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingaddress2" value="<?php echo set_value('shippingaddress2',$before->shipaddress2);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shipcity</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shipcity" value="<?php echo set_value('shipcity',$before->shipcity);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shipstate</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shipstate" value="<?php echo set_value('shipstate',$before->shipstate);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingcode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcode" value="<?php echo set_value('shippingcode',$before->shippingcode);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shipcountry</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shipcountry" value="<?php echo set_value('shipcountry',$before->shipcountry);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">trackingcode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="trackingcode" value="<?php echo set_value('trackingcode',$before->trackingcode);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingcharge</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingcharge" value="<?php echo set_value('shippingcharge',$before->shippingcharge);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">shippingmethod</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shippingmethod" value="<?php echo set_value('shippingmethod',$before->shippingmethod);?>">
				  </div>
				</div>
						
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>