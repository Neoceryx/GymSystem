$(document).ready(function () {

  $("#js_BtnLgn").click(function () {

    // Get Employee Number
    var EmpNmbr=$("#js_EmpNumbr").val();

    // Get Employee Password
    var EmpPass=$("#js_Pass").val();

    // Start ajax
    $.ajax({
      type:"GET",
      url:"/LoginEmp",
      data:{EMPNMBR:EmpNmbr, PASS:EmpPass},
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
