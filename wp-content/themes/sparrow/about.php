<?php 
/*
Template Name: About
*/
?>

<?php get_header(); ?>

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

      <div id="page-content" class="row page">

         <div id="primary" class="eight columns">

            <section>

               <h1><?php the_field("sec2_title"); ?></h1>

               <p class="lead"><?php the_field("sec2_description1"); ?></p>

               <p><?php the_field("sec2_description2"); ?></p>

               <div class="row">

                  <div id="team-wrapper" class="bgrid-halves cf">

                  	 <?php 
                  	 $member_items = CFS()->get("sec3_item");

                  	 foreach ($member_items as $member_item) { ?>
                  	 	
					 <div class="column member">

                        <img src="<?= $member_item["sec3_item_image"] ?>" alt=""/>

                        <div class="member-name">
                           <h5><?= $member_item["sec3_item_name"] ?></h5>
                           <span><?= $member_item["sec3_item_position"] ?></span>
                        </div>

                        <p><?= $member_item["sec3_item_description"] ?></p>

                        <ul class="member-social">

	                        <?php 
	                        $member_item_socials = $member_item["sec3_item_socials"];

	                        foreach ($member_item_socials as $member_item_social) { ?>
	                        
	                        	<li><a href="<?= $member_item_social["sec3_item_socials_link"] ?>"><i class="fa fa-<?= $member_item_social["sec3_item_socials_logo"] ?>"></i></a></li>

	                        <?php	
	                        }
	                        ?>

                        </ul>

            		 </div>

                  	 <?php
                  	 }
                  	 ?>

                  </div> <!-- Team wrapper End -->

               </div> <!-- row End -->

            </section> <!-- section end -->

         </div> <!-- primary end -->

         <div id="secondary" class="four columns end">

            <?php get_sidebar("contacts");  ?>

         </div> <!-- secondary End-->

      </div> <!-- page-content End-->

   </div> <!-- Content End-->

<?php get_footer(); ?>