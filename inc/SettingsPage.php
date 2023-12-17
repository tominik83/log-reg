<?php
namespace Tominik\LogReg;

class SettingsPage {
    public function __construct() {
        add_action( 'admin_menu', function() {
            add_menu_page(
                'Log-Reg Settings',
                'Log-Reg Settings',
                'manage_options',
                'log_reg_settings',
                [$this, "render"]
            );
        } );

        // add_action( 'init', [$this, "handle_saving"] );
    }


}
