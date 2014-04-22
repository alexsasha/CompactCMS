<?php get_header(); ?>

<div class="container" id="post">
	
	<h1><?php echo $post->post_title; ?></h1>

	<div class="lead"><?php echo $post->post_content; ?></div>

</div>

<?php get_footer(); ?>