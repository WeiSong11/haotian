<div class="login-box">

	<div class="login-logo"><b><?php echo lang('site_name'); ?></b></div>

	<div class="login-box-body">
		<p class="login-box-msg"><?php echo lang('please_input_username_password'); ?></p>
		<?php echo $form->open(); ?>
			<?php echo $form->messages(); ?>
			<?php echo $form->bs3_text(lang('username'), 'username', ENVIRONMENT==='development' ? 'webmaster' : '', array('placeholder' => lang('username_placeholder'))); ?>
			<?php echo $form->bs3_password(lang('password'), 'password', ENVIRONMENT==='development' ? 'webmaster' : '', array('placeholder' => lang('password_placeholder'))); ?>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox">
						<label><input type="checkbox" name="remember"> <?php echo lang('remember_me'); ?></label>
					</div>
				</div>
				<div class="col-xs-4">
					<?php echo $form->bs3_submit(lang('sign_in'), 'btn btn-primary btn-block btn-flat'); ?>
				</div>
			</div>
		<?php echo $form->close(); ?>
	</div>

</div>