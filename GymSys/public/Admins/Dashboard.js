$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

  console.log("HELLO from Home.js");

  //
  $("#js_Send").click(function () {

    // Get Name
    var Name=$("#js_Name").val();

    // Display Name val
    alert("The is: "+Name);

  });
  // End Click

  // Logout User
  $("#js_LogOut").click(function () {

    // Start ajax
    $.ajax({
      type:"POST",
      url:"/LogOut",
      data:{},
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },success:function (data) {

        // Show Backend result in the dom
        $(".result").html(data);

        // Redirect User to the login view
        window.location.href = "/";

      },
      error:function (e) {

        console.log(e.responseText);
        $(".result").html(e.responseText);
      }

    });
    //End ajax


  });
  // End Click

});
// End Scope
