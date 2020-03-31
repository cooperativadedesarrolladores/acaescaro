<?php 
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="main-wrapper-item">
	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title">
						<?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
						<?php esc_html_e('Author Archives: ','invert-lite'); echo esc_attr($curauth->display_name);  ?>
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
			<div id="container"class="span8">
				<div id="content">
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<div class="navigation">	
						<?php if( function_exists("invert_lite_paginate") && get_theme_mod('blogpage_custom_pagination', 'on') == 'on' ) { invert_lite_paginate(); } else { ?>			
						<div class="alignleft"><?php previous_posts_link(esc_html__('&larr;Previous','invert-lite'),0) ?></div>		
						<div class="alignright"><?php next_posts_link(esc_html__('Next&rarr;','invert-lite'),0) ?></div>    		
						<?php } ?>					
					</div> 
					<?php else :  ?>
					<?php get_template_part( 'content', 'none' ); ?>
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