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
            <!-- Dummy Item 1: Makanan -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="https://placehold.co/600x400/f8b400/ffffff?text=Ayam+Bakar" class="img-fluid w-100" alt="Ayam Bakar Madu">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Makanan
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold">Ayam Bakar Madu</h4>
                        <p class="text-limited text-muted">Ayam bakar lezat dengan olesan madu dan bumbu rempah spesial.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp35.000</p>
                            <a href="#" class="btn btn-add-cart rounded-pill px-3"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dummy Item 2: Makanan -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="https://placehold.co/600x400/8B4513/ffffff?text=Rendang" class="img-fluid w-100" alt="Rendang Daging">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-warning" style="top: 10px; left: 10px;">
                        Makanan
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold">Rendang Daging Sapi</h4>
                        <p class="text-limited text-muted">Potongan daging sapi empuk yang dimasak dengan santan dan bumbu kaya rasa.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp45.000</p>
                            <a href="#" class="btn btn-add-cart rounded-pill px-3"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dummy Item 3: Minuman -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="https://placehold.co/600x400/3498db/ffffff?text=Es+Campur" class="img-fluid w-100" alt="Es Campur">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-info" style="top: 10px; left: 10px;">
                        Minuman
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold">Es Campur Ceria</h4>
                        <p class="text-limited text-muted">Campuran buah-buahan segar, jeli, dan sirup manis yang menyegarkan.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp15.000</p>
                            <a href="#" class="btn btn-add-cart rounded-pill px-3"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dummy Item 4: Minuman -->
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="position-relative fruite-item bg-white">
                    <div class="fruite-img">
                        <img src="https://placehold.co/600x400/27ae60/ffffff?text=Jus+Alpukat" class="img-fluid w-100" alt="Jus Alpukat">
                    </div>
                    <div class="text-white px-3 py-1 rounded position-absolute category-tag bg-info" style="top: 10px; left: 10px;">
                        Minuman
                    </div>
                    <div class="p-4 border-top-0 rounded-bottom">
                        <h4 class="fw-bold">Jus Alpukat</h4>
                        <p class="text-limited text-muted">Jus alpukat kental dengan sentuhan susu coklat yang nikmat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-dark fs-5 fw-bold mb-0">Rp18.000</p>
                            <a href="#" class="btn btn-add-cart rounded-pill px-3"><i class="fa fa-shopping-cart me-2"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
