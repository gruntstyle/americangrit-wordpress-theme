<?php

get_header();

?>

<!-- <section class="row" id="podcastEmbeddedPlayer">
  <article class="col-md-12"> -->
    <!-- <div 
      class="art19-web-player awp-micro" 
      data-episode-id="ae2a9907-258b-470f-8bfd-c4b0aa2efbb7" 
      background-color="#A4A4A4" 
      primary-color="#8C1616" 
      emit-events="true">

    </div> -->
  <!-- </article>
</section> -->

<section id="frontPageBlankSpacer" class="row">
</section>

<section class="row">
    <article class="col-md-8 postsArchive">
        <?php
            if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
            elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
            else { $paged = 1; }

            $result = new WP_Query( "post_type=post&cat=-2321&orderby=ID&post_status=publish&order=DESC&posts_per_page=5&paged=" . $paged);
            if ( $result-> have_posts() ) : 
                while ( $result->have_posts() ) : $result->the_post(); ?>
                    <a href="<?php the_permalink() ?>" class="postLink"><h2 class="postTitle"><?php the_title(); ?></h2></a><br>
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
                    <?php the_excerpt(); ?>
                    <svg height="3" width="90%" class="postsDivider">
                      <line x1="0" y1="0" x2="800" y2="0" style="stroke:rgb(229,229,229);stroke-width:3" />
                    </svg>
                <?php endwhile; ?>

            <section class="pagination">
                <?php

                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $result->max_num_pages,
                        'current'      => max( 1, get_query_var( 'page' ) ),
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
              
            <?php endif; wp_reset_postdata(); 
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
</section>
<?php

get_footer();