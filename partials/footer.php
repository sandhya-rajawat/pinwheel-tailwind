<footer class="footer bg-theme-light/50">
    <div class="container">
        <div class="row gx-5 pb-10 pt-[52px]">
            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <a href="index.php">
                    <img src="./images/logo.svg" alt="" />
                </a>
                <p class="mt-6">
                    Lorem ipsum dolor sit sed dmi amet, consectetur adipiscing. Cdo
                    tellus, sed condimentum volutpat.
                </p>
            </div>
            <?php if (!empty($socials)) { ?>
                <div class="col-12 mt-12 md:col-6 lg:col-3">
                    <h6>Socials</h6>
                    <p>themefisher@gmail.com</p>


                    <ul class="social-icons mt-4 lg:mt-6 flex gap-3">

                        <?php foreach ($socials as $social):
                            // create condition for icon
                            $extensions = ['png', 'jpeg', 'jpg', 'svg'];
                            $imagePath = null;

                            foreach ($extensions as $ext) {
                                $possiblePath = "icon/" . $social['type'] . "." . $ext;
                                if (file_exists($possiblePath)) {
                                    $imagePath = $possiblePath;
                                    break;
                                }
                            }

                            if ($imagePath): ?>
                                <li>
                                    <a href="<?= htmlspecialchars($social['url']) ?>" target="_blank">
                                        <img
                                            src="<?= $imagePath ?>"
                                            alt="<?= htmlspecialchars($social['type']) ?>"
                                            width="24" height="24" />
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php } else { ?>
                <p class="text-center text-gray-500 py-10">No social links found 😥</p>
            <?php } ?>



            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <h6>Quick Links</h6>
                <ul>
                    <li>
                        <a href="./pages/about.php">About</a>
                    </li>
                    <li>
                        <a href="#">Category</a>
                    </li>
                    <li>
                        <a href="#">Testimonial</a>
                    </li>
                    <li>
                        <a href="./pages/./contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <h6>Location & Contact</h6>
                <p>2118 Thornridge Cir. Syracuse, Connecticut 35624</p>
                <p>(704) 555-0127</p>
            </div>
        </div>
    </div>
    <div class="container max-w-[1440px]">
        <div
            class="footer-copyright mx-auto border-t border-border pb-10 pt-7 text-center">
            <p>Designed And Developed by <a href="https://themefisher.com" target="_blank">Themefisher</a></p>
        </div>
    </div>
</footer>

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Swiper JS -->
<!-- <script src="plugins/swiper/swiper-bundle.js"></script> -->
<script src="./js/swiper-bundle.js"></script>
<script src="./js/shuffle.js"></script>
<!-- <script src="plugins/shufflejs/shuffle.js"></script> -->

<!-- <script src="./js/main.js"></script> -->


<!-- Main Script -->