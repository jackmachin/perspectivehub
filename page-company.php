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
                <div class="company-content">
				    <?php
                        $args = array( 'post_type' => 'companies', 'posts_per_page' => 1000 );
                        $loop = new WP_Query( $args );
                    ?>

                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <div class="company-details" id="<?php the_field('id');?>-details">
                            <h2 class="company-name"><?php the_title(); ?></h2>

                            <?php if( get_field('company-logo') ): ?>
                                <img class="company-logo" src="<?php the_field('company-logo');?>">
                            <?php endif;?>

                            <?php if( get_field('company-address') ): ?>
                                <address>
                                    <?php the_field ('company-address');?>
                                </address>
                            <?php endif;?>

                            <?php if( get_field('company-website') ): ?>
                                <p><strong>Website:</strong> <?php the_field ('company-website');?></p>
                            <?php endif;?>
                            <?php if( get_field('company-phone') ): ?>
                                <p><strong>Phone:</strong></p>
                            <?php endif;?>
                            <?php if( get_field('company-email') ): ?>
                                <p><strong>Email:</strong></p>
                            <?php endif;?>

                        </div>

                    <?php endwhile; ?>
                </div>
                <div class="company-map">
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <p>Glarghaey</p>
                    <?php endwhile; ?>
                </div>
        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
