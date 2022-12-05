<?php
require("./connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama               = $_POST["nama"];
    $jumlah             = $_POST["jumlah"];
    $harga              = $_POST["harga"];

    $query = "INSERT INTO tb_barang(nama_barang, jumlah_barang, harga_barang) VALUES('$nama', '$jumlah', '$harga')";
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
