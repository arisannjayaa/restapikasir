<?php
require("./connection.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST["kode_barang"];

    $query = "DELETE FROM tb_barang WHERE kode_barang='$kode'";
    $eksekusi = mysqli_query($conn, $query);
    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menghapus Data";
    } else {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menghapus Data";
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Hapus Data";
}

echo json_encode($response);
mysqli_close($conn);
