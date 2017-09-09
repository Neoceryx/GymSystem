<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h3>Members list</h3>

    <?php

    // Iterate over the table
    foreach ($Members as $_member) {

      // Display table info
      echo "<img src='$_member->MemPhotoPath' alt=''>";

    }
     ?>



  </body>
</html>
