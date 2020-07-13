<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

  <h1> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> </h1>
  <small><?php the_time('jS F Y') ?></small>

    <?php the_content(); ?>

  <p class="postmetadata">Posted in <?php the_category(', ') ?> <br />
  <?php comments_popup_link('No Comments', '1 Comment', '% Comments');?> </p>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  <?php comments_template(); ?>

<?php endwhile; ?>

  <?php previous_post_link('%link', $link='&larr; %title') ?>
  <?php next_post_link('%link', $link='%title &rarr; ') ?>

    <?php else : ?>
  <h1>Not found</h1>
  <p> Sorry, but the page you requested does not exist.</p>
  <?php get_search_form(); ?>

<?php endif; ?>

<?php get_footer(); ?>