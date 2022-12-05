<?php
require("./connection.php");

$query = "SELECT * FROM tb_barang";
$eksekusi = mysqli_query($conn, $query);
$cek = mysqli_affected_rows($conn);

if ($cek > 0) {
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while ($get = mysqli_fetch_object($eksekusi)) {
        $var["kode_barang"] = $get->kode_barang;
        $var["nama_barang"] = $get->nama_barang;
        $var["jumlah"] = $get->jumlah_barang;
        $var["harga"] = $get->harga_barang;

        array_push($response["data"], $var);
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($conn);
