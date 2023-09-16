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