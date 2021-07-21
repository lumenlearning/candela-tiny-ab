<?php
/**
 * Plugin Name:       Tiny A/B Tester Plugin for WordPress
 * GitHub Plugin URI: https://github.com/lumenlearning/candela-tiny-ab
 * Description:       A tiny A/B testing implementation for WordPress. Shows different versions 
of page content to users based on the last character of their username. Depends on 
a separate method of collecting and comparing data about users' behavior in order 
to complete the testing.
 * Version:           0.1.1
 * Author:            David Wiley / Lumen Learning
 * Author URI:        http://lumenlearning.com
 * License:           MIT
 * Text Domain:       lumen
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

defined( 'ABSPATH' ) or die( 'For real, dude?' );

function tinyab() { ?>

  <style>
    .ab-test-alternative { display: none; }
  </style>

  <script>

        window.onload = function(){

  /* Only proceed if our classes are in the page */
  if (document.getElementsByClassName('ab-test-alternative').length > 0) {

    /* Grab parameters from the URL */
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);

    /* Only proceed if there's an lti_context_id */
    if (urlParams.has('lti_context_id')) {

      /* Get the lti_context_id */
      var id = urlParams.get('lti_context_id');

      /* Select the last character from the lti_context_id. */
      var last_char = id.slice(-1);

      /* Only proceed if the last character indicates we should assign
      this user to the alternative condition */
      var alt_chars = ['1', '3', '5', '7', '9', 'b', 'd', 'f'];
      if (alt_chars.indexOf(last_char) !== -1) {

      /* Hide the original version and show the alternative version. */
          var to_hide = document.getElementsByClassName("ab-test-original");
          var i;
          for (i = 0; i < to_hide.length; i++) {
              to_hide[i].remove();
              }

          var to_show = document.getElementsByClassName("ab-test-alternative");
          var i;
          for (i = 0; i < to_show.length; i++) {
              to_show[i].style.display = 'block';
              }

      /* Testing last character */
      }

    /* Testing for lti_context_id */
    }

  /* Testing for our css class */
}

/* If the original content is still there, remove the alternative. */
if (document.getElementsByClassName('ab-test-original').length > 0) {
  var to_hide = document.getElementsByClassName("ab-test-alternative");
  var i;
  for (i = 0; i < to_hide.length; i++) {
      to_hide[i].remove();
      }
}

/* onload function */
}

</script>

        
<?php
}

/* Add the tiny-ab function to the wp_head hook so it ends up in the page header */

add_action('wp_head', 'tinyab');
