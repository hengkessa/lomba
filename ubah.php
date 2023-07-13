<?php
include 'koneksi.php';

if (isset($_GET['No_Peserta'])) {
    $No_Peserta = $_GET['No_Peserta'];

    // Query untuk mengambil data peserta berdasarkan No_Peserta
    $query = "SELECT * FROM lomba.peserta WHERE No_Peserta = '$No_Peserta'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // Periksa apakah data peserta ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Tangkap data yang ingin diubah dari $row

        // Buat form atau tampilan untuk mengubah data
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Form Registrasi Ulang Peserta Lomba</title>
            <!-- Tambahkan link CSS Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

            <!-- Tambahkan script JS Bootstrap -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

            <style>
                /* ... CSS Anda ... */
                body {
                    background-color: #f5f5f5;
                    font-family: Arial, sans-serif;
                }

                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }

                h2 {
                    color: #333;
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

                .btn {
                    background-color: #007bff;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }

                .btn:hover {
                    background-color: #0056b3;
                }
            </style>

        </head>

        <body>
            <div class="container">
                <h2 class="mt-4">Form Registrasi Ulang Peserta Lomba</h2>

                <form action="proses_ubah.php" method="POST" class="mt-4" id="registration-form">
                    <div class="form-group">
                        <label for="nama">No. Peserta :</label>
                        <input type="text" name="No_Peserta" id="No_Peserta" class="form-control" value="<?php echo $row['No_Peserta']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?php echo $row['alamat']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon:</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $row['telepon']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="pembayaran">Status Pembayaran:</label>
                        <select name="pembayaran" id="pembayaran" class="form-control" required>
                            <option value="" disabled selected>Pilih Status Pembayaran</option>
                            <option value="lunas" <?php if ($row['pembayaran'] == 'lunas') echo 'selected'; ?>>Lunas</option>
                            <option value="belum_lunas" <?php if ($row['pembayaran'] == 'belum_lunas') echo 'selected'; ?>>Belum Lunas</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-primary" onclick="cancelForm()">Batal</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>

            <!-- Script untuk menampilkan pop-up berhasil dan pengalihan halaman -->
            <script>
                function showSuccessPopup() {
                    alert("Registrasi berhasil!");
                    window.location.href = "index.php"; // Ubah "home.html" dengan halaman beranda yang sesuai
                }

                function cancelForm() {
                    document.getElementById("registration-form").reset();
                }

                // Validasi formulir sebelum mengirimkan data
                document.getElementById("registration-form").addEventListener("submit", function(event) {
                    var form = event.target;

                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        showSuccessPopup();
                    }

                    form.classList.add("was-validated");
                });
            </script>

        </body>

        </html>
<?php
    } else {
        echo "Data peserta tidak ditemukan.";
    }
} else {
    echo "No_Peserta tidak ditemukan.";
}
?>