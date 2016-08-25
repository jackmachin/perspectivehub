<?php
/**
 *
 * Template Name: Company
 *
 **/

get_header(); ?>
    <div id="primary">
        <div id="content" role="main">
            <?php the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
                <div class="ifa-content">
				<?php   $args = array( 'post_type' => 'companies', 'posts_per_page' => 1000 );
                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post();
                            the_title(); ?>
                            <img class="company-logo" src="<?php the_field('company-logo');?>">

                        <?php endwhile; ?>
                </div>
        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
