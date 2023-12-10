<?php
class LogReg
{
    public function __construct()
    {
        add_shortcode('log-reg-form', array($this, 'load_shortcode'));        
    }

    

    public function load_shortcode()
    {
        include(log_reg_blocks . '/class-shortcode.php');
    }


    
}
