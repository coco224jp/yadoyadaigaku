<?php
  $theme_uri = get_template_directory_uri();
?>

<section class="l-footer-cta bg-dark">
  <div class="l-inner">
    <h2 class="l-footer-cta__ttl">
      <span class="l-footer-cta__ttl-en">Access / Contact</span>
      <span class="l-footer-cta__ttl-ja">アクセス・お問い合わせ</span>
    </h2>
    <div class="l-footer-cta__wrapper">
      <p class="l-footer-cta__txt">宿屋塾へのアクセスについてや、<br>
      お問い合せ・講演依頼・その他ご相談は<br>
      こちらをご確認ください。</p>
      <ul class="l-footer-cta__btn-list">
        <li class="l-footer-cta__btn">
          <a href="" class="l-footer-cta__btn-link">
            <span class="l-footer-cta__btn-text-en">Access</span>
            <span class="l-footer-cta__btn-text-ja">アクセス</span>
          </a>
        </li>
        <li class="l-footer-cta__btn">
          <a href="" class="l-footer-cta__btn-link">
            <span class="l-footer-cta__btn-text-en">Seminar</span>
            <span class="l-footer-cta__btn-text-ja">講演依頼</span>
          </a>
        </li>
        <li class="l-footer-cta__btn">
          <a href="" class="l-footer-cta__btn-link">
            <span class="l-footer-cta__btn-text-en">Contact</span>
            <span class="l-footer-cta__btn-text-ja">お問い合わせ</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<footer class="l-footer bg-dark">
  <div class="l-inner">
    <div class="l-footer__logo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo $theme_uri; ?>/assets/images/common/logo-footer.png" alt="宿屋塾" loading="lazy">
      </a>
    </div>
    <dl class="l-footer__address-wrap">
      <div class="l-footer__address">
        <dt class="l-footer__address-ttl">本社所在地</dt>
        <dd class="l-footer__address-txt">
          〒160-0022<br>
          東京都新宿区新宿2丁目1-12<br class="only-pc">
          PMO新宿御苑前 3F
          <a href="#" class="l-footer__map-link">Google map</a>
        </dd>
      </div>
      <div class="l-footer__address">
        <dt class="l-footer__address-ttl">事務局および教室所在地</dt>
        <dd class="l-footer__address-txt">
          〒169-0051<br>
          東京都新宿区西早稲田2-18-12<br class="only-pc">
          東京YMCA国際ホテル専門学校　内
          <a href="#" class="l-footer__map-link">Google map</a>
        </dd>
      </div>
    </dl>
    <nav class="l-footer__nav">
      <div class="l-footer__nav-list-wrap">
        <span class="l-footer__nav-list-ttl">サービス</span>
        <ul class="l-footer__nav-list">
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">研修サービス</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">業務支援</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">ホテル経営者向け講演</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">よろず相談</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">メディアサービス</a>
          </li>
        </ul>
      </div><!-- ./l-footer__nav-list-wrap -->
      <div class="l-footer__nav-list-wrap">
        <span class="l-footer__nav-list-ttl">会社概要</span>
        <ul class="l-footer__nav-list">
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">宿屋塾とは</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">代表プロフィール</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">スタッフ紹介</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">会社概要・アクセス</a>
          </li>
        </ul>
      </div><!-- ./l-footer__nav-list-wrap -->
      <div class="l-footer__nav-list-wrap">
        <ul class="l-footer__nav-list __txt-bold">
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">セミナー</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">宿屋業界ニュース</a>
          </li>
          <li class="l-footer__nav-list-item">
            <a href="#" class="l-footer__nav-list-link">お知らせ</a>
          </li>
        </ul>
      </div><!-- ./l-footer__nav-list-wrap -->
    </nav>
  </div><!-- ./l-inner -->
  <div class="l-footer__copyright">
    <p><small>Copyright &copy; 2022 Yadoyadaigaku. All Rights Reserved.</small></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>