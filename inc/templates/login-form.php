<div class="form-box login">
    <h2 class="animation" style="--i:0; --j:21;">Login</h2>
    <form action="<?php echo wp_login_url(); ?>" method="post" class='log-form'>
        <div class="input-box animation" style="--i:1; --j:22;">
            <input type="text" name="log" id="user_login" required>
            <label>Username</label>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box animation" style="--i:2; --j:23;">
            <input type="password" name="pwd" id="user_pass" required>
            <label>Password</label>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>">
        <button type="submit" name="wp-submit" class="btn animation" style="--i:3; --j:24;">Login</button>

        <div class="logreg-link animation" style="--i:4; --j:25;">
            <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
        </div>

    </form>
</div>

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

<div class="form-box register">
    <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
    <form action="<?php echo esc_url(site_url('wp-login.php?action=register', 'login_post')); ?>" method="post" class='reg-form'>

        <div class="input-box animation" style="--i:18; --j:1;">
            <input type="text" name="user_login" id="user_login" required>
            <label>Username</label>
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box animation" style="--i:19; --j:2;">
            <input type="email" name="user_email" id="user_email" required>
            <label>Email</label>
            <i class='bx bxs-envelope'></i>
        </div>

        <div class="input-box animation" style="--i:20; --j:3;">
            <input type="password" name="user_password" id="user_password" required>
            <label>Password</label>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <button type="submit" name="wp-submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
        <div class="logreg-link animation" style="--i:22; --j:5;">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
        </div>
    </form>
</div>

<div class="info-text register">
    <h2 class="animation" style="--i:17 --j:0;">Welcome Back!</h2>
    <p class="animation" style="--i:18 --j:1;">R1A1</p>
</div>

</div>