<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package American_Grit
 */

get_header();
?>
<section id="frontPageBlankSpacer" class="row">
</section>
<section class="row">
  <article class="col-md-8 postsArchive">
    <h1>Error 404</h1>
    <p>We did our very best, but we could not find that page you were looking for.</p>
    <a href="<?php echo esc_url( home_url( '/' )) ?>" id="backHomeLink"><i class="fa fa-chevron-left"></i> GO BACK HOME</a>
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
