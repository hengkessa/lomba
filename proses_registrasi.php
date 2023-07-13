<?php
include 'koneksi.php';

// Memeriksa apakah data yang dibutuhkan ada dalam $_POST sebelum mengaksesnya
if (isset($_POST['No_Peserta'], $_POST['nama'], $_POST['alamat'], $_POST['email'], $_POST['telepon'], $_POST['pembayaran'])) {
    // Mengambil data dari $_POST
    $No_Peserta = $_POST['No_Peserta'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $pembayaran = $_POST['pembayaran'];

    // Menyimpan data peserta ke dalam database
    $query = "INSERT INTO peserta (No_Peserta, nama, alamat, email, telepon, pembayaran) VALUES ('$No_Peserta', '$nama', '$alamat', '$email', '$telepon', '$pembayaran')";

    if (mysqli_query($conn, $query)) {
        // Registrasi berhasil, redirect ke halaman beranda atau dasbor home
        header("Location: index.php");
        exit; // Menghentikan eksekusi skrip setelah pengalihan header
    } else {
        echo "Registrasi gagal: " . mysqli_error($conn);
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
