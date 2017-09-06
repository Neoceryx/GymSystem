$(document).ready(function () {

  console.log("HELLO from Home.js");

  //
  $("#js_Send").click(function () {

    // Get Name
    var Name=$("#js_Name").val();

    // Display Name val
    alert("The is: "+Name);

  });

});
