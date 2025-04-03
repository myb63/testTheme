<!-- 商品一覧コンポーネント -->
<div class="posts-grid">
		<?php
		$args = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
				'orderby' => 'date',
				'order' => 'DESC'
		);
		$latest_posts = new WP_Query($args);

		if ($latest_posts->have_posts()) :
				while ($latest_posts->have_posts()) : $latest_posts->the_post();
		?>
				<article class="post-card">
						<?php if (has_post_thumbnail()) : ?>
								<div class="post-thumbnail">
										<?php the_post_thumbnail('medium'); ?>
								</div>
						<?php endif; ?>
						<div class="post-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="post-meta">
										<span class="date"><?php echo get_the_date(); ?></span>
										<!-- <span class="category"><?php the_category(', '); ?></span> -->
								</div>
								<div class="post-excerpt">
										<?php the_excerpt(); ?>
								</div>
						</div>
				</article>
		<?php
				endwhile;
				wp_reset_postdata();
		endif;
		?>
</div>