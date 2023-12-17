<?php

namespace Tominik\LogReg;



class Main
{
    private static Main $instance;



    private function __construct()
    {

        // $this->enqueue_scripts();
        // $this->enqueue_styles();

        // Add icons
        // add_action('wp_enqueue_scripts', array($this, 'add_boxicons_stil'));

        new LogReg;
        new Update;
        // new SettingsPage;
        new AdminPage;

        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
    }

    public static function init()
    {
        if (!isset(self::$instance)) {


            self::$instance = new self();
        }

        return self::$instance;

    }


    // private function enqueue_scripts(): void
    // {
    //     wp_enqueue_script('log_reg-script', plugins_url("assets/dist/log-reg.js", __DIR__ . "/../log-reg.php") , [
    //         "jquery"
    //     ]);
    // }

    // private function enqueue_styles(): void
    // {
    //     wp_enqueue_style('log_reg-style', plugins_url("assets/dist/log-reg.css", __DIR__ . "/../log-reg.php"));
    // }

    // public function load_assets()
    // {   
    //     $plugin_path = 'wp-content/plugins/log-reg/log-reg.php';
    //     $version = get_file_data($plugin_path, array('Version'));

    //     wp_enqueue_style('log_reg-style', plugins_url("assets/dist/log-reg.css", __DIR__ . "/../log-reg.php") , array(), $version , 'all');
    //     wp_enqueue_script('log_reg-script', plugins_url("assets/dist/log-reg.js", __DIR__ . "/../log-reg.php") , array('jquery'), $version, true);
    // }

    public function load_assets()
{   
    $plugin_path = 'wp-content/plugins/log-reg/log-reg.php';
    $version_data = get_file_data($plugin_path, array('Version'));
    $version = $version_data[0];

    // // Ukloni sve karaktere posle verzije 1.0.0
    // $version_parts = explode('.', $version);
    // $version = $version_parts[0] . '.' . $version_parts[1] . '.' . $version_parts[2];

    wp_enqueue_style('log_reg-style', plugins_url("assets/dist/log-reg.css", __DIR__ . "/../log-reg.php") , array(), $version , 'all');
    wp_enqueue_script('log_reg-script', plugins_url("assets/dist/log-reg.js", __DIR__ . "/../log-reg.php") , array('jquery'), $version, true);
}


    // public function update_plugin_check(): void
    // {
    //     include(__DIR__ . '/Update.php');


    // }

    // Dodajte sljedeći kod u functions.php datoteku teme

    // public function create_logout_page()
    // {
    //     $logout_page_id = 168; // Zamijenite ovu vrijednost s ID-em vaše stvorene stranice za odjavu

    //     // Provjeri postoji li već logout link
    //     $logout_link = wp_logout_url(home_url());
    //     if (strpos($logout_link, 'logout=true') === false) {
    //         $logout_link = add_query_arg('logout', 'true', $logout_link);
    //     }

    //     // Prikazi logout link na stranici
    //     echo '<a href="' . esc_url($logout_link) . '">Odjava</a>';
    // }




    // public function dodaj_dinamicke_stilove()
    // {
    //     $bg_image = log_reg_assets_url . '/img/bg.jpg';

    //     $custom_css = "
    //     .wrapper {
    //             background: url('$bg_image');
    //             background-size: cover; /* prilagodi veličinu pozadine */
    //             /* dodajte dodatne stilove prema potrebi */
    //         }
    //     ";

    //     wp_add_inline_style('mt-hotspot-style', $custom_css);
    // }

    // public function add_boxicons_stil()
    // {
    //     // Proveri da li je stil već uključen
    //     if (!wp_style_is('boxicons', 'enqueued')) {
    //         // Ako nije, dodaj stil
    //         wp_enqueue_style('boxicons', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
    //     }
    // }

}