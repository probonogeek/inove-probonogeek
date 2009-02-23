<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<?php $options = get_option('inove_options'); ?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
    <?php if ($options['page_dates'] || $comments || comments_open()) : ?>
      <div class="info">
        <?php if ($options['page_dates']) : ?>
          <span class="date"><?php the_modified_time(__('F jS, Y', 'inove')); ?></span>
        <?php endif; ?>
        <div class="act">
          <?php if ($comments || comments_open()) : ?>
            <span class="comments"><a href="#comments"><?php _e('Goto comments', 'inove'); ?></a></span>
            <span class="addcomment"><a href="#respond"><?php _e('Leave a comment', 'inove'); ?></a></span>
          <?php endif; ?>
          <?php edit_post_link(__('Edit', 'inove'), '<span class="editpost">', '</span>'); ?>
          <div class="fixed"></div>
        </div>
        <div class="fixed"></div>
      </div>
    <?php endif; ?>
		<div class="content">
			<?php the_content(); ?>
			<div class="fixed"></div>
		</div>
	</div>

  <?php if ($options['page_comments']) : ?>
    <?php include('comments.php'); ?>
  <?php endif; ?>

<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.', 'inove'); ?>
	</div>
<?php endif; ?>
