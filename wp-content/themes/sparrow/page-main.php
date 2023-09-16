<?php 
/*
Template Name: Главная страница
*/
?>

<?php get_header(); ?>

   <!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">

			   <!-- Slide -->
            <?php if( have_rows('slide_1') ): ?>
            <?php while( have_rows('slide_1') ): the_row(); ?>
   			   <li>
   				   <div class="row">
   					   <div class="twelve columns">
   						   <div class="slider-text">
   							   <h1><?php the_sub_field('slide_title'); ?><span>.</span></h1>
   							   <p><?php the_sub_field('slide_description'); ?></p>
   						   </div>
                        <div class="slider-image">
                           <img src="<?php the_sub_field('slide_image'); ?>" alt="" />
                        </div>
   					   </div>
   				   </div>
   			   </li>
            <?php endwhile; ?>
            <?php endif; ?>

            <!-- Slide -->
            <?php if( have_rows('slide_2') ): ?>
            <?php while( have_rows('slide_2') ): the_row(); ?>
   			   <li>
                  <div class="row">
                     <div class="twelve columns">
                        <div class="slider-text">
                           <h1><?php the_sub_field('slide_title'); ?><span>.</span></h1>
                           <p><?php the_sub_field('slide_description'); ?></p>
                        </div>
                        <div class="slider-image">
                           <img src="<?php the_sub_field('slide_image'); ?>" alt="" />
                        </div>
                     </div>
                  </div>
               </li>
            <?php endwhile; ?>
            <?php endif; ?>

		   </ul>

	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->

   <!-- Info Section
   ================================================== -->
   <section id="info">

      <div class="row">

         <div class="bgrid-quarters s-bgrid-halves">

           <?php if( have_rows('column_1') ): ?>
           <?php while( have_rows('column_1') ): the_row(); ?>
              <div class="columns">
                 <h2><?php the_sub_field('column_title'); ?></h2>
                 <p><?php the_sub_field('column_description'); ?></p>
              </div>
           <?php endwhile; ?>
           <?php endif; ?>

           <?php if( have_rows('column_2') ): ?>
           <?php while( have_rows('column_2') ): the_row(); ?>
              <div class="columns">
                 <h2><?php the_sub_field('column_title'); ?></h2>
                 <p><?php the_sub_field('column_description'); ?></p>
              </div>
           <?php endwhile; ?>
           <?php endif; ?>

           <?php if( have_rows('column_3') ): ?>
           <?php while( have_rows('column_3') ): the_row(); ?>
              <div class="columns s-first">
                 <h2><?php the_sub_field('column_title'); ?></h2>
                 <p><?php the_sub_field('column_description'); ?></p>
              </div>
           <?php endwhile; ?>
           <?php endif; ?>

           <?php if( have_rows('column_4') ): ?>
           <?php while( have_rows('column_4') ): the_row(); ?>
              <div class="columns">
                 <h2><?php the_sub_field('column_title'); ?></h2>
                 <p><?php the_sub_field('column_description'); ?></p>
              </div>
           <?php endwhile; ?>
           <?php endif; ?>

           </div>

      </div>

   </section> <!-- Info Section End-->

   <!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">

         <div class="twelve columns align-center">
            <h1><?php the_field("section3_title") ?></h1>
         </div>

         <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

            <?php
            $my_posts = get_posts( array(
               'numberposts' => get_field("section3_numberposts"),
               'post_type'   => 'portfolio',
               'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );

            global $post;

            foreach( $my_posts as $post ){
               
               get_template_part( "post-templates/portfolio" );
            
            }

            wp_reset_postdata(); // сброс
            ?>

         </div>

      </div>

   </section> <!-- Works Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h1><?php the_field("section4_title") ?></h1>
         </div>
      </div>

      <div class="blog-entries">

         <?php 

         // параметры по умолчанию
         $my_posts = get_posts( array(
            'numberposts' => get_field("section4_numberposts"),
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
         ) );

         global $post;

         foreach( $my_posts as $post ){
            setup_postdata( $post );

            get_template_part( "post-templates/post", "main" );

         }

         wp_reset_postdata(); // сброс

         ?>

      </div> <!-- Entries End -->

   </section> <!-- Journal Section End-->

   <!-- Call-To-Action Section
   ================================================== -->
   <section id="call-to-action">

      <div class="row">

         <div class="eight columns offset-1">

            <h1><a href="<?php the_field("section5_link"); ?>"><?php the_field("section5_title"); ?></a></h1>
            <?php the_field("section5_description"); ?>

         </div>

         <div class="three columns action">

            <a href="<?php the_field("section5_link"); ?>" class="button"><?php the_field("section5_btn_text"); ?></a>

         </div>

      </div>

   </section> <!-- Call-To-Action Section End-->

<?php get_footer(); ?>