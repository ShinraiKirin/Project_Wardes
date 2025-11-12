<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Warung Desa')</title>
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
    {{-- CSS Kustom dari halaman anak --}}
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white text-center text-muted py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Warung Desa. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartForms = document.querySelectorAll('.add-to-cart-form');
        const cartCountElement = document.getElementById('cart-count');

        cartForms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const action = this.action;
                const method = this.method;
                const csrfToken = this.querySelector('input[name="_token"]').value;
                const button = this.querySelector('button[type="submit"]');
                const originalButtonText = button.innerHTML;

                // Disable button and show feedback
                button.disabled = true;
                button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...';

                fetch(action, {
                    method: method,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.cartCount !== undefined) {
                        cartCountElement.textContent = data.cartCount;
                    }
                    // Success feedback
                    button.innerHTML = '<i class="fa fa-check"></i> Added!';
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                    // Error feedback
                    button.innerHTML = 'Error!';
                })
                .finally(() => {
                    // Re-enable button after a short delay
                    setTimeout(() => {
                        button.disabled = false;
                        button.innerHTML = originalButtonText;
                    }, 1500); // Reset after 1.5 seconds
                });
            });
        });
    });
    </script>

    {{-- Script Kustom dari halaman anak --}}
    @stack('scripts')
</body>
</html>