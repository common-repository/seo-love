<?php
/*
Plugin Name: SEO Love
Plugin URI: http://www.getbutterfly.com/wordpress-plugins/seo-love/
Description: See if you made a good choice by choosing that link bait title. Search your post title on Google, Yahoo, Bing and Ask.
Version: 1.2.2
Author: Ciprian Popescu
Author URI: http://getbutterfly.com/
*/

/*
SEO Love WordPress Plugin
Copyright (C) 2010, 2011 Ciprian Popescu

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

define('SEO_IT_PLUGINPATH', '/'.plugin_basename(dirname(__FILE__)).'/');
define('SEO_IT_PLUGINFULLURL', WP_PLUGIN_URL.SEO_IT_PLUGINPATH);
define('SEO_IT_SEPARATOR', ' <span style="color: #bdd3ff">/</span> ');

add_action('admin_menu', 'seo_it_plugin_menu');
add_shortcode('seo_love', 'seo_love');

function seo_it_plugin_menu() {
	add_options_page('SEO Love', 'SEO Love', 'manage_options', 'seoit', 'seo_it_plugin_options');
}
function seo_it_plugin_options() {
	if(!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	?>
	<div class="wrap">
		<h2>SEO Love</h2>
		<p><b>NOTICE:</b> This plugin was discontinued and was integrated in <a href="http://wordpress.org/extend/plugins/wp-perfect-plugin/">WP Perfect Plugin</a>! In less than 30 days, this plugin will be removed from the repository.</p>
		<p>This plugin has no options.</p>

		<p>Add the <code>[seo_love]</code> shortcode to any post or page to display the search bar, or add the <code>&lt;?php echo seo_love();?&gt;</code> PHP function to your blog template. We recommend adding it to single.php, after the post content.</p>

		<p>The plugin allows the author/user to search for the post title on the major search engines, Google, Yahoo, Bing and Ask. The purpose of this search is to check the competition for any given title, or to check the indexation for any given post.</p>

		<p>For support, feature requests, bug reporting and more search engines, please visit the <a href="http://getbutterfly.com/wordpress-plugins/seo-love/" rel="external">official web site</a>.</p>
	</div>
	<?php
}

function seo_love() {
	$google_it = '<a href="http://www.google.com/#&q='.get_the_title().'" title="Search this post on Google" rel="external">Google it!</a>';
	$yahoo_it = '<a href="http://www.yahoo.com/search?p='.get_the_title().'" title="Search this post on Yahoo" rel="external">Yahoo it!</a>';
	$bing_it = '<a href="http://www.bing.com/search?q='.get_the_title().'" title="Search this post on Bing" rel="external">Bing it!</a>';
	$ask_it = '<a href="http://www.ask.com/web?q='.get_the_title().'" title="Search this post on Ask" rel="external">Ask it!</a>';
	return '<p><img src="'.SEO_IT_PLUGINFULLURL.'images/search.png" alt="" style="vertical-align: middle" /> '.$google_it.SEO_IT_SEPARATOR.$yahoo_it.SEO_IT_SEPARATOR.$bing_it.SEO_IT_SEPARATOR.$ask_it.'</p>';
}
?>
