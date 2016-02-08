function randomHeader(){
  var file = './inc/phrases.txt';
  var phraseNum;
  var phraseNumBefore;
  var intervalDuration = 5000; //5 seconds

  $.get(file,function(txt){
    var lines = txt.split("\n");

    for (var i = 0, len = lines.length; i < len; i++) {
      phraseNum = Math.floor(Math.random() * (lines.length - 1));
    }

    $('.randomHead').hide();
    $('.randomHead').html(lines[phraseNum]).fadeIn('slow');
    phraseNumBefore = phraseNum;

    var interval = setInterval(function() {
      do {
        for (var i = 0, len = lines.length; i < len; i++) {
          phraseNum = Math.floor(Math.random() * (lines.length - 1));
        }
      } while (phraseNum === phraseNumBefore);

      phraseNumBefore = phraseNum;

      $('.randomHead').fadeOut('slow', function() {
        $('.randomHead').hide().html(lines[phraseNum]).fadeIn('slow');
      });
    }, intervalDuration);
  });
}
