<?php
/**
 * Plugin Name: xPortFolio
 * Plugin URI: https://github.com/hsleonis/xportfolio-wp-plugin
 * Description: xPortFolio is a simple wordpress plugin for easily adding various portfolio on your wordpress site.
 * Version: 1.0.0
 * Author: MD. Hasan Shahriar
 * Author URI: http://themeaxe.com
 * Text Domain: themeaxe
 * License: GPL2
 */
 
 //Avoid script kiddies
 defined('ABSPATH') or die('No script kiddies please!');
 
 require_once ('admin/index.php');

 add_action('admin_footer', 'my_admin_footer_function');
 function my_admin_footer_function() {
	echo '<p>Thanks for installing xPortfolio &copy;'.date('Y').'</p>';
 }