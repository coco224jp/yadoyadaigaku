document.addEventListener('DOMContentLoaded', function() {
  const rem = parseFloat(getComputedStyle(document.documentElement).fontSize);

  AOS.init({
    duration: 800,
    once: true
  });

  const burger = document.getElementById('js-header-burger');
  const burgerText = document.getElementById('js-header-burger-text');
  const navMenu = document.getElementById('js-header-menu');
  const body = document.querySelector('body');
  let scrollPosition = 0;

  burger.addEventListener('click', () => {
    burger.classList.toggle('open');
    navMenu.classList.toggle('active');

    if(navMenu.classList.contains('active')) {
      scrollPosition = window.pageYOffset;
      body.style.setProperty('--scroll-y', `-${scrollPosition}px`);
      body.classList.add('is-fixed');
      burgerText.textContent = '閉じる';
    } else {
      body.classList.remove('is-fixed');
      window.scrollTo(0, scrollPosition);
      burgerText.textContent = 'メニュー';
      
    }
  });

  const frontMvSwiperDuration = 3000;
  const frontMvSwiperDelay = 500;
  const frontMvCenterSlide = 2;

  const frontMvSwiper = new Swiper('#js-front-mv-swiper', {
    slidesPerView: 'auto',
    speed: frontMvSwiperDelay,
    slidesPerGroup: 1,
    centeredSlides: true,
    initialSlide: frontMvCenterSlide,

    pagination: {
      el: '.p-front-mv .p-pagination-progress-circle',
      type: "bullets",
      clickable: true,
    },
    autoplay: {
      delay: frontMvSwiperDuration,
      disableOnInteraction: true
    },

    on: {
      init: function () {
        const paginationBullets = document.querySelectorAll(
          ".p-pagination-progress-circle .swiper-pagination-bullet"
        );

        const activeBullet = paginationBullets[frontMvCenterSlide];
        if (activeBullet) {
          activeBullet.classList.add("active-first", "swiper-pagination-bullet-active");
        }
    
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
  // frontMvSwiperここまで

  let frontIndustryNewsSwiper = null;

  function initFrontIndustryNewsSwiper() {
    if (window.innerWidth >= 768) {
      if (!frontIndustryNewsSwiper) { // 未初期化のときだけ実行
        frontIndustryNewsSwiper = new Swiper('#js-front-industry-news-swiper', {
          slidesPerView: 'auto',
          speed: 2000,
          autoplay: {
            delay: 1500,
          },
        });
      }
    } else {
      if (frontIndustryNewsSwiper) { // 768px未満なら破棄
        frontIndustryNewsSwiper.destroy(true, true);
        frontIndustryNewsSwiper = null;
      }
    }
  }
  
  // 初回実行
  initFrontIndustryNewsSwiper();
  
  // リサイズ対応
  window.addEventListener('resize', initFrontIndustryNewsSwiper);

  const frontKnowledgeSwiper = new Swiper('#js-front-knowledge-swiper', {
    slidesPerView: 'auto',
    spaceBetween: rem * 1.6,
    centeredSlides: true,
    initialSlide: 1,
    speed: 1000,
    autoplay: {
      delay: 2500,
    },
    navigation: {
      nextEl: '.p-front-knowledge .c-swiper-controls .swiper-button-next',
      prevEl: '.p-front-knowledge .c-swiper-controls .swiper-button-prev',
    },
    pagination: {
      el: '.p-front-knowledge .c-swiper-controls .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      // when window width is >= 768px
      768: {
        spaceBetween: rem * 2,
        centeredSlides: false,
      },
    },
    on: {
      init: function (swiper) {
        swiper.slideTo(swiper.params.initialSlide, 0, false);
      },
    },
  });


  const voiceCardSwiper = new Swiper('#js-voice-card-swiper', {
    slidesPerView: 'auto',
    spaceBetween: rem * 1.6,
    centeredSlides: true,
    initialSlide: 2,
    slidesPerGroup: 1,
    speed: 1500,
    autoplay: {
      delay: 3500
    },
    navigation: {
      nextEl: '#js-voice-card-swiper-controls .swiper-button-next',
      prevEl: '#js-voice-card-swiper-controls .swiper-button-prev',
    },
    pagination: {
      el: '#js-voice-card-swiper-controls .swiper-pagination',
      clickable: true,
    },
    breakpoints: {
      768: {
        spaceBetween: rem * 2,
      },
    },
  });

  const productSwiper = new Swiper('#js-product-swiper', {
    slidesPerView: 'auto',
    speed: 2000,
    spaceBetween: rem * 1.6,
    centeredSlides: true,
    initialSlide: 1,
    // autoplay: {
    //   delay: 1500,
    //   // disableOnInteraction: false
    // },
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
        spaceBetween: rem * 2,
        centeredSlides: false,
        initialSlide: 0,
   
      },
    }
  });

});