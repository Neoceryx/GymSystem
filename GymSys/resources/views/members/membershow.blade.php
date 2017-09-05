<!DOCTYPE html>
<html>
  <head>
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <!-- <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>-->
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Add members</title>
  </head>

  <body>
    <div class="center-align card-panel teal lighten-2">
       <div class="card-panel teal lighten-2"><h1>Add Members</h1></div>
    </div>
  <div class="container">
    <div class="row card-panel">
       <form class="col s12">
          {!! csrf_field() !!}
         <div class="row">
           <div class="input-field col s6">
              <table>
                <thead>
                  <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Photo</th>
                      <th>Actions</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Actions</th>
                  </tr>
                </tbody>
              </table>

           </div>
          </div>
         </form>
       </div>
     </div>
    </body>
  </html>
