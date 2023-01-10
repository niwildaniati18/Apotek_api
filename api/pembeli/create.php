<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$umur = $data->umur;
$nama_pembeli = $data->nama_pembeli;
$obat_id = $data->obat_id;

$hasil["success"] = false;
$hasil["data"] = array();

$insert_sql = "INSERT INTO pembeli VALUES ('$umur,'$nama_pembeli','$obat_id)";
$result = mysqli_query($connection, $insert_sql);
if ($result) {
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);