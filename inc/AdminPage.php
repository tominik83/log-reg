<?php

namespace Tominik\LogReg;

class AdminPage 
{
    /** @var null */
    private static  $instance = null ;
    public  $admin_pages = array() ;

    public function __construct()
    {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    
        // add_action( 'admin_menu', function() {
        //     add_menu_page(
        //         'Log-Reg Settings',
        //         'Log-Reg Settings',
        //         'manage_options',
        //         'log_reg_settings',
        //         [$this, "getting_started_form"]
        //     );
        // } );            
    } 
    
    /**
     * Add admin menu
     * @since 1.0
     */
    public function admin_menu()
    {
        $slug = 'log-reg';
        $capability = 'manage_options';
        $this->admin_pages['main_page'] = add_menu_page(
            __( 'Log Reg', 'log-reg' ),
            __( 'Log Reg', 'log-reg' ),
            $capability,
            $slug,
            [ $this, 'getting_started_form' ],
            // RADIO_PLAYER_ASSETS . '/images/play.svg',
            // 59
        );
        // Home page
        $this->admin_pages['main_page'] = add_submenu_page(
            $slug,
            __( 'Home', 'log-reg' ),
            __( 'Home', 'log-reg' ),
            $capability,
            'log-reg'
        );
        // Getting started page
        $this->admin_pages['getting_started_page'] = add_submenu_page(
            $slug,
            __( 'Getting Started - Log Reg', 'log-reg' ),
            __( 'Getting Started', 'log-reg' ),
            $capability,
            'log-reg-getting-started',
            [ $this, 'getting_started_form' ]
        );
        // Settings page
        $this->admin_pages['settings_page'] = add_submenu_page(
            $slug,
            __( 'Settings - Log Reg', 'log-reg' ),
            __( 'Settings', 'log-reg' ),
            $capability,
            'log-reg-settings',
            [ $this, 'render_settings_page' ],
            10
        );
        // Recommended plugins page
        // if ( empty(get_option( "radio_player_hide_recommended_plugin" )) ) {
        //     $this->admin_pages['recommended_plugins_page'] = add_submenu_page(
        //         $slug,
        //         esc_html__( 'Recommended Plugins', 'log-reg' ),
        //         esc_html__( 'Recommended Plugins', 'log-reg' ),
        //         $capability,
        //         'log-reg-recommended-plugins',
        //         [ $this, 'render_recommended_plugins_page' ]
        //     );
        // }
    }

    function getting_started_form()
    {
    
        require __DIR__ . '/views/index.php';
    
    }



    // /**
    //  * @return AdminPage|null
    //  */
    // public static function instance()
    // {
    //     if ( is_null( self::$instance ) ) {
    //         self::$instance = new self();
    //     }
    //     return self::$instance;
    // }

}
// AdminPage::instance();