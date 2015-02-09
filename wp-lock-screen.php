<?php
/*********************************************************************************************************************
 * Plugin Name: WP lock screen
 * Plugin URI: https://github.com/hsleonis/wp-lock-screen
 * Description: WP lock screen is a simple wordpress plugin to add screen lock to your website.
 * Version: 1.0.1
 * Author: MD. Hasan Shahriar
 * Author URI: http://themeaxe.com
 * Text Domain: themeaxe
 * License: GPL2
 *********************************************************************************************************************/
 
 //Avoid script kiddies
 defined('ABSPATH') or die('No script kiddies please!');
 
 //Define admin panel directoty path & uri
 define('ADMIN_PATH', plugin_dir_path(__FILE__) . 'admin/');
 define('ADMIN_DIR', plugin_dir_url(__FILE__) . 'admin/');
 
 //include admin pages
 require_once('admin/index.php');
 
 /**
 * Add stylesheet to admin panel
 * @return void
 */
 function lock_themeaxe_style(){
 	if(!wp_style_is('lock-screen-style','registered')){
		wp_register_style('lock-screen-style', plugin_dir_url(__FILE__).'/main.css',false,'1.0.1','all');
	}
	if(!wp_script_is('locker-js-wp','registered')){
		wp_register_script('locker-js-wp', plugin_dir_url(__FILE__).'/locker.js','jquery-core','1.0.1',FALSE);
	}
	wp_enqueue_style('lock-screen-style');
	wp_enqueue_script('locker-js-wp');
 }
 add_action('admin_enqueue_scripts', 'lock_themeaxe_style');
 
 /**
 * Add lock screen button to profile menu
 * @return void
 */
 function add_lock_screen(){
 	global $wp_admin_bar;
	$current_user = wp_get_current_user();
	if(!($current_user instanceof WP_User) || !is_admin_bar_showing())
          return;
	$lock='<span class="button-primary button">Lock screen</span>';
	$wp_admin_bar->add_menu(
		array(
			'parent' =>'my-account-with-avatar',
			'id'=>'lock-button',
			'title'=>$lock,
			'href'=>FALSE,
			'meta'=>array(
				'html' =>'
					<script>
					jQuery(document).ready(function($){
						$("body").append("<div class=\'main-lock-screen\'><div><span class=\'lock-date\'>'.__(date("d,M Y"),'themeaxe').'</span><img class=\'lock-avatar\' src=\'http://www.gravatar.com/avatar/'.md5($current_user->user_email).'?s=100\' /><span class=\'button-primary button\'>Click to unlock</span></div></div>");
						$("#wp-admin-bar-lock-button .button").click(function(){
						    $(".main-lock-screen").show();
						});
						$(".main-lock-screen .button").click(function(){
						    $(".main-lock-screen").hide();
						});
					});
					</script>
				',
				'class' => '',
				'onclick' => '',
				'target' => ''
			)
		)
	);
 }
 add_filter('admin_bar_menu', 'add_lock_screen');
 
 