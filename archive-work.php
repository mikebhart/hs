<?php

get_header(); 

function genlite_empty_content($str) {
    return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}

$postsPerPage = 20;
$args = array(
		'post_type' => 'work',
		'posts_per_page' => $postsPerPage);

$loop = new WP_Query($args);

$row_count = $loop->found_posts; 

?>

<div class="container">


	<div class="row genlite__content justify-content-center pt-3">
			<div class="genlite-archive-title">
				<h1>My recent work</h1>
			</div>
	</div>
	
	<div class="row mt-5 justify-content-center">

	
		<?php
		
		
		while ($loop->have_posts()) : $loop->the_post();

				$featured_img_url = get_the_post_thumbnail_url(get_the_ID()); 
				$post_categories = get_the_category( $query->ID );
	
		
		?>
			

			 <div class="col-12 col-lg-6"> 

				 <div class="genlite-card-project">

                        <img src="<?php echo esc_url($featured_img_url); ?>" alt="">
					                        
						<div class="genlite-card-project__box-content text-center">

                            <h3 class="title"><?php the_title(); ?></h3>
                            <span class="post"> 
							<?php 
	                    		
	                    		// echo substr(get_the_excerpt(),0,75); 
	                    		// echo '<br><p>';
	                   	
		                    	$post_categories = wp_get_object_terms( $post->ID, 'work_category' );
		                    	$postCatCount = 0;
								foreach($post_categories as $c) {

								  $cat = get_category( $c );
									  
								  if ($postCatCount >0) {
								  	 echo ' | ' . esc_attr($cat->name);
								  } else {	
									  echo  esc_attr($cat->name);
								  }
		
								  $postCatCount++;
								}

								echo '</p>';

		                     ?>
							</span>
                            <ul class="icon text-center">
								<?php if (!genlite_empty_content($post->post_content)) { ?>
                             	   <li><a href="<?php echo esc_url(get_permalink()); ?>" class="fas fa-info" data-type="page-transition"></a></li>
								<?php }   
								$website_value =  esc_url(get_post_meta(get_the_ID(), 'website_key', true)); 
								if (!empty($website_value)) { ?>
                               	 <li><a href="<?php echo esc_attr($website_value); ?>" class="fa fa-link"></a></li>
								<?php } ?>
                            </ul>
                        </div>
					
                    </div>
			</div>





			<?php
                  endwhile;
          wp_reset_postdata();
          ?>



	</div>

</div>		
<br>

<?php get_footer(); ?>