<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
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
    <h2>Laporan Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID_peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Barang</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>jam Pengembalian</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPeminjaman as $peminjaman)
            <tr>
                <td>{{ $loop->iteration  }} </td>

                <td>{{ $peminjaman->id_peminjaman }}</td>
                <td>{{ $peminjaman->user->name }}</td>
                <td>{{ $peminjaman->item->name }}</td>
                <td>{{ $peminjaman->tgl_pinjam }}</td>
                <td>{{ $peminjaman->tgl_kembali }}</td>
                <td>{{ $peminjaman->jam_kembali }}</td>
                <td>{{ $peminjaman->status }}</td>
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
