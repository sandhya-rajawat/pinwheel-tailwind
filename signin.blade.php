<section class="">
  <div class="container max-w-full">
    <div class="row">
      <div class="min-h-[980px] bg-white py-10 lg:col-6 lg:py-[114px]">
        <div class="mx-auto w-full max-w-[480px]">
          <img class="mb-8" src="images/flower.svg" alt="" />
          <h1 class="mb-4">Sign In</h1>
          <p>Donec sollicitudin molestie malesda sollitudin</p>
          <div class="signin-options mt-10">
            <a class="btn btn-outline-white block w-full text-dark" href="https://www.google.com/">Sign In With Google</a>
          </div>
          <div
            class="relative my-8 text-center after:absolute after:left-0 after:top-1/2 after:z-[0] after:w-full after:border-b after:border-border after:content-['']">
            <span class="relative z-[1] inline-block bg-white px-2">Or Sign In With Email</span>
          </div>

          
          <form action="./signin.php" method="POST">


            <div class="form-group mb-5">
              <label class="form-label" for="email">Email Address</label>
              <input
                class="form-control"
                type="email"
                id="email"
                name="email"
                placeholder="Your Email Address" />
              <?php if (isset($errors['email'])): ?>
                <p class="error"><?= $errors['email'] ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group mt-4">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Your Password"
                name="password" />
              <?php if (isset($errors['password'])): ?>
                <p class="error"><?= $errors['password'] ?></p>
              <?php endif; ?>
            </div>

            <input
              class="btn btn-primary mt-10 block w-full"
              type="submit"
              value="Sign In"
              name="submit" />
            <p class="mt-6 text-center">
              Can't <span class="text-dark" href="#">log in</span>?
              <a class="text-dark" href="./signup.php">Sign up</a> for create
              account
            </p>
          </form>
        </div>
      </div>

      <div
        class="auth-banner bg-gradient flex flex-col items-center justify-center py-16 lg:col-6">
        <img
          class="absolute top-0 left-0 h-full w-full"
          src="images/login-banner-bg.svg"
          alt="" />
        <div class="w-full text-center">
          <h2 class="h3 text-white">
            Turn your All ideas into<br />
            your reality
          </h2>
          <div class="swiper auth-banner-carousel">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  width="667"
                  height="557"
                  class="mx-auto"
                  src="images/login-carousel-img-1.png"
                  alt="" />
              </div>
              <div class="swiper-slide">
                <img
                  width="667"
                  height="557"
                  class="mx-auto"
                  src="images/login-carousel-img-1.png"
                  alt="" />
              </div>
              <div class="swiper-slide">
                <img
                  width="667"
                  height="557"
                  class="mx-auto"
                  src="images/login-carousel-img-1.png"
                  alt="" />
              </div>
            </div>
            <div class="pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  .error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
  }
</style>