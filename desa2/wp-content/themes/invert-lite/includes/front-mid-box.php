<div id="featured-box" class="skt-section">
  <div class="container">
	<div class="mid-box-mid row-fluid">
		<!-- Featured Box 1 -->
		<div class="mid-box span4">
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if( get_theme_mod('first_feature_image', '') != '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod('first_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('first_feature_heading', __('Business Strategy', 'invert-lite') ) ); ?>">
						<img class="skin-bg" src="<?php echo esc_url( get_theme_mod('first_feature_image') ) ?>" alt="boximg"/>
					</a>
					<?php
					}
					else { ?><i class="fa fa-group"></i><?php  } ?>
				</div>
				<div class="iconbox-content">
					<h4><a class="iconbox-content-link" href="<?php echo esc_url( get_theme_mod('first_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('first_feature_heading', __('Business Strategy', 'invert-lite') ) ); ?>"><?php echo esc_attr( get_theme_mod('first_feature_heading', __('Business Strategy', 'invert-lite') ) ); ?></a></h4>
					<p><?php echo do_shortcode( wp_kses_post( get_theme_mod('first_feature_content', __('Get focused from your target consumers and increase your business with Web portal Design and Development.', 'invert-lite') ) ) ); ?></p>
				</div>			
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Featured Box 2 -->
		<div class="mid-box span4">
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if( get_theme_mod('second_feature_image', '') != '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod('second_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('second_feature_heading', __('Quality Products', 'invert-lite') ) ); ?>">
						<img class="skin-bg" src="<?php echo esc_url( get_theme_mod('second_feature_image') ) ?>" alt="boximg"/>
					</a>
					<?php } else { ?><i class="fa fa-shield"></i><?php  } ?>
				</div>
				<div class="iconbox-content">
					<h4><a class="iconbox-content-link" href="<?php echo esc_url( get_theme_mod('second_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('second_feature_heading', __('Quality Products', 'invert-lite') ) ); ?>"><?php echo esc_attr( get_theme_mod('second_feature_heading', __('Quality Products', 'invert-lite') ) ); ?></a></h4>
					<p><?php echo do_shortcode( wp_kses_post( get_theme_mod('second_feature_content', __('Products with the ultimate features and functionality that provide the complete satisfaction to the clients.', 'invert-lite') ) ) ); ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<!-- Featured Box 3 -->
		<div class="mid-box span4" >
			<div class="skt-iconbox iconbox-top">
				<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					<?php if( get_theme_mod('third_feature_image', '') != '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod('third_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('third_feature_heading', __('Best Business Plans', 'invert-lite') ) ); ?>">
						<img class="skin-bg" src="<?php echo esc_url( get_theme_mod('third_feature_image') ) ?>" alt="boximg"/>
					</a>				
					<?php } else { ?><i class="fa fa-desktop"></i><?php } ?>
				</div>			
				<div class="iconbox-content">
					<h4><a class="iconbox-content-link" href="<?php echo esc_url( get_theme_mod('third_feature_link', '#') ); ?>" title="<?php echo esc_attr( get_theme_mod('third_feature_heading', __('Best Business Plans', 'invert-lite') ) ); ?>"><?php echo esc_attr( get_theme_mod('third_feature_heading', __('Best Business Plans', 'invert-lite') ) ); ?></a></h4>
					<p><?php echo do_shortcode( wp_kses_post( get_theme_mod('third_feature_content', __('Based on the client requirement, different business plans suits and fulfill your business and cost requirement.', 'invert-lite') ) ) ); ?></p>
				</div>			
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
</div>