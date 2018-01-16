<div class="row">

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', lang('Shortcuts')); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', lang('account'), 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', lang('logout'), 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], lang('users'), 'fa fa-users', 'user'); ?>
	</div>
	
</div>
