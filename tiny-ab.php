<?php
/**
 * Plugin Name:       Candela Tiny A/B Tester
 * GitHub Plugin URI: https://github.com/lumenlearning/candela-tiny-ab
 * Description:       Shows different blocks of page content to users based on the last character
 * of their username.
 * Author:            David Wiley / Lumen Learning
 * Author URI:        http://lumenlearning.com
 * Text Domain:       lumen
 * License:           MIT
 * Version:           0.2.0
 */

/* See README for instructions on how to create an A/B test. */

// Exit if accessed directly

defined( 'ABSPATH' ) || exit;

add_action('wp_enqueue_scripts', 'tiny_ab_enqueue');
function tiny_ab_enqueue() {
  if (is_single()) {
    global $current_user;
    $current_user = wp_get_current_user();
    wp_enqueue_script( 'lumen-tinyab-js', plugins_url( 'tiny-ab.js', __FILE__ ), array(), '0.1.1', true );
    wp_localize_script( 'lumen-tinyab-js', 'wp_user_info', array (
      'username' => $current_user,
   ) );
  }
}
