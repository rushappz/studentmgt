<?php get_header(); ?>
	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="qvi-page-title">
					<h1>QVI Fees</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 text-center">
				<ul class="nav nav-tabs qvi-fee-type-tabs">
					<li class="tab-active"><a href="#">Club</a></li>
					<li><a href="#">Breaks</a></li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-md-offset-12">
				&nbsp;
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-md-offset-12">
				<div class="row checkout-controls">
					<div class="col-lg-4 col-md-4 col-sm-4 text-right">
						<div class="shopping-cart"><i class="fa fa-shopping-cart"></i> <span>0 item</span></div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 text-right">
						<div class="checkout-button">
							<button class="btn">Check out</button>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 text-right">
						<div class="currency-button">
							<button class="btn">United States (US) dollar <i class="fa fa-arrow-down"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<section class="product-list">
		<?php  
    $args = array(
        'post_type'      => 'product',
		'posts_per_page' => -1,
		'meta_key'       => '_sku',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
    );

    $loop = new WP_Query( $args );
	$loopcount = 0;
	
	echo '<div class="row">';
    while ( $loop->have_posts() ) : $loop->the_post();
		$loopcount++;
        global $product;
		
		echo '<br><br><div class="col-lg-6 col-md-6 col-xs-12 px-2 py-2"><article class="border">';
			echo '<a href="'.get_permalink().'">'.$product->get_sku().'<h4>'.get_the_title().'</h4></a>';
		echo '</article></div>';
		
		if($loopcount % 2 == 0) {
			echo '</div><div class="row">';
		}
		
    endwhile;

    wp_reset_query();
?>
	</section>

	</div>
<?php get_footer(); ?>