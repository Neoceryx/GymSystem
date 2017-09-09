// <summary>
//   This Script controlates some functions on the members list view
// </summary>

$(document).ready(function () {

  // Get App token
  let TOKEN=$("meta[name='csrf-token']").attr('content');

  $("tr").click(function () {

    // get the element clicked
    var Item = $(this);

    // get the member id. whit out use id in the td
    var IdMem=Item.data("idmem");

    // Open MemberDetails info Modal
    $('#modal1').modal('open');

    // Put the member id on the modal header
    $("#js_IdMem").text(IdMem);

    // Start ajax
    $.ajax({
      type:"POST",
      url:"/MemberInfo",
      data:{IDMBR:IdMem},
      beforeSend: function (request) {

        return request.setRequestHeader('X-CSRF-Token', TOKEN);

      },
      success:function (data) {

        // Display Backend Result in the dom
        $("#js_MbrResult").html(data);

      },
      error:function (e) {
        alert("An error ocurred");
        $("#js_MbrResult").html(e.responseText);
      }
    });
    // End ajax

  });
  // End Click


});
// End Scope
