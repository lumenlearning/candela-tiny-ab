# tiny-ab
A Tiny A/B Testing Plugin for Wordpress

This tiny A/B testing plugin shows different versions of page 
content to users based on the last character of their username. 

Put the two versions of content you want to test in elements with IDs of 
"tiny-ab-version-a" and  "tiny-ab-version-b", like so: 

&lt;p id = "tiny-ab-version-a"&gt;This is version A.&lt;/p&gt;

&lt;p id = "tiny-ab-version-b"&gt;This is version B.&lt;/p&gt; 

Logged in users will see one version or the other depending on the last
character of their username. Usernames ending a-m or 0-4 will see version A,
others will see version B. Users who are not logged in will see version B.

This plugin only shows different content to users. It does not collect any data
about user behavior. That is, this plugin depends on a separate method of 
collecting and comparing data about users' behavior in order to complete the 
A/B testing.
