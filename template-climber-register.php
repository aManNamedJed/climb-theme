<?php
/**
 * Template Name: Climber Registration
 */
get_header(); ?>
<section class="climber-registration py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div id="register-form" class="bg-light p-4">
                    <div class="title text-muted mb-4">
                        <h1>Register your Account</h1>
                        <span>Sign Up with us and Enjoy!</span>
                    </div>
                    <form action="<?php echo site_url('/wp-login.php?action=register', 'login_post') ?>" method="post">
                        <div class="form-group">
                            <label for="user_login">Username</label>
                            <input type="text" name="user_login" value="Username" id="user_login" class="input form-control" />
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email Address</label>
                            <input type="text" name="user_email" value="E-Mail" id="user_email" class="input form-control"  />
                        </div>

                        <?php do_action('register_form'); ?>
                        
                        <input type="submit" value="Register" id="register" class="btn btn-primary btn-lg" />
                        <p class="statement">A password will be e-mailed to you.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => admin_url(), 
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    wp_loginout( home_url() ); // Display "Log Out" link.
    echo " | ";
    wp_register('', ''); // Display "Site Admin" link.
}
?>

<?php get_footer(); ?>