<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s'), max( $paged, $page ) );

	?></title>




<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" );?>
<?php wp_head(); ?>
<!--[if lte IE 9]><link href="<?php echo get_template_directory_uri(); ?>/ie9.css" rel="stylesheet" media="screen" type="text/css" /><![endif]-->	
<!--[if lte IE 8]><link href="<?php echo get_template_directory_uri(); ?>/ie8.css" rel="stylesheet" media="screen" type="text/css" /><![endif]-->
<!--[if lte IE 7]><link href="<?php echo get_template_directory_uri(); ?>/ie7.css" rel="stylesheet" media="screen" type="text/css" /><![endif]-->
<!--[if lte IE 6]><link href="<?php echo get_template_directory_uri(); ?>/ie6.css" rel="stylesheet" media="screen" type="text/css" /><![endif]-->
<!--[if IE 6]><script src="<?php echo get_template_directory_uri(); ?>/js/DD_belatedPNG.js"></script><![endif]-->
</head>
<body <?php body_class(); ?>>
	<div class="all-page">
		
		<div class="container">
			
			<!-- HEADER -->
			<div id="header">
			    <div class="website-name"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" border="0" /></a></div>
				<div class="slogan"></div>
				<div class="top-menu"><?php dynamic_sidebar ('accessibility-area');?></div>
				<div class="contact"><?php dynamic_sidebar ('contact-details-area');?></div>
			</div>
			<!-- /HEADER -->
			
			<div class="midContainer">
				
				<!-- main NAVIGATION -->
				<div id="mainNav">
					
					<div class="wrap">
						<div class="wrap2">
							<div class="description"><?php bloginfo('description'); ?></div>
							<div class="searchBox"><?php dynamic_sidebar ('search-box-area');?></div>
						</div>
					</div>
				</div>
				<!-- /main NAVIGATION -->
				<div class="clear"></div>
				
				<!-- CONTENT -->
				<div id="content">
					
					<div class="sideBarLeft">
						<div class="nav">
							<div class="bFrameT"><i></i></div>
								<?php dynamic_sidebar ('left-column');?>
							<div class="bFrameB"><i></i></div>
						</div>
					</div>
