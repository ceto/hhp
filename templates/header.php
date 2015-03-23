<a id="top" name="top">
<header class="mobile-header">
    <div class="wrapper wrapper--narrow">
    <a class="navbar-brand-mobile" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <label class="nav-toggle" for="nav-toggle">MENU</label>
  </div>
</header>

<input type="checkbox" id="nav-toggle">

<header class="navbar navbar-default" role="banner">
  <div class="wrapper wrapper--wide">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>
