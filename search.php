<?php get_header(); ?>

<?php $posts=query_posts($query_string . '&posts_per_page=20'); ?>
<?php if (have_posts()) : ?>

<div class="post">

<h1><span class="title">Search Results</span></h1>

<p>Your search results are listed below. The first 20 results are shown, the most recent displayed first, and you may navigate to previous pages by clicking "older entries" at the foot of the page. </p>
<p>Please note that you are searching through posts <em>and</em> pages and results only show excerpts.</p>

</div>

<br>

<?php while (have_posts()) : the_post(); ?>


	<div class="posttaito">

  <h1><a href="<?php the_permalink() ?>" rel="bookmark" class="posttitle" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
<h4><?php the_time('l jS F, Y - g:ia') ?> <?php the_category(', ') ?></h4>

<p>
<?php the_excerpt(); ?> 
<p><a
href="<?php the_permalink() ?>" rel="bookmark" title="Permanent
Link to <?php the_title_attribute(); ?>">Read this post?</a></p>
</p>

	</div>

<br>

<?php endwhile; ?>

<p class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></p>
<p class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></p>

<p class="clear"></p>

<?php else : ?>
	<div class="post">
	<h1>Oops!</h1>
		<p>I'm sorry, but the page you're looking for is not found. If you believe this is an error, please <a href="http://rin.sky-song.org/contact/">let me know</a>.</p>
	<?php get_search_form(); ?>
	</div>

<?php endif; ?>


<?php get_footer(); ?>
