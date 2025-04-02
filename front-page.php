<?php get_header(); ?>

<main class="container">
    <!-- ヒーローセクション -->
    <section class="hero-section">
        <div class="hero-content">
            <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
            <p><?php echo esc_html(get_bloginfo('description')); ?></p>
        </div>
    </section>

    <!-- 最新の投稿セクション -->
    <section class="latest-posts">
        <h2>最新の投稿</h2>
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
                            <span class="category"><?php the_category(', '); ?></span>
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
    </section>

    <!-- お知らせセクション -->
    <section class="news-section">
        <h2>お知らせ</h2>
        <div class="news-list">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'DESC',
                'category_name' => 'news' // お知らせカテゴリーのスラッグ
            );
            $news_posts = new WP_Query($args);

            if ($news_posts->have_posts()) :
                while ($news_posts->have_posts()) : $news_posts->the_post();
            ?>
                <article class="news-item">
                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?> 