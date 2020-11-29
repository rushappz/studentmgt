	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery.slim.min.js"></script>
	<script src="<?php echo get_bloginfo('template_directory'); ?>/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo get_bloginfo('template_directory'); ?>/tilt/tilt.jquery.min.js"></script>

	<script>
		$('.logimg-tilt').tilt({
			glare: true,
			maxGlare: .5
		})
	</script>
	<?php wp_footer(); ?>
	</body>

	</html>