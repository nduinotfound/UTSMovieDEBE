@extends('layout.template')

@section('title', 'Homepage')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    body {
        background-color: #f8f9fa;
    }
    .movie-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #ffffff;
        border-radius: 10px;
    }
    .movie-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .movie-title {
        color: #343a40;
        font-weight: 700;
    }
    .movie-text {
        color: #6c757d;
    }
    .btn-custom {
        background-color: #20c997;
        border-color: #20c997;
        color: #fff;
    }
    .btn-custom:hover {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
</style>

<h1 class="mb-4 text-center text-dark fw-bold">🎬 Popular Movies</h1>

<div class="row row-cols-1 row-cols-md-2 g-4">
    @foreach ($movies as $movie)
    <div class="col">
        <div class="card movie-card h-100 border-0 shadow-sm">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/images/{{ $movie['foto_sampul'] }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $movie['judul'] }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div>
                            <h5 class="movie-title">{{ $movie['judul'] }}</h5>
                            <p class="movie-text text-truncate" style="max-height: 4.5em;">{{ $movie['sinopsis'] }}</p>
                        </div>
                        <a href="/movie/{{ $movie['id'] }}" class="btn btn-custom btn-sm mt-3">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $movies->links() }}
</div>

@endsection
