<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #loginForm {
            width: 300px;
        }

        #responseMessage {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Login</h2>
                <form id="loginForm" >
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="login()">Login</button>
                </form>

                <div id="responseMessage" class="text-center"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>

</body>
</html>
<script>
function login() {
    var username = $('#username').val();
    var password = $('#password').val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: 'checkLogin', // Replace with your login route
        data: {
            username: username,
            password: password,
            _token: csrfToken
        },
        success: function(res) {
          // Check if there are validation errors
          if (response.errors) {
                // Clear previous error messages
                $('.error-message').remove();
                // Append new error messages under the respective form fields
                $.each(response.errors, function(field, messages) {
                    var errorMessage = messages.join(', ');
                    // Find the input element by name or ID and append the error message
                    $('[name="' + field + '"], #' + field).after('<div class="error-message text-danger">' + errorMessage + '</div>');
                });
            } else {
                // If no errors, proceed with the redirect
                $('#responseMessage').html(response.message);
                if (response.redirect) {
                    window.location.href = response.redirect;
                }
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#responseMessage').html('Login failed. Please try again.');
        }
    });
}
</script>