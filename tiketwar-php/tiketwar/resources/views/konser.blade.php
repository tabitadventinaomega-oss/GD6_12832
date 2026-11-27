<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Konser | TiketWar</title>
</head>
<body>
    <h1>Daftar Konser</h1>

    <table>
        <thead>
            <tr>
                <th>Nama Konser</th>
                <th>Promotor</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Harga</th>
                <th>Sisa Tiket</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarKonser as $konser)
                <tr>
                    <td>
                        <a href="{{ route('konser.detail', ['id' => $konser->id]) }}">
                            {{ $konser->nama }}
                        </a>
                    </td>
                    <td>{{ $konser->promotor->nama }}</td>
                    <td>{{ $konser->kota }}</td>
                    <td>{{ $konser->tanggal }}</td>
                    <td>Rp{{ number_format($konser->harga, 0, ',', '.') }}</td>
                    <td>{{ $konser->sisa }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada konser.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>