<php>

    <body>

        <div class="wrapper">
            <span class="bg-animate"></span>
            <span class="bg-animate2"></span>

            
                <?php
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    require_once(log_reg_templates . '/logout.php');
                } else {
                    require_once(log_reg_templates . '/login-form.php');
                }
                ?>

        </div>

    </body>