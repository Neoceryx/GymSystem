$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

  $("#js_BtnLgn").click(function () {

    // Get Employee Number
    var EmpNmbr=parseInt($("#js_EmpNumbr").val());

    // Get Employee Password
    var EmpPass=$("#js_Pass").val();

    // Start ajax
    $.ajax({
      type:"POST",
      url:"/LoginEmp",
      data:{EMPNMBR:EmpNmbr, PASS:EmpPass},
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },
      success:function (data) {

        // Display Backend result in the dom element
        $(".result").html(data);

        // Get User
        var LoginString=$(".result").text().split("::");

        // Get Descision val
        var UsrExist = parseInt( LoginString[0] );

        // Get Employee Type from the loginstring
        var EmpType= parseInt( LoginString[1] );

        // Validate if the user is register
        if (UsrExist == 0 ) {

          // Redirect User to the Home view
          alert("User is not Registered");

        }else {

          if ( UsrExist==1 && EmpType == 1  ) {

            //  Redirect User to Admin Layout
            window.location.href = "/Admin";

          }
          if ( UsrExist == 1 && EmpType == 2 ) {

            // Redirect User to the Normal Employee
            window.location.href = "/Employee";

          }

        }
        // End User Validation

      },
      error:function (e) {

        alert("An error ocurred");
        console.log(e);
        $(".result").html(e.responseText);

      }

    });
    // End ajax

  });
  // End click event

});
