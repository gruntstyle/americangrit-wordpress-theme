<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package American_Grit
 */

?>

	</div><!-- #content -->

	<footer id="agFooter">
    <section class="container">
      <section class="row">
        <article class="col-md-6">
          <h3 class="footerHeading">Contact Us!</h3>
          <svg height="3" width="60%">
            <line x1="0" y1="0" x2="500" y2="0" style="stroke:rgb(255,255,255);stroke-width:3" />
          </svg>
          <h4><a class="footerLink" href="mailto:info@americangrit.com">info@americangrit.com</a></h4>
        </article>
        <article class="col-md-6">
          <h3 class="footerHeading">Stay Connected</h3>
          <svg height="3" width="60%">
            <line x1="0" y1="0" x2="500" y2="0" style="stroke:rgb(255,255,255);stroke-width:3" />
          </svg>
          <a href="http://facebook.com/TheAmericanGrit" target="blank" class="socialLinks" id="socialLink1">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/facebook-inverse.png" 
              onmouseover="this.src='<?php echo get_template_directory_uri() ?>/assets/img/facebook.png'"
              onmouseout="this.src='<?php echo get_template_directory_uri() ?>/assets/img/facebook-inverse.png'"
              height="30" width="30"/>
          </a>
          <a href="https://www.instagram.com/theamericangrit/" target="blank" class="socialLinks" id="socialLink2">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/instagram-inverse.png" 
              onmouseover="this.src='<?php echo get_template_directory_uri() ?>/assets/img/instagram.png'"
              onmouseout="this.src='<?php echo get_template_directory_uri() ?>/assets/img/instagram-inverse.png'"
              height="30" width="30"/>
          </a>
          <a href="https://www.pinterest.com/theamericangrit/" target="blank" class="socialLinks" id="socialLink3">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/pinterest-inverse.png" 
              onmouseover="this.src='<?php echo get_template_directory_uri() ?>/assets/img/pinterest.png'"
              onmouseout="this.src='<?php echo get_template_directory_uri() ?>/assets/img/pinterest-inverse.png'"
              height="30" width="30"/>
          </a>
          <a href="https://twitter.com/TheAmericanGrit" target="blank" class="socialLinks">
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/twitter-inverse.png" 
            onmouseover="this.src='<?php echo get_template_directory_uri() ?>/assets/img/twitter.png'"
              onmouseout="this.src='<?php echo get_template_directory_uri() ?>/assets/img/twitter-inverse.png'"
              height="30" width="30"/>
          </a>
        </article>
      </section>
      <p id="copyrightText">
        © 2017 GRUNT STYLE LLC. AMERICAN GRIT IS THE REGISTERED TRADEMARK OF GRUNT STYLE LLC. YOU CAN TRY TO COPY US, BUT THEN WE'LL WATERBOARD YOU WITH FREEDOM.
      </p>
    </section>
  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
