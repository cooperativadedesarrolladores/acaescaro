<?php 
/*
Template Name: Left Sidebar Template
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

	<div class="page-content left-sidebar">
		<div class="container post-wrap">
			<div class="row-fluid">
				<!-- Sidebar -->
				<div id="sidebar" class="span3">
					<?php get_sidebar(); ?>
				</div>
				<!-- Sidebar --> 

				<div id="content" class="span8">
					<div class="post" id="post-<?php the_ID(); ?>">
						<div class="skepost">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages :','invert-lite').'</strong>','after' => '</p>', esc_html__('number','invert-lite'))); ?>
						</div>
						<!-- skepost --> 
					</div>
					<!-- post -->
					<?php endwhile; ?>
					<?php else :  ?>
					<div class="post">
						<h2>
							<?php esc_html_e('Page Does Not Exist','invert-lite'); ?>
						</h2>
					</div>
					<?php endif; ?>
					<div class="clearfix"></div>
				</div>
				<!-- content -->
			</div>
		</div>
	</div>
	
</div>
<?php get_footer(); ?>