<?php
/**
 * Custom Theme Functions
 *
 * @package second-mile
 */

define( 'THEME_VERSION', '1.0.0' );
define( 'THEME_NAME', 'secondmile' );

// Setup
include 'inc/setup.php';

// Customizations
include 'inc/customize.php';

// Favicons
include 'inc/favicons.php';

// Setup
include 'inc/pages-taxonomy.php';

// Assets.
include 'inc/assets.php';

// Changing posts to news
include 'inc/post-to-ministries.php';

// Disable Comments.
include 'inc/remove-comments.php';

// Add option pages for custom post types
include 'inc/option-pages.php';

// Add helper functions
include 'inc/helpers.php';

// Shortcodes
include 'inc/shortcodes.php';

// Custom active class on menu items
include 'inc/menu.php';

// Auto copyright
include 'inc/copyright.php';

// Setup Cloudinary Config
include 'inc/cloudinary.php';

// Template functions
include 'inc/templates.php';