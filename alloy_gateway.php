<?php
/*
Plugin Name: WooCommerce Alloy Checkout Gateway
Plugin URI: http://alloyproject.org
Description: A payment gateway that extends WooCommerce by adding the Alloy Checkout Gateway
Version: 0.1
Author: Brador2000
*/
if(!defined('ABSPATH')) {
	exit;
}

//Load Plugin
add_action('plugins_loaded', 'alloy_init', 0 );

function alloy_init() {
	if(!class_exists('WC_Payment_Gateway')) return;
	
	include_once('include/alloy_payments.php');
	require_once('library.php');

    add_filter( 'woocommerce_payment_gateways', 'alloy_gateway');
	function alloy_gateway( $methods ) {
		$methods[] = 'Alloy_Gateway';
		return $methods;
	}
}

//Add action link
add_filter('plugin_action_links_' . plugin_basename( __FILE__ ), 'alloy_payment');

function alloy_payment($links) {
	$plugin_links = array('<a href="' . admin_url('admin.php?page=wc-settings&tab=checkout') . '">' . __('Settings', 'alloy_payment') . '</a>',);
	return array_merge($plugin_links, $links);	
}

//Configure currency
add_filter('woocommerce_currencies','add_my_currency');
add_filter('woocommerce_currency_symbol','add_my_currency_symbol', 10, 2);

function add_my_currency($currencies) {
     $currencies['XAO'] = __('Alloy','woocommerce');
     return $currencies;
}

function add_my_currency_symbol($currency_symbol, $currency) {
    switch($currency) {
        case 'XAO': $currency_symbol = 'XAO'; break;
    }
    return $currency_symbol;
}

//Create Database
register_activation_hook(__FILE__,'createDatabase');

$db = $wpdb->prefix . 'woocommerce_alloy';

function createDatabase() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'woocommerce_alloy';
    
	$sql = "CREATE TABLE $table_name (
       `id` INT(32) NOT NULL AUTO_INCREMENT,
	   `oid` INT(32) NOT NULL,
       `pid` VARCHAR(64) NOT NULL,
       `lasthash` VARCHAR(120) NOT NULL,
       `amount` DECIMAL(12, 2) NOT NULL,
       `paid` INT(1) NOT NULL,
       UNIQUE KEY id (id)
	) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta( $sql );
}
