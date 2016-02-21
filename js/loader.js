$(document).ready(function() {
  $("#searchBtn").click(function () {
    var searchVal = $("#searchTxt").val();

    showNextAir(searchVal);

    return false;
  });
});
