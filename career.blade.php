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
          <span class="text-sm leading-none">/ Career</span>
        </li>
      </ul>
    </div>
    <div class="page-hero-content mx-auto max-w-[768px] text-center">
      <h1 class="mb-5 mt-8">Career In Pinwheel</h1>
      <p>
        Donec sollicitudin molestie malesda. Donec sollitudin molestie malesuada
        Mauris pellentesque nec egestas non nisi Cras
      </p>
    </div>
    <div class="mt-14 flex justify-center">
      <div class="relative">
        <img src="images/career/career-hero-img-1.png" alt="" />
        <img
          class="absolute -left-[8%] bottom-[12%] z-[-1] h-20 w-20 -rotate-90 lg:-left-8 lg:bottom-4 lg:h-[150px] lg:w-[150px]"
          src="images/shape.svg"
          alt="" />
      </div>
      <div class="relative -ml-[10%] mt-[10%] lg:-ml-[6%] lg:mt-[6%]">
        <img src="images/career/career-hero-img-2.png" alt="" />
        <img
          class="absolute -right-4 -bottom-4 z-[-1] h-16 w-16 -rotate-90"
          src="images/shape.svg"
          alt="" />
      </div>
    </div>
  </div>
</section>
<!-- end Common hero -->

<!-- Benefits -->
<?php if (!empty( $career_benefits)) { ?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="mx-auto text-center lg:col-8">
        <h2>Competitive salary</h2>
        <p class="mt-4">
        The company is offering a salary that is at or above the industry average for the role.It's designed to attract top talent by showing that pay is not below standard.
        </p>
      </div>
    </div>
    <div class="row mt-14 text-center">
    <?php foreach ( $career_benefits as  $career_benefit): ?>
      <div class="mb-10 sm:col-6 lg:col-4">
        
        <img
          class="mx-auto"
          src="./uploads/<?= htmlspecialchars($career_benefit['image']) ?>"
          width="100"
          h="90"
          alt="" />
        <h3 class="h4 mt-8 mb-4"><?= htmlspecialchars($career_benefit['title']); ?></h3>
        <p>
        <?= strlen($career_benefit['description']) > 150 
              ? htmlspecialchars(substr($career_benefit['description'], 0, 150)) . ".." 
              : htmlspecialchars($career_benefit['description']) ?>
        </p>
      </div>
      <?php endforeach; ?>
      </div>
  </div>
</section>
<?php } else { ?>
  <p class="text-center text-gray-500 py-10">No careers found 😥</p>
<?php } ?>


<!-- ./ end Benefits -->
<?php if (!empty($careers)) { ?>
<section class="section">
  <div class="container">
 
    <div class="row">
      <div class="mx-auto text-center lg:col-8">
        <h2>Open positions</h2>
        <p class="mt-4">
        To help you find open positions, 
        you can check job boards.
        </p>
        <ul class="filter-list mt-8 flex flex-wrap items-center justify-center">
          <li><a class="filter-btn filter-btn-active btn btn-sm" href="#">All Categories</a></li>
          <li><a class="filter-btn btn btn-sm" href="#">Design</a></li>
          <li><a class="filter-btn btn btn-sm" href="#">Development</a></li>
          <li><a class="filter-btn btn btn-sm" href="#">Marketing</a></li>
        </ul>
      </div>
    </div>

  
    <div class="row mt-12">
    <?php foreach ($careers as $career): ?>
      <div class="mb-8 md:col-6">
        <div class="rounded-xl bg-white p-5 shadow-lg lg:p-10">
          <h3 class="h4"><?= htmlspecialchars($career['title']); ?></h3>
          <p class="mt-6">
            <?= strlen($career['description']) > 150 
              ? htmlspecialchars(substr($career['description'], 0, 150)) . ".." 
              : htmlspecialchars($career['description']) ?>
          </p>
          <ul class="mt-6 flex flex-wrap items-center text-dark">
            <li class="my-1 mr-8 inline-flex items-center">
              <!-- Time Icon + Text -->
              <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16"><path d="..." fill="currentColor" /></svg>
              <?= htmlspecialchars($career['time']); ?>
            </li>
            <li class="my-1 mr-8 inline-flex items-center">
              <!-- Location Icon + Text -->
              <svg class="mr-1" width="16" height="20" viewBox="0 0 23 33"><path d="..." fill="currentColor" /></svg>
              <?= htmlspecialchars($career['location']); ?>
            </li>
            <li class="my-1 mr-8">
              <a class="inline-flex items-center font-semibold text-primary" href="#">
                Read More
                <img class="ml-1.5" src="images/icons/arrow-right.svg" alt="" />
              </a>
            </li>
          </ul>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
   

  </div>
</section>
<?php } else { ?>
  <p class="text-center text-gray-500 py-10">No careers found 😥</p>
<?php } ?>
