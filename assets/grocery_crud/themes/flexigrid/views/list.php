<?php 

	$column_width = (int)(80/count($columns));
	
	if(!empty($list)){
?><div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1">
		<thead>
			<tr class='hDiv'>
				<?php foreach($columns as $column){?>
				<th width='<?php echo $column_width?>%'>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>" 
						rel='<?php echo $column->field_name?>'>
						<?php echo $column->display_as?>
					</div>
				</th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-right">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
			</tr>
		</thead>		
		<tbody>
<?php foreach($list as $num_row => $row){ ?>        
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td align="left" width='20%'>
				<div class='tools'>				
					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
                    			<span class='delete-icon'></span>
                    	</a>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button"><span class='edit-icon'></span></a>
					<?php }?>
					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button"><span class='read-icon'></span></a>
					<?php }?>
					<?php 
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){ 
							$action = $actions[$action_unique_id];
					?>
                            <!---->
							<span style="cursor: pointer;" data-id = "<?php echo $action_url;?>"  class="<?php echo $action->css_class; ?> crud-action " title="<?php echo $action->label?>"><?php
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php 	
								}
							?></span>
					<?php }
					}
					?>					
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>        
		</tbody>
	
	<!-- Added by IlChol (2017.09.13), (start) -->	
            <p style="display: none" id="accept_desc" data-id="<?php echo  $this->l('accepted'); ?>" data-tip= "<?php echo  $this->l('accept_description'); ?>"></p>
            <p style="display: none" id="cancel_desc" data-id="<?php echo $this->l('cancelled');?>" data-tip=" <?php echo $this->l('cancel_description')?>"></p>
    	<!-- Added by IlChol (2017.09.13), (end) -->	
		</table>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>

<script>
    // Added by IlChol (2017.09.13), (start)
    $(document).ready(function () {

        $('input[name=search_type]').val('advanced');
        $('.tools .ads-product-accept').click(function () {

            var ref = $(this).parent().find('.ads-accept').attr('data-id');

            var get_arr = ref.split('/');
            var id = get_arr[get_arr.length-1];

            console.log(id);

            var resource1 = $('#accept_desc').attr('data-id');
            var resource2 = $('#accept_desc').attr('data-tip');

            console.log(resource1 + resource2);
            $.ajax({
                type:'post',
                url:'adsproduct/ads_accept',
                data:{ads_id:id},
                success:function (data) {
                    console.log('Accepted');
                    $('.modal-title ').text(resource1);
                    $('.modal-body > p').text(resource2);
                    $('#modal_open').click();
                },
                failure:function () {

                }
            });
        });
        $('.tools .ads-product-cancel').click(function () {

            var ref = $(this).parent().find('.ads-cancel').attr('data-id');
            $(this).removeAttr('href');
            var get_arr = ref.split('/');
            var id = get_arr[get_arr.length-1];
            var resource_title = $('#cancel_desc').attr('data-id');
            var resource_desc = $('#cancel_desc').attr('data-tip');
            $.ajax({
                type:'post',
                url:'adsproduct/ads_cancel',
                data:{ads_id:id},
                success:function (data) {
                    console.log('Canceled');

                    $('.modal-title ').text(resource_title);
                    $('.modal-body > p').text(resource_desc);
                    $('#modal_open').click();
                },
                failure:function () {

                }
            });
        });
    });
    // Added by IlChol (2017.09.13), (end)    
</script>