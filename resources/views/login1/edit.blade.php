<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Example</title>
</head>
<body>

<form method="POST"  action="{{ route('login-update', $data->id) }}">
    @csrf
    @method('PUT')

    <input type="text" id="fname" name="email" value= {{ $data->email }}><br>
    <input type="text" id="lname" name="password"  value= {{ $data->password }}>
    <button type="submit">Update</button>
</form>
</body>
</html>

