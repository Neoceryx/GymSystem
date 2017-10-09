<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>Employees List</title>


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

    <h3>Employees List</h3>

    <table>

      <thead>
        <tr>
          <th>Employee Id</th>
          <th>Name</th>
          <th>Fst Name</th>
          <th>Lst Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Password</th>
          <th>Phone</th>
          <th>Picture</th>
          <th>Register Date</th>
          <th>Role</th>
        </tr>
      </thead>

      <tbody>

      </tbody>

    </table>

    <?php
    foreach ($Employees as $_Employee) {

      echo "
      <tr>
        <td>$_Employee->Id</td>
        <td>$_Employee->Name</td>
        <td>$_Employee->FstName</td>
        <td>$_Employee->LstName</td>
        <td>$_Employee->Address</td>
        <td>$_Employee->Email</td>
        <td>$_Employee->password</td>
        <td>$_Employee->Phone</td>
        <td>$_Employee->EmpPhotoPath</td>
        <td>$_Employee->RegisterDate</td>
        <td>$_Employee->RoleDesc</td>
      </tr>
      ";

    }
     ?>



  </body>

  <!-- Jquery  -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

  <script type="text/javascript" src="materialize\js\materialize.min.js"></script>
  <script type="text/javascript" src="Main.js"></script>

</html>
