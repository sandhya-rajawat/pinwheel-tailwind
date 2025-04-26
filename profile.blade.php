<style>
.image{

}

</style>

<!-- Profile Page Layout -->
 
<div class="p-6 max-w-2xl mx-auto" id="full">
  <h2 class="text-2xl font-semibold mb-6">My Profile</h2>

  <div class="bg-white shadow rounded p-6 space-y-4">
    <div class="flex items-center space-x-4">
      <!-- image......... -->
      <div>
        <label class="font-medium"></label><br>
        <img  class="image"src="./uploads/<?php echo htmlspecialchars($image); ?>" alt="Profile Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
      </div>
      <div>
        <h3 class="text-xl font-bold"><?= htmlspecialchars($fullname) ?></h3>
        <p class="text-sm text-gray-600"><?= htmlspecialchars($email) ?></p>
        <label class="font-medium">Password:</label>
      <p class="text-gray-700"><?= htmlspecialchars($password) ?: "Not provided" ?></p>
      </div>
    </div>

    <!-- <div>
      <label class="font-medium">Password:</label>
      <p class="text-gray-700"><?= htmlspecialchars($password) ?: "Not provided" ?></p>
    </div> -->


    <div>
      <a href="profile-edit.php" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Edit Profile
      </a>
    </div>
  </div>
</div>