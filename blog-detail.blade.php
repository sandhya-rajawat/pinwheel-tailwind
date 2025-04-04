<?php $blog = $blog ?? null; ?>

<!-- floating assets -->
<img class="floating-bubble-1 absolute right-0 top-0 -z-[1]" src="images/floating-bubble-1.svg" alt="" />
<img class="floating-bubble-2 absolute left-0 top-[387px] -z-[1]" src="images/floating-bubble-2.svg" alt="" />
<img class="floating-bubble-3 absolute right-0 top-[605px] -z-[1]" src="images/floating-bubble-3.svg" alt="" />

<!-- Blog Detail Section -->
<section class="section blog-single">
  <div class="container">
    <div class="row justify-center">
      <div class="lg:col-10">
        <?php if ($blog): ?>
          <img class="rounded-xl" src="./uploads/<?= htmlspecialchars($blog['thumbnail']) ?>" alt="Blog Image" />
        <?php else: ?>
          <p>Blog not found.</p>
        <?php endif; ?>
      </div>

      <div class="mt-10 max-w-[810px] lg:col-9">
        <?php if ($blog): ?>
          <h1 class="h2"><?= htmlspecialchars($blog['title']) ?></h1>
          <div class="mt-6 mb-5 flex items-center space-x-2">
            <div class="blog-author-avatar h-[58px] w-[58px] rounded-full border-2 border-primary p-0.5">
              <img src="images/blog-author.png" alt="Author Image" />
            </div>
            <div>
              <p class="text-dark"><?= htmlspecialchars($blog['author'] ?? 'Admin') ?></p>
              <span class="text-sm"><?= htmlspecialchars($blog['created_at']) ?> · 5 Min read</span>
            </div>
          </div>

          <div class="content">
            <?= nl2br(htmlspecialchars($blog['description'])) ?>
          </div>
        <?php else: ?>
          <p>Blog not found.</p>
        <?php endif; ?>

        <!-- Comments Section -->
        <div class="comments mt-10">
          <h3 class="h5 inline-block border-b-[3px] border-primary font-primary font-medium leading-8">Comments</h3>
          <p>No comments yet. Be the first to comment!</p>
        </div>

        <!-- Comment Form -->
        <form class="comment-form" action="./blog-detail.php?id=<?= $blog['id'] ?? '' ?>" method="POST">
          <input type="hidden" name="id" value="<?= $blog['id'] ?? '' ?>">
          <p class="mb-4">LEAVE A REPLY</p>
          <div class="form-group">
            <textarea cols="30" rows="5" name="message" placeholder="Your Comment..."></textarea>
          </div>
          <div class="row mb-8">
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="text" placeholder="Name" name="name" />
            </div>
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="email" placeholder="Email" name="email" />
            </div>
            <div class="form-group mt-8 md:col-6 lg:col-4">
              <input type="text" placeholder="Website" name="website" />
            </div>
          </div>
          <input type="submit" class="btn btn-primary mt-8 min-w-[189px] cursor-pointer" value="Post Comment" name="submit" />
        </form>
      </div>
    </div>
  </div>
</section>
