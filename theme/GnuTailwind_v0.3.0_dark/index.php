<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH . '/head.php');
?>

<h2 class="sr-only">메인 페이지</h2>
</div>

<!-- Container End -->
<section id="main-top" class="relative w-full flex items-center">
  <div class="container mx-auto sm: px-4 text-white relative" data-aos="zoom-out" data-aos-delay="100" data-aos-duration="1000">
    <h1 class="m-0 text-xl md:text-3xl font-extrabold leading-6 md:leading-8 ">그누보드 v5.4.x의 <span class="text-indigo-500">Tailwind CSS 버전</span>입니다.</h1>
    <h2 class="mt-2 mr-0 mb-10 ml-0 text-lg md:text-xl font-base mb-0 md:mb-4">Tailwind CSS는 Utility-First 컨셉을 가진 CSS 프레임워크입니다.</h2>
    <div class="inline-flex items-center">
      <a href="https://tailwindcss.com/" target="_blank" class="uppercase text-base md:text-lg tracking-wide inline-block py-1.5 px-3 rounded-md transition transition-duration-500 bg-indigo-500 hover:bg-indigo-400">시작하기</a>
      <a href="#" class="inline-flex items-center">
        <i class="bi bi-play-circle text-indigo-400 text-4xl transition transition-duration-300 leading-0 ml-8 hover:text-indigo-500"></i>
        <span class="text-base transition transition-duration-500 ml-2.5 text-gray-300 font-semibold hover:text-indigo-500">영상 보기</span>
      </a>
    </div>
  </div>
</section>

<section id="transactions">
  <div class="mt-8 mb-10 bg-white" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-sm font-extrabold py-1 px-4 m-0 bg-indigo-100 text-indigo-500 inline-block uppercase rounded-xl">Transactions</h2>
      </div>
      <p class="mt-4 text-xl sm:text-2xl leading-8 font-semibold tracking-tight text-gray-900 text-left lg:text-center">
        A better way to send money
      </p>
      <p class="mt-4 max-w-2xl text-lg sm:text-xl text-gray-500 lg:mx-auto text-left lg:text-center">
        Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.
      </p>

      <div class="mt-10" data-aos="fade-up" data-aos-delay="100">
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
          <div class="relative" data-aos="fade-up" data-aos-delay="100">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <!-- Heroicon name: outline/globe-alt -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Competitive exchange rates</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
            </dd>
          </div>

          <div class="relative" data-aos="fade-up" data-aos-delay="100">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <!-- Heroicon name: outline/scale -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">No hidden fees</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
            </dd>
          </div>

          <div class="relative" data-aos="fade-up" data-aos-delay="100">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <!-- Heroicon name: outline/lightning-bolt -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Transfers are instant</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
            </dd>
          </div>

          <div class="relative" data-aos="fade-up" data-aos-delay="100">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                <!-- Heroicon name: outline/annotation -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
              </div>
              <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Mobile notifications</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</section>

<section id="about" class="about bg-gray-100 py-12 overflow-hidden">
  <div class="container mx-auto px-4 sm:px-0" data-aos="fade-up">
    <div class="text-center pb-8">
      <h2 class="text-sm font-extrabold py-1 px-4 m-0 bg-indigo-100 text-indigo-500 inline-block uppercase rounded-xl">About</h2>
      <h3 class="font-semibold text-xl sm:text-2xl mt-4 text-gray-900">Find Out More <span class="text-indigo-900">About Us</span></h3>
      <p class="mt-4 mr-auto mb-0 ml-auto w-full lg:w-1/2 text-lg sm:text-xl text-gray-500">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
    </div>
    <div class="space-y-10 lg:space-y-0 grid grid-cols-1 lg:grid-cols-2 lg:gap-x-8">
      <div class="" data-aos="fade-right" data-aos-delay="100">
        <img src="<?php echo G5_THEME_IMG_URL ?>/about.jpg" class="w-full" alt="">
      </div>
      <div class="content pt-4 lg:pt-0 flex flex-col justify-center" data-aos="fade-up" data-aos-delay="100">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
        <p class="text-base text-gray-500">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>
        <ul>
          <li class="flex items-start mb-8 first: mt-8">
            <i class="bi bi-shop bg-transparent shadow text-3xl p-6 mr-4 text-indigo-500 rounded-full"></i>
            <div>
              <h5 class="text-lg leading-6 font-medium text-gray-900">Ullamco laboris nisi ut aliquip consequat</h5>
              <p class="text-base text-gray-500">Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
            </div>
          </li>
          <li class="flex items-start mb-8">
            <i class="bi bi-images bg-transparent shadow text-3xl p-6 mr-4 text-indigo-500 rounded-full"></i>
            <div>
              <h5 class="text-lg text-gray-900 font-medium">Magnam soluta odio exercitationem reprehenderi</h5>
              <p class="text-base text-gray-500">Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
            </div>
          </li>
        </ul>
        <p class="last: mb-0 text-base text-gray-500">
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum
        </p>
      </div>
    </div>
  </div>
