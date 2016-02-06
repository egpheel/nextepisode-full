function validateReg() {
    
    $('#regBtn').prop('disabled', true);

    var userValid = false;
    var emailValid = false;
    var passValid = false;
    var confirmPassValid = false;

    //registration
    $('#inputUser').keyup(function () {
        var user = $('#inputUser').val();
        var userValidChars = /^[a-z0-9_-]{3,16}$/;
        // at least 3 characters. can't contain special characters

        if (userValidChars.test(user)) {
            $('#regUser').removeClass('has-error');
            $('#regUser .success').removeClass('glyphicon-remove');
            $('#regUser').addClass('has-success');
            $('#regUser .success').addClass('glyphicon-ok');
            $('#regUser .successsr').text('(success)');
            userValid = true;
        } else {
            $('#regUser').removeClass('has-success');
            $('#regUser .success').removeClass('glyphicon-ok');
            $('#regUser').addClass('has-error');
            $('#regUser .success').addClass('glyphicon-remove');
            $('#regUser .successsr').text('(error)');
            userValid = false;
        };
        
        isValid(); //check if all the fields are valid and enable the submit button
    });

    $('#inputEmailReg').keyup(function () {
        var email = $('#inputEmailReg').val();
        var emailValidChars = /[a-zA-Z0-9]+(?:(\.|_)[A-Za-z0-9!#$%&'*+/=?^`{|}~-]+)*@(?!([a-zA-Z0-9]*\.[a-zA-Z0-9]*\.[a-zA-Z0-9]*\.))(?:[A-Za-z0-9](?:[a-zA-Z0-9-]*[A-Za-z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?/gm;

        if (emailValidChars.test(email)) {
            $('#regEmail').removeClass('has-error');
            $('#regEmail .success').removeClass('glyphicon-remove');
            $('#regEmail').addClass('has-success');
            $('#regEmail .success').addClass('glyphicon-ok');
            $('#regEmail .successsr').text('(success)');
            emailValid = true;
        } else {
            $('#regEmail').removeClass('has-success');
            $('#regEmail .success').removeClass('glyphicon-ok');
            $('#regEmail').addClass('has-error');
            $('#regEmail .success').addClass('glyphicon-remove');
            $('#regEmail .successsr').text('(error)');
            emailValid = false;
        };
        
        isValid(); //check if all the fields are valid and enable the submit button
    });

    $('#inputPasswordReg').keyup(function () {
        var pass = $('#inputPasswordReg').val();
        var passValidChars = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
        /*  - at least 8 characters
            - must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number
            - Can contain special characters */

        if (passValidChars.test(pass)) {
            $('#regPass').removeClass('has-error');
            $('#regPass .success').removeClass('glyphicon-remove');
            $('#regPass').addClass('has-success');
            $('#regPass .success').addClass('glyphicon-ok');
            $('#regPass .successsr').text('(success)');
            passValid = true;
        } else {
            $('#regPass').removeClass('has-success');
            $('#regPass .success').removeClass('glyphicon-ok');
            $('#regPass').addClass('has-error');
            $('#regPass .success').addClass('glyphicon-remove');
            $('#regPass .successsr').text('(error)');
            passValid = false;
        };
        
        isValid(); //check if all the fields are valid and enable the submit button
    });

    $('#inputRePasswordReg').keyup(function () {
        var pass = $('#inputPasswordReg').val();
        var confirmpass = $('#inputRePasswordReg').val();
        var equal = false;

        if (pass == confirmpass) {
            equal = true;
        };

        if (equal && passValid) {
            $('#inputRePasswordReg').tooltip('destroy');
            $('#regRePass').removeClass('has-error');
            $('#regRePass .success').removeClass('glyphicon-remove');
            $('#regRePass').addClass('has-success');
            $('#regRePass .success').addClass('glyphicon-ok');
            $('#regRePass .successsr').text('(success)');
            confirmPassValid = true;
        } else {
            $('#inputRePasswordReg').tooltip({'trigger': 'focus', 'title': 'The passwords don\'t match.'});
            $('#regRePass').removeClass('has-success');
            $('#regRePass .success').removeClass('glyphicon-ok');
            $('#regRePass').addClass('has-error');
            $('#regRePass .success').addClass('glyphicon-remove');
            $('#regRePass .successsr').text('(error)');
            confirmPassValid = false;
        };
        
        isValid(); //check if all the fields are valid and enable the submit button
    });

    function isValid() {
        if (userValid && emailValid && passValid && confirmPassValid) {
            $('#regBtn').prop('disabled', false);
        } else {
            $('#regBtn').prop('disabled', true);
        }
    };
};