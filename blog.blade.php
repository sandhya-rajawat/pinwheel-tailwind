<!-- floating assets -->

<style>
  #image {
    width: 560px;
  }

  .card {
    height: 50vh;
    margin-right: 50px;
  }
</style>

<!-- Decorative Bubbles -->
<img class="floating-bubble-1 absolute right-0 top-0 -z-[1]" src="images/floating-bubble-1.svg" alt="" />
<img class="floating-bubble-2 absolute left-0 top-[387px] -z-[1]" src="images/floating-bubble-2.svg" alt="" />
<img class="floating-bubble-3 absolute right-0 top-[605px] -z-[1]" src="images/floating-bubble-3.svg" alt="" />

<!-- Hero Section -->
<section class="page-hero pt-16 pb-14">
  <div class="container">
    <div class="text-center">
      <ul class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
        <li class="leading-none text-dark">
          <a class="inline-flex items-center text-primary" href="#">
            <svg class="mr-1.5" width="15" height="15" viewBox="0 0 16 16" fill="none">
              <path d="M13.1769 15.0588H10.3533V9.41178H5.64744V15.0588H2.82391V6.58825H1.88274V16H14.118V6.58825H13.1769V15.0588Z M6.58862 15.0588V10.353H9.41215V15.0588H6.58862ZM15.8084 6.09225L15.2512 6.85178L8.00038 1.52472L0.749559 6.8499L0.192383 6.09131L8.00038 0.357666L15.8084 6.09225Z" fill="black"/>
            </svg>
            <span class="text-sm leading-none">Home</span>
          </a>
        </li>
        <li class="leading-none text-dark">
          <span class="text-sm leading-none">/ Blog</span>
        </li>
      </ul>
    </div>
    <div class="page-hero-content mx-auto max-w-[768px] text-center">
      <h1 class="mb-5 mt-8">
        Insight and advice from <br />
        our expert team.
      </h1>
    </div>
    <h2 class="h4 mb-4">Featured Posts</h2>
    
    
  </div>
</section>

<!-- Blog Section -->
 
<?php if (!empty($blogs)) { ?>


  <section class="section pt-0">
    <div class="container mx-auto max-w-screen-xl px-4">
      <div class="featured-posts flex flex-wrap gap-8">
        <?php foreach ($blogs as $blog): ?>
          <div class="mb-8 lg:w-1/4 md:col-6">
            <div class="card">
              <img id="image" class="card-img object-cover rounded-lg" src="./uploads/<?= $blog['thumbnail']; ?>" alt="Blog Image">

              <div class="card-content p-3">
              <div class="card-tags">
              <a class="tag" href="#">Development</a>
             
            </div>
           
                <!-- Title -->
                <h3 class="h4 card-title font-semibold text-lg text-gray-800 mb-2">
                  <a href="blog-detail.php?id=<?= $blog['id']; ?>">
                    <?= htmlspecialchars($blog['title']); ?>
                  </a>
                </h3>

                <!-- Description -->
                <p class="text-md text-gray-700 mb-4">
                  <?= strlen($blog['description']) > 70 ? htmlspecialchars(substr($blog['description'], 0, 70)) . "..." : htmlspecialchars($blog['description']) ?>
                </p>
                  <!-- TAGS -->
                  <div class="card-tags mb-2">
                  <?php if (!empty($blog['tags'])):?>
                    <?php foreach (explode(',', $blog['tags']) as $tag): ?>
                      <a href="?tag=<?= urlencode(trim($tag)) ?>"
                         class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded-full mr-1 hover:bg-green-200">
                        #
                        <?= htmlspecialchars(trim($tag)) ?>
                      </a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>


                <!-- Footer: Dates -->
                <div class="card-footer mt-4 flex space-x-4 text-xs text-[#666]">
                  <span class="inline-flex items-center">
                    <svg class="mr-1.5" width="14" height="16" fill="none"><path d="M12.5 2H11V0.375C11 0.16875 10.8313 0 10.625 0H9.375C9.16875 0 9 0.16875 9 0.375V2H5V0.375C5 0.16875 4.83125 0 4.625 0H3.375C3.16875 0 3 0.16875 3 0.375V2H1.5C0.671875 2 0 2.67188 0 3.5V14.5C0 15.3281 0.671875 16 1.5 16H12.5C13.3281 16 14 15.3281 14 14.5V3.5C14 2.67188 13.3281 2 12.5 2ZM12.3125 14.5H1.6875C1.58438 14.5 1.5 14.4156 1.5 14.3125V5H12.5V14.3125C12.5 14.4156 12.4156 14.5 12.3125 14.5Z" fill="#939393"/></svg>
                    <?= date("jS M, Y", strtotime($blog['created_at'])); ?>
                  </span>
                  <span class="inline-flex items-center">
                    <svg class="mr-1.5" width="16" height="16" fill="none"><path d="M7.65217 0C3.42496 0 0 3.58065 0 8C0 12.4194 3.42496 16 7.65217 16C11.8794 16 15.3043 12.4194 15.3043 8C15.3043 3.58065 11.8794 0 7.65217 0ZM7.65217 14.4516C4.24264 14.4516 1.48107 11.5645 1.48107 8C1.48107 4.43548 4.24264 1.54839 7.65217 1.54839C11.0617 1.54839 13.8233 4.43548 13.8233 8C13.8233 11.5645 11.0617 14.4516 7.65217 14.4516ZM9.55905 11.0839L6.93941 9.09355C6.84376 9.01935 6.78822 8.90323 6.78822 8.78065V3.48387C6.78822 3.27097 6.95484 3.09677 7.15849 3.09677H8.14586C8.34951 3.09677 8.51613 3.27097 8.51613 3.48387V8.05484L10.5773 9.62258C10.7439 9.74839 10.7778 9.99032 10.6575 10.1645L10.0774 11C9.95708 11.171 9.72567 11.2097 9.55905 11.0839Z" fill="#939393"/></svg>
                    <?= date("g:i A", strtotime($blog['updated_at'])); ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
          
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php } else { ?>
  <p class="text-center text-gray-500 py-10">No blogs found 😥</p>
<?php } ?>
