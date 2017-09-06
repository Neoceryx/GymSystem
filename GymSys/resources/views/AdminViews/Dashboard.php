<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    // Validate session variable
    if ( session()->get('Role') == 1 ) {

      // Get Session varible
      echo session()->get('Name');
      echo session()->get('Role');
      echo "<button type='button' id='js_LogOut' name='button'>Log out</button>";

    }else {

      // redirect user to the login form
      echo redirect('/');

    }
    ?>

    <h2>Admin Dashboard</h2>

  </body>

  <!-- Jquery  -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

  <!-- Aditional js -->
  <script type="text/javascript" src="Admins\Dashboard.js"></script>

</html>
