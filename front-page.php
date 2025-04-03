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
				<!-- 商品一覧コンポーネントを呼び出している -->
        <?php get_template_part('posts'); ?>
    </section>
</main>

<?php get_footer(); ?> 