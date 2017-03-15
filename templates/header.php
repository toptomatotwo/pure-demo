<?php
use  Roots\Sage\HeroRender;
?>
<div id="header" class="header pure-u-1" >
  <header id="masthead" class="site-header" role="banner">
    <!--
    <div id="pure-demo" class="pure-g">
      <div class="pure-u-lg-4-24">hello</div>
      <div class="pure-u-lg-16-24">hello</div>
      <div class="pure-u-lg-4-24">hello</div>
    </div>  -->
    <div id="branding" class="site-branding pure-g">
        <div class="pure-u-lg-4-24 pure-u-md-4-24 pure-u-sm-1 branding-logo-1"><a href="/"><img src="http://ohya.dev/wp/wp-content/img/OhYaLogo_trans.png" alt="OhYa Logo"></a></div>
    <?php
    if ( false ) : ?>
        <a class="navmenu-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
            <img src='<?php echo esc_url( $logo_image ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
        </a>
    <?php else : ?>
      <div class="pure-u-lg-16-24 pure-u-md-16-24 pure-u-sm-1 site-title-div"><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1></div>
    <?php endif; ?>
      <!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
      <div class="pure-u-lg-4-24 pure-u-md-4-24 pure-u-sm-1 branding-logo-2"><a href="http://ravenswingyoga.com/" target="_blank"><img src="http://ohya.dev/wp/wp-content/img/logoRWa.png" alt="Ravens Wing Yoga Logo"></a></div>
    </div>
    <nav class="navigation_container">
      <?php
      /**
       * Only get the Primary menu if it is set in the WordPress Admin.
       * The menu_class argument breaks if there is no menu activated in the WordPress Admin
       */
        if ( has_nav_menu( 'primary_navigation' ) ) :
           wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'rm-closed']);
        endif;
      ?>
    </nav>
  </header>
</div><?php HeroRender\puredemo_get_her(); ?>

