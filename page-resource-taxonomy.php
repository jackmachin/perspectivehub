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
                <div class="subpages-container">
                    <?php
                        $xhtml = '';
                        $args = array(
                            'child_of' => $post->ID,
                            'sort_column' => 'page_title',
                            'parent' => $post->ID,
                            'hierarchical' => false,
                        );
                        $pages=get_pages( $args );

                        if(is_array($pages) && !empty($pages))
                        {
                            $xhtml .= '<ul class="subpages">
                            ';
                            $incr=1;
                            foreach($pages as $subpage)
                            {
                            //'.(strlen($subpage->post_content)>0?'<p class="description">'.substr(strip_tags($subpage->post_content),0,150).' <span class="read-more"><a href="'.$subpage->guid.'">...read more</a></span></p>':'').'
                            // subpages-thumbs
                            $xhtml .= '<li class="mod_2_'.($incr%2).' mod_3_'.($incr%3).' mod_4_'.($incr%4).' mod_5_'.($incr%5).' ">

                                <a href="'.$subpage->guid.'" class="subpage-title">
                                '.(strlen(get_the_post_thumbnail( $subpage->ID, 'subpages-thumbs' ))>0?get_the_post_thumbnail( $subpage->ID, 'subpages-thumbs' ):'<img src="'.get_bloginfo('template_url').'/images/noimg.jpg" />').'
                                    <span>'.$subpage->post_title.'</span>
                                </a>

                            </li>';
                            $incr++;
                            }

                            $xhtml .= '</ul>';
                        }
                        print($xhtml);
					?>
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
                        'resource_type'    => $tax,               // Finally, only if it is from the page titles taxonomy
                    );

                    $postslist = get_posts( $args ); // Get the posts from the same argument as before

                        foreach ( $postslist as $post ) : // For each post that matches the argument do the following

                        setup_postdata( $post ); //Grab the individual post data
                ?>

                    <section class="article entry-content resource-content">

                        <h2 id="<?php the_ID();?>" class="resource-title">

                            <span class="date gradient">
                                <span class="day"><?php echo get_the_date('d');?></span>
                                <span class="month"><?php echo get_the_date('M');?></span>
                            </span>
                            <strong><a href="<?php the_field('file'); ?>"><?php the_title();?></a></strong>

                        </h2>

                        <div class="resource-description">

                            <p><?php the_field('description'); ?></p>

                            <?php
                            $expiry_date = DateTime::createFromFormat('Ymd', get_field('expiry_date'));

                            if ( $expiry_date->format('Ymd') < date('Ymd') ) { ?>
                            <p><strong>WARNING: The Paradigm Compliance Confirmation for this item has expired.  To use it with clients it must be reviewed, amended if appropriate and resubmitted to <a href="http://www.perspectivehub.co.uk/group-compliance/financial-promotions/new-fp-submission/">Financial Promotions</a>.</strong></p>
                            <?php } else {} ?>

                            <a class="download-link" href="<?php the_field('file'); ?>">Download File</a>
                            <a class="download-link" href="<?php the_field('compliance_approval');?>">Compliance Confirmation</a>
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
