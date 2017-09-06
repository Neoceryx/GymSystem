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

  $("#js_Mbr").click(function () {

    // Open Member register modal
    $("#js_NewMmbr").modal("open");

  });
  // End click

  // Add New Member
  $("#js_RegMbr").click(function () {

    // Get Member Name
    var MemName=$("#js_MbrName").val().trim();

    // Get Member FstName
    var FstName=$("#js_MbrFstName").val().trim();

    // Get Member last Name
    var LstName=$("#js_MbrLstName").val().trim();

    // Get Member phone number
    var Phone=$("#js_MbrPhone").val();

    // Get Member email
    var EmailMbr=$("#js_MbrMail").val();

    // Get Member address
    var Addrs=$("#js_MbrAddress").val();

    // Get picture Info
    var PicturePath=$("#sortpicture").prop('files')[0];

    //
    var form_data = new FormData();

    form_data.append("file", PicturePath)

    console.log(form_data);

    // Start ajax. User Info
    $.ajax({
      type:"POST",
      url:"/AddMember",
      data:{MBRNAE:MemName},
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },
      success:function (data) {
        // alert(data);
        // $(".res").html(data);
      },
      error:function () {
        alert("An Error Ocurred");
      }

    });
    // End ajax

    // Start ajax. Only for the image
    $.ajax({
      type:"POST",
      url:"/UploadImg",
      dataType: 'text',  // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data:form_data,
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },
      success:function (data) {

        $(".res").html(data);

      },
      error:function (e) {
        alert("An Error Ocurred");
        $("body").html(e.responseText)

      }
    });
    // End ajax

  });
  // End click

  $('#fiad').change( function(event) {

    // Get picture path
    var tmppath = URL.createObjectURL(event.target.files[0]);

    // Show img in the dom
    $("img").fadeIn("fast").attr('src',tmppath);

  });

});
// End Scope
