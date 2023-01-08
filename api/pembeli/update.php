<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$nama_pembeli = $data->nama_pembeli;
$umur = $data->umur;
$id_pembeli = $data->id_pembeli;

$hasil["success"] = false;
$hasil["data"] = array();

$update_sql = "UPDATE pembeli SET nama_pembeli='$nama_pembeli', umur='$umur' where id_pembeli=$id_pembeli";
$result = mysqli_query($connection,$update_sql);
if($result){
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);

?>