=== Plugin Name ===
Contributors: mapelo
Donate link: 
Tags: posts, categories
Requires at least: 2.5
Tested up to: 3.2
Stable tag: 0.1.1

Displays a list of posts in one or more categories (with OR,AND logic between categories) using simple shortcode.

== Description ==

Add a list of your latest blog entries on any page. 
With simple shortcode you can place a list of your latest news (or/and other blog categories) on any page or post.

== Installation ==

This section describes how to install the plugin and get it working.

1. Downlaod and unzip the last list-posts-by-categories plugin
2. Upload the list-posts-by-categories directory to the /wp-content/plugins/ directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Place shortcode on your page, eg. [postsbycategories array1cat="category1" array2cat="category3" sortby="date" order="DESC" posts_per_page="-1"]

== Frequently Asked Questions ==

= The shortcode does not return anything =

This is most likely because the category name you used in your shortcode is not present or misspelled.

== Screenshots ==

none

== Changelog ==

0.1.1 [July 3, 2011]
- Some corrections in readme.txt by mapelo

0.1 [July 3, 2011]
- First released by mapelo

== Documentation ==

[postsbycategories array1cat="category1,category2" array2cat="category3" sortby="title|date" order="ASC|DESC" posts_per_page="-1|X"]
Use the following shortcode anywhere on your page or post following the examples below:

[postsbycategories array1cat="category1" array2cat="category3" sortby="date" order="DESC" posts_per_page="-1"]
Show a list of post/pages into category 'category1' AND 'category3', sort by published date, descendent, and without limit of posts/pages per page.

[postsbycategories array1cat="category1,category2" sortby="title" order="ASC" posts_per_page="8"]
Show a list of post/pages into category 'category1' OR 'category2', sort by title, ascendent, and limit to 8 posts/pages per page.


[postsbycategories array1cat="category1,category2" array2cat="category3"]
Show a list of post/pages into category ('category1' OR 'category2') AND category3, and by default sort published by date, descendent, and no limit posts/pages per page.

