document.addEventListener('DOMContentLoaded', function() {
  const burger = document.getElementById('js-header-burger');
  const burgerText = document.getElementById('js-header-burger-text');
  const navMenu = document.getElementById('js-header-menu');
  const body = document.querySelector('body');

  burger.addEventListener('click', () => {
    burger.classList.toggle('open');
    navMenu.classList.toggle('active');

    if(navMenu.classList.contains('active')) {
      body.classList.add('locked');
      burgerText.textContent = '閉じる';
    } else {
      body.classList.remove('locked');
      burgerText.textContent = 'メニュー';
      
    }
  });

  const rem = parseFloat(getComputedStyle(document.documentElement).fontSize);

  const frontMvSwiperDuration = 3000;
  const frontMvSwiperDelay = 500;

  const frontMvSwiper = new Swiper('#js-front-mv-swiper', {
    slidesPerView: 'auto',
    // loopAdditionalSlides: 6,
    speed: frontMvSwiperDelay,
    loop: true,

    pagination: {
      el: '.p-front-mv .p-pagination-progress-circle',
      type: "bullets",
      clickable: true,
    },

    autoplay: {
      delay: frontMvSwiperDuration,
      disableOnInteraction: false
    },
    breakpoints: {
      768: {
        centeredSlides: true,
      },
    },

    on: {
      init: function () {
        const paginationBullets = document.querySelectorAll(
          ".p-pagination-progress-circle .swiper-pagination-bullet"
        );
  
        const firstBullet = paginationBullets[0];
        firstBullet.classList.add("active-first", "swiper-pagination-bullet-active");
  
        document
          .querySelector(".p-pagination-progress-circle .swiper-pagination-bullet:nth-child(1)")
          .classList.add("active-first");
  
        paginationBullets.forEach((el) => {
            el.innerHTML = `
              <svg class="p-pagination-progress-circle__svg" width="19.5" height="19.5" viewBox="0 0 19.5 19.5">
                <circle class="p-pagination-progress-circle__circle-bg" r="5.85" cx="9.75" cy="9.75" fill="none" stroke-width="3.9" />
                <circle class="p-pagination-progress-circle__circle-progress" r="5.85" cx="9.75" cy="9.75" fill="none" stroke-width="3.9" />
              </svg>
            `;
  
            //progress-circle要素を取得
            let circleProgress = el.querySelector(".p-pagination-progress-circle__circle-progress");
            // progress-circle要素の半径を取得
            let circleRadius = circleProgress.getAttribute("r");
            // progress-circle要素の円周の長さを取得
            let circleLength = 2 * Math.PI * circleRadius;
            
            //progress-circle要素の破線パターンの長さに「円周の長さ」を設定（円全体を制御できるようにする）
            circleProgress.style.setProperty("--stroke-dasharray", circleLength);
            //progress-circle要素の破線パターンの開始位置を「円周の長さ」にしてprogress-circleを非表示
            circleProgress.style.setProperty("--stroke-dashoffset", circleLength);
            //カスタムプロパティにスライドの表示時間を登録
            document.documentElement.style.setProperty("--duration-filling", `${frontMvSwiperDuration}ms`);
        });
      }
    }
  });

  let isFirst = true;

  frontMvSwiper.on("slideChange", (options) => {
    const { pagination } = options;

    if (isFirst) {
      pagination.bullets.forEach((bullet) => {
        bullet.classList.remove("active-first");
      });

      isFirst = false;
    }
  });

  frontMvSwiper.on("slideChangeTransitionEnd", (options) => {
    const { pagination } = options;

    pagination.bullets.forEach((bullet) => {
      bullet.classList.remove("slide-change-active");
    });

    const activeBullet = document.querySelector(".swiper-pagination-bullet-active");
    activeBullet.classList.add("slide-change-active");
  });

  
  let frontSwiper2 = null;

  function initFrontNewsSwiper() {
    if (window.innerWidth >= 768) {
      if (!frontSwiper2) { // 未初期化のときだけ実行
        frontSwiper2 = new Swiper('#js-front-industry-news-swiper', {
          slidesPerView: 'auto',
          loopAdditionalSlides: 5,
          loop: true,
          speed: 2000,
          // autoplay: {
          //   delay: 1500,
          // },
        });
      }
    } else {
      if (frontSwiper2) { // 768px未満なら破棄
        frontSwiper2.destroy(true, true);
        frontSwiper2 = null;
      }
    }
  }
  
  // 初回実行
  initFrontNewsSwiper();
  
  // リサイズ対応
  window.addEventListener('resize', initFrontNewsSwiper);

  const frontSwiper3 = new Swiper('#js-front-knowledge-swiper', {
    slidesPerView: '1.375',
    spaceBetween: rem * 1.6,
    centeredSlides: true,
    loopAdditionalSlides: 2,
    loop: true,
    speed: 2000,
    navigation: {
      nextEl: '.p-front-knowledge .swiper-button-next',
      prevEl: '.p-front-knowledge .swiper-button-prev',
    },
    pagination: {
      el: '.p-front-knowledge .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      // when window width is >= 768px
      768: {
        slidesPerView: 3.4,
        spaceBetween: rem * 2,
        centeredSlides: false,
      },
    }
  });

  const voiceCardSwiper = new Swiper('#js-voice-card-swiper', {
    slidesPerView: '1.38',
    spaceBetween: rem * 1.6,
    centeredSlides: true,
    loopAdditionalSlides: 2,
    loop: true,
    speed: 2000,
    navigation: {
      nextEl: '#js-voice-card-swiper-controls .swiper-button-next',
      prevEl: '#js-voice-card-swiper-controls .swiper-button-prev',
    },
    pagination: {
      el: '#js-voice-card-swiper-controls .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      // when window width is >= 320px
      768: {
        slidesPerView: 'auto',
        spaceBetween: rem * 2,
      },
    }
  });

  const productSwiper = new Swiper('#js-product-swiper', {
    slidesPerView: '1.375',
    loopAdditionalSlides: 6,
    loop: true,
    speed: 2000,
    spaceBetween: rem * 1.6,
    autoplay: {
      delay: 1500,
      // disableOnInteraction: false
    },
    navigation: {
      nextEl: '#js-product-swiper-controls .swiper-button-next',
      prevEl: '#js-product-swiper-controls .swiper-button-prev',
    },
    pagination: {
      el: '#js-product-swiper-controls .swiper-pagination',
      clickable: true,
      spaceBetween: rem * 1.56,
    },
          breakpoints: {
      // when window width is >= 768px
      768: {
        slidesPerView: 3.4,
        spaceBetween: rem * 2,
        centeredSlides: false,
      },
    },
    breakpoints: {
      // when window width is >= 768px
      768: {
        slidesPerView: 3.3,
        spaceBetween: rem * 2,
        centeredSlides: false,
      },
    }
  });

});