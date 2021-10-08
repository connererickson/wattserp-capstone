<div class="row">
	<div class="col-md-12">
		<h3>My Activities</h3>
		<div class='drop_down_options'><i class="fas fa-bars"></i></div>
		<ul class='options_menu'>
			<li><a href='' class='options_menu_option remove_module' id='<?php echo $installed_module['id']; ?>' mod-name='My Activity Log'>Remove Module</a></li>
		</ul>
		<div id='user_activity_body' class='module_body'>
			<?php
			$module_id = $installed_module['id'];
			foreach($modules_data[$module_id] as $activity){
				?>
				<p><span class='activity_date'><?php echo date('F d, Y', strtotime($activity->created_at)); ?></span> - I <?php echo $activity->activity; ?></p>
				<?php
			}
			?>
		</div>
	</div>
</div>