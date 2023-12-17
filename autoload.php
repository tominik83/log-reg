<?php

spl_autoload_register( function( $class ) {
    // Postavi osnovnu putanju
    $base_path = __DIR__ . "/inc/";

    // Dodaj dodatne putanje prema potrebi
    $additional_paths = array(
        // 'Tominik\\LogReg\\SomeNamespace\\' => __DIR__ . "/some/other/path/",
        // 'Tominik\\LogReg\\AnotherNamespace\\' => __DIR__ . "/another/path/",
        // Dodajte više putanja prema potrebi
    );

    foreach ($additional_paths as $namespace => $path) {
        if (strpos($class, $namespace) === 0) {
            $class = str_replace("\\", "/", $class);
            $class = substr($class, strlen($namespace));
            require($path . $class . ".php");
            return;
        }
    }

    // Ako nema dodatnih putanja, koristi osnovnu putanju
    if (strpos($class, "Tominik\\LogReg\\") === 0) {
        $class = str_replace("\\", "/", $class);
        $class = substr($class, 15);
        require($base_path . $class . ".php");
    }
} );

