<?php 
/**
 * The template for displaying Error 404 page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="bread-title-holder">
<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
	<div class="container">
		<div class="row-fluid">
		  <div class="container_inner clearfix">
			<h1 class="title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.','invert-lite'); ?></h1>
			<?php if ((class_exists('invert_lite_breadcrumb_class'))) {$invert_breadcumb->invert_lite_custom_breadcrumb();} ?>
		   </div>
		 </div>
	</div>
</div>
<div class="page-content">
	<div class="container" id="error-404">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post">
					<div class="skepost">
						<p><?php esc_html_e( 'We bet this is not what you expected to see here!', 'invert-lite' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				<!-- skepost --> 
				</div>
			<!-- post -->
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>