<?php

$bg_color = esc_attr( get_theme_mod('invert_lite_pri_color', '#1ac8d2') );
$headercolorpicker = esc_attr( get_theme_mod('invert_lite_headerbg_color', '#ffffff') );
$navfontcolorpicker = esc_attr( get_theme_mod('invert_lite_navfont_color', '#333333') );

$breadbgcolor = esc_attr( get_theme_mod('breadcrumbbg_color', '#F2F2F2') );
$breadtitlecolor = esc_attr( get_theme_mod('breadcrumbtxt_color', '#222222') );
$breadimage = esc_url( get_theme_mod('breadcrumbbg_image', get_template_directory_uri().'/images/danbo_green.jpg') );

$fullparallax_image = esc_url( get_theme_mod('parallax_image', get_template_directory_uri().'/images/PArallax_Vimeo_bg.jpg') );

?>

<style type="text/css">
/***************** Header Custom CSS *****************/
.skehead-headernav{background: <?php if(isset($headercolorpicker)){ echo $headercolorpicker; } ?>;}
/***************** Theme Custom CSS *****************/
.flex-control-paging li a.flex-active{background: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
.flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover,a#backtop,.slider-link a:hover,#respond input[type="submit"]:hover,.skt-ctabox div.skt-ctabox-button a:hover,#portfolio-division-box a.readmore:hover,.project-item .icon-image,.project-item:hover,.filter li .selected,.filter a:hover,.widget_tag_cloud a:hover,.continue a:hover,blockquote,.skt-quote,#invert-paginate .invert-current,#invert-paginate a:hover,.postformat-gallerydirection-nav li a:hover,#wp-calendar,.comments-template .reply a:hover,#content .contact-left form input[type="submit"]:hover,input[type="reset"]:hover,.service-icon:hover,.skt-parallax-button:hover,.sktmenu-toggle {background-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
.skt-ctabox div.skt-ctabox-button a,#portfolio-division-box .readmore,.teammember,.continue a,.comments-template .reply a,#respond input[type="submit"],.slider-link a,.ske_tab_v ul.ske_tabs li.active,.ske_tab_h ul.ske_tabs li.active,#content .contact-left form input[type="submit"],input[type="reset"],.filter a,.service-icon,.skt-parallax-button{border-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;}
.clients-items li a:hover{border-bottom-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;}
a,.ske-footer-container ul li:hover:before,.ske-footer-container ul li:hover > a,.ske_widget ul ul li:hover:before,.ske_widget ul ul li:hover,.ske_widget ul ul li:hover a,.title a ,.skepost-meta a:hover,.post-tags a:hover,.entry-title a:hover ,.continue a,.readmore a:hover,#Site-map .sitemap-rows ul li a:hover ,.childpages li a,#Site-map .sitemap-rows .title,.ske_widget a,.ske_widget a:hover,#Site-map .sitemap-rows ul li:hover,.mid-box:hover .iconbox-icon i,#footer .third_wrapper a:hover,.ske-title,#content .contact-left form input[type="submit"],.filter a,service-icon i,.social li a:hover:before,#respond input[type="submit"]{color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;text-decoration: none;}
.woocommerce-page .star-rating,.iconbox-content-link:hover,.page #content .title, .single #content .title,#content .post-heading,.childpages li ,.fullwidth-heading,.comment-meta a:hover,#respond .required{color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;} 
#skenav a{color:<?php if(isset($navfontcolorpicker)){ echo $navfontcolorpicker; } ?>;}
#skenav ul ul li a:hover{background: none repeat scroll 0 0 <?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
#full-twitter-box,.progress_bar {background: none repeat scroll 0 0 <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
#skenav ul li.current_page_item > a,
#skenav ul li.current-menu-ancestor > a,
#skenav ul li.current-menu-item > a,
#skenav ul li.current-menu-parent > a { background:<?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
#respond input, #respond textarea { border: 1px solid <?php if(isset($bg_color)){ echo $bg_color; } ?>;  }
#searchform input[type="submit"]{ background: none repeat scroll 0 0 <?php if(isset($bg_color)){ echo $bg_color; } else { echo '#1ac8d2';  } ?>;  }
.col-one .box .title, .col-two .box .title, .col-three .box .title, .col-four .box .title {color: <?php if(isset($bg_color)){ echo $bg_color; } ?> !important;  }

<?php if ( $breadimage != '' ) { ?>
	.full-bg-breadimage-fixed { background-image: url("<?php echo $breadimage; ?>"); }
<?php } else { ?>
	.full-bg-breadimage-fixed { background-color: <?php echo $breadbgcolor; ?>; }
<?php } ?>

.bread-title-holder .cont_nav_inner a{color:<?php if(isset($breadtitlecolor)){ echo $breadtitlecolor; } ?>;}
.full-bg-image-fixed { background-image: url("<?php if(isset($fullparallax_image)){ echo $fullparallax_image; } ?>"); }

/***************** Paginate *****************/
#skenav li a:hover,#skenav .sfHover { background: none repeat scroll 0 0 #333333;color: #FFFFFF;}
#skenav .sfHover a { color: #FFFFFF;}
#skenav ul ul li { background: none repeat scroll 0 0 #333333; color: #FFFFFF; }
#skenav .ske-menu #menu-secondary-menu li a:hover, #skenav .ske-menu #menu-secondary-menu .current-menu-item a{color: #71C1F2; }
.footer-seperator{background-color: rgba(0,0,0,.2);}
#skenav .ske-menu #menu-secondary-menu li .sub-menu li {margin: 0;}
</style>