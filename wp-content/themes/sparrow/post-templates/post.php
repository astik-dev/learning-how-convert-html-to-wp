<article class="post">

   <div class="entry-header cf">

      <h1><a href="single.html" title=""><?php the_title(); ?></a></h1>

      <p class="post-meta">

         <time class="date" datetime="2014-01-14T11:24">Jan 14, 2014</time>
         /
         <span class="categories">
            <?php the_category( $separator = " / ", "" ); ?>
         </span>

      </p>

   </div>

   <div class="post-thumb">
      <?php the_post_thumbnail(); ?>
   </div>

   <div class="post-content">
      <?php the_content(); ?>
   </div>

</article> <!-- post end -->