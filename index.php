<!DOCTYPE html>
<html>

<head>
    <title>Dasbor Lomba</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .header {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            white-space: nowrap;
            /* Mencegah teks "Selamat Datang" menjadi dua baris */
            overflow: hidden;
            /* Menghilangkan efek pembuatan scroll horizontal */
            animation: marquee 10s linear infinite;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #0056b3;
        }

        /* Animasi */
        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .marquee {
            overflow: hidden;
            white-space: nowrap;
            animation: marquee 10s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Warna Card */
        .card-primary {
            background-color: #007bff;
            color: #fff;
        }

        .card-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .card-success {
            background-color: #28a745;
            color: #fff;
        }

        .card-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .card-warning {
            background-color: #ffc107;
            color: #fff;
        }

        .card-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .card-light {
            background-color: #f8f9fa;
        }

        .card-dark {
            background-color: #343a40;
            color: #fff;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 90px 0;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>SISTEM INFORMASI PENDAFTARAN LOMBA</h1>
    </div>

    <div class="container">
        <h4 class="mt-8 marquee">SELAMAT DATANG DI DASHBOARD LOMBA </h4>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-body">
                        <h5 class="card-title">Peserta Terdaftar</h5>
                        <p class="card-text">Jumlah peserta yang <b>Lunas</b>: <strong><?php include 'koneksi.php';
                                                                                        include 'get_jumlah_peserta_lunas.php'; ?></strong></p>

                        <a href="view.php" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-body">
                        <h5 class="card-title">Hadiah Lomba</h5>
                        <p class="card-text">Total hadiah yang tersedia: <strong>Rp 10.000.000</strong></p>
                        <p><strong>Semarak Menyonsong 17 Agustus 2023</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-body">
                        <h5 class="card-title">Timeline Lomba</h5>
                        <ul>
                            <li>12 Juli: Pendaftaran dimulai</li>
                            <li>3 Agustus: Batas akhir pendaftaran</li>
                            <li>5-6 Agustus: Perlombaan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Peserta</h5>
                        <p class="card-text">Klik disini untuk daftar peserta</p>

                        <a href="formulir.php" class="btn btn-light">Daftar Peserta</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date("Y"); ?> Dasbor Lomba. All rights reserved.
        </div>

    </div>

    <!-- Tambahkan script JS Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>