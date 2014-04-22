<?php get_header(); ?>

<div id="index">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
					<?php if($posts):?>
					<?php $i = 1; foreach ($posts as $entry): 
						$author = get_user($entry->post_author);
					?>
					<?php if($i % 3 == 1) echo '<div class="row">'; ?>
					<div class="col-lg-4">
						<h3><a href="<?php echo get_permalink($entry->ID); ?>"><?php echo $entry->post_title; ?></a></h3>
						<small><?php echo substr($entry->post_content, 0, 200) . "...";  ?></small>
						<div class="row">
							<div class="col-lg-6"><time><?php echo get_date($entry->ID, 'd-m-Y'); ?></time></div>
							<div class="col-lg-6"><p class="pull-right"><a href="<?php echo get_authorlink($entry->post_author); ?>"><?php echo $author->user_login; ?></a></p></div>
						</div>
					</div>
					<?php if($i % 3 == 0) echo '</div>'; ?>
					<?php $i++; endforeach; ?>
					<?php if( ($i - 1) % 3 != 0) echo '</div>'; ?>
					<?php if(isset($pagi)): ?>
						<div class="row">
							<div class="col-lg-12"><?php echo $pagi; ?></div>
						</div>
					<?php endif; ?>
					<?php else: ?>
						<h3 class="alert alert-warning">Ничего не найдено.</h3>
					<?php endif; ?>
			</div>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>