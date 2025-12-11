<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 10px;
        }

        th {
            background: #e5e7eb;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h2>Laporan Stok Barang</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Tanggal Masuk</th>
                <th>Harga</th>
                <th>Sisa Stok</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->tanggal_masuk->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->sisa_stok }}</td>
                    <td style="text-transform: capitalize">{{ $item->level }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>