<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package American_Grit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
  <link rel="icon" href="<?php echo site_url() ?>/wp-content/uploads/2017/02/favicon-16x16.png">
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'american-grit' ); ?></a>
	<header id="navContainerPodcastPage">
		<nav id="topNav">
			<section  id="logoAndSearch" class="logoAndSearchPodcastPage">
				<article id="logoArticle">
          <a href="<?php echo esc_url( home_url( '/' )) ?>">
            <img 
              src="<?php echo get_template_directory_uri() ?>/assets/img/AG-Logo.png"/>
          </a>
				</article>
				<article id="searchArticle">
					<a href="javascript:void(0);" class="icon" id="mobileMenuIcon">
						<i class="fa fa-bars"></i>
          </a>
				</article>
			</section>
			<section  id="primaryMenuContainer" class="podcastPageMenuContainer">
        <div class="container">
          <article>
            <a href="<?php echo esc_url( home_url( '/' )) ?>">
              <img 
                src="<?php echo get_template_directory_uri() ?>/assets/img/Logo-sm.png" height="35" width="35"/>
            </a>
          </article>
          <article id="podcastPageNavMenu">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
              ) );
            ?>
          </article>
          <article id="topSearchForm">
            <?php get_search_form() ?>
          </article>
        </div>
      </section>
    </nav>
  </header>
  

	<div id="podcastPageContent" class="container">
    <a href="#">
      <i class="fa fa-arrow-up fa-lg" id="topArrow"\></i>
    </a>
		<div id="sideNav">
			<div id="sideSearchForm">
				<?php get_search_form(); ?>
			</div>
			<?php	
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'side-menu',
				) );
			?>
		</div>