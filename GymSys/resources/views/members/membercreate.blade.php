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
       <form class="col s12" method="post" action="{{route('store') }}">
         <div class="row">
           {!! csrf_field() !!}
           <div class="input-field col s6">
             <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="validate">
             <label for="first_name">First Name</label>
             {{ $errors->first('first_name') }}
           </div>
           <div class="input-field col s6">
             <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="validate">
             <label for="last_name">Last Name</label>
             {{ $errors->first('last_name') }}
           </div>
         </div>
         <div class="row">
           <div class="input-field col s6">
             <input  id="address" name="address" type="text" value="{{ old('address') }}" class="validate">
             <label for="address">Address</label>
             {{ $errors->first('address') }}
           </div>
           <div class="input-field col s6">
             <input  id="city" name="city" type="text" class="validate" value="{{ old('city') }}">
             <label for="city">City</label>
             {{ $errors->first('city') }}
           </div>
         </div>
         <div class="row">
           <div class="input-field col s6">
             <input  id="state" name="state" type="text" class="validate" value="{{ old('state') }}">
             <label for="state">State</label>
             {{ $errors->first('state') }}
           </div>
           <div class="input-field col s6">
             <input  id="country" name="country" type="text" class="validate" value="{{ old('country') }}" >
             <label for="country">Country</label>
             {{ $errors->first('country') }}
           </div>
         </div>
         <div class="row">
            <div class="file-field input-field col s6">
               <div class="btn">
                  <span>Photo</span>
                  <input type="file" id="photo" name="photo">
               </div>
               <div class="file-path-wrapper">
                  <input class="file-path validate" id="path" name="path" type="text" placeholder="Upload file">
               </div>
            </div>

           <div class="input-field col s6">
             <input id="email" name="email" type="email" class="validate">
             <label for="email">Email</label>
             {{ $errors->first('email') }}
           </div>
         </div>
         <div class="row">
          <div class="col s6">
              <p>
                <input id="male" type="radio" name="gender" value="male" checked>
                <label for="male">Male</label>

                <input id="female" type="radio" name="gender" value="female" checked>
                <label for="female"  data-error="wrong" data-success="right">Female</label>
             </p>
          </div>
        </div>
         <div class="card-panel">
            <button class="btn waves-effect waves-light red" type="submit" value="Enviar">Send<i class="material-icons right">send</i></button>
            <button class="btn waves-effect waves-light red disabled" type="submit" >Cancel<i class="material-icons right">cancel</i></button>
         </div>
       </form>
     </div>
   </div>
  </body>
</html>
