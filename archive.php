<?php get_header(); ?>
<main>    
    <section class="news-list">
      <h1 class="news-list__title"><span class="news-list__title-text">お知らせ一覧</span></h1>
      <div class="news-list__categories">
        <a href="<?php echo home_url('/news/'); ?>" 
           class="news-list__category-btn <?php echo !is_category() ? 'news-list__category-btn--active' : ''; ?>">
          すべて
        </a>
        <?php
        $categories = get_categories(array(
          'hide_empty' => true,  // 投稿がないカテゴリーは非表示
          'orderby' => 'name',   // 名前順でソート
          'order' => 'ASC'       // 昇順
        ));
        foreach ($categories as $category) :
          $is_active = is_category($category->term_id) ? 'news-list__category-btn--active' : '';
        ?>
          <a href="<?php echo get_category_link($category->term_id); ?>" 
             class="news-list__category-btn <?php echo $is_active; ?>">
            <?php echo esc_html($category->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="news-list__card">
        <!-- 1件目 -->
        <?php if (have_posts()) : ?>
          <ul>
          <?php while (have_posts()) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="news-list__item">
          <div class="news-list__thumb"><img src="<?php the_post_thumbnail_url(); ?>" alt="サムネ"></div>
          <div class="news-list__meta">
            <div class="news-list__date"><time><?php the_time('Y.m.d'); ?></time></div>
            <div class="news-list__cat"><?php echo $category_name; ?></div>
            <div class="news-list__item-title"><?php the_title(); ?></div>
            <div class="news-list__desc"><?php the_excerpt(); ?></div>
          </div>
          </a>
          <?php endwhile; ?>
          </ul>
          <?php else : ?>
          <p>お知らせはありません。</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
      </div>
      <!-- ============= ページング ============= -->
      <div class="news-list__pagination">
      
      <!-- デバッグ情報（本番環境では削除してください） -->
      <?php if (current_user_can('administrator')) : ?>
        <div style="background: #ffe6e6; padding: 10px; margin: 10px 0; border: 1px solid #ff9999;">
          <p><strong>ページネーションデバッグ:</strong></p>
          <p>総投稿数: <?php echo $wp_query->found_posts; ?></p>
          <p>1ページあたりの表示数: <?php echo get_option('posts_per_page'); ?></p>
          <p>現在のページ: <?php echo get_query_var('paged') ? get_query_var('paged') : 1; ?></p>
          <p>総ページ数: <?php echo $wp_query->max_num_pages; ?></p>
        </div>
      <?php endif; ?>
      <?php
      // メインのページネーション
      $args = array(
        'mid_size' => 2,
        'prev_text' => '前',
        'next_text' => '後',
        'screen_reader_text' => 'ページャー'
      );
      the_posts_pagination($args);
      ?>
      </div>
    </section>
    <section class="news-contact-banner">
      <div class="news-contact-banner__inner">
        <div class="news-contact-banner__title">お問い合わせ</div>
        <div class="news-contact-banner__desc">お仕事のご相談、農園体験、牧場の見学、その他ご質問など、お気軽にお問い合わせください。</div>
        <a href="contact.html" class="news-contact-banner__btn">お問い合わせフォーム</a>
        <div class="news-contact-banner__info">
          <div class="news-contact-banner__tel-label">お問い合わせ電話：</div>
          <div class="news-contact-banner__tel">123-4567-8910</div>
          <div class="news-contact-banner__hours">【受付時間】10:00～18:00（土日祝を除く）</div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>
