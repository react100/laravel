@include('header.header')
<table>
    <thead>
        <tr>

    <h1>Items</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Item Code</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
                <tr>
                    <td>{{ $data->id }} </td>
                    <td>{{ $data->name}}</td>
                    <td>{{ $data->item_code}}</td>
                    <td>{{ $data->price}}</td>
                    <td>{{ $data->image}}</td>

                    <td>
                    <a  href  ="{{ route('stock.edit', $data->id) }}"> Edit </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

