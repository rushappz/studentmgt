<?php

/**
 * Template name: Page Login
 */
global $user_ID;
global $wpdb;
get_header('login');
if (!$user_ID) {
?>
	<!-- Page Content -->
	<div class="page-limit">
		<div class="login-container">
			<div class="login-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 login-column">
							<div class="text-center">
								<?php
								if (function_exists('the_custom_logo')) {
									the_custom_logo();
								}
								?>
								<div class="logimg-tilt" data-tilt>
									<img src="<?php echo get_bloginfo('template_directory'); ?>/img/login-form-img.jpg" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="col-lg-6 login-column">
							<form class="login-form" action="<?php echo esc_url(get_site_url() . "/login"); ?>" method="post">
								<div class="form-title">
									<h3>Login</h3>
									<p>Please login to your account</p>
								</div>
								<?php
								if (isset($_POST['stlogin'])) {
									$qhusername = esc_sql($_POST['stusername']);
									$qhpassword = esc_sql($_POST['stpassword']);
									if (isset($_POST['strememberme'])) {
										$strememberme = esc_sql($_POST['strememberme']);
									} else {
										$strememberme = 'false';
									}

									if ($strememberme === "remember")
										$user_remember = true;
									else
										$user_remember = false;

									$login_array = array();
									$login_array['user_login'] = $qhusername;
									$login_array['user_password'] = $qhpassword;
									$login_array['remember'] = $user_remember;

									$verify_user = wp_signon($login_array, true);

									$error = array();

									if (empty($qhusername)) {
										$error['username_empty'] = "Please enter your username";
									}

									if (empty($qhpassword)) {
										$error['password_empty'] = "Please enter your password";
									}

									if (is_wp_error($verify_user) && !empty($qhusername) && !empty($qhpassword)) {
										$error['invalid_username_password'] = 'Your username and/or password do not match. Please try again.';
									}

									if (count($error) == 0) {
										echo '<div class="text-center">';
										echo '<img src="' . get_bloginfo('template_directory') . '/img/loading.svg">';
										echo '</div>';
										echo "<script>window.location = '" . esc_url(site_url()) . "';</script>";
										//header(esc_url(site_url()));
									} else {
										echo '<div class="alert alert-error form-message"><ul>';
										foreach ($error as $key => $val) {
											echo '<li>' . $val . '</li>';
										}
										echo '</ul></div>';
									}
								}
								?>
								<div class="input-wrap validate-field">
									<input type="email" class="input-field" placeholder="Enter email" name="stusername" required>
									<span class="focus-input"></span>
									<span class="icon-input">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</span>
								</div>
								<div class="input-wrap validate-field">
									<input type="password" class="input-field" placeholder="Enter password" name="stpassword" required>
									<span class="focus-input"></span>
									<span class="icon-input">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" name="strememberme"> Remember me</label>
								</div>

								<div class="container-login-form-btn">
									<input type="submit" name="stlogin" class="login-form-btn" value="Login" />
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php
} else {
	wp_redirect(home_url());
}
get_footer();
?>