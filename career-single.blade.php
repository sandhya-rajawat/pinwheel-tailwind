<style>
.text{
  /* background-color: red; */
  margin-left: 50px;
margin-right: 40px;
margin-top: 27px;
/* background-color: red; */
font-size: 25px;

}
.param{
  margin-left: 50px;
  margin-right: 40px;
  /* background-color: blue; */
}
.div{
  background-color: red;
}
</style>


<!-- floating assets -->
<img class="floating-bubble-1 absolute right-0 top-0 -z-[1]" src="images/floating-bubble-1.svg" alt="Floating decorative bubble" />
<img class="floating-bubble-2 absolute left-0 top-[387px] -z-[1]" src="images/floating-bubble-2.svg" alt="Floating decorative bubble" />
<img class="floating-bubble-3 absolute right-0 top-[605px] -z-[1]" src="images/floating-bubble-3.svg" alt="Floating decorative bubble" />
<!-- ./end floating assets -->

<!-- Common hero -->
<section class="page-hero py-16">
  <div class="container">
    <div class="text-center">
      <ul class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
        <li class="leading-none text-dark">
          <a class="inline-flex items-center text-primary" href="#">
            <svg class="mr-1.5" width="15" height="15" viewBox="0 0 16 16" fill="none">
              <path d="M13.1769 15.0588H10.3533V9.41178H5.64744V15.0588H2.82391V6.58825H1.88274V16H14.118V6.58825H13.1769V15.0588ZM6.58862 15.0588V10.353H9.41215V15.0588H6.58862ZM15.8084 6.09225L15.2512 6.85178L8.00038 1.52472L0.749559 6.8499L0.192383 6.09131L8.00038 0.357666L15.8084 6.09225Z" fill="black"/>
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
      <h1 class="mb-5 mt-8">Lead UI/UX Designer</h1>
    </div>
  </div>
</section>
<!-- end Common hero -->

<?php if (!empty($career_singles)) { ?>
<section class="section career-single pt-0">
  <div class="container">
    <div  class="row lg:gx-4" >
      <!-- LEFT: Career Description -->
      <div  class="lg:col-8" >
        <div class="career-single-content rounded-2xl bg-white p-8 shadow-lg space-y-8 pt-7 ml-5">
          <?php foreach ($career_singles as $career_single): ?>
          <div>
          <h5  class ="text"class="text-2xl font-semibold text-gray-900 mb-6 ml-[90px] mr-[40px] w-[600px]"
> <?= htmlspecialchars($career_single['title']); ?> </h5>
<p  class="param"class="text-gray-600 leading-relaxed text-base"> <?= htmlspecialchars($career_single['description']); ?> </p>

          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- RIGHT: Sidebar -->
      <div class="career-single-sidebar mt-8 lg:col-4 lg:mt-0">
        <!-- Apply Now Card -->
        <?php if (!empty($career_apply)) {
          foreach ($career_apply as $career_applys): ?>
          <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg">
            <h5 class="h5 text-lg font-semibold"><?= htmlspecialchars($career_applys['title']); ?></h5>
            <p class="mt-4 text-sm text-gray-600 leading-relaxed">
              <?= strlen($career_applys['description']) > 150
                  ? htmlspecialchars(substr($career_applys['description'], 0, 150)) . ".."
                  : htmlspecialchars($career_applys['description']) ?>
            </p>
            <a class="btn btn-primary mt-6 block w-full text-center py-2 rounded-lg bg-primary text-white hover:bg-primary-dark" href="apply.php?role=lead-uiux-designer">Apply Now</a>
          </div>
        <?php endforeach; } else { ?>
          <p class="text-center text-gray-500 py-10">No careers found 😥</p>
        <?php } ?>

        <!-- Related Careers -->
        <?php if (!empty($careers)) {
          $count = 0;
          foreach ($careers as $career):
            if ($count >= 2) break;
            $count++;
        ?>
          <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg">
            <h5 class="h5 text-lg font-semibold"><?= htmlspecialchars($career['title']); ?></h5>
            <p class="mt-6 text-sm text-gray-600 leading-relaxed">
              <?= strlen($career['description']) > 150
                  ? htmlspecialchars(substr($career['description'], 0, 150)) . ".."
                  : htmlspecialchars($career['description']) ?>
            </p>
            <ul class="mt-6 flex flex-wrap items-center text-sm text-dark">
              <li class="my-1 mr-6 inline-flex items-center">
                <svg class="mr-1" width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="..." fill="currentColor"/>
                </svg>
                <?= htmlspecialchars($career['time']); ?>
              </li>
              <li class="my-1 mr-6 inline-flex items-center">
                <svg class="mr-1" width="16" height="20" viewBox="0 0 23 33" fill="none">
                  <path d="..." fill="currentColor"/>
                </svg>
                Location
              </li>
            </ul>
          </div>
        <?php endforeach; } ?>
      </div>
    </div>
  </div>
</section>
<?php } else { ?>
  <p class="text-center py-20 text-gray-500 text-lg">Career not found 😢</p>
<?php } ?>
