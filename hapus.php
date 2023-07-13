<?php
include 'koneksi.php';

// Periksa apakah parameter No_Peserta telah diterima
if (isset($_GET['No_Peserta'])) {
    $No_Peserta = $_GET['No_Peserta'];

    // Hapus data peserta berdasarkan No_Peserta
    $query = "DELETE FROM peserta WHERE No_Peserta = '$No_Peserta'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penghapusan berhasil, redirect ke halaman view.php
        header("Location: view.php");
        exit; // Menghentikan eksekusi skrip setelah pengalihan header
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
