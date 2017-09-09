$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

    // Enums. to preent magic numbers in loginstring
    const EMPLOYEEPART=0;
    const ROLEPART=1;

  $("#js_BtnLgn").click(function () {

    // Get Employee Number
    var EmpNmbr=$("#js_EmpNumbr").val();

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

        // Get the login string
        var LoginString=$(".result").text().split("::");

        // get the empoye parte from login string
        var EmpPart=LoginString[EMPLOYEEPART];

        // get Employee role from login string
        var Role=LoginString[ROLEPART];

        // Validate User
        if (EmpPart == 0) {

          alert("User is not registered");

        }else {

          // Validate if the user is admin
          if (EmpPart == 1 && Role ==1 ) {

            // Redirect admin to the Dashboard
            window.location.href = "/Admin";

          }else {

            // Validate if the user is normal
            if ( EmpPart == 1 && Role == 2 ) {

              // Redirect Noral user to the Dashboard
              window.location.href = "/Employee";

            }else {

              alert("User or password is wrong, please verify the information");

            }

          }

        }
        // End Validation

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
