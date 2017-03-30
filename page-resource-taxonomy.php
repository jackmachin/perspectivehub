<?php
/*
* Template Name: Resource Taxonomy
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
                    <?php the_content ();?>
                </div>

                <div class="post-container">

                <?php

                    $tax = get_the_title();     // Set the page title

                    $args = array(
                        'posts_per_page'   => -1,                   // Unlimited Posts Per Page
                        'orderby'          => 'date',               // Order by Date
                        'order'            => 'DESC',               // In descending order
                        'post_type'        => 'resource',           // But only resources
                        'post_status'      => 'publish',            // Also, only if it is published
                        'resource_category'      => $tax,               // Finally, only if it is from the page titles taxonomy
                    );

                    $postslist = get_posts( $args ); // Get the posts from the same argument as before

                        foreach ( $postslist as $post ) : // For each post that matches the argument do the following

                        setup_postdata( $post ); //Grab the individual post data
                ?>

                    <section class="article entry-content">

                        <h2 id="<?php the_ID();?>" class="resource-title">

                            <?php if (the_field('file_format') == 'pdf' ) { echo 'pdf icon';}?>

                            <strong><a href="<?php the_field('file'); ?>"><?php the_title();?></a></strong>

                        </h2>

                        <div class="resource-content">

                            <p><?php the_field('description'); ?></p>

                            <?php
                            $expiry_date = DateTime::createFromFormat('Ymd', get_field('expiry_date'));

                            if ( $expiry_date->format('Ymd') < date('Ymd') ) { ?>
                                <p><strong>PLEASE NOTE:The compliance signoff for this resource has expired. To use it with clients it must be resubmitted to Financial Promotions.</strong></p>
                            <?php } else {} ?>

                            <a href="<?php the_field('file'); ?>">Download File</a>
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
