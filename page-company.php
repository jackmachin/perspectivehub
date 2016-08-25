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
                 <div class="company-map">
                    <?php
                        $args = array( 'post_type' => 'companies', 'posts_per_page' => 1000 );
                        $loop = new WP_Query( $args );
                    ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php if (get_field ('map')) { ?>
                            <a id="<?php the_field('id');?>" onclick="selectThis('<?php the_field('id');?>')" href="javascript:void(0);" class="bullet preview" style="top:<?php the_field('y-coord');?>px;left:<?php the_field('x-coord');?>px;"><?php the_title();?>
                                <img class="map-logo" id="map-logo-<?php the_field ('id');?>" src="<?php the_field('company-logo');?>" alt="<?php the_field('id');?>-Logo" width="220" height="55">
                            </a>
                        <?php } ?>
                    <?php endwhile; ?>
                </div>

                <?php wp_reset_query(); // RESETTING THE QUERY TO SET IT TO THE SAME THING SEEMS SMART ?>

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
        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
