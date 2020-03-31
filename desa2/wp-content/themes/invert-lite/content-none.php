<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<div class="post">
	<h2><?php esc_html_e('Nothing Found','invert-lite'); ?></h2>
</div>
	  
<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? %1$s Get started here. %2$s', 'invert-lite' ), '<a href="'.esc_url(admin_url( 'post-new.php')).'">', '</a>' ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'invert-lite' ); ?></p>
	<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'invert-lite' ); ?></p>
	<?php get_search_form(); ?>
	<?php endif; ?>
</div><!-- .page-content -->
