<?php

$website_value = get_post_meta($post->ID,'website_key',true);

get_header(); 

if ( has_post_thumbnail( $post->ID ) ) { 
	$post_hero_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
}


?>



<article id="post-<?php the_ID(); ?>" <?php post_class('genlite__content'); ?>>

	<div class="genlite-single__wrapper">

			<section class="genlite-single__image mb-4" style="background-image: url('<?php echo esc_url($post_hero_image); ?>')">
					
				<div class="genlite-single__overlay"></div>
			
			</section>


			<section class="genlite-single__text">

					<h1><?php the_title(); ?></h1>

			</section>
	</div>




	<div class="container">
		
		<div class="row">

			<div class="col-12 pt-3 pb-4">

				<?php if (!empty($website_value)) {?>

					
						<div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo $website_value; ?>">Visit Website</a></div>
				

				<?php } ?>

			</div>

			<div class="col-12">

				<?php while(have_posts()) : the_post(); ?>

					<div id="work-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</div>						

				<?php endwhile; wp_reset_query(); ?>

			
				<br>

			</div>

		</div>
			
	</div>
		
</article>

<?php get_footer(); ?>


