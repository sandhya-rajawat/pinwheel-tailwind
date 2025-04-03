<!-- floating assets -->
<img class="floating-bubble-1 absolute right-0 top-0 -z-[1]" src="images/floating-bubble-1.svg" alt="" />
<img class="floating-bubble-2 absolute left-0 top-[387px] -z-[1]" src="images/floating-bubble-2.svg" alt="" />
<img class="floating-bubble-3 absolute right-0 top-[605px] -z-[1]" src="images/floating-bubble-3.svg" alt="" />

<!--  blog-detail -->

<section class="section blog-single">
  <div class="container">
    <div class="row justify-center">
      <div class="lg:col-10">
        <img class="rounded-xl" src="./uploads/<?php echo($blog['thumbnail']); ?>" alt="Blog Image" />
      </div>
      <div class="mt-10 max-w-[810px] lg:col-9">
        <h1 class="h2"><?= htmlspecialchars($blog['title']); ?></h1>
        <div class="mt-6 mb-5 flex items-center space-x-2">
          <div class="blog-author-avatar h-[58px] w-[58px] rounded-full border-2 border-primary p-0.5">
            <img src="images/blog-author.png" alt="Author Image" />
          </div>
          <div>
            <p class="text-dark"><?php echo($blog['author'] ?? 'Admin'); ?></p>
            <span class="text-sm"><?php echo($blog['created_at']); ?> · 5 Min read</span>
          </div>
        </div>

        <div class="content">
          <?php echo($blog['description']); ?>
        </div>




        <!-- Comments Section........................... -->
        <div class="comments">
          <h3 class="h5 inline-block border-b-[3px] border-primary font-primary font-medium leading-8">Comments</h3>
          <p>No comments yet. Be the first to comment!</p>
        </div>

    
        <form class="comment-form" action="#" method="POST">
          <p class="mb-4">LEAVE A REPLY</p>
          <div class="form-group">
            <textarea cols="30" rows="5"></textarea>
          </div>
          <div class="row mb-8">
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="text" placeholder="Name" />
            </div>
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="email" placeholder="Email" />
            </div>
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="text" placeholder="Website" />
            </div>
          </div>
          <input type="submit" class="btn btn-primary mt-8 min-w-[189px] cursor-pointer" value="Post Comment" />
        </form>
      </div>
    </div>
  </div>
</section>


<!-- ./end blog-single -->
