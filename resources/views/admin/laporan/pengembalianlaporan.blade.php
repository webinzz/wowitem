<!DOCTYPE html>
<html>
<head>
    <title>Laporan pengembalian</title>
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
    <h2>Laporan pengembalian</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID_pengembalian</th>
                <th>Nama Peminjam</th>
                <th>Barang</th>
                <th>Tanggal pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>jumlah</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPengembalian as $pengembalian)
            <tr>
                <td>{{ $loop->iteration  }} </td>

                <td>{{ $pengembalian->id }}</td>
                <td>{{ $pengembalian->user->name }}</td>
                <td>{{ $pengembalian->item->name }}</td>
                <td>{{ $pengembalian->peminjaman->tgl_pinjam }}</td>
                <td>{{ $pengembalian->created_at }}</td>
                <td>{{ $pengembalian->peminjaman->jumlah }}</td>
                <td>{{ $pengembalian->status }}</td>
                {{-- <td>ksosk</td>
                <td>ksosk</td>
                <td>ksosk</td>
                <td>ksosk</td>
                <td>ksosk</td>
                <td>ksosk</td>
                <td>ksosk</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
