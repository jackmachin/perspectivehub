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

                        <div class="company-details <?php if (is_single('385')) { echo 'company-details-active';}?>" id="details-<?php the_field('id');?>">
                            <?php if( get_field('company-logo') ): ?>
                            <a href="<?php the_permalink(); ?>"><img class="company-logo aligncenter" src="<?php the_field('company-logo');?>"></a>
                            <?php endif;?>

                            <h2 class="company-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <?php if( get_field('company-address') ): ?>
                                <address>
                                    <?php the_field ('company-address');?>
                                </address>
                            <?php endif;?>

                            <?php if( get_field('company-phone') ): ?>
                                <p><strong>Phone:</strong>  <?php the_field ('company-phone');?></p>
                            <?php endif;?>
                            <?php if( get_field('company-website') ): ?>
                                <p><strong>Website:</strong> <a href="<?php the_field ('company-website');?>" target="_blank"><?php the_field ('company-website');?></a></p>
                            <?php endif;?>
                            <?php if( get_field('company-email') ): ?>
                                <p><strong>Email:</strong>  <a href="mailto:<?php the_field ('company-email');?>"><?php the_field ('company-email');?></a></p>
                            <?php endif;?>

                        </div>

                    <?php endwhile; ?>
                </div>
        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>
