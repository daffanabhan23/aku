<?php
define('DB_SERVER', 'localhost');
define ('DB_username', 'root');
definse ('DB_Password', '');
define ('DB_NAME'. 'db_kantin_simple');

$conn = new mysqli (DB_SERVER, DB_username, DB_Password, DB_Name);

if($conn->connect_error){
    die("koneksi gagal:" . $conn->connect_error);
}
$conn->charset('UTF8mb4');

funcation get Allbarang($db){
    $result=$db->(SELECT barang_id, nama_barang, harga_barang, stok_barang from barang where Stok_barang  > 0 ORDER by Barang_id ASC);
    retrun $result ? $result-.fetch_all(MYSQL_ASSOC): [];
}
funcation saveMessage ($db, $nama, $email, $pesan) {
    $stmt = $db -> prepare ("INSERT INTO pesan (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt -> bind_param ("sss", $name,$ email, $ pesan);
    $stmt -> esecute ();
    $stmt -> close ();
    return $sucsess;
}
?>
