<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Admin Dashboard</title>

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
          <a href="/Employee" class="brand-logo" style="margin-left:5%">Logo</a>

          <!-- Side bar Button -->
          <a href="#" data-activates="slide-out" class="button-collapse show-on-large">
            <i class="material-icons">menu</i>
          </a>

          <!-- Start Links -->
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Link 1</a></li>

            <?php
            // Validate if the user is admin
            if ( session()->get('Role') == 1  ) {
              // Get Session varible
              // echo session()->get('Name');
              echo "<li><a href='#!' id='js_LogOut' class='waves-effect waves-light'>Log Out</a></li>";
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

    <!-- Start SideBar -->
    <ul id="slide-out" class="side-nav">
      <li><a href="Members" target="_blank">Member List</a></li>
    </ul>
    <!-- End SideBar -->

    <?php
    echo "<h2 class='center-align' > Welcome ". session()->get("Name") ."</h2>";
     ?>

    <!-- Start content -->
    <div class="row">

      <!-- Start Add Members card -->
      <div class="col s12 m3">
        <div class="card-panel teal" id="js_Mbr">
          <span class="white-text center-align">

            <div class="center-align">
              <i class="material-icons large ">&#xE7FE;</i>
            </div>

            <h4>New Member</h4>

          </span>
        </div>
      </div>
      <!-- End Add Members card -->

      <!-- Start Add Employee card -->
      <div class="col s12 m3">
        <div class="card-panel teal" id="js_NewEmp">
          <span class="white-text center-align">

            <div class="center-align">
              <i class="material-icons large ">&#xE7FE;</i>
            </div>

            <h4>New Employee</h4>

          </span>
        </div>
      </div>
      <!-- End Add Employee card  -->

      <!-- Start Modals -->
      <div>

        <!-- Start Member Register Modal -->
        <div id="js_NewMmbr" class="modal">
          <div class="modal-content">

            <h4>New Member</h4>

            <div class="row">
              <form id="js_MemForm" class="col s12">
                <div class="row">

                  <div class="input-field col s4">
                    <input id="js_MbrName" type="text" name="jv_MbrName" value="" >
                    <label for="js_MbrName">Name or Names</label>
                  </div>

                  <div class="input-field col s4">
                    <input id="js_MbrFstName" type="text" name="jv_MbrFstName" value="" >
                    <label for="js_MbrFstName">First Name</label>
                  </div>

                  <div class="input-field col s4">
                    <input id="js_MbrLstName" type="text" name="jv_MbrLstName" value="" >
                    <label for="js_MbrLstName">Last Name</label>
                  </div>

                  <div class="input-field col s3">
                    <input id="js_MbrPhone" type="text" name="jv_MbrPhone" value="" >
                    <label for="js_MbrPhone">Phone</label>
                  </div>

                  <div class="input-field col s9">
                    <input id="js_MbrMail" type="text" name="jv_MbrMail" value="" >
                    <label for="js_MbrMail">Email</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="js_MbrAddress" type="text" name="jv_MbrAddress" value="" >
                    <label for="js_MbrAddress">Address</label>
                  </div>

                  <div class="input-filed col s">
                    <input id="js_Photo" type="file" name="js_Photo" />
                  </div>

                  <!-- Backend Display the result -->
                  <div class="res"></div>

                </div>
              </form>
            </div>
          </div>

          <div class="modal-footer">
            <!-- <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Register</a> -->
            <button id="js_RegMbr" class="waves-effect waves-green btn-flat" type="button" name="button">Register</button>

          </div>

        </div>
        <!-- End Member Register Modal -->

        <!-- Start Employee register Modal -->
        <div id="js_NewEmpModal" class="modal">
          <div class="modal-content">
            <h4>New Employee Register Modal</h4>

          </div>
          <div class="modal-footer">
            <a href="#!" class="waves-green btn-flat">Register</a>
          </div>
        </div>
        <!-- Start Employee register Modal -->


      </div>
      <!-- End Modals -->

    </div>
    <!-- End Content -->

  </body>

  <!-- Jquery  -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

  <script type="text/javascript" src="materialize\js\materialize.min.js"></script>
  <script type="text/javascript" src="Main.js"></script>

  <!-- Jquery Validator -->
  <script type="text/javascript"src="Plugins\jquery.validate.min.js"></script>

  <!-- Aditional js -->
  <script type="text/javascript" src="NormalEmployee\DashBoard.js"></script>

  <!-- AddMember js -->
  <script type="text/javascript" src="NormalEmployee\AddMembers.js"></script>

  <!-- AddEmployee js -->
  <script type="text/javascript" src="AdminEmployee\AddEmployee.js"></script>

</html>
