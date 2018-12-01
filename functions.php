<?php
if ( ! isset( $content_width ) )
	$content_width = 544;

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => __( 'Accessibility' ),
		'id' => 'accessibility-area',
		'description' => __( 'Accessibility bar at top of page' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
    ));
	register_sidebar(array(
		'name' => __( 'Contact details area' ),
		'id' => 'contact-details-area',
		'description' => __( 'The sidebar widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
		'name' => __( 'Search box area' ),
		'id' => 'search-box-area',
		'description' => __( 'The sidebar widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
		'name' => __( 'Left column' ),
		'id' => 'left-column',
		'description' => __( 'For placing items under the menu' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',
    ));
	register_sidebar(array(
		'name' => __( 'Right column' ),
		'id' => 'right-column',
		'description' => __( 'The sidebar widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',
    ));

function baza_noclegowa_init_method() {
    if (!is_admin()) {

        wp_enqueue_script( 'jquery' );

   wp_register_script('custom_script_1',
       get_template_directory_uri() . '/js/jquery.ddmenu.js');
   wp_enqueue_script('custom_script_1');
   }
}

register_nav_menus(
	array(
	  'primary' => 'Header Menu',
	  'footer-menu' => 'Footer Menu'
	)
);


add_action('init', 'baza_noclegowa_init_method');

add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-thumbnails');


//Multi-level pages menu
function baza_noclegowa_page_menu() {

if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; }
echo '<ul id="menu-main" class="menu">';
wp_list_pages('sort_column=menu_order&title_li=&link_before=<span>&link_after=</span>&depth=3');
echo '</ul>';
}

// Default excerpt length
function new_excerpt_length($length) {
	return 120;
}
add_filter('excerpt_length', 'new_excerpt_length');


// Turn Excerpt [...] into Read more link
function new_excerpt_more($more) {
	global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="more">More ...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Allow links in excerpt
function new_wp_trim_excerpt($text) {
    $raw_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = strip_shortcodes( $text );

        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
		$text = str_replace('/*', '', $text);
		$text = str_replace('*/', '', $text);
        $text = strip_tags($text, '<a><h3><ul><li><strong><br><p>');
        $excerpt_length = apply_filters('excerpt_length', 55);

        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $words = preg_split('/(<a.*?a>)|\n|\r|\t|\s/', $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE );
        if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }
    }
    return apply_filters('new_wp_trim_excerpt', $text, $raw_excerpt);

}

// Ian: Add a function to restrict posts on the theme home page to category 7 - Home page
// function home_page_category( $query ) {
 // error_log('wibble is_home:' . $query->is_home() . 
 //  ' is_main_query:' . $query->is_main_query() . 
 //  ' is_front_page:' . $query->is_front_page() . 
 //  ' is_feed:' . $query->is_feed() );

//  if ( $query->is_home() && $query->is_main_query() ) {
//    $query->set( 'cat', '7');
//  }
// }
// add_filter( 'pre_get_posts', 'home_page_category' );

// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'new_wp_trim_excerpt');
?>
