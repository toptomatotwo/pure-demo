<script>alert("custom tpl loaded!");</script>
<?php while (have_posts()) : the_post(); ?>
  
  
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
