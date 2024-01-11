@include('header.header')
<table>
    <thead>
        <tr>

    <h1>Users</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER TYPE</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }} </td>
                    <td>@if($user->user_type == 1 ) Super ADMIN @elseif($user->user_type == 2 ) Admin @else  NORMAL  @endforelse </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                    <a  href  ="{{ route('login-edit', $user->id) }}"> Edit </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



<!-- Your script to handle the button click can be added here -->

<!-- Include Bootstrap JS (you can use CDN or local file) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

