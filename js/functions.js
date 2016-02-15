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
