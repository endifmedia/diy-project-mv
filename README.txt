=== DIY Projects (mediavine) ===
Contributors: Endif Media
Donate link: https://endif.media
Requires at least: 3.5
Tested up to: 4.8.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin that adds extra metaboxes to all posts for difficulty rating, completion time, and materials cost. To set background color go to Settings > DIY Projects.

== Description ==

Plugin that adds extra metaboxes to all posts for difficulty rating, completion time, and materials cost. To set background color go to Settings > DIY Projects.

## Code Challenge
*You've been hired by a blogger to create a wordpress plugin for their DIY blog. They want a plugin that allows them to classify each post on their blog by difficulty, time and cost. They want to be able to edit these fields in the post edit screen and have them show up at the top of each post right before the post content.*

### Rules
* Create a Wordpress plugin that allows users to set a difficulty rating, a time estimate of how long to complete the DIY project and how much the materials cost
* If a post has any of this information filled out, it should be displayed just above the content of the post
    * If no fields are filled out it should leave the content as is
* Include a global settings page that allows the user to specify the background color of the DIY info added to the post

### What we look for
We look for clean, well-architected code that would be easy for a maintainer to understand. We expect you to approach this as you would a production ready application.


 ### Guidelines/recommendations

 * Your code should be production ready and resilient
 * Try to get in the head of a user. User Experience can make or break a plugin
 * Make sure your plugin works on older versions of PHP as well. A majority of the world still runs PHP 5.3

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `diy-projects` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Change background color in Settings > DIY Projects.

== Changelog ==

= 1.0.0 =
* Initial plugin release.