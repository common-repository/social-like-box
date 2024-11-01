<?php
/*
Plugin Name: Social Like Box
Plugin URI:
Description: Widget to display Fb Page Like Box
Version: 1.0.0
Author: Hasib Shahabuddin
Author URI: https://s-hasib.com
License: GPLv2 or later
Text Domain: social_like_box
Domain Path: /languages/
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

define( 'SLBOX_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Load class
require_once(SLBOX_PLUGIN_DIR.'includes/social-like-box-class.php');

// Register Widget
function register_SLBOX_Widget(){
	register_widget( 'slbox_Widget' );
}

//Hook In function
add_action( 'widgets_init', 'register_SLBOX_Widget' );

  // Add Scripts
function slbox_add_scripts(){
  // Add Main js
  wp_enqueue_script( 'slbox-main-script', plugins_url( 'js/main.js', __FILE__ ) );
}

add_action( 'wp_enqueue_scripts', 'slbox_add_scripts' );