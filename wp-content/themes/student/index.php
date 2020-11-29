<?php get_header(); ?>
	<!-- Page Content -->
	<div class="page-limit">
	<div class="login-container">
		<div class="login-wrap">
			<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="page-title">
					<div class="logimg-tilt" data-tilt>
						<img src="<?php echo get_bloginfo('template_directory'); ?>/img/login-form-img.jpg" class="img-fluid">
</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="page-title">
					<h1>Student Registration</h1>
					<form action="/action_page.php">
						<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
						</div>
						<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
						</div>
						<div class="checkbox">
						<label><input type="checkbox" name="remember"> Remember me</label>
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
</div>
</div>
	</div>
</div>
<?php get_footer(); ?>