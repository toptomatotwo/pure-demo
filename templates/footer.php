<footer class="content-info">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
  <div id="colophon" class="site-footer" role="contentinfo">
  <?php
    if ( has_nav_menu( 'footer_links' ) ) :
       wp_nav_menu(['theme_location' => 'footer_links', 'container_class' => 'pure-menu', 'menu_class' => 'pure-menu-list']);
    endif;
  ?>
  </div>

	<div class="site-info">
		<?php printf( __( 'Site by %1$s.', 'pure-demo' ), '<a href="http://www.mzoo.org" rel="designer">Mike iLL/mZoo.org</a>'  ); ?>
	</div>
</footer>
