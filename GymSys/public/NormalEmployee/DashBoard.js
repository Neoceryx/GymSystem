$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

  //Log Out
  $("#js_LogOut").click(function () {

    // Start ajax
    $.ajax({
      type:"POST",
      url:"/LogOut",
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },success:function () {

        //redirect user to the Login view
        window.location.href = "/";

      },error:function () {

        alert("Error Ocurred");

      }
    });
    // End ajax

  });
  // End click

});
// End Scope
