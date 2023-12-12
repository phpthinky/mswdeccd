<main class="content-wrapper">
	<section class="header"></section>
	<section class="content-area">
		<div class="card">
			<div class="card-header">Account Settings</div>
			<div class="card-body">
				<div class="errors"></div>
				<form class="form-horizontal" id="frmupdateuser" method="POST" action="<?=site_url('users/update')?>" autoComplete="off">
					<input type="hidden" autoComplete="false">
						
					<div class="row form-group">
						<div class="col-md-3">Email</div>
						<div class="col-md-9"><input type="text" name="email" class="form-control" placeholder="Email" value="<?=$email?>"></div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">Current Password</div>
						<div class="col-md-9"><input type="password" name="cpassword" class="form-control" autoComplete="new-password" area-autoComplete="none" placeholder="Current password"></div>
					</div>
					<div class="row form-group">
						<div class="col-md-3">New Password</div>
						<div class="col-md-9"><input type="password" name="npassword" class="form-control" placeholder ="New password"></div>
					</div>

					<div class="row form-group">
						<div class="col-md-3">Username</div>
						<div class="col-md-9"><input type="text" name="username" class="form-control" placeholder="Username" value="<?=$username?>"></div>
					</div>
					<div class="row form-group">
						<div class="col-md-3"></div>
						<div class="col-md-9"><button class="btn btn-danger">Save changes</button></div>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>