$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

// Open Register Employee Modal
$("#js_NewEmp").click(function () {

  // Open RegEmployee Modal
  $("#js_NewEmpModal").modal('open');

});
// End click

// Save New Employee
$("#js_RegEmp").click(function () {

  // Get Employe Name
  var EmpName=$("#js_EmpName").val();

  // Get Employee First Name
  var EmpFstName = $("#js_EmpFstName").val();

  // Get Employee Last Name
  var EmpLstName =$("#js_EmpLstName").val();

  // Get Employee Address
  var EmpAddrss=$("#js_EmpAddrs").val();

  // Get Employee Email
  var EmpEmail=$("#js_EmpMail").val();

  // Get Employee password
  var EmpPass=$("#js_EmpPass").val();

  // Get Employee Phone Number
  var EmpPhone=$("#js_EmpPhone").val();

  // Get Employee Role Id
  var EmpRole=$("#js_EmpRoleId").val();
  debugger

  // Start.ajax
  $.ajax({
    type:"POST",
    url:"../AddEmployee",
    data:{ NAME:EmpName, FSTNAME:EmpFstName, LSTNAME:EmpLstName,
      ADDRSS:EmpAddrss, MAIL:EmpEmail, PASS:EmpPass,
      PHONE:EmpPhone, ROLEID:EmpRole
    },
    beforeSend: function (request) {

      return request.setRequestHeader('X-CSRF-Token', TOKEN);

    },success:function (data) {

      // Display Bakcend result in the dom
      $(".js_EmpResult").html(data);

      alert("Employee was Registered");

    },error:function (e) {

      alert("An Error Ocurred");
      $("body").html(e.responseText)

    }
  });
  // End Ajax

});
// End Click

// Fill Employee Roles
$.ajax({
  type:"GET",
  url:"../EmpRoles",
  data:{},
  success:function (data) {

    // Display Backend Result in the dom
    $("#js_EmpRoleId").append(data);

  },
  error:function (e) {

    alert("An Error Ocurred");
    $("body").html(e.responseText)

  }
});
// End ajax

});
// End Scope
