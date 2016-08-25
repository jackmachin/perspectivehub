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
                <?php
				    $post_type='page';
				    $special_posts=array('companies');
				    if(in_array($post->post_name,$special_posts))
				    {
					$post_type=$post->post_name;
                ?>
                    <?php $loop = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => 1000 ) ); ?>
					<?php if($loop->have_posts()): ?>
					   <div class="directoryElements">
						  <?php echo alphabetical_order_list($loop,$post_type); ?>
					    </div>
					<?php endif; ?>
                <?php } ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
