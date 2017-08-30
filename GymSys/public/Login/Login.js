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

      },
      error:function (e) {

        alert("An error ocurred");
        
      }

    });
    // End ajax

  });
  // End click event

});
