<div id="header" class="header pure-u-1">
  <header id="masthead" class="site-header" role="banner">
    <div id="branding" class="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    </div>
    <nav class="nav">
      <?php
      /**
       * Only get the Primary menu if it is set in the WordPress Admin.
       * The menu_class argument breaks if there is no menu activated in the WordPress Admin
       */
        if ( has_nav_menu( 'primary_navigation' ) ) :
           wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-list']);
        endif;
      ?>
    </nav>
  </header>
</div>
