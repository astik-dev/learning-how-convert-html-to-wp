<?php get_header(); ?>

	<!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Search<span>.</span></h1>

            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet est voluptatum ut autem consectetur, possimus a. Necessitatibus porro fugit tempore at, officiis assumenda ex dolore tenetur exercitationem sed aspernatur magnam.</p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">


            <!-- Вывод постов -->
            <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
               
               <article class="post">

                  <div class="entry-header cf">

                     <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>

                     <p class="post-meta">

                        <time class="date" datetime="2014-01-14T11:24"><?php the_time('M j, Y'); ?></time>
                        /
                        <span class="categories">
                           <?php the_category( $separator = " / ", "" ); ?>
                        </span>

                     </p>

                  </div>

                  <div class="post-thumb">
                     <a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail( "post_thumb" ); ?></a>
                  </div>

                  <div class="post-content">

                     <?php the_excerpt(); ?>

                  </div>

               </article> <!-- post end -->

            <?php } /*while*/ ?>

               <?php the_posts_pagination(); ?>

            <?php } /*if*/ else {?>

            	<h1>Постов нет</h1>

            <?php
            } ?>

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

<?php get_footer(); ?>