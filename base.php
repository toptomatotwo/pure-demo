<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'pure-demo'); ?>
      </div>
    <![endif]-->
    <?php     $theme_settings = get_option('pure_demo_theme_options'); ?>

    <style type="text/css">
      .main {
        padding: 1rem;
      }
      .sidebar {
        padding: 1rem;
      }

      .site-title {
        margin-top: 1.4rem;
        font-family: 'IntroHead', monotype;
        font-size: 4rem;
      }

      .site-description {
        font-family: 'Typewriter', monotype;
      }

      .header {
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_background_color'])): ?>
          background-color: <?= $theme_settings['primary_background_color']; ?>
        <?php endif; ?>;
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_text_color'])): ?>
          color: <?= $theme_settings['primary_text_color']; ?>
        <?php endif; ?>;
      }
    </style>

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
<![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <div class="wrap" role="document">

      <div class="content pure-g">
        <main class="main pure-u-1 pure-u-md-4-5">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar pure-u-1 pure-u-md-1-5">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
