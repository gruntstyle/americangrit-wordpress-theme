<?php

//This is the template for the podcast landing page

get_header(); 

$category_id = get_query_var('cat');
$category = get_category($category_id)->category_nicename;
$name = get_category($category_id)->name;
?>

<?php if( !is_paged()): ?>
  <section class="row" id="podcastHeadingContainer">
    <img src="<?php echo get_template_directory_uri() ?>/assets/img/podcast-banner.jpg ?>">
    <h4 class="podcastHeadings">PLAY ALL</h4>
    <iframe 
      src="https://www.podomatic.com/embed/html5/podcast/5833391?style=normal&amp;autoplay=false" 
      allowfullscreen="true" 
      allow="autoplay; fullscreen" 
      style="width: 728px; height: 208px;">
    </iframe>
    <!-- <img src="<?php //echo get_template_directory_uri() ?>/assets/img/art19-player.png ?>"> -->
    <!-- <div class="art19-web-player awp-micro" data-episode-id="ae2a9907-258b-470f-8bfd-c4b0aa2efbb7"></div> -->
    <h4 class="podcastHeadings">PAST EPISODES</h4>
  </section>
<?php else: ?>
  <section id="frontPageBlankSpacer" class="row">
  </section>
<?php endif; ?>
<section class="row">

<?php if ( have_posts() ) : ?>
	
	
		<article class="col-md-12 postsArchive podcastsArchive">
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
                    <h3 class="postTitle"><?php the_title(); ?></h3>
                    <section class="authorAndDate">
                      <?php //the_author_posts_link() ?>
                      <!-- <span class="spacer"></span> -->
                      <?php echo get_the_date() ?>
                    </section>
                      <article class="podcastThumbnailContainer">
                        <?php the_post_thumbnail() ?>
                      </article>
                      <?php the_content(); 
                      $count++; ?>
                    <svg height="3" width="80%" class="postsDivider">
                      <line x1="0" y1="0" x2="1000" y2="0" style="stroke:rgb(229,229,229);stroke-width:3" />
                    </svg>
                <?php endwhile; ?>
                
                <section class="pagination">
                    <?php previous_posts_link('<span class="prev"><i class="fa fa-chevron-left"></i>  PREVIOUS</span>') ?>
                    <?php next_posts_link('<span class="next">MORE  <i class="fa fa-chevron-right"></i></span>') ?>
                </section>

        <?php else : ?>
        
          <article class="col-md-12 postsArchive">
            <h2>Sorry, no results</h2>
          </article>

					<?php //get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
		</article>
	</section>

<?php
get_footer();