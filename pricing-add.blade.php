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
<section class="page-hero pt-16 pb-6">
  <div class="container">
    <div class="text-center">
      <ul class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
        <li class="leading-none text-dark">
          <a class="inline-flex items-center text-primary" href="#">
            <svg class="mr-1.5" width="15" height="15" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.1769 15.0588H10.3533V9.41178H5.64744V15.0588H2.82391V6.58825H1.88274V16H14.118V6.58825H13.1769V15.0588ZM6.58862 15.0588V10.353H9.41215V15.0588H6.58862ZM15.8084 6.09225L15.2512 6.85178L8.00038 1.52472L0.749559 6.8499L0.192383 6.09131L8.00038 0.357666L15.8084 6.09225Z" fill="black" />
            </svg>
            <span class="text-sm leading-none">Home</span>
          </a>
        </li>
        <li class="leading-none text-dark">
          <span class="text-sm leading-none">/ Contact</span>
        </li>
      </ul>
    </div>
    <div class="page-hero-content mx-auto max-w-[768px] text-center">
      <h1 class="mb-5 mt-8">Add New Price</h1>
    </div>
  </div>
</section>

<section class="section pt-0 min-h-screen flex items-center justify-center">
  <div class="container flex flex-col items-center justify-center">
    <!-- Form Section -->
    <div class="md:col-6 md:order-1">
      <form class="lg:max-w-[484px] w-full" action="./pricing-add.php" method="POST" enctype="multipart/form-data">
        <!-- Title Input -->
        <div class="form-group mb-5">
          <label class="form-label" for="name">Title</label>
          <input
            class="form-control w-full"
            type="text"
            id="name"
            name="title"
            placeholder="Enter Your Title"
            required />
        </div>
        <!-- price Input -->
        <div class="form-group mb-5">
          <label class="form-label" for="name">Price</label>
          <input
            class="form-control w-full"
            type="text"
            id="name"
            name="price"
            placeholder="Price Your Price"
            required />
        </div>

        <!-- Content Textarea -->
        <div class="form-group mb-5">
          <label class="form-label" for="description">Content</label>
          <textarea
            name="content"
            required
            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 h-24 resize-none"></textarea>
        </div>
        <div class="form-group mb-5">
          <label class="form-label" for="name">Text</label>
          <input
            class="form-control w-full"
            type="text"
            id="name"
            name="text"
            placeholder="Enter Your text "
            required />

            <!-- Content Textarea -->
        <div class="form-group mb-5">
          <label class="form-label" for="description">Description</label>
          <textarea
            name="description"
            required
            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 h-24 resize-none"></textarea>
        </div>
       

        <!-- Submit Button -->
        <input
          class="btn btn-primary block w-full"
          type="submit"
          value="Price-Add"
          name="submit" />
      </form>
    </div>
  </div>
</section>
