//document.addEventListener('DOMContentLoaded', function () {
//    var signUpForm = document.getElementById('signupForm');
//
//    signUpForm.addEventListener('submit', function (event) {
//        event.preventDefault();
//
//        var email = document.getElementById('newEmail').value;
//        var username = document.getElementById('newUsername').value;
//        var password = document.getElementById('newPassword').value;
//
//        if (!email || !username || !password) {
//            alert('Please fill in all fields');
//            return;
//        }
//        alert('Thanks for signing up!');
//        window.location.href = "/";
//    });
//});


document.addEventListener('DOMContentLoaded', function () {
    var signUpForm = document.getElementById('signupForm');

    if (signUpForm) {
        signUpForm.addEventListener('submit', function (event) {
            event.preventDefault();

            var email = document.getElementById('newEmail').value;
            var username = document.getElementById('newUsername').value;
            var password = document.getElementById('newPassword').value;
            if (!email || !username || !password) {
                alert('Please fill in all fields');
                return;
            }
            window.location.href = "/?signupSuccess=true";
        });
    } else {
        console.error("Signup form not found!");
    }
});

