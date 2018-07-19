<?php 

// Load scripts
function kankoz_add_scripts(){
	wp_enqueue_style('kankoz-main-style',  plugins_url( 'css/styles.css', dirname(__FILE__) ) );
	wp_enqueue_script('kankoz-main-script',  plugins_url( 'js/main.js', dirname(__FILE__) ) );
}

// Enqueue the script
add_action( 'wp_enqueue_scripts', 'kankoz_ffl_add_scripts' );