<?php get_header(); ?>

	<!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Amazing Works<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

                  <h1><?php the_title(); ?>.</h1>

                  <div class="entry-description">

                     <?php the_content(); ?>

                  </div>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?php the_field("project-date") ?></li>
						   <li><span>Client </span><?php the_field("customer") ?></li>
						   <li><span>Skills: </span><?php the_terms( get_the_ID(), 'skills', '', ', ', '' ); ?></li>
				      </ul>

                  <a class="button" href="<?php the_field('project-link') ?>">View project</a>
                   

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

               <div class="entry-media">

                  <img src="<?php the_field('image1') ?>" alt="Image <?php the_title(); ?>" />

                  <img src="<?php the_field('image2') ?>" alt="Image <?php the_title(); ?>" />

               </div>

               <div class="entry-excerpt">

				      <?php the_excerpt(); ?>

				</div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

         <ul class="post-nav cf">

         		<?php
         		$next_post = get_next_post();
         		
         		if (!empty( $next_post )) {
         			?>
         			<li class="prev"><a href="<?php echo get_permalink( $next_post ); ?>" rel="prev"><strong>Previous Entry</strong><?php echo esc_html( $next_post->post_title ); ?></a></li>
         			<?php
         		}
         		?>
				
				<?php 
				$prev_post = get_previous_post();
				
				if (!empty( $prev_post )) {
					?>
					<li class="next"><a href="<?php echo get_permalink( $prev_post ); ?>" rel="next"><strong>Next Entry</strong><?php echo esc_html( $prev_post->post_title ); ?></a></li>
					<?php
				}
				?>
				
			</ul>

      </div>

   </div> <!-- content End-->

<?php get_footer(); ?>