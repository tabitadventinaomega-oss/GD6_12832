<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $konser->nama }} | TiketWar</title>
</head>
<body>
    <h1>{{ $konser->nama }}</h1>

    <p>Promotor: {{ $konser->promotor->nama }}</p>
    <p>Kota: {{ $konser->kota }}</p>
    <p>Tanggal: {{ $konser->tanggal }}</p>
    <p>Harga: Rp{{ number_format($konser->harga, 0, ',', '.') }}</p>
    <p>Sisa tiket: {{ $konser->sisa }}</p>

    @if ($konser->sisa > 0)
        <button type="button">War Tiket Sekarang</button>
    @else
        <button type="button" disabled>Sold Out</button>
    @endif

    <a href="{{ route('konser.index') }}">Kembali ke Daftar Konser</a>
</body>
</html>