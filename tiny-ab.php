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
 * Version:           0.1.1
 */

/*
HOW TO USE THIS PLUGIN. 
Put the two versions of content you want
to test in elements with classes of 'ab-test-original' and 
'ab-test-alternative', like so: 
<p class="ab-test-original">This is version A.</p> 
<p class="ab-test-alternative">This is version B.</p> 
Users will see one version or the other depending on the last 
character of their lti_user_context. Users without an 
lti_context_id will see ab-test-original version.
*/

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

add_action('wp_enqueue_scripts', 'tiny_ab_enqueue');
function tiny_ab_enqueue() {
  if (is_single()) {
    wp_enqueue_script( 'lumen-tinyab-js', plugins_url( 'tiny-ab.js', __FILE__ ), array(), '0.1.1', true );
  }
}
