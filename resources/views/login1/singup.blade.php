<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #signupForm {
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
                <h2 class="card-title text-center">Signup</h2>

                <form id="signupForm">

                    <div class="form-group">
                        <select name ="usertype" id= "usertype">
                            <option type ="text" value=1>SUPER-USER</option>
                            <option type ="text" value=2>ADMIN</option>
                            <option type ="text" value=3>NORMAL-USER</option>
                            <option type ="text" value=4>CUSTOMER-CARE</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="button" class="btn btn-primary btn-block" onclick="signup()">Signup</button>
                </form>

                <div id="responseMessage" class="text-center"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>







<script>
    function signup(){
    var userType = $('#usertype').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirmation = $('#password_confirmation').val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'POST',
        url: 'singup-store',
        data: {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
            user_type:userType,
            _token: csrfToken
        },
        success: function(response) {
            if(respoonse.success ==200){
                alert('wworking');
            }
            if (response.errors) {
                // Clear previous error messages
                $('.error-message').remove();
                $.each(response.errors, function(field, messages) {
                    var errorMessage = messages.join(', ');
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
            $('#responseMessage').html('Signup failed. Please try again Error occured');
        }
    });

    }
</script>
</body>
</html>