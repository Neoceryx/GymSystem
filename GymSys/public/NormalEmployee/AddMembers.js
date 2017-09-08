$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

  { /* Region Validations form fields */

    // Start validations rules form
    $("#js_MemForm").validate({

      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      rules:{
        jv_MbrName:"required"

      }

    });
    // End validations form rules

  }/* End region */


  $("#js_Mbr").click(function () {

    // Open Member register modal
    $("#js_NewMmbr").modal("open");

  });
  // End click

  // Add New Member
  $("#js_RegMbr").click(function () {

    // Call form rules
    $("#js_MemForm").valid();
    //
    // // Get Member Name
    // var MemName=$("#js_MbrName").val().trim();
    //
    // // Get Member FstName
    // var FstName=$("#js_MbrFstName").val().trim();
    //
    // // Get Member last Name
    // var LstName=$("#js_MbrLstName").val().trim();
    //
    // // Get Member phone number
    // var Phone=$("#js_MbrPhone").val();
    //
    // // Get Member email
    // var EmailMbr=$("#js_MbrMail").val();
    //
    // // Get Member address
    // var Addrs=$("#js_MbrAddress").val();
    //
    // // Get picture Info
    // var PicturePath=$("#js_Photo").prop('files')[0];
    //
    // // Get Picture name
    // var PicName=PicturePath.name;
    //
    // //
    // var form_data = new FormData();
    //
    // // Create file
    // form_data.append("file", PicturePath)
    //
    // console.log(form_data);
    //
    // // Creates object to the user info
    // var UserInfo={MBRNAE:MemName, FSTNAME:FstName, LSTNAME:LstName, PHONE:Phone, EMAIL:EmailMbr, ADRSS:Addrs, PICNAME:PicName };
    //
    // // Start ajax. Send User info
    // $.ajax({
    //   type:"POST",
    //   url:"/AddMember",
    //   data:UserInfo,
    //   beforeSend: function (request) {
    //
    //     return request.setRequestHeader('X-CSRF-Token', TOKEN);
    //
    //   },
    //   success:function (data) {
    //     alert(data);
    //     // $(".res").html(data);
    //   },
    //   error:function () {
    //     alert("An Error Ocurred");
    //     $("body").html(e.responseText)
    //   }
    //
    // });
    // // End ajax
    //
    // // Start ajax. To Upload the image
    // $.ajax({
    //   type:"POST",
    //   url:"/UploadImg",
    //   dataType: 'text',  // what to expect back from the PHP script, if anything
    //   cache: false,
    //   contentType: false,
    //   processData: false,
    //   data:form_data,
    //   beforeSend: function (request) {
    //
    //     return request.setRequestHeader('X-CSRF-Token', TOKEN);
    //
    //   },
    //   success:function (data) {
    //
    //     $(".res").html(data);
    //
    //   },
    //   error:function (e) {
    //     alert("An Error Ocurred");
    //     $("body").html(e.responseText)
    //
    //   }
    // });
    // // End ajax

  });
  // End click

});
