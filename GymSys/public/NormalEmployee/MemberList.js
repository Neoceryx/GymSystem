// <summary>
//   This Script controlates some functions on the members list view
// </summary>

$(document).ready(function () {

  console.log("Hi from Members List.js");

  $("tr").click(function () {

    // get the element clicked
    var Item = $(this);

    // get the member id. whit out use id in the td
    var MemName=Item.find("td").eq(0).data("idmem");
    console.log("Member Id: "+MemName);


  });
  // End Click


});
// End Scope
