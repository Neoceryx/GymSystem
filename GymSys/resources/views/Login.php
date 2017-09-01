<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize\css\materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta name="csrf-token" content="<?php echo csrf_token() ?>">

  </head>
  <body>



    <!-- Start Card Container -->
    <div class="row">

      <!-- Add white space to the left -->
      <div class="col s12 m4"></div>

      <!-- Star Card size -->
      <div class="col s12 m4" style="padding-top:3%">
        <div class="card white hoverable">
          <div class="card-content blue-text">

            <span class="card-title blue-text center-align">Login</span>

            <!-- Start form login -->
            <div class="row">
              <form class="col s12">
                <div class="row">

                  <div class="input-field col s12">
                    <input id="js_EmpNumbr" type="text" name="" value="">
                    <label for="js_EmpNumbr">Employee Number</label>
                  </div>

                  <div class="input-field col s12">
                    <input id="js_Pass" type="password" name="" value="">
                    <label for="js_Pass">Password</label>
                  </div>

                  <div class="input-filed col s12 center-align">
                    <button id="js_BtnLgn" class="btn waves-effect waves-light" type="button" name="button">
                      <i class="material-icons left">&#xE0DA;</i>
                      Login
                    </button>
                  </div>

                  <div class="input-field col s12 center-align">
                    <a href="#">Forget Password</a>
                  </div>

                </div>
              </form>
            </div>
            <!-- End form login -->

            <!-- Display Backend Result Data  -->
            <div class="result"></div>
            
          </div>
        </div>
      </div>
      <!-- End Card size -->

    </div>
    <!-- End Card Container -->

  </body>

</html>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="materialize\js\materialize.min.js"></script>

<!-- Aditional Js -->
<script type="text/javascript" src="Login\Login.js"></script>
