<?php get_header(); ?>

<?php 
// Restrict posts on the index page to those in category home-page and to 10 postspodcast
// 'category_name' =>    'home-page',                    
// 'cat' => '-2'
$args = array( 'post_type' =>   'post',                        
               'posts_per_page' =>  10, 
	       'paged' =>  $paged,
	       'category_name' => 'home-page'
       );
query_posts( $args );
?>


  <!-- content -->
  <div class="content">
          
    <h1>News, Events and Updates</h1>

    <?php if (have_posts()) : ?>
    
        <?php while (have_posts()) : the_post(); ?>
          <!-- Start: Post -->
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <!-- <p class="postmeta">Posted on <a href="<?php the_permalink() ?>"><?php the_time( get_option( 'date_format' ) ) ?></a> by <?php the_author() ?></p>-->
            <div class="entryContent">
                <?php the_post_thumbnail(); ?>
                <?php the_content();  ?>
            </div>
            <!--<p>Posted in <?php the_category(', ') ?><?php the_tags( ' | Tags: ', ', ', ''); ?> | <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> </p>-->
          </div>
          <div class="clear"></div>
          <!-- End: Post -->
        <?php endwhile; ?>
    
        <div class="navigation">
          <div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
          <div class="alignright"><?php previous_posts_link('Next posts &raquo;') ?></div>
        </div>
    
      <?php else : ?>
    
        <h2 class="center">Not Found</h2>
        <p class="center">Sorry, but you are looking for something that isn't here.</p>
        <?php get_search_form(); ?>
    
      <?php endif; ?>
          </div>
<?php get_sidebar(); ?>          
<?php get_footer(); ?>
