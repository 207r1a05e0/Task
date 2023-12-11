$(document).ready(function () {
    $('#registerBtn').click(function () {
      $.ajax({
        type: 'POST',
        url: 'register.php',
        data: $('#registrationForm').serialize(),
        success: function (response) {
          $('#registrationResult').html(response);
        }
      });
    });
  });
  