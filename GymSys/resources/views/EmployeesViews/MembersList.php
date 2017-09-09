<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>Members List</title>

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
            // Validate session variable
            if ( session()->get('Role') == 2  ) {
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

    <h3>Members list</h3>

    <!-- start Content -->
    <div class="row">

      <table>
         <thead>
           <th>Member No</th>
           <th>Name</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone</th>
           <th>Email</th>
           <th>Member sice</th>
         </thead>

         <tbody>
           <?php

           // Iterate over the table
           foreach ($Members as $_member) {

             echo "
             <tr>
               <td data-idmem='$_member->Id'>".$_member->Id."</td>
               <td>".$_member->Name."</td>
               <td>".$_member->FstName."</td>
               <td>".$_member->LstName."</td>
               <td>".$_member->Phone."</td>
               <th>".$_member->Email."</th>
               <td>".date('d-M-Y H:i:s', strtotime($_member->RgstrDate))."</td>
             </tr>
             ";

             // Display table info
            //  echo "<img src='$_member->MemPhotoPath' alt=''>";

           }
            ?>
         </tbody>

      </table>

    </div>
    <!-- End Content -->

  </body>

  <!-- Jquery -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="materialize\js\materialize.min.js"></script>
  <script type="text/javascript" src="Main.js"></script>

  <!-- Aditional Js files -->
  <script type="text/javascript" src="NormalEmployee\MemberList.js"></script>

</html>
