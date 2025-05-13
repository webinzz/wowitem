<!DOCTYPE html>
<html>
<head>
    <title>Laporan item</title>
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
    <h2>Laporan item</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID_item</th>
                <th>Nama item</th>
                <th>stock</th>
                <th>category</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataitem as $item)
            <tr>
                <td>{{ $loop->iteration  }} </td>

                <td>{{ $item->id_item }}</td>

                <td>{{ $item->name }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->created_at }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
