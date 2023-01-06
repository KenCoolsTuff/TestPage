<?php
//about theme info
add_action( 'admin_menu', 'vw_church_gettingstarted' );
function vw_church_gettingstarted() {
	add_theme_page( esc_html__('About VW Church', 'vw-church'), esc_html__('About VW Church', 'vw-church'), 'edit_theme_options', 'vw_church_guide', 'vw_church_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_church_admin_theme_style() {
	wp_enqueue_style('vw-church-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-church-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_church_admin_theme_style');

//guidline for about theme
function vw_church_mostrar_guide() { 
	//custom function about theme customizer
	$vw_church_return = add_query_arg( array()) ;
	$vw_church_theme = wp_get_theme( 'vw-church' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Church', 'vw-church' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-church' ); ?>: <?php echo esc_html($vw_church_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-church'); ?></p>
    </div>

    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Makeup Artist at 20% Discount','vw-church'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-church'); ?> ( <span><?php esc_html_e('vwpro20','vw-church'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_CHURCH_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-church' ); ?></a>
			</div>
		</div>
   	</div>
    
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_church_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-church' ); ?></button>
			<button class="tablinks" onclick="vw_church_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-church' ); ?></button>
			<button class="tablinks" onclick="vw_church_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-church' ); ?></button>
			<button class="tablinks" onclick="vw_church_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-church' ); ?></button>
			<button class="tablinks" onclick="vw_church_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-church' ); ?></button>
		  	<button class="tablinks" onclick="vw_church_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-church' ); ?></button>
		</div>

		<?php
			$vw_church_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_church_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Church_Plugin_Activation_Settings::get_instance();
				$vw_church_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-church-recommended-plugins">
				    <div class="vw-church-action-list">
				        <?php if ($vw_church_actions): foreach ($vw_church_actions as $key => $vw_church_actionValue): ?>
				                <div class="vw-church-action" id="<?php echo esc_attr($vw_church_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_church_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_church_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_church_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-church'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_church_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-church' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW Church is a theme for charity, church, churches, donation, events, fundraising, nonprofit, religion, religious, responsive, sermon, sermons, charitable, charity, Christian, church, church theme, donate, donation, fundraising, fundraising theme, NGO, nonprofit, nonprofit theme, religion, spiritual, and volunteer websites. It has viable to create any kind of internet site associated with the blog, portfolio or enterprise and above that, it is accompanied by the WooCommerce save comprising of a graph that is lovely to the core and at the equal time expert as well. VW Church is now not solely quick but responsive to the core, different from being RTL and translation geared up and rather appropriate for some of the greatest search engine optimization practices. The eCommerce aspects of this class theme are special, and there is no doubt about this fact. It is a lovely Retina-prepared theme with it is user-friendliness. The VW church is remarkable and responsive. Keeping in thinking the degree of points it possesses and its lengthy-time period functionality to be a large useful resource and at the equal time being stunning makes it rather appropriate for a blog, private portfolio, WooCommerce save or any variety of enterprise website.','vw-church'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-church' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-church' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CHURCH_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-church' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-church'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-church'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-church'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-church'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-church'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CHURCH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-church'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-church'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-church'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CHURCH_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-church'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-church' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-church'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-church'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-church'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_events_section') ); ?>" target="_blank"><?php esc_html_e('Events Section','vw-church'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-church'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-church'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-church'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-church'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-church'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-church'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-church'); ?></span><?php esc_html_e(' Go to ','vw-church'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-church'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-church'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-church'); ?></span><?php esc_html_e(' Go to ','vw-church'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-church'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-church'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-church'); ?> <a class="doc-links" href="<?php echo esc_url( VW_CHURCH_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-church'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
			$plugin_ins = VW_Church_Plugin_Activation_Settings::get_instance();
			$vw_church_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-church-recommended-plugins">
				    <div class="vw-church-action-list">
				        <?php if ($vw_church_actions): foreach ($vw_church_actions as $key => $vw_church_actionValue): ?>
				                <div class="vw-church-action" id="<?php echo esc_attr($vw_church_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_church_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_church_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_church_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-church'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_church_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-church' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-church'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-church'); ?></b></p>
	              	<div class="vw-church-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-church'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-church' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-church'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-church'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-church'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-church'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-church'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-church'); ?></a>
							</div>
						</div>
					</div>
				</div>

	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Church_Plugin_Activation_Settings::get_instance();
			$vw_church_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-church-recommended-plugins">
				    <div class="vw-church-action-list">
				        <?php if ($vw_church_actions): foreach ($vw_church_actions as $key => $vw_church_actionValue): ?>
				                <div class="vw-church-action" id="<?php echo esc_attr($vw_church_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_church_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_church_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_church_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-church' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-church-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-church'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-church' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-church'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-church'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-church'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-church'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_church_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-church'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-church'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Church_Plugin_Activation_Woo_Products::get_instance();
				$vw_church_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-church-recommended-plugins">
					    <div class="vw-church-action-list">
					        <?php if ($vw_church_actions): foreach ($vw_church_actions as $key => $vw_church_actionValue): ?>
					                <div class="vw-church-action" id="<?php echo esc_attr($vw_church_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_church_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_church_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_church_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-church' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-church-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-church'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-church'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-church'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-church'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-church'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-church'); ?></span></b></p>
	              	<div class="vw-church-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-church'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-church'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-church' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This premium VW Religion WordPress Theme is for all these searching to set up a charity internet site with minimal effort. It offers a fantastic platform to exhibit your philanthropic work most convincingly. The internet site installed thru this theme will ease the procedure of associating with human beings fascinated in becoming a member of you and those in want of your help. The VW Religion WordPress Theme can be used by using these strolling charity houses, trusts, blood donation camps, welfare things to do and NGOs. You can use it if you usually organise fundraising occasions and donation camps. The theme can be set up within a few minutes and has low maintenance. Its code has been checked to comply with WordPress standards. This top-class non-profit WordPress theme has a minimal graph and a simple interface for undemanding navigation. It has a special and stunning graph to make your online website attractive.','vw-church'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_CHURCH_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-church'); ?></a>
					<a href="<?php echo esc_url( VW_CHURCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-church'); ?></a>
					<a href="<?php echo esc_url( VW_CHURCH_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-church'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-church' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-church'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-church'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-church'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-church'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-church'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-church'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-church'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-church'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-church'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-church'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-church'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-church'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-church'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-church'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_CHURCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-church'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-church'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-church'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CHURCH_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-church'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-church'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-church'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CHURCH_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-church'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-church'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-church'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CHURCH_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-church'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-church'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-church'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CHURCH_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-church'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-church'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-church'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CHURCH_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-church'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>