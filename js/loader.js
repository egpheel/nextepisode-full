$(document).ready(function() {
  featureBelt();

  $("#searchBtn").click(function () {
    var searchVal = $("#searchTxt").val();

    showNextAir(searchVal);

    return false;
  });
});
