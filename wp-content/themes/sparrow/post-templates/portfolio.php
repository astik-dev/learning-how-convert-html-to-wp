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