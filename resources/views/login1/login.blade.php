<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

<div id="app">
<a href="{{ route('singup-create') }}">Sign Up</a>
    <form id="loginForm">
        @csrf
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route("login-store") }}',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert('Login successful');
                        setTimeout(function () {
                                  window.location.href = response.redirect;
                        }, 3000);
                        // You can redirect or perform other actions here
                    } else {
                        alert('Login failed: ' + response.message);
                    }
                },
                error: function () {
                    alert('An error occurred');
                }
            });
        });
    });
</script>

</body>
</html>