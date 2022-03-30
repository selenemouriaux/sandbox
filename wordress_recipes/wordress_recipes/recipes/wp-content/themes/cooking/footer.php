<footer class="Footer">

  <div class="Footer-links layout">
    <?php dynamic_sidebar('footer') ?>
  </div>

  <?php wp_nav_menu(
    [
      'theme_location' => 'footer',
      'container-class' => 'Footer-creditsArea',
      'menu-class' => 'layout',
    ]
  ); ?>

</footer>

<?php wp_footer(); ?>

</body>
</html>