<!-- Floating assets -->
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
<!-- End floating assets -->

<!-- Hero Section -->
<section class="page-hero pt-16 pb-6">
    <div class="container">
        <div class="page-hero-content mx-auto max-w-[768px] text-center">
            <h1 class="mb-5 mt-8 text-3xl font-bold">
                Change Password
            </h1>
        </div>
    </div>
</section>
<!-- End Hero -->

<!-- Change Password Section -->
<section class="section pt-0 pb-20">
    <div class="container">
        <div class="row items-center">
            <!-- Image -->
            <div class="mb-10 text-center md:col-6 md:order-2 md:mb-0 md:pt-9">
                <div class="contact-img relative inline-flex pl-5 pb-5">
                    <img src="images/lock.jpg" alt="Question" />
                    <img
                        class="absolute bottom-0 left-0 -z-[1] h-14 w-14"
                        src="images/shape-2.svg"
                        alt="" />
                </div>
            </div>

            <!-- Form -->
            <div class="md:col-6 md:order-1">
                <form class="lg:max-w-[484px]" action="./profile-edit.php" method="POST">
                    <div class="form-group mb-5">
                        <label class="form-label block mb-2 text-sm font-medium text-gray-700" for="current_password">
                            Current Password:
                        </label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            required
                            class="w-full rounded border border-gray-300 px-4 py-2 focus:border-orange-400 focus:outline-none"
                        />
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label block mb-2 text-sm font-medium text-gray-700">
                            New Password:
                        </label>
                        <input
                            type="password"
                            name="new_password"
                            required
                            class="w-full rounded border border-gray-300 px-4 py-2 focus:border-orange-400 focus:outline-none"
                        />
                    </div>

                    <div class="form-group mb-5">
                        <label class="form-label block mb-2 text-sm font-medium text-gray-700">
                            Confirm Password:
                        </label>
                        <input
                            type="password"
                            name="confirm_password"
                            required
                            class="w-full rounded border border-gray-300 px-4 py-2 focus:border-orange-400 focus:outline-none"
                        />
                    </div>

                    <input
                        type="submit"
                        value="Change Password"
                        class="mt-4 cursor-pointer rounded bg-gradient-to-r from-orange-400 to-pink-500 px-6 py-2 font-semibold text-white transition hover:brightness-110"
                    />
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Change Password Section -->
