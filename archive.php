<?php get_header(); ?>

<main class="archive-container">
    <!-- アーカイブヘッダー -->
    <header class="archive-header">
        <?php
        if (is_category()) {
            echo '<h1 class="archive-title">' . single_cat_title('', false) . '</h1>';
            if (category_description()) {
                echo '<div class="archive-description">' . category_description() . '</div>';
            }
        } elseif (is_tag()) {
            echo '<h1 class="archive-title">' . single_tag_title('', false) . '</h1>';
            if (tag_description()) {
                echo '<div class="archive-description">' . tag_description() . '</div>';
            }
        } elseif (is_author()) {
            echo '<h1 class="archive-title">' . get_the_author() . '</h1>';
            if (get_the_author_meta('description')) {
                echo '<div class="archive-description">' . get_the_author_meta('description') . '</div>';
            }
        } elseif (is_date()) {
            echo '<h1 class="archive-title">';
            if (is_day()) {
                echo get_the_date();
            } elseif (is_month()) {
                echo get_the_date('Y年n月');
            } elseif (is_year()) {
                echo get_the_date('Y年');
            }
            echo '</h1>';
        } else {
            echo '<h1 class="archive-title">' . post_type_archive_title('', false) . '</h1>';
        }
        ?>
    </header>

    <!-- カテゴリーとタグのフィルター -->
    <?php if (is_category() || is_tag()) : ?>
        <div class="archive-filters">
            <?php if (is_category()) : ?>
                <div class="category-filters">
                    <h2 class="filter-title">カテゴリー</h2>
                    <div class="filter-links">
                        <?php
                        $categories = get_categories(array(
                            'hide_empty' => 1,
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ));
                        foreach ($categories as $category) {
                            $current = (is_category($category->term_id)) ? 'current' : '';
                            echo '<a href="' . get_category_link($category->term_id) . '" class="' . $current . '">' . $category->name . '</a>';
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (is_tag()) : ?>
                <div class="tag-filters">
                    <h2 class="filter-title">タグ</h2>
                    <div class="filter-links">
                        <?php
                        $tags = get_tags(array(
                            'hide_empty' => 1,
                            'orderby' => 'name',
                            'order' => 'ASC'
                        ));
                        foreach ($tags as $tag) {
                            $current = (is_tag($tag->term_id)) ? 'current' : '';
                            echo '<a href="' . get_tag_link($tag->term_id) . '" class="' . $current . '">' . $tag->name . '</a>';
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- 投稿一覧 -->
    <div class="posts-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

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

                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </div>

    <!-- ページネーション -->
    <?php
    the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
        'class' => 'pagination'
    ));
    ?>
</main>

<?php get_footer(); ?> 