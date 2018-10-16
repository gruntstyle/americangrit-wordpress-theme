<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package American_Grit
 */

get_header();

$category_id = get_query_var('cat');
$category = get_category($category_id)->category_nicename;
$name = get_category($category_id)->name;
?>

<section class="row">
  <article class="col-md-12" id="categoryDescription">
    <section id="categoryDescriptionContent">
      <article id="categoryNameCol">
        <h2 id="categoryNameHeading"><?= $name ?></h2>
        <svg height="50" width="3" id="nameAndDescriptionDivider">
          <line x1="0" y1="-35" x2="0" y2="35" style="stroke:rgb(229,229,229);stroke-width:3" />
        </svg>
      </article>
      <article id="categoryDescriptionCol">
        <?php
          // the_archive_description();
        ?>
      </article>
    </section>
  </article>
</section>
<section class="row">

<?php if ( have_posts() ) : ?>
	
	
		<article class="col-md-8 postsArchive">
			<?php
                /* Start the Loop */
                
                $count = 0;
				while ( have_posts() && $count < 5) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
                    // get_template_part( 'template-parts/content', get_post_type() );
                    
                     ?>
                    <a href="<?php the_permalink() ?>" class="postLink"><h3 class="postTitle"><?php the_title(); ?></h3></a><br>
                    <section class="authorAndDate">
                      <?php the_author_posts_link() ?>
                      <span class="spacer"></span>
                      <?php echo get_the_date() ?>
                    </section>
                    <section class="instagramHover">
                      <article class="instagramHoverImage">
                        <?php the_post_thumbnail() ?>
                      </article>  
                      <a href="<?php the_permalink() ?>"><article class="instagramHoverLinks">
                        <span class="instagramHoverIcons">
                          <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                            <span class="commentsAndLikesCounter">
                              <?php 
                                if(function_exists('wp_ulike_get_post_likes')) {
                                  if (wp_ulike_get_post_likes(get_the_ID()) == '') {
                                    echo '0';
                                  }
                                  else {
                                    echo str_replace('+', '', wp_ulike_get_post_likes(get_the_ID()));
                                  }
                                }
                              ?>
                            </span>
                          <i class="fa fa-comment fa-lg" aria-hidden="true"></i>
                            <span class="commentsAndLikesCounter">
                              <?php echo get_comments_number('0', '1', '%') ?>
                            </span>
                        </span>
                      </article></a>
                    </section>
                    <?php 
                      the_excerpt(); 
                      $count++; ?>
                    <svg height="3" width="90%" class="postsDivider">
                      <line x1="0" y1="0" x2="800" y2="0" style="stroke:rgb(229,229,229);stroke-width:3" />
                    </svg>
                <?php endwhile; ?>
                
                <section class="pagination">
                    <?php
                        
                        $result = new WP_Query(array('category_name' => $category));
                        
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $result->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 1,
                            'mid_size'     => 2,
                            'prev_next'    => true,
                            'prev_text'    =>  '<i class="fa fa-chevron-left"></i>  ' . __( 'PREVIOUS', 'text-domain' ),
                            'next_text'    =>  __( 'MORE', 'text-domain' ) . '  <i class="fa fa-chevron-right"></i>',
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                        
                    ?>

                </section>

        <?php else : ?>
        
          <article class="col-md-8 postsArchive">
            <h2>Sorry, no results</h2>
          </article>

					<?php //get_template_part( 'template-parts/content', 'none' );

				endif;
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
