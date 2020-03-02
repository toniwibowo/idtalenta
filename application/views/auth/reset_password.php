<div class="main" role="main">
	<section class="page-header page-header-classic page-header-sm mb-0">
    <div class="container">
      <div class="row">
        <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
          <span class="page-header-title-border visible" style="width: 116.031px;"></span><h1 data-title-border="">Reset Password</h1>
        </div>
        <div class="col-md-4 order-1 order-md-2 align-self-center">
          <ul class="breadcrumb d-block text-md-right">
            <li><a href="<?= site_url() ?>">Home</a></li>
            <li class="active">Reset Password</li>
          </ul>
        </div>
      </div>
    </div>
	</section>

	<section class="section section-reset-password m-0 border-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-6">
					<div class="featured-box featured-box-primary text-left">
						<div class="box-content">
							<div id="infoMessage" class=""><?php echo $message;?></div>

							<?php echo form_open('users/password_update/' . $code);?>

								<div class="form-group">
									<label for="new_password">New Password (at least 8 characters long):</label>
									<?php echo form_input($new_password);?>
								</div>

								<div class="form-group">
									<label for="new_password">New Password Confirm :</label>
									<?php echo form_input($new_password_confirm);?>
								</div>

								<?php echo form_input($user_id);?>
								<?php echo form_hidden($csrf); ?>

								<p><?php echo form_submit('submit', 'Submit', 'class = "btn btn-primary btn-modern"');?></p>

							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
