<!DOCTYPE html>
<html>
<head>
    <title>Laporan user</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

    </style>
</head>
<body>
    <h2>Laporan user</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID_user</th>
                <th>username</th>
                <th>gmail</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datauser as $user)
            <tr>
                <td>{{ $loop->iteration  }} </td>

                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
