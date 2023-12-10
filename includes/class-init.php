<?php

class startCode
{

    var $store_url = 'https://github.com/tominik83/log-reg';


    public function __construct()
    {
        // Add icons
        add_action('wp_enqueue_scripts', array($this, 'add_boxicons_stil'));

        

        add_action('wp_enqueue_scripts', array($this, 'load_assets'));
        // add_action('wp_enqueue_scripts', array($this, 'dodaj_dinamicke_stilove'));
        add_shortcode('log-reg-update', array($this, 'update_plugin_check'));
        // Dodajte shortcode za prikaz logout linka na stranici
        // add_shortcode('logout_page', array($this, 'create_logout_page'));
    }

    public function load_assets()
    {
        wp_enqueue_style('log_reg-style', log_reg_dist_url . '/log-reg.css', array(), 1, 'all');
        wp_enqueue_script('log_reg-script', log_reg_dist_url . '/log-reg.js', array('jquery'), 1, true);
    }

    public function update_plugin_check()
    {
        include(log_reg_includes . '/class-update.php');

    }

    // Dodajte sljedeći kod u functions.php datoteku teme

    public function create_logout_page()
    {
        $logout_page_id = 168; // Zamijenite ovu vrijednost s ID-em vaše stvorene stranice za odjavu

        // Provjeri postoji li već logout link
        $logout_link = wp_logout_url(home_url());
        if (strpos($logout_link, 'logout=true') === false) {
            $logout_link = add_query_arg('logout', 'true', $logout_link);
        }

        // Prikazi logout link na stranici
        echo '<a href="' . esc_url($logout_link) . '">Odjava</a>';
    }




    public function dodaj_dinamicke_stilove()
    {
        $bg_image = log_reg_assets_url . '/img/bg.jpg';

        $custom_css = "
        .wrapper {
                background: url('$bg_image');
                background-size: cover; /* prilagodi veličinu pozadine */
                /* dodajte dodatne stilove prema potrebi */
            }
        ";

        wp_add_inline_style('mt-hotspot-style', $custom_css);
    }

    public function add_boxicons_stil()
    {
        // Proveri da li je stil već uključen
        if (!wp_style_is('boxicons', 'enqueued')) {
            // Ako nije, dodaj stil
            wp_enqueue_style('boxicons', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css');
        }
    }

}

