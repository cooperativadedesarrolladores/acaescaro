<?php
/***************** EXCERPT LENGTH *****************/
function invert_lite_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'invert_lite_excerpt_length');

/***************** READ MORE *****************/

function invert_lite_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'invert_lite_excerpt_more');

/************* CUSTOM PAGE TITLE **********
*******************************************/
add_filter( 'wp_title', 'invert_lite_title' );
function invert_lite_title($title)
{
	$invert_lite_title = $title;
	if ( is_home() && !is_front_page() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$invert_lite_title .=  get_bloginfo('name');
		$invert_lite_title .= ' | '; 
		$invert_lite_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$invert_lite_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		global $wp_query;
		$curauth = $wp_query->get_queried_object();	
		$invert_lite_title .= __('Author: ','invert-lite');
		$invert_lite_title .= $curauth->display_name;
		$invert_lite_title .= ' | ';
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$invert_lite_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$invert_lite_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$invert_lite_title .= get_bloginfo('name');
		}					
	}
	return $invert_lite_title;
}

/********************************************
 PAGINATION
*********************************************
 * Retrieve or display pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</div>' (string). The html or text to add after the
 *      pagination links.
 * 'title' - Default is '__('Pages:', 'invert-lite')' (string). The text to display before the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;', 'invert-lite')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo', 'invert-lite')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 *
 * @param array|string $args Optional. Override default arguments.
 * @return string HTML content, if not displaying.
 *  
 * 
 * Usage:
 * 
 * <?php if (function_exists("invert_lite_paginate")) { invert_lite_paginate(); } ?>
 *	 
 */
function invert_lite_paginate($args = null) {

    $defaults = array(
        'page' => null, 
		'pages' => null, 
        'range' => 3, 
		'gap' => 3, 
		'anchor' => 1,
        'before' =>'<div id="invert-paginate">', 
		'after' => '<div class="clear"></div></div>',
        'title' => '',
        'nextpage' => __('<i class="fa fa-angle-right"></i>', 'invert-lite'), 
		'previouspage' => __('<i class="fa fa-angle-left"></i>', 'invert-lite'),
        'echo' => 1
    );

    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);

    if (!$page && !$pages) {
        global $wp_query;
        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;
        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }

    $output = "";

    if ($pages > 1) {    

        $output .= "$before<span class='invert-title'>$title</span>";
        $ellipsis = "<span class='invert-gap'>...</span>";

        if ($page > 1 && !empty($previouspage)) {
            $output .= "<a href='" . get_pagenum_link($page - 1) . "' class='invert-prev'>$previouspage</a>";
        }
		
        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;
        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s', 
                invert_lite_paginate_loop(1, $anchor), 
                $ellipsis, 
                invert_lite_paginate_loop($block_min, $pages, $page)
            );
        }

        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s', 
                invert_lite_paginate_loop(1, $anchor), 
                $ellipsis, 
                invert_lite_paginate_loop($block_min, $block_high, $page), 
                $ellipsis, 
                invert_lite_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }

        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s', 
                invert_lite_paginate_loop(1, $block_high, $page),
                $ellipsis,
                invert_lite_paginate_loop(($pages - $anchor + 1), $pages)
            );
        }

        else {
            $output .= invert_lite_paginate_loop(1, $pages, $page);
        }

        if ($page < $pages && !empty($nextpage)) {
           $output .= "<a href='" . get_pagenum_link($page + 1) . "' class='invert-next'>$nextpage</a>";
        }
        $output .= $after;
    }

    if ($echo) {
        echo $output;
    }
    return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 * @access private
 *
 * @param int $start The first link page.
 * @param int $max The last link page.
 * @return int $page Optional, default is 0. The current page.
 */

function invert_lite_paginate_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i)) 

            ? "<span class='invert-page invert-current'>$i</span>" 

            : "<a href='" . get_pagenum_link($i) . "' class='invert-page'>$i</a>";
    }
    return $output;
}


/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ){
    $content_width = 900;
}


/*********************************************
*   LIMIT WORDS
*********************************************/
function invert_lite_slider_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}
