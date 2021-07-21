# tiny-ab
A Tiny A/B Testing Plugin for WordPress

This tiny A/B testing plugin shows different versions of page 
content to users based on the last character of their lti_context_id. 

Put the two versions of content you want to test in elements with classes of 
"ab-test-original" and  "ab-test-alternative", like so: 

&lt;p class = "ab-test-original"&gt;This is the original version.&lt;/p&gt;

&lt;p class = "ab-test-alternative"&gt;This is the alterante version.&lt;/p&gt; 

Multiple page elements can be marked this way.

Users with an lti_context_id whose last character is '1', '3', '5', '7', '9', 
'b', 'd', or 'f' will see the alternate version. All other users (including
those without an lti_context_id) will see the original version.

This plugin only shows different content to users. It does not collect any data
about user behavior. That is, this plugin depends on a separate method of 
collecting and comparing data about users' behavior in order to complete the 
A/B testing.
