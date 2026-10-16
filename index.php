<?php

require_once __DIR__ . "/koneksi.php";

if (!isset($koneksi)) {
    die("Koneksi database tidak tersedia.");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sistem Informasi Kantin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header bg-success text-white">

            <h3 class="text-center mb-0">
                SISTEM INFORMASI KANTIN
            </h3>

        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="mb-0">
                    Daftar Pesanan
                </h5>

                <a href="tambah.php"
                   class="btn btn-success">

                    + Tambah Pesanan

                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center align-middle">

                    <thead class="table-success">

                        <tr>

                            <th>No</th>

                            <th>Nama Pembeli</th>

                            <th>Menu</th>

                            <th>Jumlah</th>

                            <th>Total Harga</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php

                    $query = "SELECT * FROM pesanan ORDER BY id DESC";

                    $data = mysqli_query($koneksi, $query);

                    if (!$data) {

                        die("Query gagal: " . mysqli_error($koneksi));

                    }

                    $no = 1;

                    if (mysqli_num_rows($data) > 0) {

                        while ($row = mysqli_fetch_assoc($data)) {

                    ?>

                    <tr>

                        <td>
                            <?php echo $no++; ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['nama_pembeli']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['nama_menu']
                            );
                            ?>
                        </td>

                        <td>
                            <?php echo $row['jumlah']; ?>
                        </td>

                        <td>

                            Rp
                            <?php

                            echo number_format(
                                $row['total_harga'],
                                0,
                                ',',
                                '.'
                            );

                            ?>

                        </td>

                        <td>

                            <?php

                            if ($row['status'] == "Diproses") {

                            ?>

                                <span class="badge bg-warning text-dark">
                                    Diproses
                                </span>

                            <?php

                            } else {

                            ?>

                                <span class="badge bg-success">
                                    Selesai
                                </span>

                            <?php

                            }

                            ?>

                        </td>

                        <td>

                            <?php

                            if ($row['status'] == "Diproses") {

                            ?>

                                <a href="selesai.php?id=<?php echo $row['id']; ?>"
                                   class="btn btn-success btn-sm">

                                    ✓ Selesai

                                </a>

                            <?php

                            }

                            ?>

                            <a href="hapus.php?id=<?php echo $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <?php

                        }

                    } else {

                    ?>

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            Belum ada pesanan.

                        </td>

                    </tr>

                    <?php

                    }

                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>