</section>

<section id="new-idea">
  <div class="flex bg-white new-idea">
    <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
      <div data-aos="fade-right" data-aos-delay="100">
        <h2 class=" text-3xl font-semibold text-gray-900 md:text-4xl">Build Your New <span class="text-indigo-600">Idea</span></h2>
        <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p>
        <div class="flex justify-center lg:justify-start mt-6">
          <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800" href="#">Get Started</a>
          <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400" href="#">Learn More</a>
        </div>
      </div>
    </div>
    <div class="hidden lg:block lg:w-1/2" data-aos="fade-up" data-aos-delay="100" style=" clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
      <div class="h-full object-cover" style="background-image: url(https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80)">
        <div class="h-full bg-black opacity-25"></div>
      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="testimonials py-20 relative">
  <div class="container mx-auto px-4 sm:px-0" data-aos="zoom-in">
    <div class="testimonials-slider swiper-container w-full h-80 sm:h-64 md:h-60" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <div class="swiper-slide text-center text-base">
          <div class="testimonial-item text-center text-white">
            <img src="<?php echo G5_THEME_IMG_URL ?>/testimonials/testimonials-1.jpg" class="testimonial-img w-20 rounded-full border-4 border-gray-300 mx-auto" alt="">
            <h3 class="text-lg font-semibold mt-2 text-white">Saul Goodman</h3>
            <h4 class="text-sm text-gray-400 mb-4">Ceo &amp; Founder</h4>
            <p class="italic text-gray-400 mt-14 sm:mt-3">
              <i class="swiper-button-prev"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="swiper-button-next"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide text-center text-base">
          <div class="testimonial-item text-center text-white">
            <img src="<?php echo G5_THEME_IMG_URL ?>/testimonials/testimonials-2.jpg" class="testimonial-img w-20 rounded-full border-4 border-gray-300 mx-auto" alt="">
            <h3 class="text-lg font-semibold mt-2 text-white">Sara Wilsson</h3>
            <h4 class="text-sm text-gray-400 mb-4">Designer</h4>
            <p class="italic text-gray-400 mt-14 sm:mt-3">
              <i class="swiper-button-prev"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="swiper-button-next"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item text-center text-white">
            <img src="<?php echo G5_THEME_IMG_URL ?>/testimonials/testimonials-3.jpg" class="testimonial-img w-20 rounded-full border-4 border-gray-300 mx-auto" alt="">
            <h3 class="text-lg font-semibold mt-2 text-white">Jena Karlis</h3>
            <h4 class="text-sm text-gray-400 mb-4">Store Owner</h4>
            <p class="italic text-gray-400 mt-14 sm:mt-3">
              <i class="swiper-button-prev"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="swiper-button-next"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item text-center text-white">
            <img src="<?php echo G5_THEME_IMG_URL ?>/testimonials/testimonials-4.jpg" class="testimonial-img w-20 rounded-full border-4 border-gray-300 mx-auto" alt="">
            <h3 class="text-lg font-semibold  mt-2 text-white">Matt Brandon</h3>
            <h4 class="text-sm text-gray-400 mb-4">Freelancer</h4>
            <p class="italic text-gray-400 mt-14 sm:mt-3">
              <i class="swiper-button-prev"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <i class="swiper-button-next"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item text-center text-white">
            <img src="<?php echo G5_THEME_IMG_URL ?>/testimonials/testimonials-5.jpg" class="testimonial-img w-20 rounded-full border-4 border-gray-300 mx-auto" alt="">
            <h3 class="text-lg font-semibold mt-2 text-white">John Larson</h3>
            <h4 class="text-sm text-gray-400 mb-4">Entrepreneur</h4>
            <p class="italic text-gray-400 mt-14 sm:mt-3">
              <i class="swiper-button-prev"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="swiper-button-next"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->
      </div>
      <div class="swiper-pagination mt-6"></div>
    </div>
  </div>
</section>

<?php
include_once(G5_THEME_PATH . '/tail.php');
