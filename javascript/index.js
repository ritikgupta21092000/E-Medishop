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
  $("#Add").on("click", function () {
    $("#AddModal").modal("toggle");
  });
  $("#edit").on("click", function () {
    $("#editModal").modal("toggle");
  });
  $("#delete").on("click", function () {
    $("#deleteModal").modal("toggle");
  });
  $("#ContactUs").on("click", function () {
    $("#ContactUsModal").modal("toggle");
  });
  var date = new Date();
  var year = date.getFullYear();
  document.getElementById("year").innerHTML = year;
});
