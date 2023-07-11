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
            <h1><?php the_field("contacts_sec1_title") ?><span>.</span></h1>

            <p><?php the_field("contacts_sec1_description") ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

              <h1><?php the_field("contacts_sec2_title") ?></h1>

              <p class="lead"><?php the_field("contacts_sec2_text1") ?></p>

              <p><?php the_field("contacts_sec2_text2") ?></p>

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