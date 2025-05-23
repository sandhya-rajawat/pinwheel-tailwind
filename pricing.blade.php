<!-- floating assets -->
<img
  class="floating-bubble-1 absolute right-0 top-0 -z-[1]"
  src="images/floating-bubble-1.svg"
  alt="" />
<img
  class="floating-bubble-2 absolute left-0 top-[387px] -z-[1]"
  src="images/floating-bubble-2.svg"
  alt="" />
<img
  class="floating-bubble-3 absolute right-0 top-[605px] -z-[1]"
  src="images/floating-bubble-3.svg"
  alt="" />
<!-- ./end floating assets -->

<!-- Common hero -->
<section class="page-hero py-16">
  <div class="container">
    <div class="text-center">
      <ul
        class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
        <li class="leading-none text-dark">
          <a class="inline-flex items-center text-primary" href="#">
            <svg
              class="mr-1.5"
              width="15"
              height="15"
              viewBox="0 0 16 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M13.1769 15.0588H10.3533V9.41178H5.64744V15.0588H2.82391V6.58825H1.88274V16H14.118V6.58825H13.1769V15.0588ZM6.58862 15.0588V10.353H9.41215V15.0588H6.58862ZM15.8084 6.09225L15.2512 6.85178L8.00038 1.52472L0.749559 6.8499L0.192383 6.09131L8.00038 0.357666L15.8084 6.09225Z"
                fill="black" />
            </svg>
            <span class="text-sm leading-none">Home</span>
          </a>
        </li>
        <li class="leading-none text-dark">
          <span class="text-sm leading-none">/ Pricing</span>
        </li>
      </ul>
    </div>
    <div class="page-hero-content mx-auto max-w-[768px] text-center">
      <h1 class="mb-5 mt-8">Pinwheel Pricing</h1>
      <p>
        Donec sollicitudin molestie malesda. Donec sollitudin molestie
        malesuada. Mauris <br />
        pellentesque nec, egestas non nisi. Cras ultricies ligula sed magna
      </p>
    </div>
  </div>
</section>
<!-- end Common hero -->

<!-- pricing -->
<?php if (!empty($prices)) { ?>
  <section class="section mt-12 pt-0">
    <div class="container">
      <div class="row lg:px-10">
        <?php foreach ($prices as $price): ?>
          <div class="mt-8 md:col-6 lg:col-4 lg:mt-0">
            <div class="rounded-xl bg-white px-8 py-10 shadow-lg">
              <div class="flex items-center justify-between">
                <div>
                  <h2 class="h3">  <?= htmlspecialchars($price['title']); ?></h2>
                  <p class="mt-3 text-2xl text-dark"> <?= htmlspecialchars($price['prices']); ?></p>
                </div>
                <span
                  class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-theme-light">
                  <img src="images/icons/price-card-icon-1.svg" alt="" />
              
                </span>
              </div>
              <p class="mt-6">
              <?= strlen($price['description']) > 70 ? htmlspecialchars(substr($price['description'], 0, 70)) . "..." : htmlspecialchars($price['description']) ?>
              </p>
              <div class="my-6 border-y border-border py-6">
                <h4 class="h6"> <?= htmlspecialchars($price['text']); ?></h4>
                <ul class="mt-6">
                  <li class="mb-3 flex items-center text-sm">
                  
                    <?= htmlspecialchars($price['content']); ?>
                  </li>
                  
                </ul>
              </div>
              
              <div class="text-center">
            <a
              class="btn btn-primary h-[48px] w-full rounded-[50px] leading-[30px]"
              href="#"
              >Buy now</a
            >
            <a class="mt-6 inline-flex items-center text-dark" href="#">
              Start Free trial
              <svg
                class="ml-1.5"
                width="13"
                height="16"
                viewBox="0 0 13 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12.7071 8.70711C13.0976 8.31658 13.0976 7.68342 12.7071 7.29289L6.34315 0.928932C5.95262 0.538408 5.31946 0.538408 4.92893 0.928932C4.53841 1.31946 4.53841 1.95262 4.92893 2.34315L10.5858 8L4.92893 13.6569C4.53841 14.0474 4.53841 14.6805 4.92893 15.0711C5.31946 15.4616 5.95262 15.4616 6.34315 15.0711L12.7071 8.70711ZM0 9H12V7H0V9Z"
                  fill="currentColor"
                />
              </svg>
            </a>
          </div>
            </div>
          </div>


        <?php endforeach; ?>

      <?php } else { ?>
        <p class="text-center text-gray-500 py-10">No blogs found 😥</p>
      <?php } ?>


      </div>
    </div>
  </section>
  <!-- ./end pricing -->

  <!-- Faq -->
  <?php if (!empty($price_detail)) { ?>
<section class="faqs section">
  <div class="container max-w-[1230px]">
    <div class="row">
      <div class="text-center lg:col-4 lg:text-start">
        <h2>Frequently Asked Questions</h2>
        <p class="mt-6 lg:max-w-[404px]">
          Vestibulum ante ipsum primis in faucibus orci luctus ultrices posuere cubilia Curae Donec
        </p>
      </div>

      <!-- Single wrapper for all FAQ items -->
      <div class="mt-8 lg:col-8 lg:mt-0">
        <div class="rounded-xl bg-white px-5 py-5 shadow-lg lg:px-10 lg:py-8">
          <?php foreach ($price_detail as $price_details): ?>
            <div class="accordion active border-b border-border">
              <div
                class="accordion-header relative pl-6 text-lg font-semibold text-dark"
                data-accordion>
                <?= htmlspecialchars($price_details['title']); ?>
                <svg
                  class="accordion-icon absolute left-0 top-[22px]"
                  x="0px"
                  y="0px"
                  viewBox="0 0 512 512"
                  xmlspace="preserve">
                  <path
                    fill="currentColor"
                    d="M505.755,123.592c-8.341-8.341-21.824-8.341-30.165,0L256.005,343.176L36.421,123.592c-8.341-8.341-21.824-8.341-30.165,0 s-8.341,21.824,0,30.165l234.667,234.667c4.16,4.16,9.621,6.251,15.083,6.251c5.462,0,10.923-2.091,15.083-6.251l234.667-234.667 C514.096,145.416,514.096,131.933,505.755,123.592z"></path>
                </svg>
              </div>
              <div class="accordion-content pl-6">
                <p>
                  <?=  htmlspecialchars($price_details['description']) ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } else { ?>
  <p class="text-center text-gray-500 py-10">No blogs found 😥</p>
<?php } ?>
