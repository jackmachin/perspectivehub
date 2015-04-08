<?php
/*
* Template Name: New Homepage
*/
?>

<?php get_header(); ?>
    <div id="primary">
        <div id="content" role="main">
            <div class="newsticker cf">
			    <?php $loop = new WP_Query( array( 'post_type' => 'group-news', 'posts_per_page' => 2 ) ); ?>
			    <?php if($loop->have_posts()): ?>
				<ul class="home-ticker">
				    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<li><a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="date"><?php the_date(); ?></span><?php the_excerpt(); ?></li>
				    <?php endwhile; ?>
				</ul>
                <?php endif; ?>
            </div>

            <div id="portal cf">
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

            <div class="pulse cf">
                <img src="<?php echo get_template_directory_uri();?>/images/pulse-1.png" width="400" height="133" class="alignleft">
                <div class="beat">
                <?php $loop = new WP_Query( array( 'post_type' => 'pulse', 'posts_per_page' => 3 ) ); ?>
			    <?php if($loop->have_posts()): ?>
				    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <h2 class="beat-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="beat-date"><?php the_date(); ?></span>
                    <div class="beat-excerpt"><?php the_excerpt(); ?></div>
				    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="entry-content cf">
                    <?php the_content();?>
                </div>
            <?php endwhile; endif; ?>

        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
