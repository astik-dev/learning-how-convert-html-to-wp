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
                  <?php echo get_theme_mod( 'footer_top_text' ); ?>
                  <a href="<?php echo get_theme_mod( 'footer_top_text_link', '#' ); ?>"><?php echo get_theme_mod( 'footer_top_text_link' ); ?></a>
               </span>
               <b><a href="<?php echo get_theme_mod( 'footer_top_date_link', '#' ); ?>"><?php echo get_theme_mod( 'footer_top_date_text' ); ?></a></b>
            </li>
         </ul>

         <p class="align-center"><a href="<?php echo get_theme_mod( 'footer_top_btn_link', '#' ); ?>" class="button"><?php echo get_theme_mod( 'footer_top_btn_text' ); ?></a></p>

      </div>

   </section> <!-- Tweet Section End-->

   <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">

            <?php wp_nav_menu(array(
               "theme_location" => "footer", // какое меню подключается
               "container" => null, // не создавать контейнер для списка меню
               "menu_class" => "footer-nav",
            )) ?>


            <?php 
               $menu_name = 'footer_socials';
               $locations = get_nav_menu_locations();

               if( $locations && isset( $locations[ $menu_name ] ) ){

                  // получаем элементы меню
                  $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

                  // создаем список
                  $menu_list = '<ul class="footer-social">';

                  foreach ( (array) $menu_items as $key => $menu_item ){
                     $menu_list .= '<li><a href="' . $menu_item->url . '"><i class="fa fa-' . $menu_item->title . '"></i></a></li>';
                  }

                  $menu_list .= '</ul>';

                  echo $menu_list;
               }
            ?>

            <ul class="copyright">
               <li><?php echo get_theme_mod( 'footer_bottom_copyright' ); ?></li> 
               <li><?php echo get_theme_mod( 'footer_bottom_design_text' ); ?><a href="<?php echo get_theme_mod( 'footer_bottom_design_link', '#' ); ?>"><?php echo get_theme_mod( 'footer_bottom_design_link_text' ); ?></a></li>               
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

   <script src="js/jquery.flexslider.js"></script>
   <script src="js/doubletaptogo.js"></script>
   <script src="js/init.js"></script>

   <!-- хук wp_footer(); -->
   <?php wp_footer(); ?>

</body>

</html>