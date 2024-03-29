<?php get_header(); ?>
<!-- 
     При этом если нам нужно вывести какой-то другой header,
     то он должен содержаться в файле header-name.php и чтобы
     его вывести нужно будет написать просто get_header("name");
     footer, sidebar работает точно также 
-->

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php the_field("sec1_title"); ?><span>.</span></h1>

            <p><?php the_field("sec1_description"); ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">


            <!-- Вывод всех постов -->
            <?php 
              $args = array(
                'paged'         => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
              );
              query_posts( $args );
              while ( have_posts() ) {
                the_post();

                get_template_part( "post-templates/post", "blog" );
                   
              } ?>
              
              <?php the_posts_pagination(); ?>
              
              <?php wp_reset_query(); ?>

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

<?php get_footer(); ?>