<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
        <meta name="csrf-token" content="<?php echo csrf_token() ?>">
  </head>
  <body>

    <h4>This is the Home View</h4>

    <!-- Redirect User to the Test Route -->
    <a href="/Test">Test Link</a>

    <?php

    // Validate session variable
    if ( session()->has('Name') && session()->has('Role') ) {

      // Get Session varible
      echo session()->get('Name');
      echo session()->get('Role');
      echo "<button type='button' id='js_LogOut' name='button'>Log out</button>";

    }else {

      // redirect user to the login form
      echo redirect('/');

    }
    ?>

        <div class="">

      <label for="js_Name">Name:</label>
      <input id="js_Name" type="text" name="" value="">
      <br>
      <button id="js_Send" type="button" name="button">Send</button>

      <!-- Display Backend Result -->
      <div class="result"></div>



    </div>




  </body>

  <!-- Jquery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Aditional Js -->
  <script type="text/javascript" src="/Home.js"></script>


</html>
