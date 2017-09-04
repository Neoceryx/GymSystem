$(document).ready(function () {

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

    // Get picture path
    var PicturePath=$("#js_MbrPotho").val()
    
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
