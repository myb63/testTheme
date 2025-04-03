<!-- 商品詳細ページ -->
<?php get_header(); ?>

<main class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <?php while (have_posts()) : the_post(); ?>
            <!-- 投稿ヘッダー -->
            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span class="date">
                        <i class="far fa-calendar"></i>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="author">
                        <i class="far fa-user"></i>
                        <?php the_author(); ?>
                    </span>
                    <span class="category">
                        <i class="far fa-folder"></i>
                        <?php the_category(', '); ?>
                    </span>
                </div>
            </header>

            <!-- アイキャッチ画像 -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- 投稿コンテンツ -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <!-- タグとカテゴリー -->
            <!-- <div class="post-taxonomies">
                <?php if (has_tag()) : ?>
                    <div class="post-tags">
                        <h3>タグ</h3>
                        <div class="taxonomy-links">
                            <?php the_tags('', ', '); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (has_category()) : ?>
                    <div class="post-categories">
                        <h3>カテゴリー</h3>
                        <div class="taxonomy-links">
                            <?php the_category(', '); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div> -->

            <!-- 前後の投稿へのナビゲーション -->
            <!-- <nav class="post-navigation">
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    <?php if (!empty($prev_post)) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <i class="fas fa-arrow-left"></i>
                                <?php echo esc_html($prev_post->post_title); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($next_post)) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <?php echo esc_html($next_post->post_title); ?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </nav> -->

        <?php endwhile; ?>
    </article>
</main>

<?php get_footer(); ?> 