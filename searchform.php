<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search the Hub', 'twentyeleven' ); ?>" />
		in 
		<select name="post_type">
		    <option value="companies">Companies</option>
		    <option value="employees">People</option>
		    <option value="specialities">Specialities</option>
		    <option value="group-news">News</option>
		    <option value="posts">Blog posts</option>
		</select>
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
	</form>
