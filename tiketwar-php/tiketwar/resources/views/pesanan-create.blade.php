<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Tiket | TiketWar</title>
</head>
<body>
    <h1>Pesan Tiket</h1>

    <h2>{{ $konser->nama }}</h2>
    <p>Kota: {{ $konser->kota }}</p>
    <p>Harga per tiket: Rp{{ number_format($konser->harga, 0, ',', '.') }}</p>
    <p>Sisa tiket: {{ $konser->sisa }}</p>

    <form action="{{ route('pesanan.store', $konser) }}" method="POST">
        @csrf

        <p>
            <label for="nama_pemesan">Nama Pemesan</label><br>
            <input type="text" id="nama_pemesan" name="nama_pemesan"
                   value="{{ old('nama_pemesan') }}">
            @error('nama_pemesan')
                <br><small style="color: red">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <br><small style="color: red">{{ $message }}</small>
            @enderror
        </p>

        <p>
            <label for="jumlah">Jumlah Tiket</label><br>
            <input type="number" id="jumlah" name="jumlah" min="1"
                   value="{{ old('jumlah', 1) }}">
            @error('jumlah')
                <br><small style="color: red">{{ $message }}</small>
            @enderror
        </p>

        <button type="submit">Pesan Sekarang</button>
        <a href="{{ route('konser.detail', ['id' => $konser->id]) }}">Batal</a>
    </form>
</body>
</html>