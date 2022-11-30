<?php
require("./connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama               = $_POST["nama"];
    $jumlah             = $_POST["jumlah"];
    $harga              = $_POST["harga"];
    $total_bayar        = $_POST["total_bayar"];
    $tgl_pembelian      = $_POST["tgl_pembelian"];

    $query = "INSERT INTO tb_barang(nama_barang, jumlah, harga, total_bayar, tgl_pembelian) VALUES('$nama', '$jumlah', '$harga', '$total_bayar', '$tgl_pembelian')";
    $eksekusi = mysqli_query($conn, $query);
    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada POST Data";
}

echo json_encode($response);
mysqli_close($conn);
