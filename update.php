<?php
require("./connection.php");

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode           = $_POST["kode_barang"];
    $nama           = $_POST["nama"];
    $jumlah         = $_POST["jumlah"];
    $harga          = $_POST["harga"];
    $tgl_pembelian  = $_POST["tgl_pembelian"];

    $query = "UPDATE tb_barang SET nama_barang='$nama', jumlah='$jumlah', harga='$harga' WHERE id='$id'";
    $eksekusi = mysqli_query($conn, $query);
    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}

echo json_encode($response);
mysqli_close($conn);
