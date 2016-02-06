function countdown(duration, element) {
    $('.' + element).html(duration);

    var countdown = setInterval(function () {
        if (--duration) {
            $('.' + element).html(duration);
            //console.log(duration);
        } else {
            clearInterval(countdown);
        }
    }, 1000);
}
