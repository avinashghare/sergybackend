<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createchatmessage?id=').$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Chat Message Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<td>User</td>
					<td>Type</td>
					<td>URL</td>
					<td>Image URL</td>
					<td>Timestamp</td>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->username;?></td>
						<td><?php echo $row->type;?></td>
						<td><?php echo $row->url;?></td>
						<td><?php echo $row->imageurl;?></td>
						<td><?php echo $row->timestamp;?></td>
						<td>
							<a href="<?php echo site_url('site/editchatmessage?id=').$row->chat.'&chatmessageid='.$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletechatmessage?id=').$row->chat.'&chatmessageid='.$row->id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">
								<i class="icon-trash "></i>
							</a> 
						
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table><br>
<!--
			<div class="clear pagination">
                <ul>
                    <?php echo $this->pagination->create_links(); ?>
                </ul>    
            </div>
-->
		</section>
	</div>
</div>