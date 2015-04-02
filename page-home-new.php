<?php
/*
* Template Name: New Homepage
*/
?>

<?php get_header(); ?>
    <div id="primary">
        <div id="content" role="main">
            <div id="newsticker">
			    <?php $loop = new WP_Query( array( 'post_type' => 'group-news', 'posts_per_page' => 2 ) ); ?>
			    <?php if($loop->have_posts()): ?>
				<ul id="hpageTicker">
				    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="date"><?php the_date(); ?></span><?php the_excerpt(); ?></li>
				    <?php endwhile; ?>
				</ul>
                <?php endif; ?>
            </div>

            <div id="portal">
                <?php wp_nav_menu(array(
                    'container' => 'div',                           // contain the menu in a div
                    'container_class' => 'home-menu-container cf',       // class of container (should you choose to use it)
                    'menu' => __( 'Home Portal', 'bonestheme' ),  // nav name
                    'menu_class' => 'nav home-nav cf',               // adding custom nav class
                    'theme_location' => 'home-portal',                 // where it's located in the theme
                    'before' => '',                                 // before the menu
                    'after' => '',                                  // after the menu
                    'link_before' => '',                            // before each link
                    'link_after' => '',                             // after each link
                    'depth' => 0,                                   // limit the depth of the nav
                    'fallback_cb' => ''                             // fallback function (if there is one)
                )); ?>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="entry-content">
                    <?php the_content();?>
                </div>
             <?php endwhile; endif; ?>

        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
