@extends("layouts.app")
@section("content")
    <style>
        body {
            background: linear-gradient(to right, rgba(255, 165, 0, 0.1), rgba(0, 0, 0, 0.275));
        }
    </style>
    <section class="container my-5">
        @if(session()->has("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session("success") }}</strong> 
                <a href="{{ route("pesanan") }}" class="text-decoration-underline">Cek Pesananmu Disini</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="hero-section text-center text-white py-5 rounded shadow" style="background: url('{{ asset('images/backgroundkecil.png') }}') no-repeat center center; background-size: cover;">
            <h2 class="fw-bold">Temukan Kendaraan Idealmu</h2>
            <p class="small">
                Kendarai mobil kelas dunia dari garasi premium kami dan nikmati pengalaman terbaik di jalan.
            </p>
        </div>

        <form action="/cars" method="GET" class="search-bar my-5 d-flex justify-content-center">
            <div class="input-group w-75 shadow-sm rounded-pill">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control border-0 rounded-pill" 
                    placeholder="Find your dream car" 
                    value="{{ old('search') }}">
                <button class="btn btn-lg btn-warning rounded-pill px-4" type="submit">
                    <i class="bi bi-search text-white"></i>
                </button>
            </div>
        </form>

        <div class="row gy-4">
            @foreach($cars as $car)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img 
                            src="{{ asset("/storage/cars/" . $car->image) }}" 
                            class="card-img-top rounded-top" 
                            alt="{{ $car->name }}" 
                            style="height: 200px; object-fit: cover;">
                        
                        <div class="card-body">
                            <h5 class="card-title text-dark fw-bold">{{ $car->name }}</h5>
                            <p class="text-muted">{{ $car->type }}</p>
                            <div class="d-flex justify-content-between">
                                <span class="text-orange">
                                    <i class="bi bi-cash-coin"></i>
                                    <strong>Rp. {{ number_format($car->price, 0, ',', '.') }} / day</strong>
                                </span>
                                <span class="text-orange">
                                    <i class="bi bi-person-fill"></i>
                                    {{ $car->seats }} Seats
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-orange">
                                    <i class="bi bi-gear-fill"></i> {{ $car->gear }}
                                </span>
                                <span class="text-orange">
                                    <i class="bi bi-fuel-pump-fill"></i> {{ $car->bensin }}
                                </span>
                            </div>
                            {!! $car->jumlah_unit == 0 ? 
                                '<button class="btn btn-danger mt-3 w-100" disabled>Not Available</button>' : 
                                '<a href="' . route("order", $car->id) . '" class="btn btn-warning text-white mt-3 w-100">Rent Now</a>' 
                            !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
