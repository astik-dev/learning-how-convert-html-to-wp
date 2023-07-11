<?php 
/*
Template Name: Портфолио
*/
?>


<?php get_header(); ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_field("portfolio_sec1_title") ?><span>.</span></h1>

            <p><?php the_field("portfolio_sec1_description") ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <div id="secondary"  class="four columns entry-details">

               <h1><?php the_field("portfolio_sec2_title") ?></h1>

               <p class="lead"><?php the_field("portfolio_sec2_description1") ?></p>

               <p><?php the_field("portfolio_sec2_description2") ?></p>

            </div> <!-- Secondary End-->

            <div id="primary" class="eight columns portfolio-list">

               <div id="portfolio-wrapper" class="bgrid-halves cf">

                  <?php  
                  $my_posts = get_posts( array(
                     'numberposts' => 6,
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

            </div> <!-- primary end-->

         </section> <!-- end section -->

      </div> <!-- #page-content end-->

   </div> <!-- content End-->

<?php get_footer(); ?>