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
            ?>

    		   <div class="columns portfolio-item">
               <div class="item-wrap">
    				   <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail(); ?>
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
    					<div class="portfolio-item-meta">
    					   <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                     
                     <!-- Получаем и выводим первый навык -->
                     <p>
                        <?php
                           $terms = get_the_terms( get_the_ID(), 'skills' );

                           if ( $terms && ! is_wp_error( $terms ) ) {
                               $first_term = reset( $terms );
                               echo esc_html( $first_term->name );
                           }
                        ?>
                     </p>
    					</div>
               </div>
    			</div>

            <?php
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
            ?>

               <!-- Entry -->
               <article class="row entry">

                  <div class="entry-header">

                     <div class="permalink">
                        <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                     </div>

                     <div class="ten columns entry-title pull-right">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                     </div>

                     <div class="two columns post-meta end">
                        <p>
                        <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('M j, Y'); ?></time>
                        <span class="dauthor">By <?php the_author(); ?></span>
                        </p>
                     </div>

                  </div>

                  <div class="ten columns offset-2 post-content">
                     <!--<?php the_excerpt(); ?>-->
                     
                     <?php
                        $excerpt_length = 55;
                        $excerpt_more = '... <a class="more-link" href="'. get_permalink() . '">' . __('Read More', 'textdomain') . '<i class="fa fa-arrow-circle-o-right"></i></a>';
                        echo wp_trim_words( get_the_excerpt(), $excerpt_length, $excerpt_more );
                     ?>
                  </div>

               </article> <!-- Entry End -->

            <?php
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

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>
            
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweet Section End-->

<?php get_footer(); ?>