<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Chatmessage Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editchatmessagesubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">Chat Message ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="chatmessageid" value="<?php echo $beforechatmessage->id;?>">
						</div>
					</div>
					<div class="form-row control-group row-fluid" style="display:none;">
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="chat" value="<?php echo $this->input->get('id');?>">
						</div>
					</div>
						
				<div class=" form-group">
				  <label class="col-sm-2 control-label">User</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('user',$user,set_value('user',$beforechatmessage->user),'id="select2"class="chzn-select form-control" 	data-placeholder="Choose a user..."');
					?>
				  </div>
				</div>		
					<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">URL</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url',$beforechatmessage->url);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">imageurl</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="imageurl" value="<?php echo set_value('imageurl',$beforechatmessage->imageurl);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status',$beforechatmessage->status),'class="chzn-select form-control" 	data-placeholder="Choose a Status..."');
					?>
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