<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wordpress-starter
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-navigation" role="navigation">
		<?php /* Uncomment for a top-bar **************************
		<nav class="top-bar" data-topbar>
		  <ul class="title-area">
		    <li class="name">
		      <h1 class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		    </li>
		    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		  </ul>
		
		  <section class="top-bar-section">
		    <!-- Right Nav Section -->
		    <ul class="right">
		      <li><a href="#">Right Button Active</a></li>
		      <li class="has-dropdown not-click">
		        <a href="#">Right Button with Dropdown</a>
		        <ul class="dropdown">
		          <li><a href="#">First link in dropdown</a></li>
		          <li><a href="#">Second link</a></li>
		          <li><a href="#">Third dropdown link</a></li>
		        </ul>
		      </li>
		    </ul>
		
		    <!-- Left Nav Section -->
		    <ul class="left">
		      <li><a href="#">Left Nav Button</a></li>
		      <li><a href="#">Second Button</a></li>
		    </ul>
		  </section>
		</nav>
		<?php */ ?>

		<?php /* Main navigation */ ?>
		<div class="contain-to-grid">
			<nav class="top-bar" data-topbar>
			  <ul class="title-area">
			    <li class="name">
			      <h1 class=""><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			    </li>
			    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			  </ul>
			
			  <section class="top-bar-section">
					<?php
						$defaults = array(
			        'container' => false,                           // remove nav container
			        'container_class' => 'contain-to-grid',                        // class of container
			        'menu' => '',                                   // menu name
			        'menu_class' => 'right',           									// adding custom nav class
			        'theme_location' => 'primary',                	// where it's located in the theme
			        'before' => '',                                 // before each link <a>
			        'after' => '',                                  // after each link </a>
			        'link_before' => '',                            // before each link text
			        'link_after' => '',                             // after each link text
			        'depth' => 5,                                   // limit the depth of the nav
			        'fallback_cb' => false,                         // fallback function (see below)
			        'walker' => new top_bar_walker()
			      );
						wp_nav_menu( $defaults );
					?>
			  </section>
			</nav>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content row">
