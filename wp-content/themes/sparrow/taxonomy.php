<?php get_header(); ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php single_term_title( "Skill: " ); ?><span>.</span></h1>

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

               <h1>Our Portfolio.</h1>

               <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh.</p>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
               cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
               ornare odio.</p>

            </div> <!-- Secondary End-->

            <div id="primary" class="eight columns portfolio-list">

               <div id="portfolio-wrapper" class="bgrid-halves cf">

                  <?php

                  // Количество постов для вывода на страницу
                  $posts_N = 2;
                  $current_taxonomy = get_queried_object();

                  $my_posts = new WP_Query( array(
                     'post_type' => 'portfolio',
                     'posts_per_page' => 2,
                     'tax_query' => array(
                        array(
                           'taxonomy' => $current_taxonomy->taxonomy,
                           'field' => 'id', 
                           'terms' => $current_taxonomy->term_id,
                        ),
                     ),
                  ) );

                  if ($my_posts->have_posts()) {
                      while ($my_posts->have_posts()) {
                          $my_posts->the_post();
                          
                          get_template_part("post-templates/portfolio");
                      }
                  } else { ?>
                      <p>Записей нет.</p>
                  <?php } ?>

                  <?php wp_reset_postdata(); ?>

               </div>

               <?php // Вывод кнопки Load more при условии, что количество страниц больше чем 1
               
               $max_pages = $my_posts->max_num_pages;

               if( 1 < $max_pages) {
                  ?>

                  <div style="text-align: center;">
                     <button class="button" id="loadmore_portfolio" data-max_pages="<?= $max_pages ?>" data-paged="1" data-posts_n="<?= $posts_N ?>" data-taxonomy="<?= $current_taxonomy->taxonomy ?>" data-taxonomy_terms="<?= $current_taxonomy->term_id ?>">Load more</button>
                  </div>
                  
                  <?
               }
               ?>

            </div> <!-- primary end-->

         </section> <!-- end section -->

      </div> <!-- #page-content end-->

   </div> <!-- content End-->

<?php get_footer(); ?>