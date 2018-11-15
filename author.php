<?php

get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$authorID = $curauth->ID;

// var_dump($curauth); die;

if ( have_posts() ) : 

// $category_id = get_query_var('cat');
// $category = get_category($category_id)->category_nicename;
// $name = get_category($category_id)->name;

?>

<section id="frontPageBlankSpacer" class="row">
</section>

<section class="row">
  <article class="col-md-8 postsArchive">
    <?php
      if( !is_paged()): ?>

      <section id="authorBio">
      
        <?php echo get_avatar($authorID); ?>
        <article id="bioText">
          <h2><?= $curauth->display_name; ?></h2>
          <p><?= get_the_author_meta('description', $authorID); ?></p>
        </article>
    
      </section>
      <svg height="3" width="90%" class="postsDivider">
        <line x1="0" y1="0" x2="800" y2="0" style="stroke:rgb(229,229,229);stroke-width:3" />
      </svg>
      
      <?php endif;

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
                    <?php //the_date() ?>
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
                    $count++; 
                    if( current_user_can('editor') || current_user_can('administrator')) {
                      echo do_shortcode('[post-views]');
                    }
                    ?>
                  <svg height="3" width="90%" class="postsDivider">
                    <line x1="0" y1="0" x2="800" y2="0" style="stroke:rgb(229,229,229);stroke-width:3" />
                  </svg>
              <?php endwhile; ?>
              
              <section class="pagination">
                  <?php
                      
                      $result = new WP_Query(array('author' => $authorID));
                      
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

      <?php else :

        get_template_part( 'template-parts/content', 'none' );

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

