@extends("layouts.app")
@section("content")
    <section id="header" class="mt-2">
        <style>
            body {
                background: linear-gradient(to right, rgba(255, 165, 0, 0.1), rgba(0, 0, 0, 0.275));
            }
        </style>
        <div class="loader-wrapper">
            <div class="loader"></div>
            <span class="ms-2 fw-semibold fs-4">Loading..</span>
        </div>
        @if(session()->has("success"))
            <div
                class="alert alert-success absolute alert-dismissible fade show container"
                role="alert"
            >
                {{ session("success") }}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        @endif
        
        <div
            id="carouselExampleLight"
            class="carousel slide"
            data-bs-ride="carousel"
            style="width: 100vw; height: 600px; overflow-x: hidden;" <!-- Full width -->
        
        <div
        class="position-absolute w-100 h-100"
        style="background: linear-gradient(
            to right, 
            rgba(247, 190, 20, 0.5) 0%, 
            rgba(101, 85, 33, 0.93) 29%, 
            rgba(71, 63, 36, 0.92) 39%, 
            rgba(39, 40, 39, 0.90) 48%, 
            rgba(52, 53, 52, 0.87) 55%, 
            rgba(66, 67, 66, 0.84) 61%, 
            rgba(96, 97, 96, 0.78) 75%, 
            rgba(144, 145, 144, 0.68) 85%, 
            rgba(179, 180, 179, 0.63) 92%, 
            rgba(217, 217, 217, 0.53) 100%
        ); z-index: 100;"
        >
        <div
                        class="position-absolute text-light text-left mx-auto mt-5 w-100"
                    >
                    <img src="{{ asset('images/logo2.png') }}" alt="New Image" class="img-fluid" style="margin-left: 50px; margin-top: 50px; padding: 60px; width: 48%;">
                        <h5 class="fw-bold lh-md" style="margin-left: 140px; margin-top: -40px;"> RentaWheel Pilihan Utama!</h5>
                        <h5 class="fw-bold lh-md" style="margin-left: 140px; margin-top: -70px;">Sewa Mudah, Liburan Menyenangkan,</h5>
                        <button type="button" class="btn fw-semibold" style="margin-left: 140px; margin-top: 60px; background-color: black; border-radius: 30px; color: white; padding: 20px 40px; font-size: 15px; transition: background-color 0.3s;">
                            Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </button>
                        <style>
                            .btn:hover {
                                background-color: #333;
                            }
                        </style>
                    </div>
        

       
        </div>
                <div class="carousel-inner" style="height: 100%;">
                <div class="carousel-item active" data-bs-interval="10000">
                  
                    <img
                        src="{{ asset("images/1.png") }}"
                        class="d-block w-100 rounded-4"
                        alt="..."
                        style="height: 100%; object-fit: cover;"
                    />
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    
                    <img
                        src="{{ asset("images/2.png") }}"
                        class="d-block w-100 rounded-4"
                        alt="..."
                        style="width: 100vw; height: 600px; object-fit: cover;" <!-- Full width and height -->
                    />
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    
                    <img
                        src="{{ asset("images/3.png") }}"
                        class="d-block w-100 rounded-4"
                        alt="..."
                        style="width: 100vw; height: 600px; object-fit: cover;" <!-- Full width and height -->
                    />
                </div>
            </div>
           
            <div class="carousel-control-prev" data-bs-target="#carouselExampleLight" data-bs-slide="prev" style="z-index: 10000; left: -70px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </div>
            <div class="carousel-control-next" data-bs-target="#carouselExampleLight" data-bs-slide="next" style="z-index: 10000; right: -70px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </div>
        </div>
    <form
    action="/cars"
    method="GET"
    class="w-50 d-flex bg-light rounded-5 position-absolute start-50 translate-middle shadow"
    style="z-index: 9999;"
>
    <input
        class="form-control border-0 me-2 rounded-5"
        type="text"
        name="search"
        placeholder="Find the car of your dreams"
    />
    <button class="btn btn-lg btn-orange rounded-5" style="background-color: orange;">
        <i class="bi bi-search" style="color: black;"></i>
    </button>
</form>
    <section class="container" style="margin-top: 120px">
        <div class="jumbotron text-center">
            <h3 class="fw-bold lh-md">Pilih mobil impian Anda</h3>
            <p class="text-secondary">
                Kami memberikan kepada pelanggan kami pengalaman berkendara yang paling luar biasa.
                <br />
                Itulah mengapa hanya ada mobil kelas dunia di armada kami
            </p>
            <div class="d-flex justify-content-center mt-3">
                <a
                    class="btn btn-black btn-lg rounded-5 mx-2"
                    href="#"
                    role="button"
                    style="background-color: black; color: white;"
                >
                    Compact
                </a>
               
            </div>
        </div>
        <div class="row gy-4" style="margin-top: 20px;">
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
                                '<button class="btn btn-danger mt-3 w-100 text-black fw-semibold" disabled>Not Available</button>' : 
                                '<a href="' . route("order", $car->id) . '" class="btn btn-warning text-black mt-3 w-100 fw-semibold">Rent Now</a>' 
                            !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4 mb-5">
            <a
                href="{{ route("cars") }}"
                class="btn btn-lg btn-dark rounded-5"
            >
                View All
            </a>
        </div>
    </section>
    <section class="w-100" style="background: url('{{ asset('images/backgroundcar.png') }}') no-repeat center center; background-size: cover;">
        <div class="container py-5 my-5">
            <h4 class="text-center fw-bold text-light mb-4">
                Apa Kata Pelanggan
            </h4>
            <div id="customerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Pelayanan sangat memuaskan, mobil dalam kondisi prima!
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Budi Santoso</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Sangat puas dengan layanan yang diberikan, mobil bersih dan nyaman.
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Siti Nurhaliza</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Pengalaman yang luar biasa, akan kembali menyewa lagi!
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Andi Wijaya</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Mobil sangat nyaman dan bersih, pelayanan ramah.
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Rina Sari</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Layanan cepat dan mobil dalam kondisi baik, nyaman pokonya.
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Dewi Lestari</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Sangat puas dengan layanan yang diberikan, mobil bersih dan nyaman.
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Agus Pratama</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Pelayanan sangat memuaskan, mobil dalam kondisi prima!
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Bambang Sutrisno</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Sangat puas dengan layanan yang diberikan, mobil bersih dan nyaman.
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Siti Nurhaliza</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-dark mb-3" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(15px); border: none; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);">
                                    <div class="card-header border-0 text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Keren pelayanannya, akan kembali menyewa lagi, bintang 100 pokonya!
                                        </p>
                                        <div class="d-flex">
                                            <i class="bi bi-person-circle" style="font-size: 50px;"></i>
                                            <p class="fw-bold ms-2 mt-3">Darwin Surwin</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#customerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#customerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="row my-5 container mx-auto">
        <h5 class="my-4 fw-semibold">More than 50 brands of cars</h5>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/toyota.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/nissan.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/dodge.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/ford.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/hyundai.png") }}" alt="..." />
        </div>
        <div class="col-md-2">
            <img src="{{ asset("images/brand-car/jeep.png") }}" alt="..." />
        </div>
    </section>
    <footer class="mt-5 bg-light text-center text-white">
        <div class="text-center p-3" style="background-color: #ffc107;">
            © 2024 Copyright: Design by Rama Wahyu Hermawan
        </div>
    </footer>
    
@endsection
