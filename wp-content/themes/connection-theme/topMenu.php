<div class="contain rel wrap center">
  <?php responsive_header_top(); // before header content hook ?>

    <?php if (has_nav_menu('top-menu', 'responsive')) { ?>
      <?php wp_nav_menu(array(
        'container'       => '',
        'fallback_cb'	  =>  false,
        'menu_class'      => 'top-menu',
        'theme_location'  => 'top-menu')
        );
      ?>
    <?php } ?>

  <section class="full contain rel">
      <a id="logo" href="<?php echo home_url('/'); ?>" class="block left main-logo col-140 tabletp-col-300 mobilep-col-460" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
      <?php
        $urlSVG = get_stylesheet_directory_uri() . '/images/logo-new-theme.svg';
        $urlPNG = get_stylesheet_directory_uri() . '/images/logo-new-theme.png';
      ?>
        <object data="<?php echo $urlSVG; ?>" width="100%" height="100%" type="image/svg+xml">
           <img src="<?php echo $urlPNG; ?>" width="150px" height="70px">
        </object>
      </a>
      <button class="reset-btn grid-right hidden mobilel-shown icon-login btn-toggle-membersnav" data-role="toggle-members-nav"></button>
      <button type="button" class="btn-hamburger reset-btn grid-right hidden mobilel-shown" data-role="mobile-nav-expander"></button>
    </section>
    <section class="full contain rel">
      <?php wp_nav_menu(array(
          'container'       => 'nav',
          'container_class'	=> 'main-nav',
          'menu_class' => 'contain',
          'fallback_cb'	  =>  'responsive_fallback_menu',
          'theme_location'  => 'header-menu')
        );
      ?>

    <!--  User area-->
    <?php include 'memberNav.php'; ?>
  </section>
</div>
