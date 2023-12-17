<?php

namespace Tominik\LogReg;

class LogReg
{
    public function __construct()
    {
        add_shortcode('log-reg-form', array($this, 'load_shortcode'));        
    }

    

    public function load_shortcode()
    {
        include(__DIR__ . '/blocks/shortcode.php');
    }


    
}
