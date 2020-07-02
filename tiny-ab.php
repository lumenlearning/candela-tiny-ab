<?php
/**
 * @author David Wiley <david@lumenlearning.com>
 * @package Tiny A/B Tester Plugin for Wordpress
 */
/*
Plugin Name: Tiny A/B Tester Plugin for Wordpress
Plugin URI: https://github.com/kalendar/tiny-ab/
Description: A tiny A/B testing implementation for Wordpress. Shows different versions 
of page content to users based on the last character of their username. Depends on 
a separate method of collecting and comparing data about users' behavior in order 
to complete the testing.
Version: 0.0.1
Author: David Wiley / Lumen Learning
Author URI: https://lumenlearning.com/
License: MIT
Text Domain: tiny-ab
*/

/*
HOW TO USE THIS PLUGIN. Put the two versions of content you want
to test in elements with IDs of "tiny-ab-version-a" and 
"tiny-ab-version-b", like so: 
<p id = "tiny-ab-version-a">This is version A.</p> 
<p id = "tiny-ab-version-b">This is version B.</p> 
Logged in users will see one version or the other depending on the last
character of their username. Users who are not logged in will see
version B.
*/

defined( 'ABSPATH' ) or die( 'For real, dude?' );

function tinyab() { ?>

    <script type="text/javaScript">

        /* Assign the Wordpress username to the current_user variable in javascipt */
        var current_user = '<?php echo json_encode(wp_get_current_user()->user_login); ?>';

        /* Remove the quotes from the username value */
        current_user = current_user.slice(1, -1);

        window.onload = function(){ 

            /*  Hide both versions as soon as the page finishes loading. This isn't a great 
            way to do this, since they have to load first and then disappear. Hiding them both 
            by default in the theme CSS that would be better.
            */
            document.getElementById("tiny-ab-version-a").style.display = "none";
            document.getElementById("tiny-ab-version-b").style.display = "none";


            /* Select the last character from the user name. */
            var last_char = current_user.slice(-1);


            /* If the final character is in the first half of the alphabet 
            or the five digits, show version A */
            if (/[abcdefghijklm]/.test(last_char) || /[0-4]/.test(last_char)) {
                document.getElementById("tiny-ab-version-a").style.display = "block";

            /* If the username ends with something else, or if no user is logged in, 
            show version B. */
            } else {
                document.getElementById("tiny-ab-version-b").style.display = "block";
            }
        }
    </script>
<?php
}

/* Add the tiny-ab function to the wp_head hook
so it ends up in the page header */

add_action('wp_head', 'tinyab');
