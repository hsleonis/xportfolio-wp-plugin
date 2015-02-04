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
 
 do_action('after_post','print_msg');
 function print_msg(){
 	print "<h1>Remember to save your post.</h1>";
 }
