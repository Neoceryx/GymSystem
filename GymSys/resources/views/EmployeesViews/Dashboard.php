<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Employee Dashboard</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize\css\materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- App token allow use post in ajax. -->
    <meta name="csrf-token" content="<?php echo csrf_token() ?>">

  </head>
  <body>

    <!-- Start NavBar -->
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper light-blue lighten-3">

          <!-- Logo -->
          <a href="/Employee" class="brand-logo">Logo</a>

          <!-- Start Links -->
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Link 1</a></li>

            <?php
            // Validate session variable
            if ( session()->get('Role') == 2  ) {
              // Get Session varible
              // echo session()->get('Name');
              echo "<li><a href='#' id='js_LogOut' class='waves-effect waves-light'>Log Out</a></li>";
            }else {
              // redirect user to the login form
              echo redirect('/');
            }
            ?>

          </ul>
          <!-- End Links -->

        </div>
      </nav>
    </div>
    <!-- End NavBar -->

    <?php
      echo "<h2 class='center-align' > Welcome ". session()->get("Name") ."</h2>";
      ?>

      <!-- Start Content grid -->
      <div class="row">

        <!-- Start Add Members card -->
        <div class="col s12 m3">
          <div class="card-panel teal">
            <span class="white-text center-align">

              <div class="center-align">
                <i class="material-icons large ">&#xE7FE;</i>
              </div>

              <h4>New Member</h4>

            </span>
          </div>
        </div>
        <!-- End Add Members card -->


      </div>
      <!-- End Content grid -->



  </body>

  <!-- Jquery -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="materialize\js\materialize.min.js"></script>
  <script type="text/javascript" src="Main.js"></script>

  <!-- Aditional js -->
  <script type="text/javascript" src="Admins\Dashboard.js"></script>

</html>
