<?php

/**
 * The front page template file
 *
 * @package Farm_New
 */

get_header();
?>

<main>
  <!-- メインビジュアル -->
  <section class="hero">
    <div class="hero__content">
      <div class="hero__logo">
        <img src="<?php echo get_theme_file_uri('images/logo.svg'); ?>" alt="自然の恵み農園ロゴ">
      </div>
      <h1 class="hero__title">
        自然の恵みを感じ、豊かな未来を。
      </h1>
    </div>
    <!-- スクロールダウン -->
    <div class="hero__scroll">
      <span class="hero__scroll-text english-text">SCROLL</span>
      <div class="hero__scroll-arrow">
        <div class="hero__scroll-line"></div>
        <div class="hero__scroll-tip"></div>
      </div>
    </div>
    <!-- Newsカード -->
        <?php
        $news_query = new WP_Query(
          array(
            'post_type'      => 'post',
            'posts_per_page' => 1,
          )
        );
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : ?>
            <?php $news_query->the_post(); 
            $category = get_the_category();
            $category_name = $category[0]->name;
            ?>
            <a href="<?php the_permalink(); ?>"class="hero__news-card">
            <div class="hero__news-header">
              <span class="hero__news-label english-text">News</span>
            </div>
            <div class="hero__news-date"><time><?php the_time('Y.m.d'); ?></time></div>
            <div class="hero__news-title"><?php the_title(); ?></div>
            </a>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
  </section>

  <!-- 農園紹介セクション -->
  <section id="about" class="about__section">
    <div class="container">
      <div class="farm__intro">
        <!-- 円形画像レイアウト -->
        <div class="farm__images">
          <div class="farm__image-item farm__image-goat">
            <img src="<?php echo get_theme_file_uri('images/about-image01.png'); ?>" alt="ヤギ" loading="lazy">
          </div>
          <div class="farm__image-item farm__image-tomato">
            <img src="<?php echo get_theme_file_uri('images/about-image02.png'); ?>" alt="トマト" loading="lazy">
          </div>
          <!-- 農園説明文 -->
          <div class="farm__description">
            <!-- ロゴ -->
            <div class="farm__header">
              <img src="<?php echo get_theme_file_uri('images/logo.svg'); ?>" alt="自然の恵み農園ロゴ">
            </div>
            <p class="farm__description-text">自然の恵み農園は、<br>
              自然の恵みと動物の尊さが調和する特別な場所です。<br>
              新鮮で美味しい農産物を栽培し, 心温まる動物たちと触れ合える場所でもあります。</p>

            <p class="farm__description-text">自然の恵みを受け、動物たちとの特別なひとときを楽しんでいただける場所として、<br>
              私たちは誇りを持って活動しています。<br>
              一緒に自然と動物の美しさを共有しましょう。</p>
          </div>
          <div class="farm__image-item farm__image-farmer">
            <img src="<?php echo get_theme_file_uri('images/about-image03.png'); ?>" alt="農作業" loading="lazy">
          </div>
          <div class="farm__image-item farm__image-cow">
            <img src="<?php echo get_theme_file_uri('images/about-image04.png'); ?>" alt="牛" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 活動紹介セクション -->
  <section id="activities" class="activities">
    <div class="activities__container">
      <div class="activities__header">
        <h2 class="activities__title">活動紹介</h2>
      </div>
      <div class="activities__tabs">
        <button class="activities__tab-btn activities__tab-btn--active" data-tab="farm">農園</button>
        <button class="activities__tab-btn" data-tab="ranch">牧場</button>
        <button class="activities__tab-btn" data-tab="online">オンライン販売</button>
      </div>
      <div class="activities__content">
        <!-- 農園 -->
        <div class="activities__tab-content activities__tab-content--active" id="farm_content">
          <div class="activities__description">
            <p class="activities__text">私たちは、「持続可能な農業」を掲げて、自然の恵みに感謝しながら、農作物を育てています。<br>
              無農薬で、体にも環境にも優しく、季節ごとに異なる品種を育て、提供しています。<br>
              ぜひ一度、農園にお越し頂き、自分の手で収穫した新鮮な野菜、果物をお召し上がりください。</p>
          </div>
          <div class="swiper activities__swiper" id="farm_swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen01.png'); ?>" alt="農園の畑" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen02.png'); ?>" alt="収穫作業" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen03.png'); ?>" alt="新鮮なイチゴ" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen04.png'); ?>" alt="農園スタッフ" loading="lazy">
                </div>
              </div>
              <!-- 無限ループ用の複製スライド -->
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen01.png'); ?>" alt="農園の畑" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen02.png'); ?>" alt="収穫作業" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen03.png'); ?>" alt="新鮮なイチゴ" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-nouen04.png'); ?>" alt="農園スタッフ" loading="lazy">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- 牧場 -->
        <div class="activities__tab-content" id="ranch_content">
          <div class="activities__description">
            <p class="activities__text">私たちの牧場は、自然と動物との共存を尊重し、持続可能な農業の原則に基づいて運営されています。<br>広々とした環境で、動物たちとのふれあいを通じて、自然の恵みと動物の尊さを感じ、<br>心温まるひとときを過ごしていただけます。</p>
          </div>
          <div class="swiper activities__swiper" id="ranch_swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo01.png'); ?>" alt="牧場の動物" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo02.png'); ?>" alt="搾乳体験" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo03.png'); ?>" alt="動物とのふれあい" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo04.png'); ?>" alt="牧場の牛" loading="lazy">
                </div>
              </div>
              <!-- 無限ループ用の複製スライド -->
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo01.png'); ?>" alt="牧場の動物" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo02.png'); ?>" alt="搾乳体験" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo03.png'); ?>" alt="動物とのふれあい" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-bokujo04.png'); ?>" alt="牧場の牛" loading="lazy">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- オンライン販売 -->
        <div class="activities__tab-content" id="online_content">
          <div class="activities__description">
            <p class="activities__text">自然の恵み農園から直接お届けする、新鮮で美味しい農産物と<br>手作りのジャムやバターなどの加工品を提供しています。<br>自然の恵をご自宅でお楽しみいただけます。</p>
          </div>
          <div class="swiper activities__swiper" id="online_swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec01.png'); ?>" alt="オンライン販売商品1" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec02.png'); ?>" alt="オンライン販売商品2" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec03.png'); ?>" alt="オンライン販売商品3" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec04.png'); ?>" alt="オンライン販売商品4" loading="lazy">
                </div>
              </div>
              <!-- 無限ループ用の複製スライド -->
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec01.png'); ?>" alt="オンライン販売商品1" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec02.png'); ?>" alt="オンライン販売商品2" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec03.png'); ?>" alt="オンライン販売商品3" loading="lazy">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="activities__image">
                  <img src="<?php echo get_theme_file_uri('images/work-ec04.png'); ?>" alt="オンライン販売商品4" loading="lazy">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="faq">
    <div class="faq__container">
      <div class="faq__header">
        <h2 class="faq__title">よくあるご質問</h2>
      </div>

      <div class="faq__list">
        <div class="faq__item faq__item--active">
          <button class="faq__question">
            <span class="faq__q-icon">Q</span>
            <span class="faq__question-text">農園の野菜や果物は有機栽培ですか？</span>
            <span class="faq__toggle-icon"></span>
          </button>
          <div class="faq__answer">
            <div class="faq__answer-content">
              <span class="faq__a-icon">A</span>
              <div class="faq__answer-text">
                <p>はい、私たちの農園では有機栽培の原則に従って野菜と果物を栽培しています。</p>
                <p>化学肥料や農薬を極力使用せず、土壌と作物の健康を第一に考えております。</p>
              </div>
            </div>
          </div>
        </div>

        <div class="faq__item">
          <button class="faq__question">
            <span class="faq__q-icon">Q</span>
            <span class="faq__question-text">農園での見学や体験ツアーは行っていますか？</span>
            <span class="faq__toggle-icon"></span>
          </button>
          <div class="faq__answer">
            <div class="faq__answer-content">
              <span class="faq__a-icon">A</span>
              <div class="faq__answer-text">
                <p>はい、農園見学や収穫体験ツアーを定期的に開催しております。</p>
                <p>事前にお電話またはお問い合わせフォームからご予約ください。季節に応じた様々な体験をご用意しています。</p>
              </div>
            </div>
          </div>
        </div>

        <div class="faq__item">
          <button class="faq__question">
            <span class="faq__q-icon">Q</span>
            <span class="faq__question-text">オンラインで注文した農産物はどのように配送されますか？</span>
            <span class="faq__toggle-icon"></span>
          </button>
          <div class="faq__answer">
            <div class="faq__answer-content">
              <span class="faq__a-icon">A</span>
              <div class="faq__answer-text">
                <p>収穫したての新鮮な農産物を、冷蔵・冷凍便で全国にお届けいたします。</p>
                <p>通常、ご注文から2-3日以内に発送し、最短で翌日お届け可能です。配送日時指定も承っております。</p>
              </div>
            </div>
          </div>
        </div>

        <div class="faq__item">
          <button class="faq__question">
            <span class="faq__q-icon">Q</span>
            <span class="faq__question-text">農園で提供される季節ごとの野菜や果物の品種は何ですか？</span>
            <span class="faq__toggle-icon"></span>
          </button>
          <div class="faq__answer">
            <div class="faq__answer-content">
              <span class="faq__a-icon">A</span>
              <div class="faq__answer-text">
                <p>春：アスパラガス、レタス、いちご　夏：トマト、きゅうり、なす、ピーマン</p>
                <p>秋：さつまいも、大根、白菜　冬：ほうれん草、小松菜、ブロッコリーなど、四季折々の新鮮な農産物をご提供しています。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お知らせ -->

  <section id="news" class="news">
      <div class="news__container">
        <div class="news__layout">
          <div class="news__left">
            <div class="news__header">
              <h2 class="news__title section-title-underline">お知らせ</h2>
            </div>
            
            <div class="news__description">
              <p class="news__description-text">季節の農作物のお知らせ、見学ツアーのご案内、</br>
              オンライン販売セールのお知らせなど、自然の恵み農園の最新情報をお届けします。</p>
            </div>
            
            <div class="news__view-more">
              <a href="<?php echo home_url('/news/'); ?>" class="btn btn--primary english-text">View More</a>
            </div>
          </div>
          
        <div class="news__right">
            <div class="news__list">

        <?php
        $news_query = new WP_Query(
          array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
          )
        );
        ?>
        <?php if ($news_query->have_posts()) : ?>
          <?php while ($news_query->have_posts()) : ?>
            <?php $news_query->the_post(); 
            $category = get_the_category();
            $category_name = $category[0]->name;
            ?>
            <article class="news__item">
                <div class="news__item-meta">
                  <div class="news__item-date"><time><?php the_time('Y.m.d'); ?></time></div>
                  <div class="news__item-category"><?php echo $category_name; ?></div>
                </div>
                <div class="news__item-content">
                  <h3 class="news__item-title"><?php the_title(); ?></h3>
                </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>


  <!-- アクセス -->
  <section id="access" class="access">
    <div class="access__container">
      <div class="access__header">
        <h2 class="access__title section-title-underline">アクセス</h2>
      </div>

      <div class="access__layout">
        <div class="access__info-card">
          <div class="access__info-item"><span class="access__label">会社名</span></div>
          <div class="access__info-item"><span class="access__label">所在地</span></div>
          <div class="access__info-item"><span class="access__label">電話番号</span></div>
          <div class="access__info-item"><span class="access__label">営業時間</span></div>
          <div class="access__map-links">
            <div class="access__map-link-item">
              <span class="access__map-link-label">Googleマップ</span>
            </div>
            <div class="access__map-link-item">
              <a href="https://maps.google.com" target="_blank" class="access__map-expand-link">拡大地図を表示</a>
            </div>
          </div>
        </div>
        <div class="access__value-wrapper">
          <div class="access__value access__value--card">
            <div class="access__value">株式会社自然の恵み農園</div>
            <div class="access__value">〒123-4567 千葉県○○市××町1丁目23-45</div>
            <div class="access__value">012-3456-7890</div>
            <div class="access__value"><time>10:00～18:00</time>（土日祝を除く）</div>
          </div>
          <div class="access__map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0197!2d139.6917!3d35.6895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b563b00109f%3A0x337328def1e2ab26!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1234567890123!5m2!1sja!2sjp"
              width="100%"
              height="450"
              style="border:0;"
              allowfullscreen=""
              loading="lazy">
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お問い合わせ -->
  <section id="contact" class="contact">
    <div class="contact__container">
      <div class="contact__card">
        <h2 class="contact__title">お問い合わせ</h2>

        <div class="contact__description">
          <p class="contact__description-text">お仕事のご相談、農園体験、牧場の見学、その他ご質問</br>
            お気軽にお問い合わせください。</p>
        </div>

        <div class="contact__button-wrapper">
          <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--primary english-text">お問い合わせ</a>
        </div>

        <div class="contact__info">
          <div class="contact__phone">
            <span class="contact__phone-label">問い合わせ電話：</span>
            <span class="contact__phone-number">123-4567-8910</span>
          </div>
          <div class="contact__hours">
            【受付時間】<time>10:00 ～ 18:00</time>（土日祝を除く）
          </div>
        </div>
      </div>
    </div>
  </section>
</main>


</main>
<?php get_footer(); ?>