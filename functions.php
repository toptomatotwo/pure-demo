<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  //'lib/theme-options.php' // Add a couple of options for the theme
  //'lib/options.php' // Add a couple of options for the theme
  /**
 * Helper library for the theme customizer.
 */
'extensions/customizer-library/customizer-library.php',

/**
 * Define options for the theme customizer.
 */
'extensions/customizer-options.php',

/**
 * Sets up the options panel and default functions
 */
'extensions/mods.php',

/**
 * Adds general template functions
 */
'extensions/template-helpers.php',

/**
 * Adds general portfolio functions
 */
'extensions/portfolio-helpers.php',

/**
 * Custom functions that act independently of the theme templates.
 */
'extensions/extras.php'
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'pure-demo'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


