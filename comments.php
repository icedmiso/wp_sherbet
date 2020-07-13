<?php // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <div class="postc">
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    </div>
  <?php
    return;
  }

    /* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
  
  <div class="post">
  <h1><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h1> 
  </div> 


<?php foreach ($comments as $comment) : ?>

    <div class="postc">
<div class="grava"><?php echo get_avatar( $comment, $size = '65', $default = 'http://i.imgur.com/uQYL28Q.png' ); ?></div>
<div class="thecomment" id="comment-<?php comment_ID() ?>">

<p class="sitename"><a href="<?php comment_author_url(); ?>" ><?php comment_author(); ?></a></p>

<h4><?php comment_date('jS F Y') ?> <?php _e('at');?> <?php comment_time() ?> <a href="#comment-<?php comment_ID() ?>" title="">permalink</a> <?php edit_comment_link('Edit','',''); ?>
    <?php if ($comment->comment_approved == '0') : ?>
    <em><?php _e('Your comment is awaiting moderation.'); ?></em>
    <?php endif; ?></h4>

<?php comment_text() ?>

    </div>

  </div>

<?php /* Changes every other comment to a different class */
  if ('alt' == $oddcomment) $oddcomment = '';
  else $oddcomment = 'alt';
?>

<?php endforeach; /* end for each comment */ ?>


<p class="clear"></p>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
    <!-- If comments are open, but there are no comments. -->

   <?php else : // comments are closed ?>
    

  <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond"><a name="leavecomment"></a>


<div class="cancel-comment-reply">
  <small><?php cancel_comment_reply_link(); ?></small>
</div>

  <div class="postcf">

<h1><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?> </h1>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Email (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<?php if ( function_exists(cs_print_smilies) ) {cs_print_smilies();} ?>

<p><textarea name="comment" id="comment" cols="50" rows="8" tabindex="4"></textarea></p>

<p><input name="submit" class="send" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

  </div>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>