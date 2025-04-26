
<style>
  .old{
    padding-left: 10%;
  }
  .new{
    padding-left: 10%;
    margin-left: 3%;
  }
  .confirm{
    padding-left: 10%;
    /* margin-left: 1%; */
  }
  .headofinput{
    margin-left: 33%;
  }
</style>
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
      <h1 class="mb-5 mt-8">Change assword</h1>
    </div>
  </div>
</section>

<!-- HTML Form -->
<div style="padding: 20px;" class="headofinput">
   
    <p style="color: <?= strpos($msg, 'successfully') !== false ? 'green' : 'red' ?>;"><?= $msg ?></p>
    <form method="post" action='./change-password.php'>
        Current Password: <input type="password" name="current_password" required class='old'><br><br>
        New Password:<input type="password" name="new_password" required class='new'><br><br>
        Confirm Password:<input type="password" name="confirm_password" required class='confirm'><br><br>
        <input type="submit" value="Change Password">
    </form>
</div>
