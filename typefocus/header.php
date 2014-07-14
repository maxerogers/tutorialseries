<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package typefocus
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
	<?php do_action( 'typefocus_before' ); ?>
	<header id="masthead" class="site-header" role="banner">

		<!-- author, title, social  -->
		<div class="author-image">
			<?php if ( get_theme_mod( 'typefocus_author_image_disabled' )==false ): ?>			
				<?php
				$auth_img = get_theme_mod( 'typefocus_author_image' );
				if ( strlen($auth_img)==0 ){
					$auth_img= get_template_directory_uri()
					."/images/author-placeholder-nero.jpg";
				}
				print "<img src=".$auth_img." />";
				?>
			<?php endif; ?>		
		</div>
		
		<!-- Title and descr -->
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						
		</div>
		
		<!-- Social Icons -->
		<div class="header-social">
		<?php if ( get_theme_mod( 'typefocus_social_disabled' )==false ): ?>
			<?php
				if ( sizeof(get_theme_mod(typefocus_social))>0 ){
				$social_array = get_theme_mod(typefocus_social);
					if ( is_array($social_array) && (sizeof(array_filter($social_array))>0) ){
						foreach ($social_array as $this_social=>$social_link){
							$img_icon = "fa fa-".str_replace("tf_","",$this_social);
							//$img_icon = "fa fa-".str_replace("tf_","",$this_social)."-square";
							if ($social_link) {
								print "<a href=\"$social_link\">";
								print "<i class=\"$img_icon\"></i>";
								print"</a>";
							}
						}
					}
					else{
						// dummy icons here
						$dummy = array('github','linkedin','facebook','twitter');
						foreach ($dummy as $this_social){
							//print '<a href="#"><i class="fa fa-'.$this_social.'-square"></i></a>';
							print '<a href="#"><i class="fa fa-'.$this_social.'"></i></a>';
						}
					}
				}
			?>
		<?php endif; ?>	
		</div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'typefocus' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'typefocus' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		
		<!-- disclaimer -->
		<?php if( get_theme_mod(typefocus_disclaimer) ): ?>
		<div id="disclaimer" >
			<i class="fa fa-quote-left pull-left fa-border"></i>
			<?php echo get_theme_mod(typefocus_disclaimer);  ?>
		</div>
		<?php endif; ?>
		

	</header><!-- #masthead -->

	<div id="content" class="site-content">


