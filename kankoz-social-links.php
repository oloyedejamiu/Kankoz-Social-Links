<?php 
/*
Plugin Name:  Kankoz Social Links
Plugin URI:   https://kankoz.com/social-links
Description:  This free and simple to use social links plugin adds a widget as well as shortcode to your wordpress powered website while you display links/icons to your social media profiles or pages.
Version:      1.0.0
Author:       Jamiu Oloyede
Author URI:   https://wordpress.org/plugins/wp-all-social-links
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpksl
Domain Path:  /languages
*/

/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// Exit if this folder is accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Load scripts
require_once(plugin_dir_path( __FILE__  ) .'/includes/kankoz-social-links-scripts.php');

// Load social links class
require_once(plugin_dir_path( __FILE__ ). '/includes/kankoz-social-links-class.php');