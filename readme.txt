=== WP Analytics Tracking ===
Contributors: Neoptin
Donate link: http://neoptin.com/donate/
Tags: google analytics, tracking, analytics, statistics, stats, piwik, Google
Tested up to: 3.5
Stable tag: 1.0.2
Requires at least: 3.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Manage Google Analytics code or any other Tracking code

== Description ==

This WordPress plugin allows you to easily insert your code on your pages for statistics usage of your site.
It has several advantages compared to plugins that just add a Google Analytics ID:

* It allows to specify the complete Google Analytics tag, and therefore to have a tag adapted to your needs (multidomain, subdomains, etc.).

* It also allows you to add other types of tags that may be useful to manage a site, whether for simple tracking of using another platform than Google Analytics, or for the insertion of tags at the request of a SEO or SEM partner.

In addition, the code is inserted into the footer of your pages, which is good practice for the web and avoids slow down your site if the tracking platform is overloaded.

Plugin developed by <a href="http://neoptin.com">Neoptin</a>. Need <a href="http://neoptin.com/wordpress/"> WordPress Services</a>?


== Installation ==

1. Upload the full directory into your wp-content/plugins directory
2. Activate the plugin at the plugin administration page
3. Go to the settings page under Settings / WP Analytics Tracking and fill the textarea with your tracking codes ! (Do not forget the <script>...</script> tags)
4. Save your changes and that's it !

== Other notes ==

= How to uninstall WP Analytics Tracking? =
To uninstall WP Analytics Tracking, just De-activate the plugin from the plugin list.

= Examples of analytics code =
You just have to copy the code you get from your Google Analytics administration interface & paste it into the text box of the plugin

`<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXX-X']);
  _gaq.push(['_setDomainName', 'DOMAIN.TLD']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>`


== Frequently Asked Questions ==

= Can I use this plugin for tracking codes other than Google one ? =
Yes ! One of the advantages of this plugins is the flexibility. It means that you are free to leave any kind of tracking script.



== Changelog ==

= v1.0.2 =
* Fix bug related to anonymous functions for PHP version < 5.3.0 (See: http://www.php.net/manual/en/class.closure.php)

= v1.0.1 =
* Spanish version

= v1.0 =
* Plugin deployment

