<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
	<div class="featured-image-shadow-box">
		<?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'invert-lite-standardimg'); ?>
		<a href="<?php the_permalink(); ?>" class="image"><img src="<?php echo esc_url( $thumbnail[0] ); ?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/></a>
	</div>
   <?php } ?>
  
	<h1 class="post-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_title(); ?>
		</a>
	</h1>
	
	<div class="skepost-meta clearfix">
		<span class="date"><?php esc_html_e('On','invert-lite');?> <?php the_time('F j, Y') ?></span>,
		<span class="author-name"><?php esc_html_e('Posted by ','invert-lite'); the_author_posts_link(); ?> </span>,
		<?php if (has_category()) { ?><span class="category"><?php esc_html_e('In ','invert-lite');?><?php the_category(','); ?></span><?php esc_html_e(',','invert-lite');?><?php } ?>
		<?php the_tags('<span class="tags">By ',',','</span> ,'); ?>
		<span class="comments"><?php esc_html_e('With ','invert-lite');?><?php comments_popup_link(esc_html__('No Comments ','invert-lite'), esc_html__('1 Comment ','invert-lite'), esc_html__('% Comments ','invert-lite')) ; ?></span>
	</div>
	<!-- skepost-meta -->

	<div class="skepost">
		<?php the_excerpt(); ?> 
		<?php wp_link_pages(__('<p><strong>Pages:</strong> ','invert-lite'), '</p>', esc_html__('number','invert-lite')); ?>
		<div class="continue"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More &rarr;','invert-lite');?></a></div>		  
	</div>
	<!-- skepost -->
	
</div>
<!-- post -->