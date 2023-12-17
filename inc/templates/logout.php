<div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">
                <?php
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    echo 'Welcome';
                }
                ?>
            </h2>
            <p class="animation" style="--i:1; --j:21;">
                <?php
                if (is_user_logged_in()) {
                    $current_user = wp_get_current_user();
                    echo esc_html($current_user->user_login);
                } else {
                    echo '<a href="' . wp_login_url() . '">Prijavite se</a>';
                }
                ?>
            </p>
            <?php if (is_user_logged_in()) : ?>
                <form action="<?php echo wp_logout_url(home_url()); ?>" method="post" class='logout-form'>
                    <button type="submit" name="wp-submit" class="btn animation" style="--i:5; --j:26;">Logout</button>
                </form>
            <?php endif; ?>
        </div>