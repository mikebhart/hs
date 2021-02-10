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

			<div class="col-6 pt-3 pb-4">

				<?php if (!empty($website_value)) {?>
					
						<div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo $website_value; ?>">Visit Website</a></div>
				

				<?php } ?>

			</div>

			<div class= "col-6 text-right" >
			
           
				<?php 
                    get_next_posts_link();
                    $next_post = get_next_post();
                    if (!empty( $next_post )) { ?>
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID )); ?>"><i class="fas fa-angle-double-left"></i></a>
				<?php } ?>

                <?php 
					get_previous_posts_link();
					$prev_post = get_previous_post();
					if (!empty( $prev_post )) { ?>
						<a href="<?php echo esc_url(get_permalink( $prev_post->ID )); ?>"><i class="fas fa-angle-double-right"></i></a>
				<?php }  ?>

			</div>	
		
			<div class="col-12">

				<?php while( have_posts()) : the_post(); ?>

					<div id="work-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php the_content(); ?>

					</div>						

				<?php endwhile; wp_reset_query(); ?>
			
				<br>

			</div>

            <div class="col-12">
                <p><i>Categories: 
		    		<?php 
	                    		
		                $post_categories = wp_get_object_terms( $post->ID, 'work_category' );
		                $post_cat_count = 0;
						foreach( $post_categories as $c ) {

							$cat = get_category( $c );
									  
							if ( $post_cat_count > 0 ) {
								echo ', ' . esc_attr( $cat->name );
							} else {	
								echo esc_attr( $cat->name );
							}
		
							$post_cat_count++;
						}

		            ?>
                    </i>
				</p>
            </div>

		</div>
			
	</div>
		
</article>

<?php get_footer(); ?>
