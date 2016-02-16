function featureBelt() {
  $('.register-btn').click(function() {
    $('.features-belt').css('left', '-100%');
    $('.why-register-container').show(300);
  });
  $('.why-register-return').click(function() {
    $('.features-belt').css('left', '0%');
    $('.why-register-container').hide(800);
  });
}

var fanartAPIkey = 'a1762923cfc36071f53e75b4b76cbda6';
var APIurl = 'http://webservice.fanart.tv/v3';

function getFanart(thetvdbID) {
  var completeUrl = APIurl + '/tv/' + thetvdbID + '?api_key=' + fanartAPIkey;

  $.getJSON(completeUrl, function (data) {
    var bgNum = data.showbackground.length;
    var randomBg = Math.floor(Math.random() * bgNum);
    var bgfanart = data.showbackground[randomBg].url;

    $('.searchSection').fadeTo('slow', 0.1, function () {
      $(this).css('background-image', 'url(' + bgfanart + ')');
      $(this).css('background-size', 'cover');
      $(this).css('background-position', 'center top');
      $(this).css('background-repeat', 'no-repeat');
    }).fadeTo('slow', 1);
  });
};

function showNextAir(showName) {
  $("#results").fadeOut('slow');
  $("#results").empty();
  $("#results").fadeIn('slow');
  $.getJSON('http://api.tvmaze.com/singlesearch/shows?q=' + showName, function (data) {
    var tvshowname = data.name;
    var tvshowurl = data.url;
    var status = data.status;
    var thetvdbID = data.externals.thetvdb;
    var nextEp = data._links.nextepisode;
    var prevEp = data._links.previousepisode;

    var showLastChar = tvshowname[tvshowname.length -1];
    var termination = '\'s';
    if (showLastChar == 's' || showLastChar == 'S') {
      termination = '\'';
    } else {
      termination = '\'s';
    }

    if (thetvdbID != null) {
      getFanart(thetvdbID);
    };

    if (status != 'Ended') {
      //if show still running
      if (typeof nextEp != 'undefined') {
        $.getJSON(nextEp.href, function (data) {
          var epname = data.name;
          var epseason = data.season;
          var epnumber = data.number;
          var eptimestamp = data.airstamp;
          var epairtime = moment(eptimestamp);
          var today = moment().format('D MM YYYY');
          var tomorrow = moment().add(1, 'days').format('D MM YYYY');
          var epday = epairtime.format('D MM YYYY');

          if (epday == today) {
            airtime = epairtime.format('[today at] H:mma');
          } else if (epday == tomorrow) {
            airtime = epairtime.format('[tomorrow at] H:mma');
          } else {
            var airtime = epairtime.format('[on] dddd, Do MMM YYYY [at] H:mma');
          }

          var epruntime = data.runtime;
          var epsummary = data.summary;

          $("#results").append('<div class="showResults"><h3><strong>' + tvshowname + '</strong>' + termination + ' next episode airs ' + airtime + '</h3></div>');
        });
      } else {
        $("#results").append('<div class="showResults"><h3>I\'m sorry. This is very embarrassing but I\'m not sure when <strong>' + tvshowname + '</strong>' + termination + ' next episode airs. (._.\')</h3></div>');
      };
    } else {
      //show ended
      if (typeof prevEp != 'undefined') {
        $.getJSON(prevEp.href, function (data) {
          var eptimestamp = data.airstamp;
          var epairtime = moment(eptimestamp);
          var airtime = epairtime.format('Do [of] MMM YYYY');
          $("#results").append('<div class="showResults"><h3><strong>' + tvshowname + '</strong> ended on the ' + airtime + '. >:\'(</h3></div>');
        });
      } else {
        $("#results").append('<div class="showResults"><h3><strong>' + tvshowname + '</strong> ended. >:\'(</h3></div>');
      }
    };
  }).fail(function () {
    $("#results").append('<div class="showResults"><h3>You have to be more specific.</h3></div>');
  });
};
