<?php
include 'koneksi.php';

// Mengambil jumlah peserta dengan status "lunas"
$query = "SELECT COUNT(*) AS jumlah_peserta_lunas FROM peserta WHERE pembayaran = 'lunas'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$jumlah_peserta_lunas = $row['jumlah_peserta_lunas'];

// Mengirimkan jumlah peserta dengan status "lunas" sebagai respons
echo $jumlah_peserta_lunas;
