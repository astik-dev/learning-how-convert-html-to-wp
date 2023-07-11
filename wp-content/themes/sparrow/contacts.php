<?php 
/*
Template Name: Contacts
Template Post Type: post, page
*/
?>

<?php get_header() ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Get In Touch<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

              <h1>Hello. Let's talk.</h1>

              <p class="lead">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
              nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
              cursus a sit amet mauris. Morbi accumsan ipsum velit. </p>

              <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
              nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
              cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
              ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. </p>

              <div id="contact-form">

                  <?php echo do_shortcode( '[contact-form-7 id="96" title="Контактная форма 1"]' ); ?>

                  <!-- contact-warning -->
                  <div id="message-warning"></div>
                  <!-- contact-success -->
      				<div id="message-success">
                     <i class="icon-ok"></i>Your message was sent, thank you!<br />
      				</div>

               </div>

            </section> <!-- section end -->

         </div>

         <div id="secondary" class="four columns end">

            <?php get_sidebar("contacts");  ?>

         </div>

      </div>

   </div> <!-- Content End-->

<?php get_footer(); ?>