<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tambahkan link CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Tambahkan script JS Bootstrap 4 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Detail Peserta</title>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .table {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-group .btn {
            width: 80px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center fw-bold text-uppercase">Data Peserta</h3>
                <hr>
            </div>
        </div>

        <div class="row justify-content-center mb-2">
            <div class="col-md-2">
                <a href="export.php" target="_blank" class="btn btn-success btn-block"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Ekspor ke Excel</a>
            </div>
            <div class="col-md-2">
                <a href="index.php" class="btn btn-primary btn-block"><i class="bi bi-house-fill"></i> Beranda</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table id="data" class="table table-striped table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No Peserta</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Status Pembayaran</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil data dari database
                            // Ambil data dari tabel peserta dalam database lomba
                            $query = "SELECT * FROM lomba.peserta";
                            $result = mysqli_query($conn, $query);

                            if (!$result) {
                                die("Error: " . mysqli_error($conn));
                            }

                            // Periksa apakah ada data yang diambil
                            if (mysqli_num_rows($result) > 0) {
                                // Perulangan untuk setiap baris data
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['No_Peserta'] . "</td>";
                                    echo "<td>" . $row['nama'] . "</td>";
                                    echo "<td>" . $row['alamat'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['telepon'] . "</td>";
                                    echo "<td>" . $row['pembayaran'] . "</td>";
                                    echo "<td>";
                                    echo "<div class='btn-group' role='group'>";
                                    echo "<a href='ubah.php?No_Peserta=" . $row['No_Peserta'] . "' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i> Ubah</a>";
                                    echo "<a href='hapus.php?No_Peserta=" . $row['No_Peserta'] . "' class='btn btn-danger btn-sm ml-1' onclick=\"return confirm('Apakah anda yakin ingin menghapus data " . $row['nama'] . " ?');\"><i class='bi bi-trash-fill'></i> Hapus</a>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Close Container -->

    <!-- Tambahkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Tambahkan script DataTables -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#data').DataTable();
        });
    </script>
</body>

</html>