<?php if ('page' == get_option('show_on_front')) {?>

<?php
	get_header();
	
	get_template_part( 'invert-front-page' );

	get_footer();
?>

<?php } else {

	include( get_home_template() );

} ?>
