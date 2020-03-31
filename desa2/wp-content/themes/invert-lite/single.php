<?php 
/**
 * The Template for displaying all single posts.
 */
get_header(); ?>

<div class="main-wrapper-item">

	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>

	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
				<h1 class="title">
					<?php the_title(); ?>
				</h1>
				<?php
						if( get_theme_mod('breadcrumb_sec', 'on') == 'on' ) {
							if ((class_exists('invert_lite_breadcrumb_class'))) {$invert_breadcumb->invert_lite_custom_breadcrumb();}
					    }
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="container post-wrap">
		<div class="row-fluid">
			<div id="container" class="span8">
				<div id="content">  
					<div class="post" id="post-<?php the_ID(); ?>">
						<?php $format = get_post_format(); ?> 
						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
						<div class="featured-image-shadow-box">
							<a href="<?php the_permalink(); ?>" class="image">
							<?php the_post_thumbnail('invert-lite-standardimg'); ?>
							</a>
						</div>
						<?php } ?>

						<div class="bread-title">
							<h1 class="title"><?php the_title(); ?></h1>
							
							<div class="clearfix"></div>
						</div>

						<div class="skepost-meta clearfix">
							<span class="date"><?php esc_html_e('On','invert-lite');?> <?php the_time('F j, Y') ?></span><?php esc_html_e(',','invert-lite');?>
							<span class="author-name"><?php esc_html_e('Posted by ','invert-lite'); the_author_posts_link(); ?> </span><?php esc_html_e(',','invert-lite');?>
							<?php if (has_category()) { ?><span class="category"><?php esc_html_e('In ','invert-lite');?><?php the_category(','); ?></span><?php esc_html_e(',','invert-lite');?><?php } ?>
							<?php the_tags('<span class="tags">By ',',','</span> ,'); ?>
							<span class="comments"><?php esc_html_e('With ','invert-lite');?><?php comments_popup_link(esc_html__('No Comments ','invert-lite'), esc_html__('1 Comment ','invert-lite'), esc_html__('% Comments ','invert-lite')) ; ?></span>
						</div>

						<!-- skepost-meta -->
						<div class="skepost">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages :','invert-lite').'</strong>','after' => '</p>', esc_html__('number','invert-lite'))); ?>
						</div>
						<!-- skepost -->

						<div class="navigation">
							<span class="nav-previous">
								<?php previous_post_link( esc_html__('&larr; %link','invert-lite')); ?>
							</span> 
							<span class="nav-next">
								<?php next_post_link( esc_html__('%link &rarr;','invert-lite')); ?>
							</span> 
						</div>
						
						<div class="clear"></div>
						<div class="comments-template">
							<?php comments_template( '', true ); ?>
						</div>
					</div>
					<!-- post -->
					
					<?php endwhile; ?>
					<?php else :  ?>
					<div class="post">
						<h2><?php esc_html_e('Not Found','invert-lite'); ?></h2>
					</div>
					<?php endif; ?>
				</div>
				<!-- content --> 
			</div>
			<!-- container --> 
			
			<!-- Sidebar -->
			<div id="sidebar" class="span3">
				<?php get_sidebar(); ?>
			</div>
			<!-- Sidebar --> 
		</div>
	</div>

</div>
<?php get_footer(); ?>