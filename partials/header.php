<!-- <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        include_once './function.php';
        ?> -->
        
<header class="header">
    <nav class="navbar container">
        <!-- logo -->
        <div class="order-0">
            <a href="<?php
                        echo get_url('index.php');
                        ?>">
                <img src="images/logo.svg" height="30" width="147" alt="logo" />
            </a>
        </div>
        <!-- navbar toggler -->
        <input id="nav-toggle" type="checkbox" class="hidden" />
        <label
            id="show-button"
            for="nav-toggle"
            class="order-1 flex cursor-pointer items-center lg:order-1 lg:hidden">
            <svg class="h-6 fill-current" viewBox="0 0 20 20">
                <title>Menu Open</title>
                <path d="M0 3h20v2H0V3z m0 6h20v2H0V9z m0 6h20v2H0V0z"></path>
            </svg>
        </label>
        <label
            id="hide-button"
            for="nav-toggle"
            class="order-2 hidden cursor-pointer items-center lg:order-1">
            <svg class="h-6 fill-current" viewBox="0 0 20 20">
                <title>Menu Close</title>
                <polygon
                    points="11 9 22 9 22 11 11 11 11 22 9 22 9 11 -2 11 -2 9 9 9 9 -2 11 -2"
                    transform="rotate(45 10 10)"></polygon>
            </svg>
        </label>
        <!-- /navbar toggler -->
        <ul
            id="nav-menu"
            class="navbar-nav order-2 hidden w-full flex-[0_0_100%] lg:order-1 lg:flex lg:w-auto lg:flex-auto lg:justify-center lg:space-x-5">
            <li class="nav-item">
                <a href="<?php
                        echo get_url('index.php');
                        ?>" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?php
                            echo get_url('about.php');
                            ?>" class="nav-link">About</a>
            </li>
           
          
            <li class="nav-item">
                <a href="<?php
                            echo get_url('blog.php');
                            ?>" class="nav-link">Blog</a>
            </li>
           
            <li class="nav-item">
                <a href="<?php
                            echo get_url('features.php');
                            ?>" class="nav-link">Features</a>
            </li>
            <li class="nav-item">
                <a href="<?php
                            echo get_url('how-it-works.php');
                            ?>" class="nav-link">How It Works</a>
            </li>
            <li class="nav-item nav-dropdown group relative">
                <span class="nav-link inline-flex items-center">
                    Form
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
                <ul
                    class="nav-dropdown-list hidden group-hover:block lg:invisible lg:absolute lg:block lg:opacity-0 lg:group-hover:visible lg:group-hover:opacity-100">
                    <li class="nav-dropdown-item">
                        <a href="blog-add.php" class="nav-dropdown-link">Blog Add</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="about-teams.php" class="nav-dropdown-link">Team Add</a>
                      
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="about-info.php" class="nav-dropdown-link">Team_Features</a>
                      
                    </li>
                   
                    
                </ul>
            </li>
            <li class="nav-item nav-dropdown group relative">
                <span class="nav-link inline-flex items-center">
                    Pages
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
                <ul
                    class="nav-dropdown-list hidden group-hover:block lg:invisible lg:absolute lg:block lg:opacity-0 lg:group-hover:visible lg:group-hover:opacity-100">
                    <li class="nav-dropdown-item">
                        <a href="career.html" class="nav-dropdown-link">Career</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="career-single.html" class="nav-dropdown-link">Career Single</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="integrations.html" class="nav-dropdown-link">Integrations</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="integration-single.html" class="nav-dropdown-link">Integration Single</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="pricing.html" class="nav-dropdown-link">Pricing</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="changelogs.html" class="nav-dropdown-link">Changelogs</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="terms-conditions.html" class="nav-dropdown-link">Terms & Conditions</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?php
                            echo get_url('contact.php');
                            ?>" class="nav-link">Contact</a>
            </li>
            <li class="nav-item mt-3.5 lg:hidden">
                <a class="btn btn-white btn-sm border-border" href="signin.php">Sign In</a>
            </li>
        </ul>


        <div class="order-1 ml-auto hidden items-center md:order-2 md:ml-0 lg:flex">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- User is logged in: Show Sign Out -->
                <a class="btn btn-white btn-sm" href="<?php echo get_url('signup.php'); ?>">Sign Out</a>

            <?php else: ?>
                <!-- User not logged in: Show Sign In -->
                <a class="btn btn-white btn-sm" href="<?php echo get_url('signin.php'); ?>">Sign In</a>
            <?php endif; ?>
        </div>


</header>