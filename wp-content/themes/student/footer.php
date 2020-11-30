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

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
	$(function() {


		$("#stdob").datepicker({
			dateFormat: "dd-mm-yy",
		});

		$("#student-form-toggle").click(function() {
			$("#student-form").slideToggle(1000);
		});
	});
</script>
<?php wp_footer(); ?>
</body>

</html>