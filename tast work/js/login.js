// login.js
$(document).ready(function () {
    $('#loginForm').submit(function (event) {
        
        console.log("Submitted")
        // Use AJAX to send login data to PHP backend
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                // Handle response as needed
            }
        });
    });
});
