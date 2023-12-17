<?php

/**
 * Plugin Name: Log-Reg
 * Plugin URI:        https://github.com/tominik83/log-reg
 * Description:       Custom Login and Registration.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2 and ...
 * Author:            Mihajlo Tomic
 * Author URI:        https://dev.bibliotehnika.tk/about/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       log-reg
 * Domain Path:       /languages
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);



if ( ! defined( 'ABSPATH' ) ) {
	die( 'You can\'t access this page');
}

define('log_reg_path', plugin_dir_path(__FILE__));
define('log_reg_blocks', log_reg_path . '/inc/blocks');
define('log_reg_templates', log_reg_path . '/inc/templates');
define('log_reg_assets', log_reg_path . '/assets');

require( __DIR__ . "/autoload.php" );

Tominik\LogReg\Main::init();