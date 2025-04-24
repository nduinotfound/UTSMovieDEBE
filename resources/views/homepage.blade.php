@extends('layout.template')

@section('title', 'Homepage')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Styling tambahan untuk refactor tampilan --}}
<style>
    .movie-card {
        transition: 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
    }
    .movie-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .movie-img {
        height: 250px;
        object-fit: cover;
        width: 100%;
    }
    .movie-title {
        color: #0d6efd;
        font-weight: bold;
    }
</style>

{{-- Judul halaman ditengah dengan gaya lebih menonjol --}}
<h1 class="mb-5 text-center text-primary fw-bold">🎬 Popular Movies</h1>

{{-- Refactor utama: layout diubah dari horizontal (gambar kiri, teks kanan) ke vertikal --}}
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    @foreach ($movies as $movie)
    <div class="col">
        {{-- Card film dengan struktur vertikal --}}
        <div class="card movie-card h-100 shadow-sm border-0 text-center">
            {{-- Gambar dipindahkan ke atas --}}
            <img src="/images/{{ $movie['foto_sampul'] }}" alt="{{ $movie['judul'] }}" class="movie-img">

            {{-- Konten teks dan tombol berada di bawah gambar --}}
            <div class="card-body d-flex flex-column justify-content-between">
                {{-- Judul film --}}
                <h5 class="movie-title">{{ $movie['judul'] }}</h5>

                {{-- Sinopsis dipersingkat (truncate) --}}
                <p class="card-text text-muted text-truncate" style="max-height: 4.5em;">{{ $movie['sinopsis'] }}</p>

                {{-- Tombol diarahkan ke detail --}}
                <a href="/movie/{{ $movie['id'] }}" class="btn btn-primary btn-sm mt-2">Lihat Selanjutnya</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- Navigasi halaman tetap di bawah --}}
<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>

@endsection
