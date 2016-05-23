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

      .site-title a {
        margin-top: 1.4rem;
        font-family: 'IntroHead', monotype;
        font-size: 4rem;
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_text_color'])): ?>
          color: <?= $theme_settings['primary_text_color']; ?>;
        <?php endif; ?>;
      }

      h1, h2, h3, h4 {
        font-family: 'IntroHead', monotype;
      }
      .site-description {
        font-family: 'TypewriterLite', monotype;
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_text_color'])): ?>
          color: <?= $theme_settings['primary_text_color']; ?>;
        <?php endif; ?>;
      }

      .header {
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_background_color'])): ?>
          background-color: <?= $theme_settings['primary_background_color']; ?>;
        <?php endif; ?>;
        <?php if ( preg_match('/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/', $theme_settings['primary_text_color'])): ?>
          color: <?= $theme_settings['primary_text_color']; ?>;
        <?php endif; ?>;
      }

      p, span {
        font-family: Helvetica, Verdana, sans-serif;
      }

        body {
    font-family: arial;
  }

  table {
    border: 1px solid #ccc;
    width: 100%;
    margin:0;
    padding:0;
    border-collapse: collapse;
    border-spacing: 0;
  }

  table tr {
    border: 1px solid #ddd;
    padding: 5px;
  }

  table th, table td {
    padding: 10px;
    text-align: center;
  }

  table th {
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
  }

  @media screen and (max-width: 600px) {

    table {
      border: 0;
    }

    table thead {
      display: none;
    }

    table tr {
      margin-bottom: 10px;
      display: block;
      border-bottom: 2px solid #ddd;
    }

    table td {
      display: block;
      text-align: right;
      font-size: 13px;
      border-bottom: 1px dotted #ccc;
    }

    table td:last-child {
      border-bottom: 0;
    }

    table td:before {
      content: attr(data-label);
      float: left;
      text-transform: uppercase;
      font-weight: bold;
    }
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
