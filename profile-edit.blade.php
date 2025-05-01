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
<section class="page-hero pt-16 pb-6">
    <div class="container">

        <div class="page-hero-content mx-auto max-w-[768px] text-center">
            <h1 class="mb-5 mt-8">
                Profile Edit <br />

            </h1>
        </div>
    </div>
</section>
<!-- end Common hero -->

<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="mb-10 text-center md:col-6 md:order-2 md:mb-0 md:pt-9">
                <div class="contact-img relative inline-flex pl-5 pb-5">
                    <img src="./images/question.jpg" alt="" />
                    <img
                        class="absolute bottom-0 left-0 -z-[1] h-14 w-14"
                        src="images/shape-2.svg"
                        alt="" />
                </div>
            </div>
            <div class="md:col-6 md:order-1">

                <form class="lg:max-w-[484px]" action="./profile-edit.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group mb-5">
                        <label class="form-label" for="fullname">Full Name</label>
                        <input
                            class="form-control"
                            type="text"
                            id="name"
                            name="fullname"
                            value="<?= htmlspecialchars($user['fullname']) ?>"
                            placeholder="Your Full Name" />
                        <!-- error show  -->
                        <?php if (isset($errors['name'])): ?>
                            <p class="error"><?= $errors['name'] ?></p>
                        <?php endif; ?>

                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label" for="email">Email Address</label>
                        <input
                            class="form-control"
                            type="email"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                            placeholder="Your Email Address" />
                        <?php if (isset($errors['email'])): ?>
                            <p class="error"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label" for="address"> Address</label>
                        <input
                            class="form-control"
                            type="address"
                            id="address"
                            name="address"
                            value="<?= htmlspecialchars($user['address'] ?? '') ?>"
                            placeholder="Your Email Address" />
                        <?php if (isset($errors['email'])): ?>
                            <p class="error"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label" for="phone"> Phone</label>
                        <input
                            class="form-control"
                            type="phone"
                            id="phone"
                            name="phone"
                            value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                            placeholder=" phone " />
                        <?php if (isset($errors['phone'])): ?>
                            <p class="error"><?= $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label" for="image"> image</label>
                        <input
                            class="form-control"
                            type="file"
                            id="image"
                            name="image"
                            />
                            <?php if (!empty($user['image'])): ?>
                <img src="uploads/<?= htmlspecialchars($user['image']) ?>" width="100" class="mt-2" alt="Current Image">
            <?php endif; ?>

                    </div>





                    <input
                        class="btn btn-primary block w-full"
                        type="submit"
                        value="Save Changes"
                        name="submit" />
                    <?php if (isset($errors['message'])): ?>
                        <p class="error"><?= $errors['message'] ?></p>
                    <?php endif; ?>
                </form>

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




