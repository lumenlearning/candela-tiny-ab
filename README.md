# Candela Tiny A/B Tester

This tiny A/B testing plugin shows different versions of page content to users based on the last character of their Wordpress username (which in the Lumen PBJ case is the lti_user_id provided by the user's LMS).

The plugin requires a minimum of two pieces of content: one marked as the original and the other marked as the alternative (see Instructions below for more detail).

- The **original content** will be shown to users who are not logged in _or_ when the last character of their `username`:
  - is an even number (`0`, `2`, `4`, `6`, `8`)
  - does _not_ match `b`, `d` or `f`
- The **alternative content** will be shown to users when the last character of their `username`:
  - is an odd number (`1`, `3`, `5`, `7`, `9`)
  - matches `b`, `d` or `f`

## ✍️ Instructions

Put the two versions of content you want to test in elements with classes of `ab-test-original` and  `ab-test-alternative`, like so:

```
<p class="ab-test-original">This is the original version.</p>

<p class="ab-test-alternative">This is the alternate version.</p>
```

The classnames are not restricted to `p` elements and the HTML elements with these classnames do _not_ need to match (i.e., one element can be a `p` and the other can be a `div` and all will work as expected).

Multiple page elements can be marked this way.

## ⚠️ Limitations
This implementation of the plugin:
- Only works on WordPress posts and pages (see [`is_single`](https://developer.wordpress.org/reference/functions/is_single/)).
- Does not collect any data about user behavior and depends on a separate method of collecting and comparing data about users' behavior in order to complete the A/B testing.
