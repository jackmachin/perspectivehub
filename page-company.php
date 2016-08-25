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
            <?php // get the posts from the current post_type (well, page slug actually) ?>
                    <?php $loop = new WP_Query( array(
                        'post_type' => 'companies',
                        'posts_per_page' => 1000 )
                    ); ?>
                    <div class="ifa-map">
					   <?php if($loop->have_posts()): ?>

                            <a id="<?php the_field('id');?>" onclick="selectThis('<?php the_field('id');?>')" href="javascript:void(0);" class="bullet preview"><?php the_title();?>
                                <img class="map-logo" id="map-logo-ad" src="<?php the_field('company-logo');?>" alt="<?php the_title();?>-Logo" width="220" height="55">
                            </a>
                        <?php endif; ?>
                    </div><!--ifa-map-->
                <?php } ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
