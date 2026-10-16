<?php

require_once __DIR__ . "/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: tambah.php");
    exit;

}

$nama_pembeli = $_POST['nama_pembeli'];
$nama_menu = $_POST['nama_menu'];
$jumlah = (int) $_POST['jumlah'];

$harga = 0;

switch ($nama_menu) {

    case "Nasi Goreng":
        $harga = 15000;
        break;

    case "Mie Goreng":
        $harga = 12000;
        break;

    case "Ayam Geprek":
        $harga = 15000;
        break;

    case "Nasi Ayam":
        $harga = 18000;
        break;

    case "Es Teh":
        $harga = 5000;
        break;

    case "Jus Jeruk":
        $harga = 8000;
        break;

    default:
        die("Menu tidak tersedia.");

}

if ($jumlah < 1) {

    die("Jumlah pesanan tidak valid.");

}

$total_harga = $harga * $jumlah;

$status = "Diproses";

$query = "INSERT INTO pesanan
          (nama_pembeli, nama_menu, jumlah, total_harga, status)
          VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param(
    $stmt,
    "ssiis",
    $nama_pembeli,
    $nama_menu,
    $jumlah,
    $total_harga,
    $status
);

if (mysqli_stmt_execute($stmt)) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal disimpan: "
         . mysqli_error($koneksi);

}

?>