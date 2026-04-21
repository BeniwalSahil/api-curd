<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #333;
            color: white;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2>All Users 👥</h2>
    <a href="/newuser" class="">Add User</a>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Email</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('routeDetails', $user->id) }}">View</a></td>
                <td><a href="editUser/{{ $user->id }}">Edit</a></td>
                <td><a href="deleteUser/{{ $user->id }}">Delete</a></td>
                {{-- {{ data->link() }} --}}

            </tr>
        @endforeach
    </table>
    <div>
        {{ $users->links() }}
    </div>

</body>

</html>
