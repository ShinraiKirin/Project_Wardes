@extends('layouts.app')

@section('title', 'Menu Warung Desa')

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .page-header {
            background-color: #e9ecef;
        }
        .page-header h1 {
            font-family: 'Lora', serif;
            font-weight: 600;
            color: #343a40;
        }
        .fruite-item {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            transition: all .3s ease;
            overflow: hidden; /* Ensure content respects border-radius */
        }
        .fruite-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
        .fruite-img img {
            height: 250px;
            object-fit: cover;
            transition: transform .3s ease;
        }
        .fruite-item:hover .fruite-img img {
            transform: scale(1.05);
        }
        .text-limited {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3em; /* Approx 2 lines */
        }
        .category-tag {
            font-size: 0.8rem;
            font-weight: 500;
        }
        .btn-add-cart {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: 600;
            transition: all .3s ease;
        }
        .btn-add-cart:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            transform: scale(1.05);
        }
        .section-title {
            font-family: 'Lora', serif;
            font-weight: 600;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #ffc107;
        }
    </style>
@endpush

@section('content')
    <!-- Header Halaman -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container text-center">
            <h1 class="display-5">Menu Pilihan Kami</h1>
            <p class="lead text-muted">Nikmati berbagai hidangan lezat yang disiapkan khusus untuk Anda.</p>
        </div>
    </div>

    <!-- Tampilan Menu -->
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h2 class="section-title">Semua Menu</h2>
            <p class="text-muted">Pilih dan nikmati hidangan favorit Anda dari daftar lengkap menu kami.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Dummy Item 1: Nasi Goreng -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/nasi-goreng.jpg') }}" class="img-fluid w-100" alt="Nasi Goreng">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Makanan Utama
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Nasi Goreng Spesial</h4>
                        <p class="text-limited text-muted mb-3">Nasi goreng dengan tambahan ayam, udang, dan sayuran segar, disajikan dengan telur mata sapi.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp25.000</p>
                            <form action="{{ route('cart.add', 1) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dummy Item 2: Soto Ayam -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/soto-ayam.jpg') }}" class="img-fluid w-100" alt="Soto Ayam">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Sup
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Soto Ayam</h4>
                        <p class="text-limited text-muted mb-3">Sup ayam hangat dengan kuah kuning kaya rempah, lengkap dengan bihun, tauge, dan bawang goreng.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp18.000</p>
                            <form action="{{ route('cart.add', 2) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dummy Item 3: Es Teh Manis -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/es-teh.jpg') }}" class="img-fluid w-100" alt="Es Teh Manis">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Minuman
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Es Teh Manis</h4>
                        <p class="text-limited text-muted mb-3">Teh hitam segar diseduh panas, ditambah gula aren, dan disajikan dingin dengan es batu melimpah.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp5.000</p>
                            <form action="{{ route('cart.add', 3) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dummy Item 4: Ayam Bakar -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/ayam-bakar.jpg') }}" class="img-fluid w-100" alt="Ayam Bakar">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Makanan Utama
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Ayam Bakar Bumbu Rujak</h4>
                        <p class="text-limited text-muted mb-3">Ayam kampung dibakar dengan bumbu rujak khas Jawa Timur, disajikan dengan lalapan segar.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp35.000</p>
                            <form action="{{ route('cart.add', 4) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dummy Item 5: Gado-Gado -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/gado-gado.jpg') }}" class="img-fluid w-100" alt="Gado-Gado">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Sayur
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Gado-Gado</h4>
                        <p class="text-limited text-muted mb-3">Campuran sayur rebus seperti kangkung, tauge, dan tempe, disiram bumbu kacang kental.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp15.000</p>
                            <form action="{{ route('cart.add', 5) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dummy Item 6: Jus Jeruk -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="{{ asset('images/jus-jeruk.jpg') }}" class="img-fluid w-100" alt="Jus Jeruk">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Minuman
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold mb-3">Jus Jeruk Segar</h4>
                        <p class="text-limited text-muted mb-3">Jeruk segar yang dipres manual, tanpa gula tambahan, untuk rasa alami dan vitamin C tinggi.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp8.000</p>
                            <form action="{{ route('cart.add', 6) }}" method="POST" class="add-to-cart-form mb-0">
                                @csrf
                                <button type="submit" class="btn btn-add-cart rounded-pill px-3 py-2">
                                    <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection