$(document).ready(function () {
  $("#mycarousel").carousel({
    interval: 2000
  });
  $("#mycarousel").carousel("cycle");

  $("#login").on("click", function () {
    $("#loginModal").modal("toggle");
  });
  $("#SignUp").on("click", function () {
    $("#loginModal").modal("hide");
    $("#SignUpModal").modal("toggle");
  });
  $("#Feedback").on("click", function () {
    $("#FeedbackModal").modal("toggle");
  });
  var date = new Date();
  var year = date.getFullYear();
  document.getElementById("year").innerHTML = year;
});
