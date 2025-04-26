

<?php $current = basename($_SERVER['PHP_SELF']); ?>

<div class="flex min-h-screen bg-gray-100">
  <!-- Sidebar -->
  <div class="w-64 bg-white shadow-md p-6">
    <nav class="space-y-2">

      <a href="/profile.php" class="flex items-center px-4 py-2 rounded-lg font-medium transition duration-200
        <?= $current === 'profile.php' ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-100 hover:text-orange-600' ?>">
        <span class="mr-2 <?= $current === 'profile.php' ? 'profile-highlight' : '' ?>">Profile</span> 
      </a>

      <a href="/profile-edit.php" class="flex items-center px-4 py-2 rounded-lg font-medium transition duration-200
        <?= $current === 'profile-edit.php' ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-100 hover:text-orange-600' ?>">
        <span class="mr-2 <?= $current === 'profile-edit.php' ? 'profile-edit' : '' ?>">Edit Profile</span> 
      </a>

      <a href="/change-password.php" class="flex items-center px-4 py-2 rounded-lg font-medium transition duration-200
        <?= $current === 'change-password.php' ? 'bg-orange-100 text-orange-600' : 'text-gray-700 hover:bg-orange-100 hover:text-orange-600' ?>">
        <span class="mr-2 <?= $current === 'change-password.php' ? 'change-password' : '' ?>"> Change Password</span>
      </a>

      <a href="/signout.php" class="flex items-center px-4 py-2 rounded-lg font-medium transition duration-200
        <?= $current === 'signout.php' ? 'bg-orange-100 text-orange-600' : 'text-red-500 hover:bg-orange-100 hover:text-orange-600' ?>">
        <span class="mr-2"> Sign Out</span>
      </a>

    </nav>
  </div>
</div>
