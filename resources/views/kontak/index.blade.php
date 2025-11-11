@extends('layouts.app')

@section('title', 'Hubungi Kami - Warung Desa')

@push('styles')
    <style>
        .page-header {
            background-color: #e9ecef;
        }
        .page-header h1 {
            font-family: 'Lora', serif;
            font-weight: 600;
            color: #343a40;
        }
        .contact-info i {
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            background-color: #ffc107;
            color: #212529;
            border-radius: 50%;
        }
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
        }
        .btn-submit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
    <!-- Header Halaman -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container text-center">
            <h1 class="display-5">Hubungi Kami</h1>
            <p class="lead text-muted">Kami senang mendengar dari Anda. Kirimkan pertanyaan atau masukan Anda.</p>
        </div>
    </div>

    <!-- Konten Kontak -->
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <form action="#" method="POST">
                    <input type="text" class="form-control mb-3" placeholder="Nama Anda">
                    <input type="email" class="form-control mb-3" placeholder="Email Anda">
                    <textarea class="form-control mb-3" rows="5" placeholder="Pesan Anda"></textarea>
                    <button class="btn btn-submit w-100 py-2" type="submit">Kirim Pesan</button>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="d-flex p-4 rounded bg-white h-100">
                    <i class="fas fa-map-marker-alt fa-2x text-warning me-4"></i>
                    <div>
                        <h4>Alamat</h4>
                        <p class="mb-2">Jl. Raya Desa No. 123, Sukamaju, Indonesia</p>
                        <h4>Email</h4>
                        <p class="mb-2">kontak@warungdesa.com</p>
                        <h4>Telepon</h4>
                        <p class="mb-0">+62 812 3456 7890</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection