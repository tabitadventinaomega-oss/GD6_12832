@extends('layouts.main')

@section('title', 'Daftar Konser')

@section('content')
    <h1 class="h2 fw-bold mb-4">Daftar Konser</h1>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
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
                                <a class="fw-semibold text-decoration-none"
                                   href="{{ route('konser.detail', ['id' => $konser->id]) }}">
                                    {{ $konser->nama }}
                                </a>
                            </td>
                            <td>{{ $konser->promotor->nama }}</td>
                            <td>{{ $konser->kota }}</td>
                            <td>{{ $konser->tanggal }}</td>
                            <td>Rp{{ number_format($konser->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($konser->sisa > 0)
                                    <span class="badge text-bg-success">{{ $konser->sisa }} tiket</span>
                                @else
                                    <span class="badge text-bg-secondary">Sold Out</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada konser.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection