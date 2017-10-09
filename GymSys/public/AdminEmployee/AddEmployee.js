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

  // Variables to Upload img
  var file_data = $("#js_EmpImg").prop("files")[0];
  debugger

  // Get PictureName
  var ImgName = file_data.name;

  var form_data = new FormData();
  form_data.append("file", file_data);

  // Start.ajax. Register Info Employee
  $.ajax({
    type:"POST",
    url:"../AddEmployee",
    data:{ NAME:EmpName, FSTNAME:EmpFstName, LSTNAME:EmpLstName,
      ADDRSS:EmpAddrss, MAIL:EmpEmail, PASS:EmpPass,
      PHONE:EmpPhone, IMGNAME:ImgName ,ROLEID:EmpRole
    },
    beforeSend: function (request) {

      return request.setRequestHeader('X-CSRF-Token', TOKEN);

    },success:function (data) {
      debugger
      // Display Bakcend result in the dom
      $(".js_EmpResult").html(data);

      var EmpExist=parseInt(data);

      // Validate if the new employees is no Registered
      if (EmpExist == 0 ) {

        // Display Succes Message
        alert("Employee was Registered");

      }else {

        // Display Waringn Message
        alert("This eployee all ready is Registered");

      }

    },error:function (e) {

      alert("An Error Ocurred");
      $("body").html(e.responseText)

    }
  });
  // End Ajax

  // Start ajax. Upload Picture
  $.ajax({
    type:"POST",
    url:"../UploadEmpImg",
    dataType:'text',
    cache: false,
    contentType: false,
    processData: false,
    data:form_data,
    beforeSend: function (request) {

      return request.setRequestHeader('X-CSRF-Token', TOKEN);

    },
    success:function (data) {

      // Display Bakcend result in the dom
      $(".js_EmpResult").html(data);

    },
    error:function (e) {

      alert(" An Error Ocurred ");

    }
  });
  // // End ajax

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
