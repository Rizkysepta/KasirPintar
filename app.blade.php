<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Application')</title>
    
    <!-- Menghubungkan Bootstrap melalui CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Menghubungkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Warna latar belakang halaman */
        }

        .sidebar {
            width: 250px; /* Lebar sidebar */
            background-color: #007bff; /* Warna latar sidebar */
            color: white;
            padding: 20px;
            position: fixed; /* Memastikan sidebar tetap di tempat */
            height: 100%; /* Tinggi 100% */
            overflow-y: auto; /* Scroll jika isi terlalu banyak */
        }

        .sidebar h2 {
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 0; /* Jarak antara link */
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

        .sidebar a .icon {
            margin-right: 10px; /* Jarak antara ikon dan teks */
        }

        .content {
            margin-left: 250px; /* Menyesuaikan margin untuk konten utama */
            padding: 20px;
            flex: 1; /* Konten utama akan mengisi ruang yang tersisa */
            background-color: #f8f9fa; /* Warna latar konten */
        }

        main {
            max-width: 1200px; /* Lebar maksimum konten utama */
            margin: 0 auto; /* Pusatkan konten utama */
            padding: 20px; /* Padding untuk konten utama */
        }

        /* Untuk tampilan halaman login */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Tinggi penuh untuk halaman login */
            position: absolute; /* Memungkinkan untuk menempatkan login di tengah */
            left: 0;
            right: 0;
            top: 0;
            background-color: #f8f9fa; /* Warna latar belakang */
            z-index: 1; /* Memastikan login berada di atas konten lain */
        }

        .login-form {
            max-width: 400px; /* Lebar maksimum form login */
            padding: 30px; /* Padding dalam form */
            background-color: white; /* Warna latar form login */
            border-radius: 10px; /* Membuat sudut form login melengkung */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Memberikan bayangan pada form */
        }

        h1 {
            margin-bottom: 20px; /* Jarak bawah judul */
            text-align: center; /* Memusatkan judul */
        }

        .login-form button {
            width: 100%; /* Tombol mengambil lebar penuh */
        }
    </style>
</head>
<body>
    <div id="app">
        @unless (request()->is('login'))
            <!-- Navbar di samping kiri -->
            <nav class="sidebar">
                <h2>{{ config('Kasir Pintar', 'Kasir Pintar') }}</h2>
                <div class="nav flex-column">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt icon"></i> Dashboard
                    </a>
                    <a class="nav-link" href="{{ route('Laporan.index') }}">
                        <i class="fas fa-file-alt icon"></i> Laporan
                    </a>
                    <a class="nav-link" href="{{ route('Transaksi.index') }}">
                        <i class="fas fa-shopping-cart icon"></i> Transaksi
                    </a>
                    <a class="nav-link" href="{{ route('Manajemen.index') }}">
                        <i class="fas fa-users icon"></i> Manajemen
                    </a>
                </div>
            </nav>
        @endunless

        <!-- Konten Utama -->
        <div class="content">
            @if (request()->is('login'))
                <div class="login-container">
                    <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1>Login</h1>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            @else
                <main class="py-4">
                    @yield('content')
                </main>
            @endif
        </div>
    </div>

    <!-- Menghubungkan Bootstrap JS dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
