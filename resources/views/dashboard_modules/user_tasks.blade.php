<div class="row">
	<div class="col-md-12">
		<h3>My Tasks</h3>
		<div class='drop_down_options'><i class="fas fa-bars"></i></div>
		<ul class='options_menu'>
			<li><a href='' class='options_menu_option remove_module' id='<?php echo $installed_module['id']; ?>' mod-name='My Tasks'>Remove Module</a></li>
		</ul>
		<div id='user_tasks_body' class='module_body'>
			<?php
			if ($modules_data){
				$module_id = $installed_module['id'];
				foreach($modules_data[$module_id] as $key => $task){
					if(is_array($task) && !empty($task)){
						switch($key){
							case 'training_courses' :	
								foreach ($task as $a_task){
									?>
									<p>You are scheduled for training course: <a href='{{ route("safety.training.slideshow", ["id"=>$a_task->id]) }}'><?php echo $a_task->name . " - " . $a_task->description; ?></a></p>
									<?php
								}
								break;
							default :
								break;
						}
					}
					else{
						
					}
				}
			}
			?>
		</div>
	</div>
</div>