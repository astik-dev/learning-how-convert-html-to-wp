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

                  // Количество постов для вывода на страницу
                  $posts_N = 2;

                  $my_posts = new WP_Query( array(
                     'post_type' => 'portfolio',
                     'posts_per_page' => $posts_N,
                     'suppress_filters' => true,
                  ) );

                  while( $my_posts->have_posts() ){
                     $my_posts->the_post();
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


               <?php // Вывод кнопки Load more при условии, что количество страниц больше чем 1
               
               $max_pages = $my_posts->max_num_pages;

               if( 1 < $max_pages) {
                  ?>

                  <div style="text-align: center;">
                     <button class="button" id="loadmore_portfolio" data-max_pages="<?= $max_pages ?>" data-paged="1" data-posts_n="<?= $posts_N ?>">Load more</button>
                  </div>
                  
                  <?
               }
               ?>

            </div> <!-- primary end-->

         </section> <!-- end section -->

      </div> <!-- #page-content end-->

   </div> <!-- content End-->

<?php get_footer(); ?>