<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
      <?php wp_link_pages(array('before' =>
      '<p><strong>Pages:</strong> ', 'after' => '</p>',
      'next_or_number' => 'number')); ?>
  
   <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

<?php comments_template(); ?>
<?php endwhile; ?>

<?php else : ?>
   <h1>Not found</h1>
   <p> Sorry, but the page you requested does not exist.</p>
   <?php get_search_form(); ?>

<?php endif; ?>

<?php get_footer(); ?>