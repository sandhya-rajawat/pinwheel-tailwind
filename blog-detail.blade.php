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

              <!-- <?php echo date("jS M, Y  \a\\t g:i A", strtotime($blog['created_at'])); ?> -->
              <?= !empty($blog['created_at']) ? date("jS M, Y \a\t g:i A", strtotime($blog['created_at'])) : 'N/A'; ?>



            </div>
          </div>

          <div class="content">
            <?= nl2br(htmlspecialchars($blog['description'])) ?>
          </div>
        <?php else: ?>
          <p>Blog not found.</p>
        <?php endif; ?>

        <!-- Comments Section -->

        <!-- Comment Form -->
        <div class="comments mt-10">
          <h3 class="h5 inline-block border-b-[3px] border-primary font-primary font-medium leading-8">Comments</h3>

          <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
              <div class="comment flex space-x-4 border-b border-border py-8">
                <img
                  src="images/comment-author-1.png"
                  class="h-[70px] w-[70px] rounded-full"
                  alt="Author" />
                <div>
                  <h4 class="font-primary text-lg font-medium capitalize">
                    <?= htmlspecialchars($comment['name'] ?? 'Anonymous') ?>
                  </h4>
                  <p class="mt-2.5">
                  
                    <?php echo date("jS M, Y  \a\\t g:i A", strtotime($comment['created_at'])); ?>

                    <a class="ml-4 text-primary" href="#">Reply</a>
                  </p>
                  <p class="mt-5">
                    <?php
                    $msg = $comment['message'] ?? '';
                    echo strlen($msg) > 900 ? htmlspecialchars(substr($msg, 0, 900)) . "..." : htmlspecialchars($msg);
                    ?>
                  </p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="mt-4">No comments yet. Be the first to comment!</p>
          <?php endif; ?>
        </div>

        <!-- Comment Form -->
        <p class="mb-4 mt-10 font-semibold text-lg">LEAVE A REPLY</p>
        <form class="comment-form" action="./blog-detail.php?id=<?= $blog['id'] ?? '' ?>" method="POST">
          <input type="hidden" name="id" value="<?= $blog['id'] ?? '' ?>">

          <!-- Message Field -->
          <div class="form-group">
            <textarea cols="30" rows="5" name="message" placeholder="Your Comment..." class="w-full p-3 border rounded">
      <?= htmlspecialchars($formData['message'] ?? '') ?>
    </textarea>
            <?php if (!empty($errors['message'])): ?>
              <div style="color:red;"><?= $errors['message'] ?></div>
            <?php endif; ?>
          </div>

          <div class="row mb-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Name -->
            <div class="form-group">
              <input type="text" placeholder="Name" name="name" value="<?= htmlspecialchars($formData['name'] ?? '') ?>" class="w-full p-3 border rounded" />
              <?php if (!empty($errors['name'])): ?>
                <div style="color:red;"><?= $errors['name'] ?></div>
              <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="form-group">
              <input type="email" placeholder="Email" name="email" value="<?= htmlspecialchars($formData['email'] ?? '') ?>" class="w-full p-3 border rounded" />
              <?php if (!empty($errors['email'])): ?>
                <div style="color:red;"><?= $errors['email'] ?></div>
              <?php endif; ?>
            </div>

            <!-- Website -->
            <div class="form-group">
              <input type="text" placeholder="Website" name="website" value="<?= htmlspecialchars($formData['website'] ?? '') ?>" class="w-full p-3 border rounded" />
              <?php if (!empty($errors['website'])): ?>
                <div style="color:red;"><?= $errors['website'] ?></div>
              <?php endif; ?>
            </div>
          </div>

          <!-- Submit -->
          <input type="submit" class="btn btn-primary mt-4 bg-blue-600 text-white px-6 py-2 rounded cursor-pointer" value="Post Comment" name="submit" />
        </form>

      </div>
    </div>
  </div>
</section>