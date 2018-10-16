<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package American_Grit
 */

get_header();
?>
<section id="frontPageBlankSpacer" class="row">
</section>
<section class="row">
	<article class="col-md-8 postsArchive">
		<?php
			while ( have_posts() ) :
        the_post(); 
        add_filter( 'rp4wp_append_content', '__return_false' );?>
        
        <h1 id="postTitle"><?= the_title() ?></h1>

        <section id="postHeading">
          <article id="postHeadingCol1">
            <?php the_author_posts_link() ?>
            <span class="spacer"></span>
            <?php echo get_the_date() ?>
          </article>
          <article id="postHeadingCol2">
          <?php // echo do_shortcode('[wp_ulike]'); ?>
          </article>
          <article id="postHeadingCol3">
            <?php echo do_shortcode('[addtoany]'); ?>
          </article>
        </section>

        <span id="thumbnailContainer"><?php the_post_thumbnail(); ?></span>
        <?php  the_content(); ?>

        <section id="postEnding">
          <article id="postEndingCol1">
            <?php //the_author_posts_link() ?>
            <?php //the_date() ?>
          </article>
          <article id="postEndingCol2">
          <?php echo do_shortcode('[wp_ulike]'); ?>
          </article>
          <article id="postEndingCol3">
            <?php echo do_shortcode('[addtoany]'); ?>
          </article>
        </section>

				<?php if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
	</article>
	<article class="col-md-4">
      <section class="row">
        <article class="col-md-1">
        </article>
        <article class="col-md-11">
          <?php get_sidebar(); ?>
        </article>
      </section>
    </article>
</section>
<?php
get_footer();
