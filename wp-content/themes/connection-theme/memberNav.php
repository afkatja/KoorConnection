<?php if(! is_user_logged_in() ) { ?>
<div class="col-220 mobilel-col-940 grid-right contain fit abs members-menu clear away">
  <a href="#" class="grid-right pulldown icon-expand strong icon-login">Login leden</a>
  <div class="contain login-form flydown round-box secondary abs full fit hidden">
      <?php $args = array(
        'echo' => true,
        'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
        'form_id' => 'loginform',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'username',
        'id_password' => 'pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false
        ); ?>
        <?php wp_login_form( $args ); ?>
  </div>
</div>
<?php } else { // If logged in: ?>
<div class="members-menu full center contain rel clear away">
  <a href="<?php echo wp_logout_url(home_url()) ?>" class="abs logout icon-logout">Uitloggen</a>
  <?php
      wp_nav_menu(array(
      'container'       => 'nav',
      'container_class' => 'sub-header-nav full',
          'menu_class'      => 'members-nav horizontal contain',
          'theme_location'  => 'sub-header-menu')
      ); ?>
    </div>
<?php } ?>
