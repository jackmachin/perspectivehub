<?php
/*
* Template Name: Hints Taxonomy
*/

get_header();
?>

<a name="top"></a>
    <div id="primary">
        <div id="content" role="main">

            <?php the_post();?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content cf">
                    <p><img class="alignleft wp-image-2605 size-full" title="hints-n-tips" src="http://www.perspectivehub.co.uk/wp-content/uploads/2013/08/hints-n-tips.png" alt="" width="138" height="200" /><strong>If you have any queries regarding the hints and tips please do not hesitate to contact Richard Heywood, Business Monitoring Manager, on 0161 244 9759 or at <a href="mailto:richard.heywood@pfgl.co.uk">richard.heywood@pfgl.co.uk</a>.</strong></p>
                </div>

                <div class="post-container">

                    <div class="entry-content article-sidebar">

                        <h2><strong>Hints &amp; Tips</strong></h2>

                        <ul class="quick-links">
                            <?php

                                $tax = get_the_title();     // Set the page title

                                $args = array(
                                    'posts_per_page'   => -1,                   // Unlimited Posts Per Page
                                    'orderby'          => 'date',               // Order by Date
                                    'order'            => 'DESC',               // In descending order
                                    'post_type'        => 'file-review-hint',   // But only file review hints and tips
                                    'post_status'      => 'publish',            // Also, only if it is published
                                    'hint_category'      => $tax,               // Finally, only if it is from the page titles taxonomy
                                );

                                $postslist = get_posts( $args ); // Get the posts from the argument above

                                    foreach ( $postslist as $post ) : // For each post that matches the argument

                                        setup_postdata( $post );  // Get the post data to use template tags

                            ?>

                                <li>
                                    <a href="#<?php the_ID();?>"><?php the_title();?></a>
                                </li>

                            <?php
                                endforeach; // End the for each

                                wp_reset_postdata(); // Reset the postdata to the page
                            ?>

                        </ul>

                    </div>

                <?php

                    $postslist = get_posts( $args ); // Get the posts from the same argument as before

                        foreach ( $postslist as $post ) : // For each post that matches the argument do the following

                        setup_postdata( $post ); //Grab the individual post data
                ?>

                    <section class="article entry-content">

                        <h2 id="<?php the_ID();?>" class="file-review-title">
                            	    <span class="date gradient"><span class="day"><?php the_date('d');?></span><span class="month"><?php the_date('M');?></span></span>
                            <strong><a href="<?php the_permalink()?>"><?php the_title();?> -  <?php the_time( get_option( 'date_format' ) ); ?></a></strong>

                        </h2>

                        <div class="file-review-content">

                            <?php the_excerpt();?>

                            <!-- p><a href="#top">Back to top...</a></p-->

                        </div>

                    </section>
                <?php

                    endforeach; // Stop the for each

                    wp_reset_postdata(); // Revert back to the pages post data

                ?>
                </div><!-- .post-container -->

            </article><!-- #post-<?php the_ID(); ?> -->

        </div><!-- #content -->

    </div><!-- #primary -->

<?php get_footer(); ?>
