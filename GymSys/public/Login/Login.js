$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

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

        var UsrExist=parseInt($(".result").text());
        console.log(UsrExist);

        // Validate if the user is register
        if (UsrExist == 1 ) {

          // similar behavior as clicking on a link
          window.location.href = "/Home";

        }

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
