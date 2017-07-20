<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
  <!--<![endif]-->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <div id="ie6-alert" style="width: 100%; text-align:center;">
    <img src="http://beatie6.frontcube.com/images/ie6.jpg" alt="Upgrade IE 6" width="640" height="344" border="0" usemap="#Map" longdesc="http://die6.frontcube.com" />
    <map name="Map" id="Map"><area shape="rect" coords="496,201,604,329" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target="_blank" alt="Download Interent Explorer" /><area shape="rect" coords="380,201,488,329" href="http://www.apple.com/safari/download/" target="_blank" alt="Download Apple Safari" /><area shape="rect" coords="268,202,376,330" href="http://www.opera.com/download/" target="_blank" alt="Download Opera" /><area shape="rect" coords="155,202,263,330" href="http://www.mozilla.com/" target="_blank" alt="Download Firefox" />
      <area shape="rect" coords="35,201,143,329" href="http://www.google.com/chrome" target="_blank" alt="Download Google Chrome" />
    </map>
  </div>
  <![endif]-->
	<?php wp_head(); ?>
</head>
<body>
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <div class="info">
          <div class="row">
            <div class="grid_6">
              <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                <a href="/">
					<?php echo ra_title_parts( get_bloginfo( 'name' ), ' ' ) ?>
				 </a>
              </h1>
            </div>
            <div class="grid_6">
              <div class="phone wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                <span class="first"><?php echo get_theme_mod( 'header-phone-sup' ); ?></span>
                <address><?php echo get_theme_mod( 'header-phone' ); ?></address>
                <p><?php echo get_theme_mod( 'header-phone-sub' ); ?></p>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div id="stuck_container">
    <div class="container">
      <div class="row">
        <div class="grid_10">
			<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => '', 'menu' => 'main', 'menu_class' => 'sf-menu' ) ); ?>
        </div>
        <div class="grid_2">
			<?php if ( ! is_user_logged_in() ) : ?>
				<a id="login-link" class="popup-link login-link" href=""><?php _e( 'Login', 'roddomartem' ) ?></a>
				<div class="popup-container login-form" id="login-form"><?php wp_login_form(); ?></div>
			<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</header>




<!--========================================================
                          CONTENT
=========================================================-->
<section id="content" class="<?php if ( ! is_front_page() ) echo 'common'; ?>">
