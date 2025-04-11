<style>
  .image {
   
   border-radius: 50%;
  }
</style>

<footer class="footer bg-theme-light/50">
    <div class="container">
        <div class="row gx-5 pb-10 pt-[52px]">
            <!-- Column 1: Logo & Description -->
            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <a href="index.php">
                    <img src="./images/logo.svg" alt="Logo" />
                </a>
                <p class="mt-6">
                    Lorem ipsum dolor sit sed dmi amet, consectetur adipiscing. Cdo tellus, sed condimentum volutpat.
                </p>
            </div>

            <!-- Social Icons -->
            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <h6>Socials</h6>
                <p>themefisher@gmail.com</p>
              
                <?php if (!empty($socials)) { 
                   
                   
                ?>
                    <ul class="social-icons mt-4 lg:mt-6 flex flex-wrap gap-3">
                        <?php foreach ($socials as $social): ?>
                            <li>
                            <a href="<?= htmlspecialchars($social['url']) ?>">
  <img  width="40px" class="image" src="./uploads/<?= htmlspecialchars($social['icon']) ?>" alt="image" />
</a>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php } else { ?>
                    <p class="text-center text-gray-500 py-10">No blogs found 😥</p>
                <?php } ?>
            </div>

            <!-- Column 3: Quick Links -->
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
                        <a href="./pages/contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Location & Contact -->
            <div class="col-12 mt-12 md:col-6 lg:col-3">
                <h6>Location & Contact</h6>
                <p>2118 Thornridge Cir. Syracuse, Connecticut 35624</p>
                <p>(704) 555-0127</p>
            </div>
        </div>
    </div>
    <div class="container max-w-[1440px]">
        <div class="footer-copyright mx-auto border-t border-border pb-10 pt-7 text-center">
            <p>Designed And Developed by <a href="https://themefisher.com" target="_blank">Themefisher</a></p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="./js/swiper-bundle.js"></script>
<script src="./js/shuffle.js"></script>