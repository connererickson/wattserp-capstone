<div class="row">
	<div class="col-md-12">
		<h3>ERP Updates</h3>
		<div class='drop_down_options'><i class="fas fa-bars"></i></div>
		<ul class='options_menu'>
			<li><a href='' class='options_menu_option remove_module' id='<?php echo $installed_module['id']; ?>' mod-name='ERP Updates'>Remove Module</a></li>
		</ul>
		<div id='erp_updates_body' class='module_body'>
			<?php
			if ($modules_data){
				$module_id = $installed_module['id'];
				foreach($modules_data[$module_id] as $key => $updates){
					if(is_array($updates) && !empty($updates)){
						foreach($updates as $update){ 
							$updated_at = date_format(date_create($update->updated_at), 'M d, Y h:i A' );?>
							<div class='erp_update'><span><?php echo $update->update_text; ?></span><span class='erp_update_date'><?php echo $updated_at; ?></span></div><?php
						}
					}
					else{
						echo "No Updates";
					}
				}
			}
			?>
		</div>
	</div>
</div>