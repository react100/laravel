<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Example</title>
</head>
<body>

<form method="POST"  action="{{ route('stock.update', $data->id) }}">
    @csrf
    @method('PUT')

    <input type="text"  name="name" value= {{ $data->name }}><br>
    <input type="text"  name="item_code"  value= {{ $data->item_code }}>
    <input type="text"  name="price"  value= {{ $data->price }}>
    <input type="text"  name="quantity"  value= {{ $data->quantity }}>
    <button type="submit">Update</button>
</form>
</body>
</html>

<!-- Include Bootstrap JS (you can use CDN or local file) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



