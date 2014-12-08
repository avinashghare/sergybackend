<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewchatmessage'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Chat Message Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createchatmessagesubmit');?>">
			  
					<input type="hidden" id="normal-field" class="form-control" name="chat" value="<?php echo set_value('chat',$this->input->get('id'));?>">
				<div class=" form-group">
				  <label class="col-sm-2 control-label">user</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('user',$user,set_value('user'),'class="chzn-select form-control" 	data-placeholder="Choose a user..."');
					?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">URL</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="url" value="<?php echo set_value('url');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">imageurl</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="imageurl" value="<?php echo set_value('imageurl');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
                <div class=" form-group">
                    <label class="col-sm-2 control-label" for="normal-field ">json</label>
                    <div class="col-sm-4">
                        <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce">
                            <?php echo set_value( 'json');?>
                        </textarea>
                    </div>
                </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewchatmessages'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>