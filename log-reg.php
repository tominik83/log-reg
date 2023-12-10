<?php

/**
 * Plugin Name: Log-Reg
 * Plugin URI:        https://github.com/tominik83/WordPress-Plugins/tree/d81f3622208d63befa9e14642954c8763e30b3fb/log-reg
 * Description:       Custom Login and Registration.
 * Version:           1.1
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




defined('ABSPATH') || exit;

/** define constants */

require_once ABSPATH . 'wp-admin/includes/plugin.php';
//  $plugin_data = get_plugin_data( __FILE__ );

// phpcs:disable Generic.NamingConventions.UpperCaseConstantName
define('log_reg_url', plugin_dir_url(__FILE__));
define('log_reg_path', plugin_dir_path(__FILE__));
define('log_reg_plugin', plugin_basename(__FILE__));
// define('log_reg_version', $plugin_data['Version']);
// define('log_reg_plugin_name', $plugin_data['Name']);
define('log_reg_assets_url', log_reg_url . '/assets');
define('log_reg_dist_url', log_reg_assets_url . '/dist');
define('log_reg_blocks', log_reg_path . '/blocks');
define('log_reg_includes', log_reg_path . '/includes');
define('log_reg_templates', log_reg_path . '/templates');


// phpcs:enable Generic.NamingConventions.UpperCaseConstantName
define('LOG_REG_URL', plugin_dir_url(__FILE__));
define('LOG_REG_PATH', plugin_dir_path(__FILE__));
define('LOG_REG_PLUGIN', plugin_basename(__FILE__));
// define('LOG_REG_VERSION', $plugin_data['Version'] );
// define('LOG_REG_PLUGIN_NAME', $plugin_data['Name'] );
define('LOG_REG_ASSETS_URL', LOG_REG_URL . '/assets');
define('LOG_REG_DIST_URL', LOG_REG_ASSETS_URL . '/dist');
define('LOG_REG_BLOCKS', LOG_REG_PATH . '/blocks');
define('LOG_REG_INCLUDES', LOG_REG_PATH . '/includes');
define('LOG_REG_TEMPLATES', LOG_REG_PATH . '/templates');

require_once(log_reg_includes . '/class-init.php');
require_once(log_reg_includes . '/class-log-reg.php');

new startCode();
new LogReg();

