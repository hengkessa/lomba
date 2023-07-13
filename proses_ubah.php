<?php
include 'koneksi.php';

if (isset($_POST['No_Peserta'])) {
    $No_Peserta = $_POST['No_Peserta'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $pembayaran = $_POST['pembayaran'];

    // Query untuk mengubah data peserta
    $query = "UPDATE lomba.peserta SET nama='$nama', alamat='$alamat', email='$email', telepon='$telepon', pembayaran='$pembayaran' WHERE No_Peserta='$No_Peserta'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman index.php setelah proses berhasil
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    echo "Data tidak lengkap.";
}
