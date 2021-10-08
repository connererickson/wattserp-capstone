<div class="row">
	<div class="col-md-12">
		<h3>Super Permissions</h3>
		<p class='ajax_success'>Permissions Updated</p>
		<div id='permissions_index'>
			<?php
			$superadmin_roles = array('Administrator', 'Project Manager', 'Executive', 'Human Resources', 'Contracts', 'Inventories', 'Safety', 'Field Coordinator');
			$users = DB::select("SELECT * FROM `users` u JOIN `users_roles` ur ON `u`.id = `ur`.user_id JOIN `roles` r ON `ur`.role_id = `r`.id WHERE `r`.name IN ('".implode("', '", $superadmin_roles)."')");
			var_dump($users);
			?>
			
		</div>
	</div>
</div>